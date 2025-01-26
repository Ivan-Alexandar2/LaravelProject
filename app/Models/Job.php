<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'job_listings'; // Укажи новата таблица

    protected $fillable = [
        'title',
        'description',
        'company',
        'location',
        'salary',
        'image',
        'category', // Добави колоната `category`
    ];

    // Връзка с кандидатурите
    public function applications()
    {
        //return $this->hasMany(Application::class);  ------- tova vmesto onova      
        return $this->hasMany(Application::class, 'job_id');
    }
}

