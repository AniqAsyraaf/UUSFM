@extends('layouts.main')
@section('container')
<div clas="d-flex justify-content-between flex-wrap flex-md-nowrap align -items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Feed</h1>
</div>
<div class="col-lg-8">
    <form method="post" action="/Feed/{{ $feed->id }} ">
    @method('PUT')
    @csrf
    
    <div class="mb-3">
        <label for="feedTitle" class="form-label">Title</label>
        <input type="text" class="form-control @error('feedTitle') is-invalid @enderror" id="feedTitle" name="feedTitle" required autofocus value="{{ old('feedTitle', $feed->feedTitle) }}">
        @error('title')
        <div clas="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="feedCategory" class="form-label">Category</label>
        <select class="form-select" name="feedCategory" required>
            <option value="Undefined">--Select--</option>
            <option value="Announcement">Announcement</option>
            <option value="Promotion">Promotion</option>
            <option value="Notice">Notice</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="feedDesc" class="form-label">Description</label>
        @error('feedDesc')
        <p class="text-danger">{{ $message }}</p>
        @enderror
        <input id="feedDesc" type="hidden" name="feedDesc" value="{{ old('feedDesc' ,  $feed->feedDesc)}}">
        <trix-editor input="feedDesc"></trix-editor>
    </div>
    <input id="id" type="hidden" name="id" value="{{ old('feedDesc' ,$feed->id)}}">
    <button type="submit" class="btn btn-primary">Update Feed</button>
    <a href="/Feed" class="btn btn-danger">Cancel</a>
    </form>
    
</div>

<script>
    document.addEventListener(trix-file-accept, fucntion(e))
    {
        e.preventDefault();
    }
</script>
@endsection