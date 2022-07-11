@extends('layouts.main')
@section('container')
<div clas="d-flex justify-content-between flex-wrap flex-md-nowrap align -items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add New Guest</h1>
</div>
<div class="col-lg-8">
    <form method="post" action="/Booking">
    @csrf

    <div class="mb-3">
        <label for="cName" class="form-label">Name</label>
        <input type="text" class="form-control @error('cName') is-invalid @enderror" id="cName" name="cName" required autofocus value="{{ old('cName')}}">
        @error('title')
        <div clas="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="phoneNum" class="form-label">Phone Number</label>
        <input type="text" class="form-control @error('phoneNum') is-invalid @enderror" id="phoneNum" name="phoneNum" required autofocus value="{{ old('phoneNum')}}">
        @error('title')
        <div clas="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <input id="id" type="hidden" name="id" value="{{ $session->id }}">
    <input id="sessionType" type="hidden" name="sessionType" value="{{ $session->sessionType }}">
    <input id="sessionDate" type="hidden" name="sessionDate" value="{{ $session->sessionDate }}">
    <input id="sessionTime" type="hidden" name="sessionTime" value="{{ $session->sessionTime }}">
    
    <button type="submit" class="btn btn-primary">Add Guest</button>
    </form>
</div>

<script>
    
</script>
@endsection