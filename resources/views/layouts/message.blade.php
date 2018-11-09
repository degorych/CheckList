@if(session()->has('message'))
    <p class="alert alert-info">{{ session()->get('message') }}</p>
@endif

@if(session()->has('error'))
    <p class="alert alert-danger">{{ session()->get('error') }}</p>
@endif