<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'babysitter_id',
        'ageGroupCategory',
        'bookingDate',
        'bookingTime',
        'booking-date',
        'booking-time',
        'childName',
        'childAge',
        'allergies',
        'disabilities',
        'eatingTime',
        'playTime',
        'homeworkTime',
        'napTime',
        'snackTime',
        'screenTime',
        'taskDescription',
        'taskTime',
        'sicknessDetails',
        'additionalNotes',
        'medicineName',
        'dosage',
        'medicineTime',
        'feedingTime',
        'feedingDetails',
        'napTiming',
        'napDetails',
        'gender',
        'houseAddress',
        'feedingType',
        'feedingTime2',
        'breakfast',
        'feedingDetails2',
        'feedingTime3',
        'lunch',
        'feedingDetails3',
        'feedingTime4',
        'dinner',
        'feedingDetails4',
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
        'screenTimeEnd2',
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
        'emergency_contact_number2',
        'completed_status',


    ];
}
