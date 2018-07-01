@extends('inc.app')
@section('title', '| Users')
@section('style')

@endsection
@section('navbar')

<nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg bg-inverse" color-on-scroll="100" id="sectionsNav">
    @endsection
    @section('content')
    <div class="blog-post ">

        <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url(&apos; &apos;);">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto text-center">
                        <h3 class="title">temgoua</h3>
                        <small class="title">Member Since 12/89/9990</small><br>
                        <b class="card-category-social"></b>
                    </div>
                </div>
            </div>
        </div>
        <div class="main main-raised">
            <div class="container">
                <div class="section section-blog-info">
                    <div class="row">
                        <div class="col-md-10 ml-auto mr-auto">
                            <div class="card card-raised card-form-horizontal">
                                <div class="card-body ">

                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <button type="button" class="btn btn-instagram btn-block btn-round">search</button>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section section-comments">
                    <div class="row" id="userListing">
                        <div class="col-md-8 ml-auto mr-auto">
                           <div class="infinite-scroll" id="userListingGrid">


                               @include('site.user._alluser', ['users' => $users])

                           </div>



                            <!-- end media-post -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('inc._footer')
@include('inc.login_modal')
@endsection


@section('scripts')






    <!--
    <script>
     $(document).ready(function () {

         $(document).on('click','.pagination a',function(e){
             e.preventDefault();
             e.stopPropagation();
             e.stopImmediatePropagation();
             var url = $(this).attr('href');
             $.ajax({
                 url: url,
                 method: 'GET',
                 data: {},
                 dataType: 'json',
                 success: function (result) {
                     if (result.status == 'ok'){
                         $('#userListingGrid').html(result.listing);
                     }else{
                         alert("Error when get pagination");
                     }
                 }
             });
             return false;
         })

     });
    </script>
-->
    <script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('.follow').click(function(){
            jQuery.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var id = $(this).data('id');
            console.log(id);
            var reference= $(this);
            jQuery.ajax({
                type:'POST',
                url:'/profiles/toggle',
                data:{user_id:id},
                success:function(data){
                    if(jQuery.isEmptyObject(data.success.attached)){
                        reference.find("strong").text("Follow");
                    }else{
                        reference.find("strong").text("UnFollow");
                    }
                }
            });
        });
    });
</script>
@endsection
