@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Enter hierarchy name</div>
                    <form id="createForm"
                          class="form-horizontal form-label-left"
                          method="POST"
                          action="{{route('hierarchy-create')}}">
                        @csrf
                        <div class="card-body">
                            <div>
                                <label id = "name_hierarchy">Enter hierarchy name</label><br>
                                <input id = "name_hierarchy" name = "name_hierarchy" required>
                            </div>
                            <br>
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
@endsection
