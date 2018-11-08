@if(session()->has('message'))
    <p class="alert alert-info">{{ session()->get('message') }}</p>
@endif