@extends('inc.admin._main')
@section('title', '- Admin View')
@section('sectionTitle', 'Admins view')



@section('style')
@parent


@endsection

@section('init')

<!-- Site wrapper -->

@endsection

@section('content')
<div class="content">
    @include('inc.admin.components.status_admin')
    <br/>
    <div class="container-fluid">
        @can('view-administrator')
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-icon card-header-{{ $admin->color_name  }}">
                        <div class="card-icon">
                            <i class="material-icons">perm_identity</i>
                        </div>
                        <h4 class="card-title">Profile View -
                            <small class="category">Administrator</small>
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
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Name</label>
                                        <input type="text" class="form-control" name="name" id="name"  value="{{ $admin->name  }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Username</label>
                                        <input type="text" class="form-control" name="username"  id="username"  value="{{ $admin->username }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Email</label>
                                        <input type="text" class="form-control" name="email" id="email"  value="{{ $admin->email }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Tel</label>
                                        <input type="text" class="form-control" name="phone"  id="phone"  value="{{ $admin->phone }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Address</label>
                                        <input type="text" class="form-control" name="telephone"  id="address"  value="{{ $admin->address }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Country</label>
                                        <input type="text" class="form-control" name="country"  id="phone"  value="{{ $admin->country }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Sex</label>
                                        <input type="text" class="form-control" name="country"  id="phone"  value="{{ $admin->gender }}" />
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
                                            <textarea class="form-control"  name="body"  rows="5" placeholder="dite quelque chose sur vous en quelques mots">{{ ($errors->any()? old('body') : $admin->body) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="submit text-center">
                                    <a href="{{route('administrators.index')}}" class="btn btn-info btn-raised btn-round">
                                        <span class="btn-label">
                                            <i class="material-icons">undo</i>
                                        </span>
                                        <b>Back to Table Administrator</b>
                                    </a>
                                    <br>
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
                            <img class="img" src="{{ url($admin->avatar)  }}?{{ time() }}" />
                        </a>
                    </div>
                    <div class="card-body">
                        <h6 class="card-category text-gray">{{ $admin->work }}</h6>
                        <h4 class="card-title"><b>Sex:</b> {{ $admin->gender }}</h4>
                        <h4 class="card-title"><b>Age:</b> {{ $admin->age }} ans</h4>
                        <h4 class="card-title"><strong>{{ $admin->name }} {{ $admin->first_name }}</strong></h4>
                        <b class="card-title ">Member Since {{ Auth::user()->created_at->format('j F Y') }}</b>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="submit text-center">
            @include('inc.admin.components.alert_permission')
        </div>
        @endcan
    </div>
</div>
@include('inc.admin._footer')

@endsection

@section('script')
@parent


@endsection



