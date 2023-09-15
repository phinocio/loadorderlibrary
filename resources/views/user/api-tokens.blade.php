@extends('layouts.app')

@section('title', 'API Tokens')

@section('content')
<h1 class="text-white">API Tokens</h1>

<div class="my-2 row justify-content-center">
	<div class="col-md-12">
		<div class="card text-white bg-dark">
			<div class="card-header">
				{{ __('Create Token') }}
				<small class="text-muted">API Tokens allow off-site and 3rd party apps to Create/Update/Delete lists on your behalf.</small>
			</div>

			<div class="card-body">
				<form method="POST" action="/profile/api-tokens">
					@csrf
					<div class="form-group row">
						<label for="token_name" class="col-md-4 col-form-label text-md-right">{{ __('Token Name') }}</label>

						<div class="col-md-6">
							<input id="token_name" type="text" class="form-control @error('token_name') is-invalid @enderror" name="token_name">

							@error('token_name')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="token_name" class="col-md-4 col-form-label text-md-right">{{ __('Token Abilities') }}</label>

						<div class="col-md-6 d-flex justify-content-between">
							<label>
								<input type="checkbox" name="create" value="create" />
								<span class="ml-1">create</span>
							</label>
							<label>
								<input type="checkbox" name="read" value="read" />
								<span class="ml-1">read</span>
							</label>
							<label>
								<input type="checkbox" name="update" value="update" />
								<span class="ml-1">update</span>
							</label>
							<label>
								<input type="checkbox" name="delete" value="delete" />
								<span class="ml-1">delete</span>
							</label>
						</div>
					</div>

					<div class="form-group row mb-0">
						<div class="col-md-6 offset-md-4">
							<button type="submit" class="btn btn-primary">
								{{ __('Create Token') }}
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="my-2 row justify-content-center">
	<div class="col-md-12">
		<div class="card text-white bg-dark">
			<div class="card-header">
				{{ __('Your Tokens') }}
			</div>
			<div class="card-body d-flex">
				<ul class="list-group bg-dark d-flex col-md-12">
					@forelse (auth()->user()->tokens as $token)
					<li class="list-inline-item list-group-item-dark mb-2 p-2 d-flex justify-content-between align-items-center">
						<div>
							<h4><strong>{{$token->name}}</strong></h4>
							<div>
								<strong>Abilities:</strong>
								@foreach ($token->abilities as $ability)
								<em>{{$ability}}</em>
								@endforeach
							</div>

						</div>
						<form method="POST" action="/profile/api-tokens/{{$token->id}}">
							@csrf
							@method('delete')
							<div class="form-group row mb-0">
								<div class="col-md-6">
									<button type="submit" class="btn btn-danger">
										{{ __('Delete') }}
									</button>
								</div>
							</div>
						</form>


					</li>
					@empty
					<li class="list-group-item list-group-item-dark">You have no API Tokens</li>
					@endforelse

				</ul>
			</div>
		</div>
	</div>
</div>
@endsection