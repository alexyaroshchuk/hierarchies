@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card my-5">
                    <div class="card-header">
                        <p class="subtitle subtitle_green py-1">Список ранее созданных иерархий</p>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                <p class="text">{{ session('status') }}</p>
                            </div>
                        @endif
                            @foreach($hierarchies as $hierarchy)
                                <div>
                                    <a class="btn-custom btn-custom_green-br" href = "{{ route('history-one', $hierarchy->id) }}">{{$hierarchy->hierarchies_name}}</a>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
