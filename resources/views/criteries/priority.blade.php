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
                                    <th class="px-4">#</th>
                                    @foreach($criteria1 as $cr)
                                        <td class="table__header_text py-3 px-2">{{$cr['criteria_name']}}</td>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody id="js-numeric">
                                    @for($i=0; $i<count($criteria1); $i++)
                                        <tr>
                                            <td class="table__header_text px-2">{{$criteria1[$i]['criteria_name']}}</td>
                                            @for($j=0; $j<count($criteria1); $j++)
                                                <td><input class="input__custom" type="text"  id="row-{{$i}}-{{$j}}" name="{{$criteria1[$i]['id'] . "|" . $criteria1[$j]['id']}}"
                                                    ></td>
                                            @endfor
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>

                        @if($criteria2 != null)
                            @foreach($criteria1 as $cr1)
                            <div class="card-body">
                                <table id="example" class="display" style="width:100%">
                                    <thead class="table__header">
                                    <tr>
                                        <th class="px-4">#</th>
                                        @foreach($criteria2 as $cr)
                                            <td class="table__header_text py-3 px-2">{{$cr['criteria_name']}}</td>
                                        @endforeach
                                    </tr>
                                    </thead>
                                    <tbody id="js-numeric">
                                    @for($i=0; $i<count($criteria2); $i++)
                                        <tr>
                                            <td class="table__header_text px-2">{{$criteria2[$i]['criteria_name']}}</td>
                                            @for($j=0; $j<count($criteria2); $j++)
                                                <td><input class="input__custom" type="text"  id="row-{{$i}}-{{$j}}" name="{{$criteria2[$i]['id'] . "|" . $criteria2[$j]['id']}}"
                                                    ></td>
                                            @endfor
                                        </tr>
                                    @endfor
                                    </tbody>
                                </table>
                            </div>
                            @endforeach
                        @else
                            @foreach($criteria1 as $cr1)
                                <div class="card-body">
                                    <table id="example" class="display" style="width:100%">
                                        <thead class="table__header">
                                        <tr>
                                            <th class="px-4">#</th>
                                            @foreach($alternative as $cr)
                                                <td class="table__header_text py-3 px-2">{{$cr['criteria_name']}}</td>
                                            @endforeach
                                        </tr>
                                        </thead>
                                        <tbody id="js-numeric">
                                        @for($i=0; $i<count($alternative); $i++)
                                            <tr>
                                                <td class="table__header_text px-2">{{$alternative[$i]['criteria_name']}}</td>
                                                @for($j=0; $j<count($alternative); $j++)
                                                    <td><input class="input__custom" type="text"  id="row-{{$i}}-{{$j}}" name="{{$alternative[$i]['id'] . "|" . $alternative[$j]['id']}}"
                                                        ></td>
                                                @endfor
                                            </tr>
                                        @endfor
                                        </tbody>
                                    </table>
                                </div>
                            @endforeach
                        @endif



                        @if(count($criteria3) != 0  && count($criteria2) != 0)
                            @foreach($criteria2 as $cr2)
                            <div class="card-body">
                                <table id="example" class="display" style="width:100%">
                                    <thead class="table__header">
                                    <tr>
                                        <th class="px-4">#</th>
                                        @foreach($criteria3 as $cr)
                                            <td class="table__header_text py-3 px-2">{{$cr['criteria_name']}}</td>
                                        @endforeach
                                    </tr>
                                    </thead>
                                    <tbody id="js-numeric">
                                    @for($i=0; $i<count($criteria3); $i++)
                                        <tr>
                                            <td class="table__header_text px-2">{{$criteria3[$i]['criteria_name']}}</td>
                                            @for($j=0; $j<count($criteria3); $j++)
                                                <td><input class="input__custom" type="text"  id="row-{{$i}}-{{$j}}" name="{{$criteria3[$i]['id'] . "|" . $criteria3[$j]['id']}}"
                                                    ></td>
                                            @endfor
                                        </tr>
                                    @endfor
                                    </tbody>
                                </table>
                            </div>
                        @endforeach
                        @elseif(count($criteria3) == 0 && count($criteria2) != 0)
                            @foreach($criteria2 as $cr2)
                                <div class="card-body">
                                    <table id="example" class="display" style="width:100%">
                                        <thead class="table__header">
                                        <tr>
                                            <th class="px-4">#</th>
                                            @foreach($alternative as $alt)
                                                <td class="table__header_text py-3 px-2">{{$alt['name_alternatives']}}</td>
                                            @endforeach
                                        </tr>
                                        </thead>
                                        <tbody id="js-numeric">
                                        @for($i=0; $i<count($alternative); $i++)
                                            <tr>
                                                <td class="table__header_text px-2">{{$alternative[$i]['name_alternatives']}}</td>
                                                @for($j=0; $j<count($alternative); $j++)
                                                    <td><input class="input__custom" type="text"  id="row-{{$i}}-{{$j}}" name="{{$alternative[$i]['id'] . "|" . $alternative[$j]['id']}}"
                                                        ></td>
                                                @endfor
                                            </tr>
                                        @endfor
                                        </tbody>
                                    </table>
                                </div>
                            @endforeach
                        @endif


                        @if(count($criteria4) != 0 && count($criteria3) != 0)
                            @foreach($criteria3 as $cr3)
                                <div class="card-body">
                                    <table id="example" class="display" style="width:100%">
                                        <thead class="table__header">
                                        <tr>
                                            <th class="px-4">#</th>
                                            @foreach($criteria4 as $cr)
                                                <td class="table__header_text py-3 px-2">{{$cr['name_alternatives']}}</td>
                                            @endforeach
                                        </tr>
                                        </thead>
                                        <tbody id="js-numeric">
                                        @for($i=0; $i<count($criteria4); $i++)
                                            <tr>
                                                <td class="table__header_text px-2">{{$criteria4[$i]['name_alternatives']}}</td>
                                                @for($j=0; $j<count($criteria4); $j++)
                                                    <td><input class="input__custom" type="text"  id="row-{{$i}}-{{$j}}" name="{{$criteria4[$i]['id'] . "|" . $criteria4[$j]['id']}}"
                                                        ></td>
                                                @endfor
                                            </tr>
                                        @endfor
                                        </tbody>
                                    </table>
                                </div>
                            @endforeach
                        @elseif(count($criteria4) == 0 && count($criteria3) != 0)
                            @foreach($criteria3 as $cr3)
                                <div class="card-body">
                                    <table id="example" class="display" style="width:100%">
                                        <thead class="table__header">
                                        <tr>
                                            <th class="px-4">#</th>
                                            @foreach($alternative as $cr)
                                                <td class="table__header_text py-3 px-2">{{$cr['name_alternatives']}}</td>
                                            @endforeach
                                        </tr>
                                        </thead>
                                        <tbody id="js-numeric">
                                        @for($i=0; $i<count($alternative); $i++)
                                            <tr>
                                                <td class="table__header_text px-2">{{$alternative[$i]['name_alternatives']}}</td>
                                                @for($j=0; $j<count($alternative); $j++)
                                                    <td><input class="input__custom" type="text"  id="row-{{$i}}-{{$j}}" name="{{$alternative[$i]['id'] . "|" . $alternative[$j]['id']}}"
                                                        ></td>
                                                @endfor
                                            </tr>
                                        @endfor
                                        </tbody>
                                    </table>
                                </div>
                            @endforeach
                        @endif
                        <div class="card-footer">
                            <button type="submit" class="btn-custom btn-custom_yellow" role="button" aria-pressed="true">Далее</button>
                        </div>
                    </form>



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