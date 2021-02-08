@extends('layouts.app')

@section('title', 'Plugin home')

@push('styles')
    <link href="{{ plugin_asset('dofus','css/styles.css') }}" rel="stylesheet">
@endpush
@push('footer-scripts')
    <script src="{{ plugin_asset('dofus','js/script.js') }}"></script>
@endpush
@section('content')
    <div class="container my-5" id="plugin--dofus-market">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Inventaire</div>
                        <!-- HTML to write -->
                        <a href="#" data-toggle="tooltip" title="Some tooltip text!">Hover over me</a>

                        <!-- Generated markup by the plugin -->
                        <div class="tooltip bs-tooltip-top" role="tooltip">
                            <div class="arrow"></div>
                            <div class="tooltip-inner">
                                Pommes
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="market--inventory">
                            @foreach ($marketListing->character->getItems() as $key=>$item)
                                @php
                                    $itemEmpty=[
                                        0 => "icon_slot_collar_inventory",
                                        1 => "icon_slot_weapon_inventory",
                                        2 => "icon_slot_ring_inventory",
                                        3 => "icon_slot_belt_inventory",
                                        4 => "icon_slot_ring_inventory",
                                        5 => "icon_slot_shoe_inventory",
                                        6 => "icon_slot_helmet_inventory",
                                        7 => "icon_slot_cape_inventory",
                                        8 => "icon_slot_pet_inventory",
                                        9 => "icon_slot_dofus_inventory",
                                        10 => "icon_slot_dofus_inventory",
                                        11 => "icon_slot_dofus_inventory",
                                        12 => "icon_slot_dofus_inventory",
                                        13 => "icon_slot_dofus_inventory",
                                        14 => "icon_slot_dofus_inventory",
                                        15 => "icon_slot_shield_inventory",
                                        16 => "icon_slot_companon_inventory",
                                    ];
                                    // set location
                                    $itemId = $marketListing->character->getItems()[$key]->ItemId;

                                    if (empty($item)){
                                        $url = [
                                            "https://fr.dofus.dofapi.fr/equipments/$itemId",
                                            "https://fr.dofus.dofapi.fr/pets/$itemId",
                                            "https://fr.dofus.dofapi.fr/mouts/$itemId",
                                            "https://fr.dofus.dofapi.fr/weapons/$itemId",
                                        ];
                                        foreach ($url as $value){
                                            $handle = curl_init($value);
                                            curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);

                                            /* Get the HTML or whatever is linked in $url. */
                                            $response = curl_exec($handle);

                                            /* Check for 404 (file not found). */
                                            $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);

                                            if ($httpCode != 404){
                                                $json = file_get_contents($value);
                                                $json = json_decode($json);
                                            }
                                        }
                                    }
                                @endphp
                                @php
                                    $extra = dofus_deserialize_stuff_effects($item->SerializedEffects);
                                @endphp
                                <div class="market--inventory-slot-{{$key}}">
                                    @if(!isset($item))
                                        <img
                                            src="{{ plugin_asset('dofus', 'img/inventory/slot_dark_background_full.png') }}"
                                            alt="">
                                        <a href="#" data-html="true" data-placement="right" data-toggle="tooltip" title="
                                        <b>{{$json->name}}</b>
                                        @foreach ($extra->effects as $effect)
                                            <br>
{{ $effect->getFormatedCharacteristic() }}
                                        @endforeach">
                                            <img class="icon is-icon" src="{{$json->imgUrl}}" alt="">
                                        </a>
                                    @else
                                        <img
                                            src="{{ plugin_asset('dofus', 'img/inventory/slot_dark_background_empty.png') }}"
                                            alt="">
                                        <a href="#" data-html="true" data-placement="right" data-toggle="tooltip" title="Vide">
                                            <img class="icon"
                                                 src="{{ plugin_asset('dofus', 'img/inventory/'.$itemEmpty[$key].'.png') }}"
                                                 alt="">
                                        </a>
                                    @endif

                                </div>
                            @endforeach

                            <div class="market--inventory-slot-player market--inventory-base">
                                <div class="market--inventory-base-top">

                                </div>
                                <div class="market--inventory-base-bottom">
                                    <button class="market--inventory-base-bottom-left">
                                        <img
                                            src="{{ plugin_asset('dofus', 'img/inventory/btn_arrow_turn_character_normal.png') }}"
                                            alt="">
                                    </button>
                                    <img src="{{ plugin_asset('dofus', 'img/inventory/base_character_sprite.png') }}"
                                         alt="">
                                    <button class="market--inventory-base-bottom-right">
                                        <img
                                            src="{{ plugin_asset('dofus', 'img/inventory/btn_arrow_turn_character_normal.png') }}"
                                            alt="">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Caractéristique</div>
                    </div>
                    <div class="card-body">

                        <ul class="list-unstyled">
                            <li><img title="{{$marketListing->character->Name}}"
                                     src="{{$marketListing->character->getAvatarUrl()}}" alt="" srcset=""></li>
                            <li>{{$marketListing->character->Name}}</li>
                            @php
                                $level = get_level_by_xp($marketListing->character->Experience);
                                //$effects = dofus_deserialize_stuff_effects($marketListing->character);
                            @endphp
                            <li> {{$level}} @if ($level == 'Omega')
                                    - {{$marketListing->character->PrestigeRank}} @endif</li>
                            <li><img
                                    src="{{plugin_asset('dofus', "img/alignment/{$marketListing->character->AlignmentSide}.png")}}"
                                    alt="" srcset=""> -> {{$marketListing->character->Honor}}</li>
                        </ul>

                        <div class="table-responsive">
                            <table class="table table-striped table-sm text-center">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Element</th>
                                    <th scope="col">Base</th>
                                    <th scope="col">Parcho</th>
                                    <th scope="col">Stuff</th>
                                    <th scope="col">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row"><img src="{{plugin_asset('dofus', "img/characteristics/vie.png")}}" alt=""
                                                         srcset=""></th>
                                    <td>{{$marketListing->character->Vitality}}</td>
                                    <td>{{$marketListing->character->PermanentAddedVitality}}</td>
                                    <td>3</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <th scope="row"><img src="{{plugin_asset('dofus', "img/characteristics/sagesse.png")}}"
                                                         alt="" srcset=""></th>
                                    <td>{{$marketListing->character->Wisdom}}</td>
                                    <td>{{$marketListing->character->PermanentAddedWisdom}}</td>
                                    <td>3</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <th scope="row"><img src="{{plugin_asset('dofus', "img/characteristics/terre.png")}}" alt=""
                                                         srcset=""></th>
                                    <td>{{$marketListing->character->Strength}}</td>
                                    <td>{{$marketListing->character->PermanentAddedStrength}}</td>
                                    <td>3</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <th scope="row"><img src="{{plugin_asset('dofus', "img/characteristics/feu.png")}}" alt=""
                                                         srcset=""></th>
                                    <td>{{$marketListing->character->Intelligence}}</td>
                                    <td>{{$marketListing->character->PermanentAddedIntelligence}}</td>
                                    <td>3</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <th scope="row"><img src="{{plugin_asset('dofus', "img/characteristics/eau.png")}}" alt=""
                                                         srcset=""></th>
                                    <td>{{$marketListing->character->Chance}}</td>
                                    <td>{{$marketListing->character->PermanentAddedChance}}</td>
                                    <td>3</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <th scope="row"><img src="{{plugin_asset('dofus', "img/characteristics/air.png")}}" alt=""
                                                         srcset=""></th>
                                    <td>{{$marketListing->character->Agility}}</td>
                                    <td>{{$marketListing->character->PermanentAddedAgility}}</td>
                                    <td>3</td>
                                    <td>4</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
