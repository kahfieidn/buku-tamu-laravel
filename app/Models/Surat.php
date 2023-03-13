<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomor_surat',
        'tanggal_surat',
        'perihal_surat',
        'file_surat',
        'instansi_id',
        'disposisi_id',
    ];
    public function instansis(){
        return $this->belongsTo(Instansi::class, 'instansi_id');
    }
    public function disposisis(){
        return $this->belongsTo(Disposisi::class, 'disposisi_id');
    }
}
