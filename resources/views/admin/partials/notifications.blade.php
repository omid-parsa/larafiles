@if(session('success'))
    <div class="alert alert-success">
        <p><i class="fa fa-check-circle"></i> {{session('success')}}</p>
    </div>
@endif