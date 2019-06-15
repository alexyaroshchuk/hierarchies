@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card my-5">
                    <div class="card-header">
                        <p class="subtitle subtitle_green py-1">ШАГ №2</p>
                    </div>
                    <div class="card-body">
                        <form
                              method="POST"
                              class="form-horizontal form-label-left"
                              action="{{route('alternative-create', $hier_id)}}"
                              name="Form">
                            @csrf
                            <div class="card-body px-0">
                                <lebel class="d-block mb-4">
                                    <span class="text-big text-big_gray d-block mb-2">Количество альтернатив</span>
                                    <select name="AlternativeSelect" id="AlternativeSelect" class="selectpicker">
                                        <option value="1" selected>1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </lebel>
                                <div id="FieldCriteria">
                                    <div class="DynamicExtraField mb-3">
                                        <label for="DynamicExtraField">
                                            <span class="text-big text-big_gray">Первая альтернатива</span></label>
                                        <input
                                                name="1"
                                                class="input__custom"
                                                placeholder="Название"
                                        >
                                    </div>
                                    <div class="DynamicExtraField mb-3">
                                        <label for="DynamicExtraField">
                                            <span class="text-big text-big_gray">Вторая альтернатива </span></label>
                                        <input
                                                name="2"
                                                class="input__custom"
                                                placeholder="Название"
                                        >
                                    </div>
                                    <div class="DynamicExtraField mb-3">
                                        <label for="DynamicExtraField">
                                            <span class="text-big text-big_gray">Третья альтернатива</span></label>
                                        <input
                                                name="3"
                                                class="input__custom"
                                                placeholder="Название"
                                        >
                                    </div>
                                    <div class="DynamicExtraField mb-3">
                                        <label for="DynamicExtraField">
                                            <span class="text-big text-big_gray">Четвертая альтернатива</span></label>
                                        <input
                                                name="4"
                                                class="input__custom"
                                                placeholder="Название"
                                        >
                                    </div>
                                    <div class="DynamicExtraField mb-3">
                                        <label for="DynamicExtraField">
                                            <span class="text-big text-big_gray">Пятая альтернатива</span></label>
                                        <input
                                                name="5"
                                                class="input__custom"
                                                placeholder="Название"
                                        >
                                    </div>
                                </div>
                                <br>
                                <div>
                                    <button type="submit" class="btn-custom btn-custom_yellow" id="submit">Next</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection