@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Enter alternatives name</div>
                    <div class="card-body">
                        <form method="POST"
                              class="form-horizontal form-label-left"
                              action="{{route('alternative-create', $hier_id)}}"
                              name="Form">
                            @csrf
                            <div class="card-body">
                                <div id="FieldCriteria">
                                    <div class="DynamicExtraField">
                                        <br>
                                        <label for="DynamicExtraField">Первая альтернатива</label>
                                        <br>
                                        <input name="1">
                                    </div>
                                    <div class="DynamicExtraField">
                                        <br>
                                        <label for="DynamicExtraField">Вторая альтернатива </label>
                                        <br>
                                        <input name="2">
                                    </div>
                                    <div class="DynamicExtraField">
                                        <br>
                                        <label for="DynamicExtraField">Третья альтернатива</label>
                                        <br>
                                        <input name="3">
                                    </div>
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
    </div>
@endsection