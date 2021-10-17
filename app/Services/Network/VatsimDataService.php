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
    const NETWORK_DATA_URL = 'https://cdn.discordapp.com/attachments/882531763983896599/893456176174477373/vatsim-data.json';
    //const NETWORK_DATA_URL = "https://data.vatsim.net/v3/vatsim-data.json";
    private $callsignsToMatch;

    public function __construct()
    {
        $this->callsignsToMatch = VatsimLogonPosition::all()->filter(function ($position) {
            return VatsimControllerSession::wherePositionId(VatsimLogonPosition::find($position->id)->id)->whereLogoffTime(null)->doesntExist();
        })->pluck('callsign')->toArray();
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

        // Format data
        $formattedControllers = $this->formatControllerData($networkResponse);

        // Process *new* controller clients
        $this->processNewControllers($formattedControllers);

        // Process logoffs
        $this->processControllerLogoffs($formattedControllers);
    }

    private function formatControllerData(Collection $controllerData): Collection
    {
        return $controllerData->map(function (array $controller) {
            return $this->formatController($controller);
        });
    }

    private function formatController(array $controller): array
    {
        return [
            'id' => Str::uuid(),
            'position_id' => VatsimLogonPosition::where('callsign', $controller['callsign'])->first()->id ?? null,
            'cid' => $controller['cid'],
            'frequency' => $controller['frequency'],
            'logon_time' => Carbon::parse($controller['logon_time']),
            'visual_range' => $controller['visual_range']
        ];
    }

    private function filterNewControllers(Collection $controllerData): Collection
    {
        return $controllerData->filter(function (array $controller) {
            return in_array($controller['callsign'], $this->callsignsToMatch);
        });
    }

    private function processNewControllers(Collection $input): void
    {
        $controllers = $this->filterNewControllers($input);
        foreach ($controllers as $controller) {
            VatsimControllerSession::create($controller);
        }
    }

    private function processControllerLogoffs(Collection $controllers): void
    {
        $activeSessions = VatsimControllerSession::whereLogoffTime(null)->get();

        if ($controllers->empty()){
            foreach ($activeSessions as $session) {
                $session->logoff_time = now();
                $session->save();
            }
        }
        foreach (
            $activeSessions as $session) {
            dd($controllers->contains('position_id', $session->position_id));
        }
    }
}
