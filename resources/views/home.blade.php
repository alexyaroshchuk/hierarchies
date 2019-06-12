@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card my-5">
                <div class="card-header">
                    <p class="subtitle subtitle_green py-1">Личный кабинет</p>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            <p class="text">{{ session('status') }}</p>
                        </div>
                    @endif

                    <p class="text-big text-big_gray mb-4">Вы зарегестрированы!</p>

                        <div>
                            <a class="btn-custom btn-custom_green-br" href = "/hierarchy/new">Создать иерархию</a>
                            <br>
                            <br>
                            <br>
                            <a class="btn-custom btn-custom_green-br" href = "/history">Просмотр истории</a>
                            {{--<input id = "name_hierarchy" name = "name_hierarchy">--}}
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
