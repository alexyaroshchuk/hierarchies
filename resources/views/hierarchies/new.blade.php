@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card my-5">
                    <div class="card-header">
                        <p class="subtitle subtitle_green">Шаг №1</p>
                    </div>
                    <form id="createForm"
                          class="form-horizontal form-label-left"
                          method="POST"
                          action="{{route('hierarchy-create')}}">
                        @csrf
                        <div class="card-body">
                            <div class="mb-4">
                                <label id = "name_hierarchy" class="text-big text-big_gray d-block mb-3">
                                    Введите название иерархии
                                </label>
                                <input id = "name_hierarchy"
                                       name="name_hierarchy"
                                       required
                                       class="input__custom d-inline-block"
                                >
                            </div>
                            <div>
                                <button type="submit" class="btn-custom btn-custom_yellow" id="submit">Далее</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
