@extends('layouts.main')
@section('container')
@php
    $counter = 1;
@endphp

<style>
a.disabled {
  pointer-events: none;
  cursor: default;
}
</style>
      <h2 style="text-align: center;">Stadium Session</h2>

      @if(session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
      @endif
      <form action="/Stadium">
        <div style="width: 252px" class="input-group mb-3">
          <input  type="date" class="form-control" id="searchDate" name="searchDate">
          <button class="btn btn-success" type="submit">Filter</button>
        </div>
      </form>
      
      <a href="/Stadium/create" class="btn btn-primary mb-3">Create New Stadium Session</a>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Day</th>
              <th scope="col">Date</th>
              <th scope="col">Time</th>
              <th scope="col">Capacity</th>
              <th scope="col">Description</th>
              <th scope="col">Status</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
          @foreach($sessions as $session)
            <tr>
              <td scope="row">{{ $counter }}</td>
              <td scope="row">{{$session['sessionDay']}}</td>
              <td scope="row">{{$session['sessionDate']}}</td>
              <td scope="row">{{$session['sessionTime']}}</td>
              <td scope="row">{{$session['sessionCurrGuestCap']}}/{{$session['sessionGuestCap']}}</td>
              <td scope="row">{{$session['sessionDesc']}}</td>
              
              <td scope="row">
                @if($session['sessionStatus'] == "Open")
                <form method="post" action="/Stadium/{{ $session->id }}">
                  @method('PUT')
                  @csrf
                  <input id="sessionStatus" type="hidden" name="sessionStatus" value="Close">
                  <button type="submit" class="btn btn-success">Open</button>
                </form>
                @else
                <form method="post" action="/Stadium/{{ $session->id }}">
                  @method('PUT')
                  @csrf
                  <input id="sessionStatus" type="hidden" name="sessionStatus" value="Open">
                  <button type="submit" class="btn btn-danger">Close</button>
                </form>
                @endif
              </td>
              <td scope="row">
                @if($session['sessionCurrGuestCap'] == $session['sessionGuestCap'])
                  <a href="/Booking/{{ $session->id }}" class="btn btn-warning disabled">Full</a>
                @else
                  <a href="/Booking/{{ $session->id }}" class="btn btn-primary">Add Guest</a>
                @endif
              </td>
            </tr>
            @php
                $counter ++;
            @endphp
          @endforeach
          </tbody>
        </table>

        {{ $sessions->links() }}
      </div>

@endsection
    