@extends('layouts.main')
@section('container')
<div clas="d-flex justify-content-between flex-wrap flex-md-nowrap align -items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Feed</h1>
</div>
<div class="col-lg-8">
    <form method="post" action="/Feed">
    @csrf

    <div class="mb-3">
        <label for="feedTitle" class="form-label">Title</label>
        <input type="text" class="form-control @error('feedTitle') is-invalid @enderror" id="feedTitle" name="feedTitle" required autofocus value="{{ old('feedTitle')}}">
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
        <input id="feedDesc" type="hidden" name="feedDesc" value="{{ old('feedDesc')}}">
        <trix-editor input="feedDesc"></trix-editor>
    </div>
    
    <button type="submit" class="btn btn-primary">Create Feed</button>
    </form>
</div>

<script>
    document.addEventListener(trix-file-accept, function(e))
    {
        e.preventDefault();
    }
</script>
@endsection