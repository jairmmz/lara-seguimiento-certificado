<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $fillable = [
        'participant_id',
        'type_participant_id',
        'course_id',
        'status'
    ];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

    public function typeParticipant()
    {
        return $this->belongsTo(TypeParticipant::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
