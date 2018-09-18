



  
        @foreach($errors->all() as $error)
    <div class="alert alert-danger text-center">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="material-icons">close</i>
        </button>
        {{ $error }}
    </div>
        @endforeach
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
