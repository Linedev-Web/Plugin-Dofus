<?php

namespace Azuriom\Plugin\Dofus\Controllers;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Plugin\Dofus\Models\Character;
use Azuriom\Plugin\Dofus\Models\MarketListing;

class MarketController extends Controller
{
    /**
     * Show the home plugin page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_characters = [];
        $listings = MarketListing::paginate(15);
        
        return view('dofus::market.index', ['listings'=>$listings]);
    }

    public function show(MarketListing $marketListing) {
        return view('dofus::market.show', ['marketListing' => $marketListing]);
    }
}
