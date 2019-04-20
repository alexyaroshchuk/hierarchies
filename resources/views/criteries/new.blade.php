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
                                        <div class="DynamicExtraField">
                                            <br>
                                            <label for="DynamicExtraField">First criterion</label>
                                            <br>
                                            <input name="1">
                                        </div>
                                        <div class="DynamicExtraField">
                                            <br>
                                            <label for="DynamicExtraField">Second criterion</label>
                                            <br>
                                            <input name="2">
                                        </div>
                                        <div class="DynamicExtraField">
                                            <br>
                                            <label for="DynamicExtraField">Third criterion</label>
                                            <br>
                                            <input name="3">
                                        </div>
                                        <div class="DynamicExtraField">
                                            <br>
                                            <label for="DynamicExtraField">Fourth criterion</label>
                                            <br>
                                            <input name="4">
                                        </div>
                                    </div>
                                    <div style="position: absolute; right: 100px;  bottom: 100px;">
                                        <div class="Priority">
                                            <br>
                                            <label for="Priority">Priority</label>
                                            <br>
                                            <input name="priority1">
                                        </div>
                                        <div class="Priority">
                                            <br>
                                            <label for="Priority">Priority</label>
                                            <br>
                                            <input name="priority2">
                                        </div>
                                        <div class="Priority">
                                            <br>
                                            <label for="Priority">Priority</label>
                                            <br>
                                            <input name="priority3">
                                        </div>
                                        <div class="Priority">
                                            <br>
                                            <label for="Priority">Priority</label>
                                            <br>
                                            <input name="priority4">
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