@extends('layouts.app')

@section('title', 'Transparency')

@section('content')
<div class="row justify-content-center">

	<div class="col-md-12">
		<h1 class="text-white">Transparency</h1>

		<h2 class="text-white">Expenses</h2>
		<h5 class="text-white"><b>TLDR:</b> $406.04 USD/yr + $17.95 CAD/yr</h5>
		<span class="text-white">NOTE: Laravel Forge is used for more than <em>just</em> this website, so the total cost is split over multiple sites.</span>
		<table class="table table-striped table-dark">
			<tr>
				<th>Service</th>
				<th>Price</th>
				<th>Purpose</th>
			</tr>
			<tr>
				<td>Digital Ocean</td>
				<td>$8.92 USD/month</td>
				<td>Server for hosting the main site, API, and testing site.</td>
			</tr>
			<tr>
				<td>Domain Name</td>
				<td>$17.95 CAD/year</td>
				<td>The domain name itself, registered with Namecheap.</td>
			</tr>
			<tr>
				<td>Laravel Forge</td>
				<td>$199 USD/year</td>
				<td>Server and website management/deployment.</td>
			</tr>
			<tr>
				<th>Total</th>
				<td>$406.04 USD/yr + $17.95 CAD/yr</td>
				<td>USD -> CAD conversion varies too much to be 100% accurate, so listing USD + CAD is best.</td>
			</tr>
		</table>

		<h2 class="text-white">Income</h2>
		<h5 class="text-white"><b>TLDR:</b> $4.43 CAD lifetime</h5>
		<span class="text-white">NOTE: Not in the table is 0.0021051 ETH received on July 26, 2021 as I no longer accept cryptocurrency donations.</span>
		<table class="table table-striped table-dark">
			<tr>
				<th>Date</th>
				<th>Income</th>
				<th>Source</th>
			</tr>
			<tr>
				<td>November 2021</td>
				<td>$1.07 CAD</td>
				<td>Patreon</td>
			</tr>
			<tr>
				<td>October 2021</td>
				<td>$1.11 CAD</td>
				<td>Patreon</td>
			</tr>
			<tr>
				<td>September 2021</td>
				<td>$1.13 CAD</td>
				<td>Patreon</td>
			</tr>
			<tr>
				<td>August 2021</td>
				<td>$1.12 CAD</td>
				<td>Patreon</td>
			</tr>
			<tr>
				<th>Total Income</th>
				<td>$4.43 CAD</td>
				<td></td>
			</tr>
		</table>

		<h2 class="text-white">{{ \Carbon\Carbon::now()->subMonth()->format("F Y") }} User Stats</h2>
	</div>
</div>
@endsection