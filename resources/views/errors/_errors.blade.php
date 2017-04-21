@if($errors->any())
    <div class="alert alert-danger">
        <ul class="list-unstyled">
            @foreach($errors->all() as $error)
                <li><span><i class="fa fa-info-circle"></i> {{ $error }}</span></li>
            @endforeach
        </ul>
    </div>
@endif