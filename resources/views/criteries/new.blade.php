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
                                        @if($count == 1 || $count == 2 || $count == 3 || $count == 4)
                                        <div class="col-md-6 border py-3 px-3">
                                            <p class="subtitle subtitle_black py-1 mb-3">Введите название критериев для уровня №1</p>
                                            @if($count_first == 1 || $count_first == 2 || $count_first == 3 || $count_first == 4 )
                                            <div class="DynamicExtraField mb-4">
                                                <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название первого критерия</label>
                                                <input class="input__custom" name="count_first_1">
                                            </div>
                                            @endif
                                            @if($count_first == 2 || $count_first == 3 || $count_first == 4 )
                                            <div class="DynamicExtraField mb-4">
                                                <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название второго критерия</label>
                                                <input class="input__custom" name="count_first_2">
                                            </div>
                                            @endif
                                            @if($count_first == 3 || $count_first == 4 )
                                            <div class="DynamicExtraField mb-4">
                                                <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название третьего критерия</label>
                                                <input class="input__custom" name="count_first_3">
                                            </div>
                                            @endif
                                            @if($count_first == 4 )
                                            <div class="DynamicExtraField mb-4">
                                                <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название четвертого критерия</label>
                                                <input class="input__custom" name="count_first_4">
                                            </div>
                                            @endif
                                        </div>
                                        @endif
                                        @if($count == 2 || $count == 3 || $count == 4)
                                        <div class="col-md-6 border py-3 px-3">
                                            <p class="subtitle subtitle_black py-1 mb-3">Введите название критериев для уровня №2</p>
                                            @if($count_second == 1 || $count_second == 2 || $count_second == 3 || $count_second == 4)
                                            <div class="DynamicExtraField mb-4">
                                                <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название первого критерия</label>
                                                <input class="input__custom" name="count_second_1">
                                            </div>
                                            @endif
                                            @if($count_second == 2 || $count_second == 3 || $count_second == 4)
                                            <div class="DynamicExtraField mb-4">
                                                <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название второго критерия</label>
                                                <input class="input__custom" name="count_second_2">
                                            </div>
                                            @endif
                                            @if($count_second == 3 || $count_second == 4)
                                            <div class="DynamicExtraField mb-4">
                                                <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название третьего критерия</label>
                                                <input class="input__custom" name="count_second_3">
                                            </div>
                                            @endif
                                            @if($count_second == 4)
                                            <div class="DynamicExtraField mb-4">
                                                <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название четвертого критерия</label>
                                                <input class="input__custom" name="count_second_4">
                                            </div>
                                            @endif
                                        </div>
                                        @endif
                                        @if($count == 3 || $count == 4 )
                                        <div class="col-md-6 border py-3 px-3">
                                            <p class="subtitle subtitle_black py-1 mb-3">Введите название критериев для уровня №3</p>
                                            @if($count_third == 1 || $count_third == 2 || $count_third == 3 || $count_third == 4)
                                            <div class="DynamicExtraField mb-4">
                                                <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название первого критерия</label>
                                                <input class="input__custom" name="count_third_1">
                                            </div>
                                            @endif
                                            @if($count_third == 2 || $count_third == 3 || $count_third == 4)
                                            <div class="DynamicExtraField mb-4">
                                                <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название второго критерия</label>
                                                <input class="input__custom" name="count_third_2">
                                            </div>
                                            @endif
                                            @if($count_third == 3 || $count_third == 4)
                                            <div class="DynamicExtraField mb-4">
                                                <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название третьего критерия</label>
                                                <input class="input__custom" name="count_third_3">
                                            </div>
                                            @endif
                                            @if($count_third == 4)
                                            <div class="DynamicExtraField mb-4">
                                                <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название четветрого критерия</label>
                                                <input class="input__custom" name="count_third_4">
                                            </div>
                                            @endif
                                        </div>
                                        @endif
                                        @if($count == 4)
                                        <div class="col-md-6 border py-3 px-3">
                                            <p class="subtitle subtitle_black py-1 mb-3">Введите название критериев для уровня №4</p>
                                            @if($count_fourth == 1 || $count_fourth == 2 || $count_fourth == 3 || $count_fourth == 4)
                                            <div class="DynamicExtraField mb-4">
                                                <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название первого критерия</label>
                                                <input class="input__custom" name="count_fourth_1">
                                            </div>
                                            @endif
                                            @if($count_fourth == 2 || $count_fourth == 3 || $count_fourth == 4)
                                            <div class="DynamicExtraField mb-4">
                                                <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название второго критерия</label>
                                                <input class="input__custom" name="count_fourth_2">
                                            </div>
                                            @endif
                                            @if($count_fourth == 3 || $count_fourth == 4)
                                            <div class="DynamicExtraField mb-4">
                                                <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название третьего критерия</label>
                                                <input class="input__custom" name="count_fourth_3">
                                            </div>
                                            @endif
                                            @if($count_fourth == 4)
                                            <div class="DynamicExtraField mb-4">
                                                <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название четвертого критерия</label>
                                                <input class="input__custom" name="count_fourth_4">
                                            </div>
                                            @endif
                                        </div>
                                        @endif
                                    </div>

                                    <div class="mt-4">
                                        <button type="submit" class="btn-custom btn-custom_yellow" id="submit">Далее</button>
                                    </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection