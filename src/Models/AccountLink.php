<?php

namespace Azuriom\Plugin\Dofus\Models;

use Illuminate\Database\Eloquent\Model;
use Azuriom\Models\User;
use Azuriom\Models\Traits\HasTablePrefix;

class AccountLink extends Model
{
    use HasTablePrefix;

    /**
     * The table prefix associated with the model.
     *
     * @var string
     */
    protected $prefix = 'dofus_';

    protected $fillable = ['dofus_game_id', 'azuriom_user_id'];

    public function user() {
        return $this->belongsTo(User::class, 'azuriom_user_id');
    }

    public function account() {
        return $this->hasOne(Account::class, 'dofus_game_id', 'Id');
    }

    public function characters() {
        return $this->hasMany(Character::class, 'AccountId', 'dofus_game_id');
    }
    
    
}