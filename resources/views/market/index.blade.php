@extends('layouts.app')

@section('title', 'Plugin home')

@section('content')
    <div class="container">
        <div class="row">
            @auth
                <div class="col-3">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            Mes ogrines: {{auth()->user()->money}} <img src="{{plugin_asset('dofus', "img/ogrines.png")}}" alt="" srcset="">
                        </div>
                        <div class="card-body">
                            @foreach (dofus_get_user_characters(auth()->user()) as $item)
                                <img title="{{$item->Name}}" src="{{$item->getAvatarUrl()}}" alt="" srcset="">
                            @endforeach
                        </div>
                    </div>
                </div>      
            @endauth
            
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col"><img src="{{plugin_asset('dofus', "img/ogrines.png")}}" alt="" srcset=""></th>
                                <th scope="col"><img src="{{plugin_asset('dofus', "img/heads/none.png")}}" alt="" srcset=""></th>
                                <th scope="col">Name</th>
                                <th scope="col">Level</th>
                                <th scope="col"><img src="{{plugin_asset('dofus', "img/alignment/none.png")}}" alt="" srcset=""></th>
                                <th scope="col">Honor</th>
                                <th scope="col">{{ trans('messages.fields.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listings as $item)
                                <tr>
                                    <th>{{$item->price}}</th>
                                    <td><img src="{{$item->character->getAvatarUrl()}}" alt="{{$item->character->Breed}}"></td>
                                    <td>{{$item->character->Name}}</td>
                                    @php
                                        $level = get_level_by_xp($item->character->Experience);
                                    @endphp
                                    <td> {{$level}} @if ($level == 'Omega') - {{$item->character->PrestigeRank}} @endif</td>
                                    <td><img src="{{plugin_asset('dofus', "img/alignment/{$item->character->AlignmentSide}.png")}}" alt="" srcset=""></td>
                                    <td>{{$item->character->Honor}}</td>
                                    <td>
                                        <a class="mx-1" title="{{ trans('messages.actions.show') }}" data-toggle="tooltip"><i class="fas fa-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    
                </div>
                {{$listings->links()}}
            </div>
        </div>
    </div>
@endsection
