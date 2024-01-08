@if( count($errors->all()) > 0 )
    @foreach($errors->all() as $error)
        <ul>
            <li class="btn btn-danger">{{ $error }}</li>
        </ul>
    @endforeach
@endif
