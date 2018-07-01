{{ $user->name}}///
{{ $user->email}}///
{{ $user->username}} //{{ $user->avatar }}





@foreach($events as $event)
<div class="col-md-6">
    <div class="card card-background" style="background-image: url(&apos;{{ asset('assets/img/event/' .$event->cover_image) }}')">
        <a href="#pablo"></a>
        <div class="card-body">


            <div class="stats text-center">
                <a href="{{ route('topic.events',$event->slug) }}" class="btn btn-info btn-just-icon btn-fill btn-round" target="_blank">
                    <i class="material-icons">visibility</i>
                </a>
                <a href="{{ route('events.edit',$event->id) }}" class="btn btn-success btn-just-icon btn-fill btn-round btn-wd">
                    <i class="material-icons">mode_edit</i>
                </a>
                <button type="button" class="btn btn-danger btn-just-icon btn-fill btn-round" data-toggle="modal" data-target="#delete" data-catid="{{ $event->id }}" data-placement="bottom" title="Delete your event" >
                    <i class="material-icons">delete</i>
                </button>
                <br>
                <br>
            </div>

            @foreach($event->colors as $color)
            <label class="badge badge-{!! $color->slug !!}">{!! $event->created_at->format('\<\s\t\r\o\n\g\>d\</\s\t\r\o\n\g\> M Y') !!}</label>
            @endforeach
            <a href="{{ route('events.show',$event->slug) }}">
                <h6 class="card-title"> {{ str_limit($event->title, 40,'...') }}</h6>
            </a>
            <br>
            <span class="text-white">
                {!! htmlspecialchars_decode(str_limit($event->summary, 100,'...')) !!}
            </span>


        </div>
    </div>
</div>
@endforeach
