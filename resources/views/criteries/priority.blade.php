@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Enter criteria name</div>
                    <div class="card-body">
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                <tr>
                                    <th>\--\</th>
                                    @foreach($criteria as $cr)
                                        <th>{{$cr['criteria_name']}}</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$criteria['0']['criteria_name']}}</td>
                                        <td><input type="text"  name="row-1-1" value="{{round($criteria['0']['priority'], 2)}}" disabled></td>
                                        <td><input type="text"  name="row-1-2" value="{{round($criteria['1']['priority'], 2)}}" disabled></td>
                                        <td><input type="text"  name="row-1-3" value="{{round($criteria['2']['priority'], 2)}}" disabled></td>
                                        <td><input type="text"  name="row-1-4" value="{{round($criteria['3']['priority'], 2)}}" disabled></td>
                                    </tr>
                                    <tr>
                                        <td>{{$criteria['1']['criteria_name']}}</td>
                                        <td><input type="text"  name="row-1-1" value="{{round($criteria['0']['priority']/$criteria['1']['priority'], 2)}}" disabled></td>
                                        <td><input type="text"  name="row-1-2" value="{{round($criteria['0']['priority']/$criteria['0']['priority'], 2)}}" disabled></td>
                                        <td><input type="text"  name="row-1-3" value="{{round($criteria['1']['priority'], 2)}}" disabled></td>
                                        <td><input type="text"  name="row-1-4" value="{{round($criteria['2']['priority'], 2)}}" disabled></td>
                                    </tr>
                                    <tr>
                                        <td>{{$criteria['2']['criteria_name']}}</td>
                                        <td><input type="text"  name="row-1-1" value="{{round($criteria['0']['priority']/$criteria['2']['priority'], 2)}}" disabled></td>
                                        <td><input type="text"  name="row-1-2" value="{{round($criteria['0']['priority']/$criteria['1']['priority'], 2)}}" disabled></td>
                                        <td><input type="text"  name="row-1-3" value="{{round($criteria['0']['priority']/$criteria['0']['priority'], 2)}}" disabled></td>
                                        <td><input type="text"  name="row-1-4" value="{{round($criteria['1']['priority'], 2)}}" disabled></td>
                                    </tr>
                                    <tr>
                                        <td>{{$criteria['3']['criteria_name']}}</td>
                                        <td><input type="text"  name="row-1-1" value="{{round($criteria['0']['priority']/$criteria['3']['priority'], 2)}}" disabled></td>
                                        <td><input type="text"  name="row-1-2" value="{{round($criteria['0']['priority']/$criteria['2']['priority'], 2)}}" disabled></td>
                                        <td><input type="text"  name="row-1-3" value="{{round($criteria['0']['priority']/$criteria['1']['priority'], 2)}}" disabled></td>
                                        <td><input type="text"  name="row-1-4" value="{{round($criteria['0']['priority']/$criteria['0']['priority'], 2)}}" disabled></td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                    <div>
                        <a href="{{route('criteria-calculate', $hier_id)}}" class="btn btn-warning" role="button" aria-pressed="true">Next</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection