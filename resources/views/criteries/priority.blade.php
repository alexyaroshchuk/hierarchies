@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Введите приоритеты</div>
                    <form id="createForm"
                          class="form-horizontal form-label-left"
                          method="POST"
                          action="{{route('criteria-calculate', $hier_id)}}">
                        @csrf
                    <div class="card-body">
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                <tr>
{{--                                    {{dd($criteria)}}--}}
                                    <th>\</th>
                                    @foreach($criteria as $cr)
                                        <td>{{$cr['criteria_name']}}</td>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                    @for($i=0; $i<count($criteria); $i++)
                                        <tr>
                                            <td>{{$criteria[$i]['criteria_name']}}</td>
                                            @for($j=0; $j<count($criteria); $j++)
                                                <td><input type="text"  id="row-{{$i}}-{{$j}}" name="{{$criteria[$i]['id'] . "|" . $criteria[$j]['id']}}"  @if($i>=$j) disabled @endif></td>
                                            @endfor
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                    </div>
                    </form>
                    <div>
                        <a href="{{route('criteria-calculate', $hier_id)}}" class="btn btn-warning" role="button" aria-pressed="true">Next</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection