<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CertificateTemplate extends Model
{
    protected $fillable = [
        'name',
        'template_file'
    ];

    protected $appends = [
        'template_file_url'
    ];

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function getTemplateFileUrlAttribute()
    {
        return generateUrl('certificate_templates', $this->template_file);
    }
}
