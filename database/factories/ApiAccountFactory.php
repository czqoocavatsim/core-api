<?php

namespace Database\Factories;

use App\Models\ApiAccount;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApiAccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ApiAccount::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->domainName(),
            'origin_uri' => $this->faker->domainName(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (ApiAccount $account) {
            $account->createToken($account->id);
        });
    }
}
