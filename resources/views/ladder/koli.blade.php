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
                    <th scope="col">Cote</th>
                    <th scope="col">Victory</th>
                    <th scope="col">Defeat</th>
                    <th scope="col">Total</th>
                    <th scope="col">Ratio</th>
                    <th scope="col">{{ trans('messages.fields.action') }}</th>
                </tr>
            </thead>
            @php
                $ladder = Str::after(request()->route()->getName(), 'dofus.ladder.');
            @endphp
            <tbody>
                @foreach ($characters as $character)
                    <tr>
                        @php
                            $character_rank = $loop->iteration + ($characters->currentPage()-1) * $characters->perPage()
                        @endphp

                        <th scope="row">{{$character_rank}}</th>
                        <td><img src="{{$character->getAvatarUrl()}}" alt="{{$character->Breed}}"></td>
                        <td>{{$character->Name}}</td>
                        <td>{{$character->{'ArenaRank_'.$ladder} }}</td> 
                        <td>{{$character->{'ArenaDailyMatchsWon_'.$ladder} }}</td>
                        <td>{{$character->{'ArenaDailyMatchsCount_'.$ladder} - $character->{'ArenaDailyMatchsWon_'.$ladder} }}</td>
                        <td>{{$character->{'ArenaDailyMatchsCount_'.$ladder} }}</td>
                        <td> @if ($character->{'ArenaDailyMatchsCount_'.$ladder} > 0) {{round(($character->{'ArenaDailyMatchsWon_'.$ladder} / $character->{'ArenaDailyMatchsCount_'.$ladder}) * 100, 2)}} @else 0 @endif </td>
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