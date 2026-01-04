<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $fillable = [
        'user_id',
        'course_id',
        'course_name',        
        'course_price',       
        'course_duration',    
        'full_name',          
        'email',              
        'phone',              
        'occupation',         
        'goals',              
        'payment_method',
        'payment_proof',
        'payment_status',
        'rejection_reason',
        'confirmed_at',
        'progress',
        'completed_lessons',
        'total_lessons',
        'status',
        'certificate_number',
        'completed_at',
    ];

    protected $casts = [
        'confirmed_at' => 'datetime',
        'completed_at' => 'datetime',
        'progress' => 'integer',
        'completed_lessons' => 'integer',
        'total_lessons' => 'integer',
    ];

    // Relasi ke User (nullable karena bisa guest enrollment)
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    // Relasi ke Course (nullable)
    public function course()
    {
        return $this->belongsTo(\App\Models\Course::class);
    }
}