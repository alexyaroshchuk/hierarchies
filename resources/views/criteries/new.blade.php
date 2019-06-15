@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card my-5">
                    <div class="card-header">
                        <p class="subtitle subtitle_green py-1">Шаг №4</p>
                    </div>
                        <div class="card-body px-0">
                            <form method="POST"
                                  class="form-horizontal form-label-left"
                                  action="{{route('criteria-create', $hier_id)}}"
                                  name="Form">
                                    @csrf
                                <input type="hidden" name="count" value="{{ $count }}">
                                <input type="hidden" name="count_first" value="{{ $count_first }}">
                                <input type="hidden" name="count_second" value="{{ $count_second }}">
                                <input type="hidden" name="count_third" value="{{ $count_third }}">
                                <input type="hidden" name="count_fourth" value="{{ $count_fourth }}">
                                <div class="card-body">
                                    <div id="FieldCriteria" class="mb-5">
                                        <div class="DynamicExtraField mb-4">
                                            <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название первого критерия</label>
                                            <input class="input__custom" name="count_first_1">
                                        </div>
                                        <div class="DynamicExtraField mb-4">
                                            <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название второго критерия</label>
                                            <input class="input__custom" name="count_first_2">
                                        </div>
                                        <div class="DynamicExtraField mb-4">
                                            <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название третьего критерия</label>
                                            <input class="input__custom" name="count_first_2">
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
    </div>
@endsection