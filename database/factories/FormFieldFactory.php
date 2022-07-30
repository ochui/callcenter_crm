<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\FormField;
use App\Models\User;
use Faker\Generator as Faker;

class FormFieldFactory extends Factory {
    protected $model = FormField::class;

    public function definition() {
        return [];
    }
}