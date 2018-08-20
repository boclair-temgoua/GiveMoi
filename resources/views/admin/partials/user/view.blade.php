@extends('inc.admin._main')
@section('title', '- Admin user View')



@section('style')
@parent



@endsection

@section('init')

<!-- Site wrapper -->

@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-icon card-header-info">
                        <div class="card-icon">
                            <i class="material-icons">perm_identity</i>
                        </div>
                        <h4 class="card-title">Profile View -
                            <small class="category">Information of your Profile</small>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Company ({{ config('app.name') }})</label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{ config('app.name') }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Full name</label>
                                        <input type="text" class="form-control" name="name" id="name"  value="{{ $user->name  }} {{ $user->first_name }}" disabled/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Username</label>
                                        <input type="text" class="form-control" name="username"  id="username"  value="{{ $user->username }}" disabled/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Email</label>
                                        <input type="text" class="form-control" name="email" id="email"  value="{{ $user->email }}" disabled/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Tel</label>
                                        <input type="text" class="form-control" name="cellphone"  id="telephone"  value="{{ $user->cellphone }}" disabled/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Adress</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">City</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Country</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Postal Code</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>About Me</label>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="5">{{ $user->body }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="submit text-center">
                                <a href="{{route('user.index')}}" class="btn btn-rose btn-raised btn-round pull-center">Back users Table</a>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a href="#pablo">
                            <img class="img" src="{{ url($user->avatar)  }}?{{ time() }}" />
                        </a>
                    </div>
                    <div class="card-body">
                        <h6 class="card-category text-gray">{{ $user->work }}</h6>
                        <h4 class="card-title"><b>Sex:</b> {{ $user->gender }}</h4>
                        <h4 class="card-title"><b>Age:</b> {{ $user->age }} ans</h4>
                        <h4 class="card-title"><strong>{{ $user->name }} {{ $user->first_name }}</strong></h4>
                        <b class="card-title ">Member Since {{ Auth::user()->created_at->format('j F Y') }}</b>

                    </div>
                </div>
            </div>
            @component('inc.admin.components.who')

            @endcomponent
        </div>
    </div>
</div>
@include('inc.admin._footer')
</div>
</div>

@endsection

@section('script')
@parent


@endsection



