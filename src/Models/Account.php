<?php

namespace Azuriom\Plugin\Dofus\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $primaryKey = 'Id';

    protected $connection = 'dofus_auth';

    public $timestamps = false;

    protected $fillable = [
        'Login',
        'PasswordHash',
        'NickName',
        'SecretQuestion',
        'SecretAnswer',
        'Lang',
        'IsJailed',
        'IsBanned'
    ];

    public function characters() {
        return $this->hasMany(Character::class, 'AccountId');
    }
}