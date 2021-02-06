<?php

namespace Azuriom\Plugin\Dofus\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Plugin\Dofus\Models\Character;

class AdminController extends Controller
{
    /**
     * Show the home admin page of the plugin.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd(Character::all()->first());
        return view('dofus::admin.index', ['caracters'=> '']);
    }
}
