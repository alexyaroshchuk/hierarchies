@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card my-5">
                    <div class="card-header">
                        <p class="subtitle subtitle_green py-1">Введите приоритеты</p>
                    </div>
                    <form id="createForm"
                          class="form-horizontal form-label-left"
                          method="POST"
                          action="{{route('criteria-calculate', $hier_id)}}">
                        @csrf
                        <div class="card-body">
                            <table id="example" class="display" style="width:100%">
                                <thead class="table__header">
                                <tr>
{{--                                    {{dd($criteria)}}--}}
                                    <th class="px-4">#</th>
                                    @foreach($criteria as $cr)
                                        <td class="table__header_text py-3 px-2">{{$cr['criteria_name']}}</td>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody id="js-numeric">
                                    @for($i=0; $i<count($criteria); $i++)
                                        <tr>
                                            <td class="table__header_text px-2">{{$criteria[$i]['criteria_name']}}</td>
                                            @for($j=0; $j<count($criteria); $j++)
                                                <td><input class="input__custom" type="text"  id="row-{{$i}}-{{$j}}" name="{{$criteria[$i]['id'] . "|" . $criteria[$j]['id']}}"
                                                    ></td>
                                            @endfor
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                    </div>
                        <div class="card-footer">
                            <button type="submit" class="btn-custom btn-custom_yellow" role="button" aria-pressed="true">Далее</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection