@extends('layouts.app')

@section('title', 'Admin Games')

@section('content')

	<div class="row">
		<div class="col">
			<table class="table table-dark table-striped table-hover">
				<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Name</th>
				</tr>
				</thead>
				<tbody>
				@foreach($games as $game)
					<tr>
						<td>{{ $game->id }}</td>
						<td><strong>{{ $game->name }}</strong></td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<div class="col">
			<div class="card text-white bg-dark">
				<div class="card-header text-center">Add a Game</div>
				<div class="card-body">
					<form method="POST">
						@csrf
						<div class="form-group mb-3">
							<label for="name">Game Name</label>
							<input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}">
							@error('name')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>

						<div class="input-group d-flex align-items-center">
							<button class="btn btn-primary text-white me-3" type="submit">Add Game</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection
