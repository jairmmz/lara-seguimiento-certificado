<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'participant_id',
        'type_participant_id',
        'course_id',
    ];

    protected function casts(): array
    {
        return [
            'participant_id' => 'integer',
            'type_participant_id' => 'integer',
            'course_id' => 'integer',
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

    public function typeParticipant()
    {
        return $this->belongsTo(TypeParticipant::class);
    }

    public function certificate()
    {
        return $this->hasOne(Certificate::class);
    }
}
