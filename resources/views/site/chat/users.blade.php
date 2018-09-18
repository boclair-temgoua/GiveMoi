

<div class="col-md-3">
    <div class="list-group">
        @foreach($users as $user)
        <a class="list-group-item d-flex justify-content-between align-items-center" href="{{ route('conversations.show', $user->id) }}">
            {{ $user->name }}

        </a>
        @endforeach
    </div>
</div>