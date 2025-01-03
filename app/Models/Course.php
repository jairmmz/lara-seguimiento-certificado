<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date'
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date'
        ];
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

}
