<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'motivation_letter',
        'job_id',
    ];
    
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
