@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row-12 justify-content-center mb-3">
        <div class="card">
            <div class="card-header text-center">{{ __('Recent drops') }}</div>
            <div class="row m-3 mt-3">
                @foreach ($recentItems as $drop)
                    <div class="col-sm-3 col-md-3" title="{{ $drop->created_at }}">
                        <div class="card border text-center">
                            <div class="card-header">{{ $drop->ItemName }}</div>
                                <div class="card-body">
                                    <p class="card-text">{{ $drop->ItemPrice }}$</p>
                                    <p class="card-text">{{ $drop->ItemCase }}</p>
                                    <p class="card-text">{{ $drop->ItemChances }}%</p>
                                    <p class="card-text">{{ $drop->ItemOwner }}</p>
                                </div>
                            </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row-12 justify-content-center">
            <div class="card">
                <div class="card-header">{{ __('Cases') }}</div>
                <div class="row m-3 mt-3">
                    @foreach ($cases as $case)
                    <div class="col-sm-6 col-md-4">
                        <div class="card border text-center">
                            <div class="card-header">{{ $case->name }}</div>
                                <div class="card-body">
                                    <p class="card-text">{{ $case->description }}</p>
                                    <p class="card-text text-center">{{ $case->price }}$</p>
                                    <a href="{{ route('showcase', $case->id) }}" class="btn btn-primary">OPEN</a>
                                </div>
                            </div>
                    </div>
                    @endforeach
                </div>
            </div>
    </div>
</div>
@endsection
