<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ref_number',
        'date',
        'time',
        'note',
        'status',
        'symtoms',
        'comment',

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
   
}
