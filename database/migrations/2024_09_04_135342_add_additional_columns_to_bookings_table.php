<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalColumnsToBookingsTable extends Migration
{
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Adding new columns for child details



            $table->string('specialFoodInstructions')->nullable();

            // Adding new columns for nap schedule
            $table->time('morningWakeUpTime')->nullable();
            $table->time('nightSleepingTime')->nullable();
            $table->time('napTiming2')->nullable();
            $table->string('napDetails2')->nullable();
            $table->time('napTiming3')->nullable();
            $table->string('napDetails3')->nullable();
            $table->string('sleepingPreferences')->nullable();
            $table->string('comfortItems')->nullable();
            $table->string('specificRoutines')->nullable();
            $table->string('whiteNoise')->nullable();

            // Adding new columns for activity plan
            $table->string('taskDescription2')->nullable();
            $table->time('taskTime2')->nullable();
            $table->string('taskDescription3')->nullable();
            $table->time('taskTime3')->nullable();
            $table->string('taskDescription4')->nullable();
            $table->time('taskTime4')->nullable();
            $table->string('taskDescription5')->nullable();
            $table->time('taskTime5')->nullable();

            // Adding new columns for screen time
            $table->time('screenTimeStart1')->nullable();
            $table->time('screenTimeEnd1')->nullable();
            $table->time('screenTimeStart2')->nullable();
            $table->time('screenTimeEnd2')->nullable();
        });
    }

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Dropping the newly added columns
            $table->dropColumn([


                'specialFoodInstructions',
                'morningWakeUpTime',
                'nightSleepingTime',
                'napTiming2',
                'napDetails2',
                'napTiming3',
                'napDetails3',
                'sleepingPreferences',
                'comfortItems',
                'specificRoutines',
                'whiteNoise',
                'taskDescription2',
                'taskTime2',
                'taskDescription3',
                'taskTime3',
                'taskDescription4',
                'taskTime4',
                'taskDescription5',
                'taskTime5',
                'screenTimeStart1',
                'screenTimeEnd1',
                'screenTimeStart2',
                'screenTimeEnd2'
            ]);
        });
    }
}
