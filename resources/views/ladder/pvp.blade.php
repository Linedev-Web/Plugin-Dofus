@extends('layouts.app')

@section('title', 'Players')

@section('content')
<div class="container content">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col"><img src="{{plugin_asset('dofus', "img/heads/none.png")}}" alt="" srcset=""></th>
                    <th scope="col">Name</th>
                    <th scope="col">Level</th>
                    <th scope="col"><img src="{{plugin_asset('dofus', "img/alignment/none.png")}}" alt="" srcset=""></th>
                    <th scope="col">Honor</th>
                    <th scope="col">{{ trans('messages.fields.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($characters as $character)
                    <tr>
                        @php
                            $character_rank = $loop->iteration + ($characters->currentPage()-1) * $characters->perPage()
                        @endphp

                        <th scope="row">{{$character_rank}}</th>
                        <td><img src="{{$character->getAvatarUrl()}}" alt="{{$character->Breed}}"></td>
                        <td>{{$character->Name}}</td>
                        @php
                            $level = get_level_by_xp($character->Experience);
                        @endphp
                        <td> {{$level}} @if ($level == 'Omega') - {{$character->PrestigeRank}} @endif</td>
                        <td><img src="{{plugin_asset('dofus', "img/alignment/{$character->AlignmentSide}.png")}}" alt="" srcset=""></td>
                        <td>{{$character->Honor}}</td>
                        <td>
                            <a class="mx-1" title="{{ trans('messages.actions.show') }}" data-toggle="tooltip"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
    {{$characters->links()}}
</div>
@endsection