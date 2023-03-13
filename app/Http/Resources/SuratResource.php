<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SuratResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'nomor_surat' => $this->nomor_surat,
            'tanggal_surat' => $this->tanggal_surat,
            'perihal_surat' => $this->perihal_surat,
            'file_surat' => $this->file_surat,
            'instansi_id' => $this->instansi_id,
            'disposisi_id' => $this->disposisi_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
