@extends('layouts.app')

@section('content')
	{{--<div id="container"></div>--}}
    <div class="card-body">
        <div class="mb-4">
            @foreach($alternative as $alt)
                <p class="text-big d-block mb-3">
                   {{ $alt['name_alternatives'] }} - <b>{{ $alt['vector_priority']/100 }}</b>
                </p>
           @endforeach
        </div>
    </div>
	<div class="container py-5 doughnutChart">
		<div id="doughnutChart" class="chart"></div>
	</div>

	<div class="container py-5 position-relative">
		<div id="chart-container"></div>
	</div>

{{--	{{dd($alternative)}}--}}

@endsection
@push('scripts')
	<script src="{{ asset('js/jquery.drawDoughnutChart.js') }}" defer></script>
	<script src="{{ asset('js/jquery.orgchart.min.js') }}" defer></script>
	<script type="text/javascript" defer>
		$('document').ready(function(){

			// pie chart
			var data = {!! json_encode($alternative) !!};
			console.log( data );
			var arg = [];
			for(var i=0; i < data.length; i++){
				var colorBG = null;

				if( data[i].vector_priority > 80 ) {
					colorBG = '#1f8260';
				}
				else if(data[i].vector_priority > 60){
					colorBG = '#769d7f';
				}
				else if(data[i].vector_priority > 50){
					colorBG = '#2ab0b7';
				}
				else if(data[i].vector_priority > 40){
					colorBG = '#6DBCDB';
				}
				else if(data[i].vector_priority > 30){
					colorBG = '#F7E248';
				}
				else if(data[i].vector_priority > 20){
					colorBG = '#ffa500';
				}
				else if(data[i].vector_priority > 15){
					colorBG = '#cb4b17';
				}
				else{
					colorBG = '#FC4349';
				}

				arg.push(
					{
						title: data[i].name_alternatives,
						value : parseInt(data[i].vector_priority),
						color: colorBG
					}
				)
			}

			$("#doughnutChart").drawDoughnutChart(arg);
			// pie chart

			// TREE
			$(function() {
				var ds = {
					'name': 'Lao Lao',
					'title': 'general manager',
					'children': [
						{ 'name': 'Bo Miao', 'title': 'department manager' },
						{ 'name': 'Su Miao', 'title': 'department manager',
							'children': [
								{ 'name': 'Tie Hua', 'title': 'senior engineer' },
								{ 'name': 'Hei Hei', 'title': 'senior engineer',
									'children': [
										{ 'name': 'Pang Pang', 'title': 'engineer' },
										{ 'name': 'Xiang Xiang', 'title': 'UE engineer' }
									]
								}
							]
						},
						{ 'name': 'Hong Miao', 'title': 'department manager' },
						{ 'name': 'Chun Miao', 'title': 'department manager' }
					]
				};

				var oc = $('#chart-container').orgchart({
					'data' : ds,
					'depth': 2,
					'nodeContent': 'title'
				});

			});
			// TREE
		});

	</script>
@endpush

{{--{{dd($alternative)}}--}}