<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'entrance_1',
        'exit_1',
        'entrance_2',
        'exit_2'
    ];

    protected $dates = ['date'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
