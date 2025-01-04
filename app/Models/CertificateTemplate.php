<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CertificateTemplate extends Model
{
    protected $fillable = [
        'name',
        'template_file'
    ];

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }
}
