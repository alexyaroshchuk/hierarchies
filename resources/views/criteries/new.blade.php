@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card my-5">
                    <div class="card-header">
                        <p class="subtitle subtitle_green py-1">Шаг №4</p>
                    </div>
                        <div class="card-body px-3">
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
                                    <div class="row">
                                        <div class="col-md-6 border py-3 px-3">
                                            <p class="subtitle subtitle_black py-1 mb-3">Введите название критериев для уровня №1</p>
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
                                                <input class="input__custom" name="count_first_3">
                                            </div>
                                            <div class="DynamicExtraField mb-4">
                                                <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название четвертого критерия</label>
                                                <input class="input__custom" name="count_first_4">
                                            </div>
                                            <div class="DynamicExtraField mb-4">
                                                <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название пятого критерия</label>
                                                <input class="input__custom" name="count_first_5">
                                            </div>
                                        </div>
                                        <div class="col-md-6 py-3 px-3">
                                            <p class="subtitle subtitle_black py-1 mb-3">Введите название критериев для уровня №2</p>
                                            <div class="DynamicExtraField mb-4">
                                                <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название 6 критерия</label>
                                                <input class="input__custom" name="count_first_6">
                                            </div>
                                            <div class="DynamicExtraField mb-4">
                                                <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название 7 критерия</label>
                                                <input class="input__custom" name="count_first_7">
                                            </div>
                                            <div class="DynamicExtraField mb-4">
                                                <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название 8 критерия</label>
                                                <input class="input__custom" name="count_first_8">
                                            </div>
                                            <div class="DynamicExtraField mb-4">
                                                <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название 9 критерия</label>
                                                <input class="input__custom" name="count_first_9">
                                            </div>
                                            <div class="DynamicExtraField mb-4">
                                                <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название 10 критерия</label>
                                                <input class="input__custom" name="count_first_10">
                                            </div>
                                        </div>
                                        <div class="col-md-6 py-3 px-3">
                                            <p class="subtitle subtitle_black py-1 mb-3">Введите название критериев для уровня №3</p>
                                            <div class="DynamicExtraField mb-4">
                                                <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название 11 критерия</label>
                                                <input class="input__custom" name="count_first_11">
                                            </div>
                                            <div class="DynamicExtraField mb-4">
                                                <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название 12 критерия</label>
                                                <input class="input__custom" name="count_first_12">
                                            </div>
                                            <div class="DynamicExtraField mb-4">
                                                <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название 13 критерия</label>
                                                <input class="input__custom" name="count_first_13">
                                            </div>
                                            <div class="DynamicExtraField mb-4">
                                                <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название 14 критерия</label>
                                                <input class="input__custom" name="count_first_14">
                                            </div>
                                            <div class="DynamicExtraField mb-4">
                                                <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название 15 критерия</label>
                                                <input class="input__custom" name="count_first_15">
                                            </div>
                                        </div>
                                        <div class="col-md-6 border py-3 px-3">
                                            <p class="subtitle subtitle_black py-1 mb-3">Введите название критериев для уровня №4</p>
                                            <div class="DynamicExtraField mb-4">
                                                <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название 16 критерия</label>
                                                <input class="input__custom" name="count_first_16">
                                            </div>
                                            <div class="DynamicExtraField mb-4">
                                                <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название 17 критерия</label>
                                                <input class="input__custom" name="count_first_17">
                                            </div>
                                            <div class="DynamicExtraField mb-4">
                                                <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название 18 критерия</label>
                                                <input class="input__custom" name="count_first_18">
                                            </div>
                                            <div class="DynamicExtraField mb-4">
                                                <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название 19 критерия</label>
                                                <input class="input__custom" name="count_first_19">
                                            </div>
                                            <div class="DynamicExtraField mb-4">
                                                <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название 20 критерия</label>
                                                <input class="input__custom" name="count_first_20">
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <button type="submit" class="btn-custom btn-custom_yellow" id="submit">Далее</button>
                                    </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection