<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeParticipant extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
