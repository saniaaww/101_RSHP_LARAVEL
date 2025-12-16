<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    protected $table = 'rekam_medis';
    protected $primaryKey = 'idrekam_medis';

    // Tabel hanya punya created_at
    public $timestamps = true;
    const UPDATED_AT = null;
    protected $fillable = [
        'anamnesa',
        'temuan_klinis',
        'diagnosa',
        'dokter_pemeriksa',
        'idreservasi_dokter',
    ];

    public function dokter()
{
    return $this->belongsTo(Dokter::class, 'dokter_pemeriksa', 'iddokter');
}

public function reservasi_dokter()
{
    return $this->belongsTo(TemuDokter::class, 'idreservasi_dokter', 'idreservasi_dokter');
}


}

