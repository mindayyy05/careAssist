<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnssToBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Screen Time
            $table->text('screen_time_rules')->nullable();
            $table->text('screen_time_items')->nullable();

            // Hygiene Plan
            $table->time('bath_time1')->nullable();
            $table->string('bath_details1')->nullable();
            $table->time('bath_time2')->nullable();
            $table->string('bath_details2')->nullable();
            $table->time('bath_time3')->nullable();
            $table->string('bath_details3')->nullable();
            $table->string('shampoo')->nullable();
            $table->string('soap')->nullable();
            $table->string('diaper_frequency')->nullable();
            $table->string('diaper_specific_products')->nullable();
            $table->json('brushing_times')->nullable();
            $table->string('oral_products')->nullable();

            // Behavioral Plan
            $table->text('discipline_methods')->nullable();
            $table->text('comforting_methods')->nullable();
            $table->text('triggers_for_tantrums')->nullable();
            $table->text('reinforcement_strategies')->nullable();

            // Medicine Details
            $table->string('sickness')->nullable();
            $table->string('disability')->nullable();
            $table->string('medicine_name1')->nullable();
            $table->string('dosage1')->nullable();
            $table->time('medicine_time1')->nullable();
            $table->string('medicine_name2')->nullable();
            $table->string('dosage2')->nullable();
            $table->time('medicine_time2')->nullable();
            $table->string('medicine_name3')->nullable();
            $table->string('dosage3')->nullable();
            $table->time('medicine_time3')->nullable();

            // Emergency Contacts
            $table->string('emergency_contact_name1')->nullable();
            $table->string('emergency_contact_number1')->nullable();
            $table->string('emergency_contact_name2')->nullable();
            $table->string('emergency_contact_number2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn([
                'screen_time_rules',
                'screen_time_items',
                'bath_time1',
                'bath_details1',
                'bath_time2',
                'bath_details2',
                'bath_time3',
                'bath_details3',
                'shampoo',
                'soap',
                'diaper_frequency',
                'diaper_specific_products',
                'brushing_times',
                'oral_products',
                'discipline_methods',
                'comforting_methods',
                'triggers_for_tantrums',
                'reinforcement_strategies',
                'sickness',
                'disability',
                'medicine_name1',
                'dosage1',
                'medicine_time1',
                'medicine_name2',
                'dosage2',
                'medicine_time2',
                'medicine_name3',
                'dosage3',
                'medicine_time3',
                'emergency_contact_name1',
                'emergency_contact_number1',
                'emergency_contact_name2',
                'emergency_contact_number2'
            ]);
        });
    }
}
