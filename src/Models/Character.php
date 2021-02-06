<?php

namespace Azuriom\Plugin\Dofus\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Character extends Model
{
    protected $primaryKey = 'Id';

    protected $connection = 'dofus_world';

    public $incrementing = false;

    public $timestamps = false;


    public function getAvatarUrl() {
        return plugin_asset('dofus', "img/heads/{$this->Breed}_{$this->Sex}.png");
    }

    public function getItems() {
        return DB::connection('dofus_world')->table('characters_items')
            ->Where('OwnerId', $this->Id)
            ->where(function($query) {
                $query
                ->orWhere('Position', 0) // amulet
                ->orWhere('Position', 1) // weapon
                ->orWhere('Position', 2) // left ring
                ->orWhere('Position', 3) // belt
                ->orWhere('Position', 4) // right ring
                ->orWhere('Position', 5) // boots
                ->orWhere('Position', 6) // hat
                ->orWhere('Position', 7) // cape
                //->orWhere('Position', 8) // pets
                ->orWhere('Position', 9) // Dofus 1
                ->orWhere('Position', 10) // Dofus 2
                ->orWhere('Position', 11) // Dofus 3
                ->orWhere('Position', 12) // Dofus 4
                ->orWhere('Position', 13) // Dofus 5
                ->orWhere('Position', 14) // Dofus 6
                ->orWhere('Position', 15) // shield
                ->orWhere('Position', 16); // Mount
            })
            ->get();
    }
}