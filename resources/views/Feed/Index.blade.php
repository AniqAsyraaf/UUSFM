@extends('layouts.main')
@section('container')
@php
    $counter = 1;
@endphp

      <h2 style="text-align: center;">Feed</h2>

      @if(session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
      @endif

      <!-- filter -->
      <form action="/Feed">
        <div style="width: 500px" class="input-group mb-3">
          <input  type="text" class="form-control" id="searchID" placeholder="Title" name="searchID">
          <select class="form-select" name="searchCategory">
              <option value="">Category</option>
              <option value="Announcement">Announcement</option>
              <option value="Promotion">Promotion</option>
              <option value="Notice">Notice</option>
          </select>
          <button class="btn btn-success" type="submit">Filter</button>
        </div>
      </form>

      <a href="/Feed/create" class="btn btn-primary mb-3">Create New Feed</a>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Feed Title</th>
              <th scope="col">Feed Date</th>
              <th scope="col">Feed Category</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
          @foreach($feeds as $feed)
            <tr>
              <td scope="row">{{ $counter }}</td>
              <td scope="row">{{$feed['feedTitle']}}</td>
              <td scope="row">{{$feed['created_at']}}</td>
              @if($feed['feedCategory'] == "Undefined")
                <td scope="row">{{$feed['feedCategory']}} <span style="color:red" data-feather="alert-circle"></span></td>          
              @else
                <td scope="row">{{$feed['feedCategory']}}</td>         
              @endif
              
              <td scope="row">
                <a href="/Feed/{{ $feed->id }}/edit" class="btn btn-warning">Edit</a>

                <form action="/Feed/{{ $feed->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
                
              </td>
            </tr>
            @php
                $counter ++;
            @endphp
          @endforeach
          </tbody>
        </table>

        {{ $feeds->links() }}
      </div>
  
@endsection
