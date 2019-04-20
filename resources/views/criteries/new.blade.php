@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Enter criteria name</div>
                        <div class="card-body">
                            <form method="POST"
                                  class="form-horizontal form-label-left"
                                  action="{{route('criteria-create', $hier_id)}}"
                                  name="Form">
                                    @csrf
                                <div class="card-body">
                                    <div id="FieldCriteria">
                                    @if($count == 1)
                                        @if($count_first == 1)
                                        <div class="DynamicExtraField">
                                            <br>
                                            <label for="DynamicExtraField">Название первого критерия</label>
                                            <br>
                                            <input name="count_first_1">
                                        </div>
                                        @elseif($count_first == 2)
                                            <div class="DynamicExtraField">
                                                <br>
                                                <label for="DynamicExtraField">Название первого критерия</label>
                                                <br>
                                                <input name="count_first_1">
                                            </div>
                                            <div class="DynamicExtraField">
                                                <br>
                                                <label for="DynamicExtraField">Название второго критерия</label>
                                                <br>
                                                <input name="count_first_2">
                                            </div>
                                        @elseif($count_first == 3)
                                            <div class="DynamicExtraField">
                                                <br>
                                                <label for="DynamicExtraField">Название первого критерия</label>
                                                <br>
                                                <input name="count_first_1">
                                            </div>
                                            <div class="DynamicExtraField">
                                                <br>
                                                <label for="DynamicExtraField">Название второго критерия</label>
                                                <br>
                                                <input name="count_first_2">
                                            </div>
                                            <div class="DynamicExtraField">
                                                <br>
                                                <label for="DynamicExtraField">Название третьего критерия</label>
                                                <br>
                                                <input name="count_first_3">
                                            </div>
                                        @elseif($count_first == 4)
                                            <div class="DynamicExtraField">
                                                <br>
                                                <label for="DynamicExtraField">Название первого критерия</label>
                                                <br>
                                                <input name="count_first_1">
                                            </div>
                                            <div class="DynamicExtraField">
                                                <br>
                                                <label for="DynamicExtraField">Название второго критерия</label>
                                                <br>
                                                <input name="count_first_2">
                                            </div>
                                            <div class="DynamicExtraField">
                                                <br>
                                                <label for="DynamicExtraField">Название третьего критерия</label>
                                                <br>
                                                <input name="count_first_3">
                                            </div>
                                            <div class="DynamicExtraField">
                                                <br>
                                                <label for="DynamicExtraField">Название четвертого критерия</label>
                                                <br>
                                                <input name="count_first_4">
                                            </div>
                                        @endif
                                        @elseif($count == 2)
                                            @if($count_second == 1)
                                                <div class="DynamicExtraField">
                                                    <br>
                                                    <label for="DynamicExtraField">Название первого критерия</label>
                                                    <br>
                                                    <input name="count_second_1">
                                                </div>
                                            @elseif($count_second == 2)
                                                <div class="DynamicExtraField">
                                                    <br>
                                                    <label for="DynamicExtraField">Название первого критерия</label>
                                                    <br>
                                                    <input name="count_second_1">
                                                </div>
                                                <div class="DynamicExtraField">
                                                    <br>
                                                    <label for="DynamicExtraField">Название второго критерия</label>
                                                    <br>
                                                    <input name="count_second_2">
                                                </div>
                                            @elseif($count_second == 3)
                                                <div class="DynamicExtraField">
                                                    <br>
                                                    <label for="DynamicExtraField">Название первого критерия</label>
                                                    <br>
                                                    <input name="count_second_1">
                                                </div>
                                                <div class="DynamicExtraField">
                                                    <br>
                                                    <label for="DynamicExtraField">Название второго критерия</label>
                                                    <br>
                                                    <input name="count_second_2">
                                                </div>
                                                <div class="DynamicExtraField">
                                                    <br>
                                                    <label for="DynamicExtraField">Название третьего критерия</label>
                                                    <br>
                                                    <input name="count_second_3">
                                                </div>
                                            @elseif($count_second == 4)
                                                <div class="DynamicExtraField">
                                                    <br>
                                                    <label for="DynamicExtraField">Название первого критерия</label>
                                                    <br>
                                                    <input name="count_second_1">
                                                </div>
                                                <div class="DynamicExtraField">
                                                    <br>
                                                    <label for="DynamicExtraField">Название второго критерия</label>
                                                    <br>
                                                    <input name="count_second_2">
                                                </div>
                                                <div class="DynamicExtraField">
                                                    <br>
                                                    <label for="DynamicExtraField">Название третьего критерия</label>
                                                    <br>
                                                    <input name="count_second_3">
                                                </div>
                                                <div class="DynamicExtraField">
                                                    <br>
                                                    <label for="DynamicExtraField">Название четвертого критерия</label>
                                                    <br>
                                                    <input name="count_second_4">
                                                </div>
                                            @endif
                                        @elseif($count == 3)
                                            @if($count_third == 1)
                                                <div class="DynamicExtraField">
                                                    <br>
                                                    <label for="DynamicExtraField">Название первого критерия</label>
                                                    <br>
                                                    <input name="count_third_1">
                                                </div>
                                            @elseif($count_third == 2)
                                                <div class="DynamicExtraField">
                                                    <br>
                                                    <label for="DynamicExtraField">Название первого критерия</label>
                                                    <br>
                                                    <input name="count_third_1">
                                                </div>
                                                <div class="DynamicExtraField">
                                                    <br>
                                                    <label for="DynamicExtraField">Название второго критерия</label>
                                                    <br>
                                                    <input name="count_third_2">
                                                </div>
                                            @elseif($count_third == 3)
                                                <div class="DynamicExtraField">
                                                    <br>
                                                    <label for="DynamicExtraField">Название первого критерия</label>
                                                    <br>
                                                    <input name="count_third_1">
                                                </div>
                                                <div class="DynamicExtraField">
                                                    <br>
                                                    <label for="DynamicExtraField">Название второго критерия</label>
                                                    <br>
                                                    <input name="count_third_2">
                                                </div>
                                                <div class="DynamicExtraField">
                                                    <br>
                                                    <label for="DynamicExtraField">Название третьего критерия</label>
                                                    <br>
                                                    <input name="count_third_3">
                                                </div>
                                            @elseif($count_third == 4)
                                                <div class="DynamicExtraField">
                                                    <br>
                                                    <label for="DynamicExtraField">Название первого критерия</label>
                                                    <br>
                                                    <input name="count_third_1">
                                                </div>
                                                <div class="DynamicExtraField">
                                                    <br>
                                                    <label for="DynamicExtraField">Название второго критерия</label>
                                                    <br>
                                                    <input name="count_third_2">
                                                </div>
                                                <div class="DynamicExtraField">
                                                    <br>
                                                    <label for="DynamicExtraField">Название третьего критерия</label>
                                                    <br>
                                                    <input name="count_third_3">
                                                </div>
                                                <div class="DynamicExtraField">
                                                    <br>
                                                    <label for="DynamicExtraField">Название четвертого критерия</label>
                                                    <br>
                                                    <input name="count_third_4">
                                                </div>
                                            @endif
                                     @endif
                                    </div>
                                    <br>
                                    <br>
                                    <div>
                                        <button type="submit" class="btn btn-warning" id="submit">Далее</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection