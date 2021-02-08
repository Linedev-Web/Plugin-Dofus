@extends('layouts.app')

@section('title', 'Plugin home')

@push('styles')
    <link href="{{ plugin_asset('dofus','css/styles.css') }}" rel="stylesheet">
@endpush
@push('scripts')
    <script src="{{ plugin_asset('dofus','js/script.js') }}"></script>
@endpush
@section('content')
    <div class="container my-5" id="plugin--dofus-market">
        <div class="row">
            <div class="col-xl-6 col-lg-7 mb-5 mb-lg-0">
                <div class="card">
                    <div class="card-header">
                        <div class="card-header-icon">
                            <img src="{{ plugin_asset('dofus', 'img/hub/window_border_icon_background.png') }}" alt="">
                            <img src="{{ plugin_asset('dofus', 'img/hub/icon__0027_Inventaire.png') }}" alt="">
                        </div>
                        <div class="card-title">équipement</div>
                    </div>
                    <div class="card-body p-0 market--equipement">
                        <div class="market--inventory">
                            @foreach ($marketListing->character->getItems() as $key=>$item)
                                @php
                                    // set location
                                    $itemId = $marketListing->character->getItems()[$key]->ItemId;

                                    if (!empty($item)){
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
                                    @if(isset($item))
                                        <img
                                            src="{{ plugin_asset('dofus', 'img/inventory/slot_dark_background_full.png') }}"
                                            alt="slot_dark_background_full">
                                        <a href="#" data-html="true" data-placement="right" data-toggle="tooltip"
                                           title="
<div class='tooltip--inventory'>
    <div class='tooltip--inventory-item'>
        <span class='name'>{{$json->name}}</span>
        <span class='level'>Niveau {{$json->level}}</span>
    </div>

    <div class='tooltip--inventory-icon'>
        <img src='{{ plugin_asset('dofus', 'img/inventory/grey_img_bg.png') }}' alt='vide'>
        <img src='{{$json->imgUrl}}' alt='{{$json->name}}'>
    </div>
    <div class='tooltip--inventory-effect'>
    Effets
    <ul>
        @foreach ($extra->effects as $effect)
                                               <li>
{{ $effect->getFormatedCharacteristic() }}
                                               </li>
@endforeach
                                               </ul
                                                </div>
                                                                                       </div>
">
                                            <img class="icon is-icon" src="{{$json->imgUrl}}" alt="{{$json->name}}">
                                        </a>
                                    @endif

                                </div>
                            @endforeach
                            @for($i=0; $i <= 16; $i++)
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
                                @endphp
                                @if(!isset($marketListing->character->getItems()[$i]))
                                    <div class="market--inventory-slot-{{$i}}">
                                        <img
                                            src="{{ plugin_asset('dofus', 'img/inventory/slot_dark_background_empty.png') }}"
                                            alt="">
                                        <a href="#" data-html="true" data-placement="right" data-toggle="tooltip"
                                           title="<span class='color-red'>Vide</span>">
                                            <img class="icon"
                                                 src="{{ plugin_asset('dofus', 'img/inventory/'.$itemEmpty[$i].'.png') }}"
                                                 alt="">
                                        </a>
                                    </div>
                                @endif
                            @endfor

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
            <div class="col-xl-6 col-lg-5 mt-5 mt-lg-0">
                <div class="card">
                    <div class="card-header">
                        <div class="card-header-icon">
                            <img src="{{ plugin_asset('dofus', 'img/hub/window_border_icon_background.png') }}" alt="">
                            <img src="{{ plugin_asset('dofus', 'img/hub/icon__0029_Caracteristiques.png') }}" alt="">
                        </div>
                        <div class="card-title">Caractéristiques</div>
                    </div>
                    <div class="card-body market--caracteristique">
                        <div class="market--caracteristique-player">
                            <img title="{{$marketListing->character->Name}}"
                                 src="{{$marketListing->character->getAvatarUrl()}}" alt="" srcset="">
                            <div class="market--caracteristique-player-right">
                                <p>{{$marketListing->character->Name}}</p>
                                <div class="market--separator-grey">
                                    <img
                                        src="{{plugin_asset('dofus', "img/hub/window_separator_black_horizontal.png")}}"
                                        alt="window_separator_green_horizontal">
                                </div>
                                @php
                                    $level = get_level_by_xp($marketListing->character->Experience);
                                    //$effects = dofus_deserialize_stuff_effects($marketListing->character);
                                @endphp
                                <p>Niveau {{$level}} @if ($level == 'Omega')
                                        - {{$marketListing->character->PrestigeRank}} @endif
                                </p>
                                <div class="market--separator-grey">
                                    <img
                                        src="{{plugin_asset('dofus', "img/hub/window_separator_black_horizontal.png")}}"
                                        alt="window_separator_green_horizontal">
                                </div>
                                <p>
                                    <img
                                        src="{{plugin_asset('dofus', "img/alignment/{$marketListing->character->AlignmentSide}.png")}}"
                                        alt="" srcset=""> -> {{$marketListing->character->Honor}}
                                </p>
                            </div>
                        </div>
                        <div class="market--separator-green">
                            <img src="{{plugin_asset('dofus', "img/hub/window_separator_green_horizontal.png")}}"
                                 alt="window_separator_green_horizontal">
                        </div>
                        <ul class="market--caracteristique-stats">
                            <li><img src="{{plugin_asset('dofus', "img/characteristics/tx_health.png")}}" alt="">Points
                                de vie (PV) <span>{{$marketListing->character->BaseHealth }}</span></li>
                            <li><img src="{{plugin_asset('dofus', "img/characteristics/tx_actionPoints.png")}}" alt="">Points
                                d'action (PA) <span>{{$marketListing->character->AP }}</span></li>
                            <li><img src="{{plugin_asset('dofus', "img/characteristics/tx_movementPoints.png")}}"
                                     alt="">Points de mouvement (PM) <span>{{$marketListing->character->MP }}</span>
                            </li>
                        </ul>
                        <div class="market--separator-green">
                            <img src="{{plugin_asset('dofus', "img/hub/window_separator_green_horizontal.png")}}"
                                 alt="window_separator_green_horizontal">
                        </div>
                        <ul class="market--caracteristique-elements">
                            <li>
                                <img src="{{plugin_asset('dofus', "img/characteristics/tx_vitality.png")}}" alt="">
                                <span>Vitalité</span>
                                <a href="#" data-html="true" data-placement="top" data-toggle="tooltip"
                                   title="Base(Naturel + Additionnel): {{ $marketListing->character->Vitality}} + {{$marketListing->character->PermanentAddedVitality}}">
                                    {{$marketListing->character->Vitality + $marketListing->character->PermanentAddedVitality}}</a>
                            </li>
                            <div class="market--separator-grey">
                                <img src="{{plugin_asset('dofus', "img/hub/window_separator_black_horizontal.png")}}"
                                     alt="window_separator_green_horizontal">
                            </div>
                            <li>
                                <img src="{{plugin_asset('dofus', "img/characteristics/tx_wisdom.png")}}" alt=""
                                     srcset="">
                                <span>Agilité</span>
                                <a href="#" data-html="true" data-placement="top" data-toggle="tooltip"
                                   title="Base(Naturel + Additionnel): {{ $marketListing->character->Wisdom}} + {{$marketListing->character->PermanentAddedWisdom}}">
                                    {{$marketListing->character->Wisdom + $marketListing->character->PermanentAddedWisdom}}</a>
                            </li>
                            <div class="market--separator-grey">
                                <img src="{{plugin_asset('dofus', "img/hub/window_separator_black_horizontal.png")}}"
                                     alt="window_separator_green_horizontal">
                            </div>
                            <li>
                                <img src="{{plugin_asset('dofus', "img/characteristics/tx_strength.png")}}" alt=""
                                     srcset="">
                                <span>Chance</span>
                                <a href="#" data-html="true" data-placement="top" data-toggle="tooltip"
                                   title="Base(Naturel + Additionnel): {{ $marketListing->character->Strength}} + {{$marketListing->character->PermanentAddedStrength}}">
                                    {{$marketListing->character->Strength + $marketListing->character->PermanentAddedStrength}}</a>
                            </li>
                            <div class="market--separator-grey">
                                <img src="{{plugin_asset('dofus', "img/hub/window_separator_black_horizontal.png")}}"
                                     alt="window_separator_green_horizontal">
                            </div>
                            <li>
                                <img src="{{plugin_asset('dofus', "img/characteristics/tx_intelligence.png")}}" alt=""
                                     srcset="">
                                <span>Force</span>
                                <a href="#" data-html="true" data-placement="top" data-toggle="tooltip"
                                   title="Base(Naturel + Additionnel): {{ $marketListing->character->Intelligence}} + {{$marketListing->character->PermanentAddedVitality}}">
                                    {{$marketListing->character->Intelligence + $marketListing->character->PermanentAddedVitality}}</a>
                            </li>
                            <div class="market--separator-grey">
                                <img src="{{plugin_asset('dofus', "img/hub/window_separator_black_horizontal.png")}}"
                                     alt="window_separator_green_horizontal">
                            </div>
                            <li>
                                <img src="{{plugin_asset('dofus', "img/characteristics/tx_chance.png")}}" alt=""
                                     srcset="">
                                <span>Intelligence</span>
                                <a href="#" data-html="true" data-placement="top" data-toggle="tooltip"
                                   title="Base(Naturel + Additionnel): {{ $marketListing->character->Chance}} + {{$marketListing->character->PermanentAddedChance}}">
                                    {{$marketListing->character->Chance + $marketListing->character->PermanentAddedChance}}</a>
                            </li>
                            <div class="market--separator-grey">
                                <img src="{{plugin_asset('dofus', "img/hub/window_separator_black_horizontal.png")}}"
                                     alt="window_separator_green_horizontal">
                            </div>
                            <li>
                                <img src="{{plugin_asset('dofus', "img/characteristics/tx_agility.png")}}" alt=""
                                     srcset="">
                                <span>Sagesse</span>
                                <a href="#" data-html="true" data-placement="top" data-toggle="tooltip"
                                   title="Base(Naturel + Additionnel): {{ $marketListing->character->Agility}} + {{$marketListing->character->PermanentAddedAgility}}">
                                    {{$marketListing->character->Agility + $marketListing->character->PermanentAddedAgility}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
