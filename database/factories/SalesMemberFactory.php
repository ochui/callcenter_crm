<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SalesMember;
use Faker\Generator as Faker;

class SalesMemberFactory extends Factory {
    /**
    * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SalesMember::class;

    /**
     * Define the model's default state.
    *
    * @return array
    */

    public function definition() {

        $firstName = $this->faker->firstName;
        $lastName = $this->faker->lastName;
        $skypeId = $firstName.'_'.$lastName.'_'. $this->faker->randomNumber( 3 );

        return [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $this->faker->unique()->safeEmail,
            'contact_number' => $this->faker->phoneNumber,
            'skype_id' => $skypeId
        ];
    }
}