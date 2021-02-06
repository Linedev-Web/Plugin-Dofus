<?php

namespace Azuriom\Plugin\Dofus\Models;

use Illuminate\Database\Eloquent\Model;
use Azuriom\Models\User;
use Azuriom\Models\Traits\HasTablePrefix;

class MarketListing extends Model
{
    use HasTablePrefix;

    /**
     * The table prefix associated with the model.
     *
     * @var string
     */
    protected $prefix = 'dofus_';

    public function character() {
        return $this->hasOne(Character::class, 'Id', 'character_id');
    }
}