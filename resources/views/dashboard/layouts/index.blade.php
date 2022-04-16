@extends('dashboard.layouts.main')

@section('container')
@if (auth()->user()->is_admin != 1)    
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome, {{ auth()->user()->name }}!</h1>
</div>
@else
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome, {{ auth()->user()->admin->nama }}!</h1>
</div>
@endif
@endsection