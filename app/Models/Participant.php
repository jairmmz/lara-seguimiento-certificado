<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'identification',
        'email',
        'phone'
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
