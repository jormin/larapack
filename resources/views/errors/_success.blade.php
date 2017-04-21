@if(session('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <span><i class="fa fa-info-circle"></i> {{ session('success') }}</span>
    </div>
@endif