<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'registration_id',
        'certificate_file',
        'status',
        'qr_code',
    ];

    protected $appends = [
        'certificate_file_url'
    ];

    protected function casts(): array
    {
        return [
            'registration_id' => 'integer',
        ];
    }

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }

    public function getRegistrationFileUrlAttribute()
    {
        return generateUrl('registrations', $this->registration_file);
    }
}
