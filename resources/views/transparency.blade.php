@extends('layouts.app')

@section('title', 'Transparency')

@section('content')
<div class="row justify-content-center">

	<div class="col-md-12">
		<div style="display:flex; align-items: center; justify-content: space-between">
			<h1 class="text-white">Transparency</h1>
			<small class="text-white">Last Updated: 2022-09-26</small>
		</div>


		<h2 class="text-white">Expenses</h2>
		<h5 class="text-white"><b>TLDR:</b> $285.40 USD/yr + $19.94 CAD/yr</h5>
		<span class="text-white">NOTE: Prices are listed without applicable taxes.</span>
		<table class="table table-striped table-dark">
			<tr>
				<th>Service</th>
				<th>Price</th>
				<th>Purpose</th>
			</tr>
			<tr>
				<td>Digital Ocean</td>
				<td>$7.20 USD/month</td>
				<td>Server for hosting the main site, API, and testing site. $6 for droplet, $1.20 for backup service.</td>
			</tr>
			<tr>
				<td>Domain Name</td>
				<td>$19.94 CAD/year</td>
				<td>The domain name itself, registered with Namecheap. $19.70 domain + $0.24 ICANN fee</td>
			</tr>
			<tr>
				<td>Laravel Forge</td>
				<td>$199 USD/year</td>
				<td>Server and website management/deployment.</td>
			</tr>
			<tr>
				<th>Total</th>
				<td>$285.40 USD/yr + $19.94 CAD/yr</td>
				<td>USD -> CAD conversion varies too much to be 100% accurate, so listing USD + CAD is best.</td>
			</tr>
		</table>

		<h2 class="text-white">Income</h2>
		<h5 class="text-white"><b>TLDR:</b> $44.43 CAD lifetime</h5>
		<span class="text-white">NOTE: Not in the table is 0.0021051 ETH received on July 26, 2021 as I no longer accept cryptocurrency donations.</span>
		<table class="table table-striped table-dark">
			<tr>
				<th>Date</th>
				<th>Income</th>
				<th>Source</th>
			</tr>
			<tr>
				<td>September 2022</td>
				<td>$40.00 CAD</td>
				<td>Ko-fi</td>
			</tr>
			<tr>
				<td>December 2021 - August 2022</td>
				<td>$0.00 CAD</td>
				<td>All sources</td>
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
				<td>$44.43 CAD</td>
				<td></td>
			</tr>
		</table>

		<h2 class="text-white">Simple Stats</h2>
		<div class="row mb-5">
			<div class="d-flex col-md-4 align-items-stretch">
				<div class="flex-fill card text-white bg-dark">
					<div class="card-header">
						<h3 class="card-title p-0 m-0">{{ __('List Stats') }}</h3>
					</div>

					<div class="card-body p-0">
						<ul class="list-group bg-dark">
							@foreach($listStats as $stat)
								<li class="list-group-item list-group-item-dark d-flex justify-content-between align-items-center">
									{{ $stat['name'] }}
									<span class="badge bg-secondary rounded-pill">{{ $stat['value'] }}</span>
								</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>

			<div class="d-flex col-md-4 align-items-stretch">
				<div class="flex-fill card text-white bg-dark">
					<div class="card-header">
						<h3 class="card-title p-0 m-0">{{ __('User Stats') }}</h3>
					</div>

					<div class="card-body p-0">
						<ul class="list-group bg-dark">
							@foreach($userStats as $stat)
								<li class="list-group-item list-group-item-dark d-flex justify-content-between align-items-center">
									{{ $stat['name'] }}
									<span class="badge bg-secondary rounded-pill">{{ $stat['value'] }}</span>
								</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>

			<div class="d-flex col-md-4 align-items-stretch">
				<div class="flex-fill card text-white bg-dark">
					<div class="card-header">
						<h3 class="card-title p-0 m-0">{{ __('File Stats') }}</h3>
					</div>

					<div class="card-body p-0">
						<ul class="list-group bg-dark">
							<li class="list-group-item list-group-item-dark d-flex justify-content-between align-items-center">
								{{ $fileStats[0]['name'] }}
								<span class="badge bg-secondary rounded-pill">{{ $fileStats[0]['value'] }}</span>
							</li>

							<li class="list-group-item list-group-item-dark d-flex justify-content-between align-items-center">
								{{ $fileStats[1]['name'] }}
								<span class="badge {{ ($fileStats[1]['value'] > 1000) ? 'bg-danger' : 'bg-secondary' }} rounded-pill">{{ $fileStats[1]['value'] }} MB</span>
							</li>

							<li class="list-group-item list-group-item-dark d-flex justify-content-between align-items-center">
								{{ $fileStats[2]['name'] }}
								<span class="badge {{ ($fileStats[1]['value'] > 1000) ? 'bg-danger' : 'bg-secondary' }} rounded-pill">{{ $fileStats[2]['value'] }} MB</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
