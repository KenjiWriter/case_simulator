@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container">
        <div class="row-12 justify-content-center">
                <div class="card">
                    <div class="card-header">{{ __('Inventory') }}</div>
                    <div class="row m-3 mt-3">
                        @livewire('user.inventory')
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
