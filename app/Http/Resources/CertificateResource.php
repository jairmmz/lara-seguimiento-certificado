<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CertificateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'registration_id' => $this->registration_id,
            'certificate_file' => $this->certificate_file,
            'certificate_file_url' => $this->certificate_file_url,
            'status' => $this->status,
            'qr_code' => $this->qr_code,
        ];
    }
}
