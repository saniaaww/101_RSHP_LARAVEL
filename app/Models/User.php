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


public function roleUsers()
{
return $this->hasMany(RoleUser::class, 'iduser', 'iduser');
}
public function role()
{
    return $this->belongsTo(Role::class);
}

}