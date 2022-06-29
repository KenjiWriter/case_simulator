@extends('layouts.app')

@section('content')
<div class="container">
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
