@extends('layouts.app')

@section('content')
	<div id="container"></div>
	<div id="container2"></div>

@endsection
@push('scripts')
	<script src="{{ asset('js/jquery.svgDoughnutChart.min.js') }}" ></script>
	<script type="text/javascript">

		$('#container').doughnutChart({
			percentage: 68
		});
		$('#container2').doughnutChart({
			positiveColor: "#DA4453",
			negativeColor: "#3BB0D6",
			backgroundColor: "white",
			percentage: 52,
			size: 100,
			doughnutSize: 0.35,
			innerText: "52%",
			innerTextOffset: 12,
			Title: "Share of the popular vote",
			positiveText: "52.5% Barack Obama",
			negativeText: "47.5% Others"
		});
	</script>
@endpush

{{--{{dd($alternative)}}--}}

