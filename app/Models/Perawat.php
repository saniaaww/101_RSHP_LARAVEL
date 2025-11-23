<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perawat extends Model
{
    protected $table = 'perawat';
    protected $primaryKey = 'idperawat';

    protected $fillable = [
        'alamat',
        'no_hp',
        'jenis_kelamin',
        'pendidikan',
        'iduser',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'iduser');
    }
}
