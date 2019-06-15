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
		<div id="chart-container" class="chart-container"></div>
		<div id="chart-container-2" class="chart-container"></div>
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

			console.log( '_alternative - ', _alternative );
			console.log( '_hierarchies - ', _hierarchies );
			console.log( '_criteria1 - ', _criteria1 );
			console.log( '_criteria2 - ', _criteria2 );

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
				var alternative = [];

				if( _alternative.length > 0 ){
					for(var i=0; i < _alternative.length; i++){
						alternative.push({
							"name": _alternative[i].name_alternatives,
							"title": _alternative[i].vector_priority
						})
					}
				}

				if( _criteria3 && _criteria3.length > 0 ){
					for(var i=0; i < _criteria3.length; i++){
						criteria3.push({
							"name": "Категория",
							"title": _criteria3[i].criteria_name,
							"children": criteria2
						})
					}
				}else if( !_criteria3 || _criteria3.length === 0 ){
					criteria3[0] = {
						"children": []
					}
				}

				if( _criteria2 && _criteria2.length > 0 ){
					for(var i=0; i < _criteria2.length; i++){
						criteria2.push({
							"name": "Категория",
							"title": _criteria2[i].criteria_name,
							"children": _criteria3
						})
					}
				}else if( !_criteria2 || _criteria2.length === 0 ){
					criteria2[0] = {
						"children": []
					}
				}

				if( _criteria1.length > 0 ){
					for(var i=0; i < _criteria1.length; i++){
						criteria1.push({
							"name": "Категория",
							"title": _criteria1[i].criteria_name,
							"children": criteria2
						});

					}
				}

				console.log( 'criteria1 - ', criteria1 );
				console.log( 'criteria2 - ', criteria2 );
				console.log( 'alternative - ', Math.floor(alternative.length/2) );

				var ds = {
					'name': 'Иерархия',
					'title': _hierarchies[0].hierarchies_name,
					'children': criteria1

/*					'children':	[
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
					]*/

				};

				var ds_alternative = {
					'name': 'Иерархия',
					'title': _hierarchies[0].hierarchies_name,
					'children': alternative
				}

				var oc = $('#chart-container').orgchart({
					'data' : ds,
					'depth': 2,
					'nodeContent': 'title'
				});

				var oc_alternative = $('#chart-container-2').orgchart({
					'data' : ds_alternative,
					'depth': 2,
					'nodeContent': 'title'
				});

				$('#chart-container .nodes tr').each(function(){
					if( $(this).text() === "undefined" ){
						$(this).hide();
					}
				});

				var chartContainerW = $('#chart-container .orgchart table').width();
				var chartContainer2W = $('#chart-container-2 .orgchart').css('width', chartContainerW + 'px')

				$('#chart-container-2 table tr').eq(0).hide();

			}
			getChartTree();
			// TREE

		});

	</script>
@endpush

{{--{{dd($alternative)}}--}}