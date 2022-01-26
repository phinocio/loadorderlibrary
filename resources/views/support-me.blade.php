@extends('layouts.app')

@section('title', 'Support Me')

@section('content')
<div class="container">
	<div class="row justify-content-center pb-5">
		<div class="col-md-12 card-group">
			<div class="card text-white bg-dark">
				<div class="card-header text-center">
					Support Me
				</div>

				<div class="card-body">
					<p>
						If you like the site and want to support me, feel free to pledge on Patreon or Ko-Fi. Please don't feel obligated.
					</p>

					<p>For the sake of transparency of expenses, please see <a href="https://github.com/phinocio/loadorderlibrary/blob/master/EXPENSES.md">EXPENSES.md</a> on Github for a breakdown of the expenses of the site.</p>
				</div>
			</div>
		</div>


	</div>

	<div class="row justify-content-center">
		<div class="col-md-12 card-group">
			<div class="card text-white bg-dark">
				<div class="card-header text-center">
					Methods
				</div>

				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-dark">
							<tbody>
								<tr>
									<td></td>
									<th scope="row">Patreon</th>
									<td><a href="https://patreon.com/phinocio" target="_blank" rel="noopener noreferrer">https://patreon.com/phinocio</a></td>
								</tr>
								<tr>
									<td></td>
									<th scope="row">Ko-Fi</th>
									<td><a href="https://ko-fi.com/phinocio" target="_blank" rel="noopener noreferrer">https://ko-fi.com/phinocio</a></td>
								</tr>

							</tbody>
						</table>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection

<script>
	function copyAddress(target) {
		const address = document.getElementById(target).innerText;
		navigator.clipboard.writeText(address);
	}
</script>