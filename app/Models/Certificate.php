<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'participant_id',
        'course_id',
        'issue_date',
        'certificate_url',
        'status'
    ];

    protected function casts(): array
    {
        return [
            'issue_date' => 'date'
        ];
    }

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
