<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<!-- icons -->
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="application-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">



	<!-- FB Meta -->
	<meta property="og:url" content="{{ Request::url() }}" />
	<meta property="og:title" content="@yield('title') - Load Order Library" />
	<meta property="og:description" content="@yield('description', 'A modlist files site to help with support.')" />
	<meta property="og:image" content="@yield('image', url('/images/logo.png'))" />
	<meta property="og:type" content="website" />

	<!-- Twitter Meta -->
	<meta name="twitter:card" content="summary">
	<meta name="twitter:url" content="{{ Request::url() }}">
	<meta name="twitter:title" content="@yield('title') - Load Order Library">
	<meta name="twitter:description" content="@yield('description', 'A modlist files site to help with support.')">
	<meta name="twitter:image" content="@yield('image', url('/images/logo.png'))">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ $loadOrder->name }} - {{ config('app.name', 'Load Order Library') }}</title>

	<!-- Fonts -->
	<!-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->

	<!-- Styles -->
	<link href="{{ mix('/css/app.css') }}" rel="stylesheet">
</head>

<body>
	<div class="row">
		<div class="col-md-12">
			<div class="accordion p-0 mt-0" id="accordion">
				<div class="accordion-item bg-dark mb-1" id="{{$file['name']}}">
					<!-- <div class="accordion-header d-flex justify-content-between align-items-center pe-3">
						<h2 class="m-0 p-0" id="heading">
							<button class="accordion-button collapsed bg-dark text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse" aria-expanded="false" aria-controls="collapse">
								<span class="text-white"><b>&plus;</b></span> <b>{{ $file['name'] }}</b>
							</button>

						</h2>
					</div> -->
					<div id="collapse" class="{{ $file['name'] }} accordion-collapse collapse show" aria-labelledby="heading" data-bs-parent="#accordion">
						<div class="accordion-body text-white p-0">
							<form class="form">
								<!-- <div class="input-group">
									<span class="input-group-text" id="filterlabel">Filter</span>
									<input class="form-control" type="search" placeholder="Filter..." aria-labelledby="filterlabel" onkeyup="filter('filter1', 'list')" id="filter1">
								</div> -->

								<!-- @if($file['name'] == 'modlist.txt')
									<div class="form-check form-switch ms-10">
										<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick="toggleHidden()">
										<label class="form-check-label" for="flexCheckDefault">
											Show Disabled
										</label>
									</div>
								@endif -->
							</form>
							<ul class="list-group bg-dark {{ $file['name'] }}" id="list">
								@foreach($file['content'] as $row)
									<li class="bg-dark text-white list-group-item list-group-item-dark d-flex align-items-center p-0 m-0 {{ $row['class'] }}">
										<div class="counter">
												<span>
													{{ $loop->index + 1 }}
												</span>
										</div>
										<div class="line">

											{{ $row['line'] }}
										</div>
									</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="{{ mix('/js/manifest.js') }}"></script>
	<script src="{{ mix('/js/vendor.js') }}"></script>
	<script src="{{ mix('/js/app.js') }}"></script>
	<script>
		const disabled = document.querySelectorAll('.list-disabled');

		function toggleHidden() {
			for (const item of disabled) {
				item.classList.toggle('list-disabled-hidden');
			}
		}

		function filter(search, list) {

			// Declare variables
			let input, filter, ul, li, a, i, txtValue;
			input = document.getElementById(search);
			filter = input.value.toLowerCase();
			ul = document.getElementById(list);
			li = ul.getElementsByTagName('li');

			// Loop through all list items, and hide those who don't match the search query

			for (i = 0; i < li.length; i++) {
				a = li[i].getElementsByTagName("div")[1];
				txtValue = a.textContent.trim() || a.innerText.trim();
				if (txtValue.toLowerCase().indexOf(filter) >= 0) {
					li[i].classList.remove('d-none');
					li[i].classList.add('d-flex');
				} else {
					li[i].classList.remove('d-flex');
					li[i].classList.add('d-none');
				}
			}
		}
	</script>

</body>
</html>
