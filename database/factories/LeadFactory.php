<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Lead;
use App\Models\Form;
use App\Models\User;
use Faker\Generator as Faker;

class LeadFactory extends Factory {
    /**
    * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lead::class;

    /**
     * Define the model's default state.
    *
    * @return array
    */

    public function definition() {
        $interested = $this->faker->randomElement( [ 'interested', 'not_interested', 'unreachable' ] );

        return [
            'interested' => function ( array $lead ) use( $interested ) {
                return $lead[ 'status' ] == 'actioned' ? $interested : NULL;
            }
            ,
            'appointment_booked' => function ( array $lead ) use( $interested ) {
                return $lead[ 'status' ] == 'actioned' ? rand( 0, 1 ) : 0;
            }
            ,
            'time_taken' => function ( array $lead ) {
                return $lead[ 'status' ] == 'actioned' ? $this->faker->numberBetween( 180, 300 ) : NULL;
            }
            ,

        ];
    }
}