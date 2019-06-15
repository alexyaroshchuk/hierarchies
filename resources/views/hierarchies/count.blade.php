@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card my-5">
                    <div class="card-header">
                        <p class="subtitle subtitle_green py-1">ШАГ №3</p>
                    </div>
                    <form id="createForm"
                          class="form-horizontal form-label-left"
                          method="POST"
                          action="{{route('hierarchy-count-save', $hier_id)}}">
                        @csrf
                        <div class="card-body">
                            <div class="mb-4">
                                <label class="text-big text-big_gray d-block mb-2">Количество уровней иерархии</label>
                                <select id = "count_level" name="count" class="selectpicker">
                                    <option value="1" selected>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>

                            <div id="count_first_div" class="count mb-4">
                                <label class="text-big text-big_gray d-block mb-2">Количество критериев на уровне №1:</label>
                                <select id = "count_first" name="count_first" class="selectpicker">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>

                            <div id="count_second_div" class="count mb-4" style="display:none">
                                <label id = "count_second" class="text-big text-big_gray d-block mb-2">Количество критериев на уровне №2:</label>
                                <select id = "count_second" name="count_second" class="selectpicker">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>

                            <div id="count_third_div" class="count mb-4" style="display:none">
                                <label id = "count_third" class="text-big text-big_gray d-block mb-2">Количество критериев на уровне №3:</label>
                                <select id = "count_third" name="count_third" class="selectpicker">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>

                            <div id="count_fourth_div" class="count mb-4" style="display:none">
                                <label id = "count_fourth" class="text-big text-big_gray d-block mb-2">Количество критериев на уровне №3:</label>
                                <select id = "count_fourth" name="count_fourth" class="selectpicker">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>


                            <div>
                                <button type="submit" class="btn-custom btn-custom_yellow" id="submit">Next</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#count_level').on('change', function() {
                console.log(this.value);
                if ( this.value == '1')
                {
                    $("#count_second_div").hide();
                    $("#count_third_div").hide();
                    $("#count_fourth_div").hide();
                }
                if ( this.value == '2')
                {
                    $("#count_second_div").show();
                    $("#count_third_div").hide();
                    $("#count_fourth_div").hide();
                }
                if ( this.value == '3')
                {
                    $("#count_second_div").show();
                    $("#count_third_div").show();
                    $("#count_fourth_div").hide();
                }
                if ( this.value == '4')
                {
                    $("#count_second_div").show();
                    $("#count_third_div").show();
                    $("#count_fourth_div").show();
                }
            });
        });
    </script>
@endsection
