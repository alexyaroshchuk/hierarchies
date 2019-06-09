@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card my-5">
                    <div class="card-header">
                        <p class="subtitle subtitle_green py-1">Enter criteria name</p>
                    </div>
                        <div class="card-body px-0">
                            <form method="POST"
                                  class="form-horizontal form-label-left"
                                  action="{{route('criteria-create', $hier_id)}}"
                                  name="Form">
                                    @csrf
                                <div class="card-body">
                                    <div id="FieldCriteria" class="mb-5">
                                    @if($count == 1)
                                        @if($count_first == 1)
                                        <div class="DynamicExtraField mb-4">
                                            <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">
                                                Название первого критерия
                                            </label>
                                            <input class="input__custom" name="count_first_1">
                                        </div>
                                        @elseif($count_first == 2)
                                            <div class="DynamicExtraField mb-4">
                                                <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">
                                                    Название первого критерия
                                                </label>
                                                <input class="input__custom" name="count_first_1">
                                            </div>
                                            <div class="DynamicExtraField mb-4">
                                                <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">
                                                    Название второго критерия
                                                </label>
                                                <input class="input__custom" name="count_first_2">
                                            </div>
                                        @elseif($count_first == 3)
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
                                        @elseif($count_first == 4)
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
                                        @endif
                                        @elseif($count == 2)
                                            @if($count_second == 1)
                                                <div class="DynamicExtraField mb-4">
                                                    <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название первого критерия</label>
                                                    <input class="input__custom" name="count_second_1">
                                                </div>
                                            @elseif($count_second == 2)
                                                <div class="DynamicExtraField mb-4">
                                                    <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название первого критерия</label>
                                                    <input class="input__custom" name="count_second_1">
                                                </div>
                                                <div class="DynamicExtraField mb-4">
                                                    <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название второго критерия</label>
                                                    <input class="input__custom" name="count_second_2">
                                                </div>
                                            @elseif($count_second == 3)
                                                <div class="DynamicExtraField mb-4">
                                                    <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название первого критерия</label>
                                                    <input class="input__custom" name="count_second_1">
                                                </div>
                                                <div class="DynamicExtraField mb-4">
                                                    <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название второго критерия</label>
                                                    <input class="input__custom" name="count_second_2">
                                                </div>
                                                <div class="DynamicExtraField mb-4">
                                                    <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название третьего критерия</label>
                                                    <input class="input__custom" name="count_second_3">
                                                </div>
                                            @elseif($count_second == 4)
                                                <div class="DynamicExtraField mb-4">
                                                    <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название первого критерия</label>
                                                    <input class="input__custom" name="count_second_1">
                                                </div>
                                                <div class="DynamicExtraField mb-4">
                                                    <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название второго критерия</label>
                                                    <input class="input__custom" name="count_second_2">
                                                </div>
                                                <div class="DynamicExtraField mb-4">
                                                    <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название третьего критерия</label>
                                                    <input class="input__custom" name="count_second_3">
                                                </div>
                                                <div class="DynamicExtraField mb-4">
                                                    <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название четвертого критерия</label>
                                                    <input class="input__custom" name="count_second_4">
                                                </div>
                                            @endif
                                        @elseif($count == 3)
                                            @if($count_third == 1)
                                                <div class="DynamicExtraField mb-4">
                                                    <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название первого критерия</label>
                                                    <input class="input__custom" name="count_third_1">
                                                </div>
                                            @elseif($count_third == 2)
                                                <div class="DynamicExtraField mb-4">
                                                    <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название первого критерия</label>
                                                    <input class="input__custom" name="count_third_1">
                                                </div>
                                                <div class="DynamicExtraField mb-4">
                                                    <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название второго критерия</label>
                                                    <input class="input__custom" name="count_third_2">
                                                </div>
                                            @elseif($count_third == 3)
                                                <div class="DynamicExtraField mb-4">
                                                    <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название первого критерия</label>
                                                    <input class="input__custom" name="count_third_1">
                                                </div>
                                                <div class="DynamicExtraField mb-4">
                                                    <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название второго критерия</label>
                                                    <input class="input__custom" name="count_third_2">
                                                </div>
                                                <div class="DynamicExtraField mb-4">
                                                    <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название третьего критерия</label>
                                                    <input class="input__custom" name="count_third_3">
                                                </div>
                                            @elseif($count_third == 4)
                                                <div class="DynamicExtraField mb-4">
                                                    <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название первого критерия</label>
                                                    <input class="input__custom" name="count_third_1">
                                                </div>
                                                <div class="DynamicExtraField mb-4">
                                                    <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название второго критерия</label>
                                                    <input class="input__custom" name="count_third_2">
                                                </div>
                                                <div class="DynamicExtraField mb-4">
                                                    <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название третьего критерия</label>
                                                    <input class="input__custom" name="count_third_3">
                                                </div>
                                                <div class="DynamicExtraField mb-4">
                                                    <label for="DynamicExtraField mb-4" class="d-block text-big text-big_gray mb-2">Название четвертого критерия</label>
                                                    <input class="input__custom" name="count_third_4">
                                                </div>
                                            @endif
                                     @endif
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