@extends('layouts.app')

@section('title', 'Plugin home')

@section('content')
    <div class="container">
        @foreach ($accounts as $account)
            <p>{{$account->Login}}</p>
        @endforeach

        <div class="card shadow-sm mb-4">
            <div class="card-header">Create a game account</div>
            <div class="card-body">
                <form action="{{route('dofus.accounts.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Account Name</label>
                        <input type="text" name="account" class="form-control @error('account') is-invalid @enderror" id="exampleInputEmail1">
                        @error('account')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password-confirm">{{ trans('auth.confirm-password') }}</label>
                        <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputquestion">question</label>
                        <input type="text" name="question" class="form-control @error('question') is-invalid @enderror" id="exampleInputquestion">
                        @error('question')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputanswer">answer</label>
                        <input type="text" name="answer" class="form-control @error('answer') is-invalid @enderror" id="exampleInputanswer">
                        @error('answer')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    
@endsection
