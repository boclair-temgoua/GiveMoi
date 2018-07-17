@extends('inc.app')
@section('title', '- create article')

@section('style')

@endsection


@section('navbar')

<nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg bg-warning" color-on-scroll="100" id="sectionsNav">
    @endsection
    @section('content')
    <div  class="signup-page sidebar-collapse">
        <div class="page-header header-filter" style="background-image: url(&apos;{{ url(Auth::user()->avatarcover)  }}&apos;); background-size: cover; background-position: top center;">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <div class="card card-signup">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 ml-auto mr-auto">
                                        <div class="col-md-12 ml-auto mr-auto text-center">
                                            <h3 class="card-title text-info">Creer vos articles en un clique </h3>
                                            <p class="card-title">La creation de vos Evenements doivent respecter les <a href="">conditions d'utilisation</a> vu de quoi ils seront tous simplement suprimer .</p>
                                            @include('inc.alert')
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-12 ml-auto mr-auto">
                                        <form id="RegisterValidation"  role="form" method="POST" action="{{route('articles.store')}}" enctype="multipart/form-data" accept-charset="UTF-8">
                                            {{ csrf_field() }}

                                        @include('site.article.form',['article' => new \App\Model\user\article()])

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('inc._footer')
        </div>
    </div>
@endsection

@section('scripts')

<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script>


@endsection