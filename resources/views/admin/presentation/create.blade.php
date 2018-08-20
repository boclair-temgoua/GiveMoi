@extends('inc.admin._main')
@section('title', '- About presentation created')



@section('style')
@parent



@endsection

@section('init')

<!-- Site wrapper -->

@endsection

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="header text-center ml-auto mr-auto">
            <h3 class="title">Abouts</h3>
            <p class="category">Creations des presentations de service</p>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-6 ml-auto mr-auto">
                        <form id="RegisterValidation" role="form" method="POST" action="{{ route('presentation.store') }}" enctype="multipart/form-data" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            <div class="card ">
                                <div class="card-header card-header-info card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">filter_none</i>
                                    </div>
                                    <h4 class="card-title">Created une prestation de service </h4>
                                    <br/>
                                    @include('inc.alert')
                                </div>

                                @include('admin.presentation.form',['presentation' => new \App\Model\user\presentation()])

                            </div>
                            <div class="submit text-center">
                                <input type="submit" class="btn btn-info btn-raised btn-round" value="Create new presentation">
                            </div>
                            <div class="submit text-center">
                                <a href="{{route('about.index')}}" class="btn btn-facebook btn-raised btn-round">Back for your table presentation</a>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
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