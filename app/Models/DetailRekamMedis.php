<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailRekamMedis extends Model
{
    protected $table = 'detail_rekam_medis';
    protected $primaryKey = 'iddetail_rekam_medis';
    public $timestamps = false; // tabel tidak ada created_at/updated_at

    protected $fillable = [
        'idrekam_medis',
        'idkode_tindakan_terapi',
        'detail'
    ];

    // Relasi ke RekamMedis
    public function rekamMedis()
    {
        return $this->belongsTo(RekamMedis::class, 'idrekam_medis', 'idrekam_medis');
    }

    // Relasi ke KodeTindakan (terapi)
    public function kodeTindakan()
    {
        return $this->belongsTo(KodeTindakanTerapi::class, 'idkode_tindakan_terapi', 'idkode_tindakan_terapi');
    }
}
