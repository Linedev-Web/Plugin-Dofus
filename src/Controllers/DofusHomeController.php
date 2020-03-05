<?php

namespace Azuriom\Plugin\Dofus\Controllers;

use Azuriom\Http\Controllers\Controller;

class DofusHomeController extends Controller
{
    /**
     * Show the home plugin page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dofus::index');
    }
}
