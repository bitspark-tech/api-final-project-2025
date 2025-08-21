<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'matricule', 
        'dob', 
        'gender',
        'phone', 
        'address',
        'is_completed',
    ];

    public function user() {
        return $this->belongsTo(User::class); 
    }

    // protected static function booted() {
    //     static::created(function($profile) {
    //         $year = now()->format('y');
    //         $uni_initials = 'UBa';
    //         $school_initials = 'E';

    //         $profile->matricule = $uni_initials.$year.$school_initials.str_pad($profile->id, 5, '0', STR_PAD_LEFT);
    //         $profile->saveQuietly();


    //     });
    // }
}
