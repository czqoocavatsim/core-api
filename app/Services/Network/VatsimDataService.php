<?php

namespace App\Services\Network;

use App\Models\Network\VatsimControllerSession;
use App\Models\Network\VatsimLogonPosition;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class VatsimDataService
{
    const NETWORK_DATA_URL = 'https://data.vatsim.net/v3/vatsim-data.json';
    private $callsignsToMatch;

    public function __construct()
    {
        $this->callsignsToMatch = VatsimLogonPosition::all()->pluck('callsign')->toArray();
    }

    public function updateNetworkData(): void
    {
        // Download network data and check it worked
        $networkResponse = null;
        try {
            $networkResponse = Http::timeout(10)->get(self::NETWORK_DATA_URL);
        } catch (Exception $exception) {
            Log::warning('Failed to download network data, exception was ' . $exception->getMessage());
            return;
        }

        if (!$networkResponse->successful()) {
            Log::warning('Failed to download network data, response was ' . $networkResponse->status());
            return;
        }

        // Process controller clients
        $concernedControllers = $this->formatControllerData($networkResponse);
        foreach ($concernedControllers as $controller) {
            Log::info($controller);
        }
        $this->processControllers($concernedControllers);
    }

    private function formatControllerData(Response $response): Collection
    {
        $controllerData = $this->filterControllerData(new Collection($response->json('controllers', '[]')));
        return $controllerData->map(function (array $controller) {
            return $this->formatController($controller);
        });
    }

    private function filterControllerData(Collection $controllerData): Collection
    {
        return $controllerData->filter(function (array $controller) {
            return in_array($controller['callsign'], $this->callsignsToMatch);
        });
    }

    private function formatController(array $controller): array
    {
        return [
            'position_id' => VatsimLogonPosition::where('callsign', $controller['callsign'])->first()->id,
            'cid' => $controller['cid'],
            'frequency' => $controller['frequency'],
            'logon_time' => Carbon::parse($controller['logon_time']),
            'visual_range' => $controller['visual_range']
        ];
    }

    private function processControllers(Collection $controllers): void
    {
        VatsimControllerSession::updateOrCreate(
            ['id' => Str::uuid()],
            $controllers->toArray()
        );
    }
}
