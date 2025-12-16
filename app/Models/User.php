<?php
namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
protected $table = 'user';
protected $primaryKey = 'iduser';
public $incrementing = true;
protected $keyType = 'int';
public $timestamps = false;
protected $fillable = ['nama','email','password'];

    public function roleAktif()
    {
        return $this->hasOne(RoleUser::class, 'iduser', 'iduser')
                    ->where('status', 1);
    }

    public function getRoleNameAttribute()
    {
        return $this->roleAktif?->role?->nama_role;
    }

    public function pemilik()
    {
        return $this->hasOne(Pemilik::class, 'iduser', 'iduser');
    }

    public function roleUser()
    {
        return $this->hasMany(\App\Models\RoleUser::class, 'iduser', 'iduser');
    }
    }