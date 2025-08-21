<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'employee_id',
        "address",
        "department",
        "speciality",
    ];

    public function user() { return $this->belongsTo(User::class); }

    // protected static function booted() {
    //     static::creating(function($profile) {
    //         $year = now()->format('y');
    //         $initals = 'EMP';
    //         $profile->employee_id = $initals. $year .rand(1000, 9999);
    //         $profile->saveQuietly();  
    //     });

    // }
}
