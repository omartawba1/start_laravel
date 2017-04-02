@if(!empty($errors) && count($errors))
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $single)
                <li>{{ $single }}</li>
            @endforeach
        </ul>
    </div>
@endif