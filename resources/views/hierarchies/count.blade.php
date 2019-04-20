@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Количество уровней иерархии</div>
                    <form id="createForm"
                          class="form-horizontal form-label-left"
                          method="POST"
                          action="{{route('hierarchy-count-save', $hier_id)}}">
                        @csrf
                        <div class="card-body">
                            <div>
                                <label>Number of hierarchy levels</label><br>
                                <select id = "count_level" name="count">
                                    <option value="1" selected>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <br>
                            <div id="count_first_div" class="count">
                                <label>Количество критериев на уровне №1:</label><br>
                                <select id = "count_first" name="count_first">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                            <br>
                            <div id="count_second_div" class="count" style="display:none">
                                <label id = "count_second">Количество критериев на уровне №2:</label><br>
                                <select id = "count_second" name="count_second">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                            <br>
                            <div id="count_third_div" class="count" style="display:none">
                                <label id = "count_third">Количество критериев на уровне №3:</label><br>
                                <select id = "count_third" name="count_third">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                            <br>
                            <div>
                                <button type="submit" class="btn btn-warning" id="submit">Next</button>
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
                }
                if ( this.value == '2')
                {
                    $("#count_second_div").show();
                    $("#count_third_div").hide();
                }
                if ( this.value == '3')
                {
                    $("#count_second_div").show();
                    $("#count_third_div").show();
                }
            });
        });
    </script>
@endsection
