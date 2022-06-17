@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container">
        <div class="row-12 justify-content-center">
                <div class="card">
                    <div class="card-header">{{ $case->name }}</div>
                    <div class="row-12">
                        <div class="text-center">
                            <div class="card">
                                    <div class="card-body">
                                        <p class="card-text">{{ $case->description }}</p>
                                        <p class="card-text text-center">{{ $case->price }}$</p>
                                        @livewire('case.open', ['drops' => $drops, 'price' => $case->price])
                                    </div>
                                    <h3>DROP:</h3>
                                    <div class="row">
                                        @foreach ($drops as $item)
                                        <div class="col-sm-6 col-md-4">
                                            <div class="card border text-center">
                                                <div class="card-header">{{ $item['item']->name }}</div>
                                                    <div class="card-body">
                                                        <p class="card-text">{{ $item['item']->description }}</p>
                                                        <p class="card-text">{{ $item['chances'] }}%</p>
                                                        <p class="card-text text-center">{{ $item['item']->price }}$</p>
                                                    </div>
                                                </div>
                                        </div>
                                        @endforeach
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
