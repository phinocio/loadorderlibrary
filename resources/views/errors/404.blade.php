@extends('layouts.app')

@section('title', 'Not Found')

@section('content')

<h1 class="text-white">404 Not Found</h1>

<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card bg-dark col-md-12 mb-3">
			<div class="card-header text-white">
				<h2>The page you were looking for can not be found.</h2>
			</div>
			<div class="text-white card-body bg-dark m-0 pr-10">
				This could be because of one of the following reasons
				<ul class="list-group">
					<li class="bg-dark text-white list-group-item list-group-item-dark">A typo in the URL</li>
					<li class="bg-dark text-white list-group-item list-group-item-dark">The page you are looking for simply does not exist</li>
					<li class="bg-dark text-white list-group-item list-group-item-dark">The list you are trying to view has expired and been deleted</li>
				</ul>
			</div>
		</div>
	</div>
</div>

@endsection