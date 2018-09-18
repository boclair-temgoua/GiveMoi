@extends('layouts.app')

@section('content')
<div class="container">
    @include('site.chat.users', ['users' => $users ])

    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ $user->name }}</div>
                <div class="card-body conversations">

                    temgoua
                </div>
            </div>
        </div>
    </div>

</div>
@endsection