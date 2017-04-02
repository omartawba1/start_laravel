@if (session('msg'))
    <div class="alert alert-{{ session()->pull('type') }}" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ session()->pull('msg') }}
    </div>
@endif
