<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $fillable = [
        'appointment_id',
        'user_id',
        'feedback',
        'stars',
        

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function appointment()
    {
        return $this->belongsTo(Appointmentp::class, 'appointment_id');
    }
}
