



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
