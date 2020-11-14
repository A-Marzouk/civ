<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    protected $table = 'preferences';

    protected $guarded = [] ;

    public static $defaultPreferences = [
        [
            'title' => 'hourly_rate',
            'label' => 'Hourly Rate'
        ],
        [
            'title' => 'weekly_availability',
            'label' => 'Weekly Availability'
        ],
        [
            'title' => 'hire_me',
            'label' => 'Hire Me'
        ],
        [
            'title' => 'chat',
            'label' => 'Start A Chat'
        ],
        [
            'title' => 'pdf_download',
            'label' => 'Download PDF'
        ],
    ];

    // relation belongs to
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
