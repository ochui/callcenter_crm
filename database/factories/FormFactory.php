<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Form;
use App\Models\User;
use Faker\Generator as Faker;

class FormFactory extends Factory {
    /**
    * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Form::class;

    /**
     * Define the model's default state.
    *
    * @return array
    */

    public function definition() {
        return [
            'created_by' => function () {
                return User::where( 'email', 'manager@example.com' )->first();
            }
        ];
    }
}