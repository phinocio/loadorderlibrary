<form method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">List Name</label>
        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id=" name" value="{{ old('name') }}">
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3" value="{{ old('description') }}"></textarea>
        @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="game">Game</label>
        <select name="games" class="form-control @error('games') is-invalid @enderror" id="game">
            <option value="">-Choose Game-</option>
            @foreach($games as $game)
            <option value={{ $game->id }} @if(old('games')==$game->id) selected @endif> {{ $game->name }}</option>
            @endforeach
        </select>
        @error('games')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-check form-check-inline">
        <input name="private" class="form-check-input @error('private') is-invalid @enderror" type="checkbox" value="" id="private" aria-describedby="privateHelp">
        <label class="form-check-label" for="private">
            Private?
        </label>
        @error('private')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <small id="privateHelp" class="form-text text-muted">
        Private lists will not appear on the Browse Lists page, but can be viewed directly with the link, or from Your Lists.
    </small>

    <div class="form-group">
        <label for="files">Choose Files</label>
        <input name="files[]" type="file" class="form-control-file @error('files.*') is-invalid @enderror" id="files" accept=".txt,.ini" multiple required>
        @error('files.*')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <button class="btn btn-primary" type="submit">Upload</button>
</form>