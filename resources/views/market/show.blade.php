@extends('layouts.app')

@section('title', 'Plugin home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card shadow mb-4">
                    <div class="card-header">Infos
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li><img title="{{$marketListing->character->Name}}" src="{{$marketListing->character->getAvatarUrl()}}" alt="" srcset=""></li>
                            <li>{{$marketListing->character->Name}}</li>
                            @php
                                $level = get_level_by_xp($marketListing->character->Experience);
                                //$effects = dofus_deserialize_stuff_effects($marketListing->character);
                            @endphp
                            <li> {{$level}} @if ($level == 'Omega') - {{$marketListing->character->PrestigeRank}} @endif</li>
                            <li><img src="{{plugin_asset('dofus', "img/alignment/{$marketListing->character->AlignmentSide}.png")}}" alt="" srcset=""> -> {{$marketListing->character->Honor}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col">
                
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
                                        <th scope="row"><img src="{{plugin_asset('dofus', "img/characteristics/vie.png")}}" alt="" srcset=""></th>
                                        <td>{{$marketListing->character->Vitality}}</td>
                                        <td>{{$marketListing->character->PermanentAddedVitality}}</td>
                                        <td>3</td>
                                        <td>4</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><img src="{{plugin_asset('dofus', "img/characteristics/sagesse.png")}}" alt="" srcset=""></th>
                                        <td>{{$marketListing->character->Wisdom}}</td>
                                        <td>{{$marketListing->character->PermanentAddedWisdom}}</td>
                                        <td>3</td>
                                        <td>4</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><img src="{{plugin_asset('dofus', "img/characteristics/terre.png")}}" alt="" srcset=""></th>
                                        <td>{{$marketListing->character->Strength}}</td>
                                        <td>{{$marketListing->character->PermanentAddedStrength}}</td>
                                        <td>3</td>
                                        <td>4</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><img src="{{plugin_asset('dofus', "img/characteristics/feu.png")}}" alt="" srcset=""></th>
                                        <td>{{$marketListing->character->Intelligence}}</td>
                                        <td>{{$marketListing->character->PermanentAddedIntelligence}}</td>
                                        <td>3</td>
                                        <td>4</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><img src="{{plugin_asset('dofus', "img/characteristics/eau.png")}}" alt="" srcset=""></th>
                                        <td>{{$marketListing->character->Chance}}</td>
                                        <td>{{$marketListing->character->PermanentAddedChance}}</td>
                                        <td>3</td>
                                        <td>4</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><img src="{{plugin_asset('dofus', "img/characteristics/air.png")}}" alt="" srcset=""></th>
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

        <div class="row">
            @foreach ($marketListing->character->getItems() as $item)
            <div class="card shadow mb-4">
                <div class="card-body">
                    @php
                        $extra = dofus_deserialize_stuff_effects($item->SerializedEffects);
                    @endphp
                    <ul>
                    @foreach ($extra->effects as $effect)
                        
                            <li>
                                {{ $effect->getFormatedCharacteristic() }}
                            </li>
                        
                    @endforeach
                </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
