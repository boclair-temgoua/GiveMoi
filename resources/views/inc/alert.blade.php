

    @if (count('$errors') > 0)
        @foreach($errors->all() as $error)
    <div class="alert alert-danger text-center">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="material-icons">close</i>
        </button>
        {{ $error }}
    </div>
        @endforeach
    @endif
    @if (session('success'))
    <div class="alert alert-success text-center">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="material-icons">close</i>
        </button>
        {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger text-center">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="material-icons">close</i>
        </button>
        {{ session('error') }}
    </div>
    @endif

    @if(Session::has('message'))
    <div class="alert alert-{{ Session::get('status') }} status-box">
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        {{ Session::get('message') }}
    </div>
    @endif