<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'code',
        'credit_value',
        'description',
        'teacher_id',
    ];

    public function teacher(){ 
        return $this->belongsTo(User::class); 
    }

    public function students() {
        return $this->belongsToMany(User::class, 'enrollments')->withTimestamps();
    }

    public function feedBacks() {
        return $this->hasMany(FeedBack::class);
    }

    public function enrollments() {
        return $this->hasMany(Enrollment::class);
    }
}
