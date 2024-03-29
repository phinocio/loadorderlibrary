<div class="row d-flex align-items-stretch">
	<div class="col-md-12">
		<div class="card text-white bg-dark mb-3">
			<div class="card-header d-flex justify-content-between align-items-start text-break">
				<div class="d-flex flex-column">
					<h3><a href="/lists/{{ $loadOrder->slug }}" class="text-capitalize">{{ $loadOrder->name }}</a>
						<small>
							{{ $loadOrder->version ? 'v' . $loadOrder->version : '' }}
						</small>
					</h3>

					<small>
						by <a href="{{ $loadOrder->author ? '/lists?author=' . $loadOrder->author->name : '#' }}">{{ $loadOrder->author ? $loadOrder->author->name : 'Anonymous' }}
							@if($loadOrder->author?->is_verified)
							<x-icons.verified />
							@endif
						</a>
					</small>
					@if($loadOrder->website)
					<a class="" href="https://{{ $loadOrder->website }}" target="_blank" rel="noopener noreferrer">{{ $loadOrder->website }}
						<x-icons.external-site />
					</a>
					@endif
					@if($loadOrder->discord)
					<a class="" href="https://{{ $loadOrder->discord }}" target="_blank" rel="noopener noreferrer">{{ $loadOrder->discord }}
						<x-icons.external-site />
					</a>
					@endif
					@if($loadOrder->readme)
					<a class="" href="https://{{ $loadOrder->readme }}" target="_blank" rel="noopener noreferrer">{{ $loadOrder->readme }}
						<x-icons.external-site />
					</a>
					@endif
				</div>

				<div class="d-flex flex-column align-items-end">
					<small>
						<em><a class="game-link" href="/lists?game={{ $loadOrder->game->name }}">{{ $loadOrder->game->name }}</a></em>
					</small>
					@if($loadOrder->is_private)
					<small class="display-block text-muted">
						<em>
							Private List
						</em>
					</small>
					@endif
				</div>
			</div>
			<div class="card-body">
				{{ $loadOrder->description ?? 'No description provided.' }}
			</div>

			<div class="card-footer text-muted d-flex justify-content-between align-items-center">
				<div class="d-flex flex-column">
					<small title="{{$loadOrder->updated_at->format('Y-m-d H:i:s T')}}">Updated {{ $loadOrder->updated_at->diffForHumans() }}</small>
					<small title="{{$loadOrder->created_at->format('Y-m-d H:i:s T')}}">Uploaded {{ $loadOrder->created_at->diffForHumans() }}</small>

					@if($loadOrder->expires_at)
					<small title="{{$loadOrder->expires_at->format('Y-m-d H:i:s T')}}">
						Expires {{ $loadOrder->expires_at->diffForHumans(
								['parts' => '1 | Carbon::ROUND | Carbon::SEQUENTIAL_PARTS_ONLY']

							)}}
					</small>
					@endif
				</div>
				<div class="d-flex">
					@if(auth()->check())
					@if($loadOrder->author == auth()->user())
					<a class="ml-2 btn btn-secondary btn-sm text-white" href="/lists/{{$loadOrder->slug}}/edit" role="button">Edit List</a>
					@endif
					@if($loadOrder->author == auth()->user() || auth()->user()->is_admin)
						<button type="button" class="btn btn-danger btn-sm inline ms-2" data-bs-toggle="modal" data-bs-target="#deleteList">
							Delete List
						</button>
						<!-- Delete list confirmation modal -->

						<div class="modal fade" id="deleteList" tabindex="-1" role="dialog" aria-labelledby="deleteListLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content bg-dark text-white">
									<div class="modal-header">
										<h5 class="modal-title text-danger">Delete List <b>{{$loadOrder->name}}</b></h5>
										<button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										Deleting a list is a permanent action. It cannot be undone and is fully deleted from the database. Make sure this is what you want before proceeding.
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
										<form class="form-inline ms-2" method="POST" action="/lists/{{$loadOrder->slug}}">
											@method('delete')
											@csrf
											<button class="ml-2 btn btn-danger btn-sm" href="#" role="button">Delete List</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					@endif
					@endif
					<form class="form-inline" action="/lists/{{$loadOrder->slug}}/download/all">
						@csrf
						<button class="ml-2 btn btn-secondary btn-sm text-white" href="#" aria-label="download-all" role="button">Download All Files</button>
					</form>
				</div>
			</div>
		</div>


	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="accordion" id="accordion">
			@foreach($files as $file)
			<div class="accordion-item bg-dark mb-1" id='{{$file['name']}}'>
				<div class="accordion-header d-flex justify-content-between align-items-center pe-3">
					<h2 class="m-0 p-0" id="heading{{$loop->index}}">
						<button class="accordion-button collapsed bg-dark text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$loop->index}}" aria-expanded="false" aria-controls="collapse{{$loop->index}}">
							<span class="text-white"><b>&plus;</b></span> <b>{{ $file['name'] }}</b>
						</button>

					</h2>
					<div class="d-flex justify-content-between">
						<form class="form-inline" action="/lists/{{$loadOrder->slug}}/download/{{ $file['name'] }}">
							@csrf
							<button class="btn btn-secondary btn-sm text-white" href="#" aria-label="download" role="button">Download File</button>
						</form>

						<button class="btn btn-link btn-sm text-white ms-2 p-0" href="#" aria-label="download" role="button" title='Embed file' data-bs-toggle="modal" data-bs-target="#embedModal{{$loop->index}}"><x-icons.embed /></button>
						<!-- absolutely horrible way of doing this, but refactor coming soon (TM) so /shrug -->
						<div class="modal fade" id="embedModal{{$loop->index}}" tabindex="-1" aria-labelledby="embedModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered modal-dark">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="embedModalLabel">Embed {{ $file['name'] }}</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<p>
											Feel free to remove the `allow-scripts` from the sandbox attribute. It's there to allow filtering and toggling of disabled mods for modlist.txt, but adds some insecurity.
										</p>
										<code>
											&lt;iframe
											src="{{config('app.url')}}/lists/{{$loadOrder->slug}}/embed/{{$file['name']}}"
											width="875"
											height="1000"
											sandbox="allow-scripts"
											&gt;&lt;/iframe&gt;
										</code>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="collapse{{$loop->index}}" class="{{ $file['name'] }} accordion-collapse collapse" aria-labelledby="heading{{$loop->index}}" data-bs-parent="#accordion">
					<div class="accordion-body text-white p-0">
						<form class="form">
							<div class="input-group">
								<span class="input-group-text" id="filter{{$loop->index}}label">Filter</span>
								<input class="form-control" type="search" placeholder="Filter..." aria-labelledby="filter{{$loop->index}}label" onkeyup="filter('filter{{$loop->index}}', 'list{{$loop->index}}')" id="filter{{$loop->index}}">
							</div>

							@if($file['name'] == 'modlist.txt')
							<div class="form-check form-switch ms-10">
								<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick="toggleHidden()">
								<label class="form-check-label" for="flexCheckDefault">
									Show Disabled
								</label>
							</div>
							@endif
						</form>
						<ul class="list-group bg-dark {{ $file['name'] }}" id="list{{$loop->index}}">
							@if($file['name'] != 'modlist.txt')
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
							@else
								@foreach($file['content'][0] as $row)
									@if($row['name'] == 'default')
										@foreach($row['content'] as $line)
											<li class="bg-dark text-white list-group-item list-group-item-dark d-flex align-items-center p-0 m-0">
												<div class="counter">
														<span>
															{{ $loop->index + 1 }}
														</span>
												</div>
												<div class="line">
													{{ $line['line'] }}
												</div>
											</li>
										@endforeach
									@else
										<details open>
											<summary class="bg-dark text-white list-group-item list-group-item-dark d-flex align-items-center p-0 m-0 list-separator">
												{{ $row['name'] }}
											</summary>
											@foreach($row['content'] as $line)
												<li class="bg-dark text-white list-group-item list-group-item-dark d-flex align-items-center p-0 m-0 {{$line['class']}}">
													<div class="counter">
														<span>
															{{ $line['index'] }}
														</span>
													</div>
													<div class="line">
														{{ $line['line'] }}
													</div>
												</li>
											@endforeach
										</details>
									@endif
								@endforeach
							@endif
						</ul>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>

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

	const hash = window.location.hash.replace('#', '');
	if(hash) {
		document.getElementsByClassName(hash)[0].classList.add('show');
	}

	window.onhashchange = function() {
		const hash = window.location.hash.replace('#', '');
		document.getElementsByClassName(hash)[0].classList.add('show');
	}



</script>
