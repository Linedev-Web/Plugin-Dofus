<?php

namespace Azuriom\Plugin\Dofus\Controllers;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Plugin\Dofus\Models\Character;

class LadderController extends Controller
{
    /**
     * Show the home plugin page.
     *
     * @return \Illuminate\Http\Response
     */
    public function pvm()
    {
        $characters = Character::where('Experience', '>', 0)->orderBy('PrestigeRank', 'DESC')->paginate(15);
        return view('dofus::ladder.pvm', ['characters'=> $characters]);
    }

    public function pvp()
    {
        $characters = Character::where('Honor', '>', 0)->orderBy('Honor', 'DESC')->paginate(15);
        return view('dofus::ladder.pvp', ['characters'=> $characters]);
    }

    public function koli_1v1() {
        $characters = Character::where('ArenaDailyMatchsCount_1vs1', '!=', 0)->orderBy('ArenaRank_1vs1', 'DESC')->paginate(15);
        return view('dofus::ladder.koli', ['characters'=> $characters]);
    }

    public function koli_3v3() {
        $characters = Character::where('ArenaDailyMatchsCount_3vs3', '!=', 0)->orderBy('ArenaRank_3vs3', 'DESC')->paginate(15);
        return view('dofus::ladder.koli', ['characters'=> $characters]);
    }
}
