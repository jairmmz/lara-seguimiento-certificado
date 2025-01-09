<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'participant_id',
        'type_participant_id',
        'course_id',
        'issue_date',
        'certificate_file',
        'status',
        'qr_code'
    ];

    protected $appends = [
        'certificate_file_url'
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

    public function typeParticipant()
    {
        return $this->belongsTo(TypeParticipant::class);
    }

    public function getCertificateFileUrlAttribute()
    {
        return generateUrl('certificates', $this->certificate_file);
    }
}
