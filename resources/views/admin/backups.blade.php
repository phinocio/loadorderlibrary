@extends('layouts.app')

@section('title', 'Admin Backups')

@section('content')

<table class="table table-dark table-striped table-hover">
	<thead>
		<tr>
			<th scope="col">File</th>
			<th scope="col">Size in MB</th>
			<th scope="col">Created</th>
		</tr>
	</thead>
	<tbody>
		@foreach($backups as $backup)
		<tr>
			<td><strong>{{ $backup->file }}</strong></td>
			<td>{{ number_format($backup->size / 1000000, 2, '.', '') }}</td>
			<td>{{ $backup->created_at->diffForHumans() }}</td>
			
		</tr>
		@endforeach
	</tbody>
</table>

@endsection
