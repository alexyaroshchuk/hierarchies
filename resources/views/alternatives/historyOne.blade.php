@extends('layouts.app')

@section('content')
	{{--<div id="container"></div>--}}
    <div class="card-body">
        <div class="container mb-4">
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

	<div class="container py-5 doughnutChart">
		<div class="cones-chart"></div>
	</div>

	<div class="container-fluid pb-5 position-relative">
		<div id="chart-_criteria1" class="chart-container"></div>
		<div id="chart-_criteria2" class="chart-container"></div>
		<div id="chart-_criteria3" class="chart-container"></div>
		<div id="chart-_criteria4" class="chart-container"></div>
		<div id="chart-_criteria5" class="chart-container"></div>
		<div id="chart-alternative" class="chart-container"></div>
	</div>

{{--	{{dd($alternative)}}--}}

@endsection
@push('scripts')
	{{--<script src="{{ asset('js/jquery.orgchart.min.js') }}" defer></script>--}}
	{{--<script src="{{ asset('js/jquery.drawDoughnutChart.js') }}" defer></script>--}}
	<script src="{{ asset('js/vendor.js') }}" defer></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/orgchart/2.1.3/js/jquery.orgchart.min.js" defer></script>
	<script type="text/javascript" defer>
		$('document').ready(function(){

			var _alternative = {!! json_encode($alternative) !!};
			var _hierarchies = {!! json_encode($hierarchies) !!};
			var _criteria1 = {!! json_encode($criteria1) !!};
			var _criteria2 = {!! json_encode($criteria2) !!};
			var _criteria3 = null;
			var _criteria4 = null;
			var _criteria5 = null;

			// pie chart
			function getDoughnutChart(data){
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
			}
			getDoughnutChart(_alternative);
			// pie chart

			// cones chart
			function getColumnChart(data){
				var labels = [];
				var values = [];

				for(var i=0; i < data.length; i++){
					labels.push( data[i].name_alternatives );
					values.push( data[i].vector_priority );
				}

				$('.cones-chart').simpleChart({
					title: {
						text: _hierarchies[0].hierarchies_name,
						align: 'center'
					},
					type: 'column',
					layout: {
						width: '100%',
						height: '250px'
					},
					item: {
						label: labels,
						value: values,
						outputValue: [],
						color: ['#00aeef'],
						prefix: '',
						suffix: '',
						render: {
							margin: 0.2,
							size: 'relative'
						}
					}
				});
			}
			getColumnChart(_alternative);
			// cones chart

			// TREE
			function getChartTree() {

				var criteria1 = [];
				var criteria2 = [];
				var criteria3 = [];
				var criteria4 = [];
				var criteria5 = [];
				var alternative = [];

				if( _alternative.length > 0 ){
					for(var i=0; i < _alternative.length; i++){
						alternative.push({
							"name": _alternative[i].name_alternatives,
							"title": _alternative[i].vector_priority
						})
					}
				}

				if( _criteria5 && _criteria5.length > 0 ){
					for(var i=0; i < _criteria5.length; i++){
						criteria5.push({
							"name": "Категория",
							"title": _criteria5[i].criteria_name,
						});

					}
				}

				if( _criteria4 && _criteria4.length > 0 ){
					for(var i=0; i < _criteria4.length; i++){
						criteria4.push({
							"name": "Категория",
							"title": _criteria4[i].criteria_name,
						});

					}
				}

				if( _criteria3 && _criteria3.length > 0 ){
					for(var i=0; i < _criteria3.length; i++){
						criteria3.push({
							"name": "Категория",
							"title": _criteria3[i].criteria_name,
						});

					}
				}

				if( _criteria2 && _criteria2.length > 0 ){
					for(var i=0; i < _criteria2.length; i++){
						criteria2.push({
							"name": "Категория",
							"title": _criteria2[i].criteria_name,
						});

					}
				}

				if( _criteria1 && _criteria1.length > 0 ){
					for(var i=0; i < _criteria1.length; i++){
						criteria1.push({
							"name": "Категория",
							"title": _criteria1[i].criteria_name,
						});

					}
				}

				var ds_criteria5 = {
					'name': 'Иерархия',
					'title': _hierarchies[0].hierarchies_name,
					'children': criteria5

				};

				var ds_criteria4 = {
					'name': 'Иерархия',
					'title': _hierarchies[0].hierarchies_name,
					'children': criteria4

				};

				var ds_criteria3 = {
					'name': 'Иерархия',
					'title': _hierarchies[0].hierarchies_name,
					'children': criteria3

				};

				var ds_criteria2 = {
					'name': 'Иерархия',
					'title': _hierarchies[0].hierarchies_name,
					'children': criteria2

				};

				var ds_criteria1 = {
					'name': 'Иерархия',
					'title': _hierarchies[0].hierarchies_name,
					'children': criteria1

				};

				var ds_alternative = {
					'name': 'Иерархия',
					'title': _hierarchies[0].hierarchies_name,
					'children': alternative
				};

				// init graf

				if( criteria5 .length > 0)
					$('#chart-_criteria3').orgchart({
						'data' : ds_criteria5,
						'depth': 2,
						'nodeContent': 'title'
					});

				if( criteria4 .length > 0)
					$('#chart-_criteria3').orgchart({
						'data' : ds_criteria4,
						'depth': 2,
						'nodeContent': 'title'
					});

				if( criteria3 .length > 0)
					$('#chart-_criteria3').orgchart({
						'data' : ds_criteria3,
						'depth': 2,
						'nodeContent': 'title'
					});

				if( criteria2 .length > 0)
					$('#chart-_criteria2').orgchart({
						'data' : ds_criteria2,
						'depth': 2,
						'nodeContent': 'title'
					});

				if( criteria1 .length > 0)
					$('#chart-_criteria1').orgchart({
						'data' : ds_criteria1,
						'depth': 2,
						'nodeContent': 'title'
					});

				if( alternative .length > 0)
					$('#chart-alternative').orgchart({
						'data' : ds_alternative,
						'depth': 2,
						'nodeContent': 'title'
					});

				// init graf

				// $('.chart-container .nodes tr').each(function(){
				// 	if( $(this).text() === "undefined" ){
				// 		$(this).hide();
				// 	}
				// });

				console.log( $('#chart-alternative table tr') )

				// hidden first td (table)
				$('#chart-_criteria2 table tr').eq(0).hide();
				$('#chart-_criteria3 table tr').eq(0).hide();
				$('#chart-_criteria4 table tr').eq(0).hide();
				$('#chart-_criteria5 table tr').eq(0).hide();
				$('#chart-alternative table tr').eq(0).hide();

			}
			getChartTree();
			// TREE

		});

	</script>
@endpush

{{--{{dd($alternative)}}--}}