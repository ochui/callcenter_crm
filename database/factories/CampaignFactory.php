<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Campaign;
use App\Models\Form;
use App\Models\User;
use Faker\Generator as Faker;

class CampaignFactory extends Factory {
    protected $model = Campaign::class;

    public function definition() {
        $campaignArray = [
            'Live Event Campaign',
            'Make New Mobile Application',
            'Sell Home Loan Campaign',
            'Social Media Campaign',
            'Website Development Campaign',
            'Job Applications',
            'Electronic Item Sell Campaign'
        ];

        $uniqueCampaignName = $this->faker->unique()->randomElement( $campaignArray );
        $randomUser = User::where( 'email', 'manager@example.com' )->first();
        $randomForm = Form::inRandomOrder()->first();

        if ( $uniqueCampaignName == 'Live Event Campaign' ||
        $uniqueCampaignName == 'Social Media Campaign' ||
        $uniqueCampaignName == 'Job Applications' ||
        $uniqueCampaignName == 'Electronic Item Sell Campaign' ) {
            $randomForm = Form::where( 'form_name', 'Default Form' )->first();
        } else if ( $uniqueCampaignName == 'Make New Mobile Application' ||
        $uniqueCampaignName == 'Website Development Campaign' ) {
            $randomForm = Form::where( 'form_name', 'Software Development Form' )->first();
        } else if ( $uniqueCampaignName == 'Sell Home Loan Campaign' ) {
            $randomForm = Form::where( 'form_name', 'Insurance Enquiry Form' )->first();
        }

        //$completedCampaignCount = Campaign::where( 'status', 'completed' )->count();
        //$status = $completedCampaignCount > 2 ? 'started' : $this->faker->randomElement( [ 'completed', 'started' ] );
        $status = $this->faker->randomElement( [ 'completed', 'started' ] );

        $autoReference = $this->faker->numberBetween( 0, 1 );
        $startedOn = $this->faker->dateTimeBetween( '-30 days', 'now' );
        $completedOn = $this->faker->dateTimeBetween( $startedOn, 'now' );
        $totalLeads = $this->faker->numberBetween( 20, 100 );
        $remainingLeads = $this->faker->numberBetween( 10, $totalLeads );

        return [
            'name' => $uniqueCampaignName,
            'status' => $status,
            'started_on' => $status == NULL ? NULL : $startedOn,
            'completed_on' => $status == 'completed' ? $completedOn : NULL,
            'total_leads' => ( $status == 'completed' || $status == 'started' ) ? $totalLeads : NULL,
            'remaining_leads' => $status == 'completed' ? 0 : ( $status == NULL ? NULL : $remainingLeads ),
            'auto_reference' =>$autoReference,
            'auto_reference_prefix' =>$autoReference == 1 ? strtoupper( $this->faker->lexify( '???' ) ): NULL,
            'created_by' => $randomUser->id,
            'form_id' => $randomForm->id
        ];
    }
}