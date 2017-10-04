@extends('layouts.app')

@section('content')
<div class="container">
    <div id="app">
        <data-viewer source="{{ route('customers.data') }}" title="{{ __('Customers Data') }}"></data-viewer>
    </div>
</div>
@endsection