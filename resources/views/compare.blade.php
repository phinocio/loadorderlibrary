@extends('layouts.app')

@section('title', 'Compare Lists')

@section('content')
<div class="row justify-content-center">

	<div class="col-md-12">
		<h1 class="text-white">Compare Load Orders (BETA)</h1>
		<div class="alert alert-info" role="alert">
			<span>If you would like to search for a <a class="" href="https://www.wabbajack.org/" target="_blank" rel="noopener">Wabbajack
					<x-icons.external-site />
				</a></span> mod list based on mods you want to play with, check out <a class="" href="https://www.mauzigkeit.com/" target="_blank" rel="noopener">https://www.mauzigkeit.com/
				<x-icons.external-site />
			</a></span>
		</div>

		<x-compare-load-orders :loadOrders=$loadOrders />
	</div>
</div>
@endsection