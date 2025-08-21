<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedBack extends Model
{
    use HasFactory;

    protected $fillable = [
       'enrollment_id',
       'message',
        'rating',
    ];

    public function enrollment() {
        return $this->belongsTo(Enrollment::class);
    }

    public function student() {
        return $this->belongsTo(User::class);
    }

    public function course() {
        return $this->belongsTo(Course::class);
    }


}
