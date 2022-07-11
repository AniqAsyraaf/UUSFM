@extends('layouts.main')
@section('container')
@php
    $counter = 1;
    $blob = 0;
    $status = "";
@endphp

      <h2 style="text-align: center;">Booking</h2>

      @if(session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
      @endif
      
      <form action="/Booking">
        <div style="width: 252px" class="input-group mb-3">
          <input  type="text" class="form-control" id="searchID" placeholder="Booking ID" name="searchID">
          <button class="btn btn-success" type="submit">Filter</button>
        </div>
      </form>

      <!-- <a href="/Membership/create" class="btn btn-primary mb-3">Create New Feed</a> -->
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Customer Name</th>
              <th scope="col">Facilities</th>
              <th scope="col">Book Date</th>
              <th scope="col">Book Time</th>
              <th scope="col">Customer Phone No.</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
              
          @foreach($bookings as $booking)
            <tr>
              <td scope="row">{{$counter}}</td>
              <td scope="row">{{$booking['cName']}}</td>
              <td scope="row">{{$booking['sessionID']}} - {{$booking['sessionType']}}</td>
              <td scope="row">{{$booking['bookDate']}}</td>
              <td scope="row">{{$booking['bookTime']}}</td>
              <td scope="row">{{$booking['bookingReceipt']}}</td>
              <td scope="row">
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <table class="table table-hover table-sm  table-borderless">
                                <tbody>
                                  <tr>
                                        <th>Customer Name</th>
                                        <td>
                                          @foreach($customers as $customer)
                                          {{$customer->id}} {{$booking['cID']}}
                                            @if($customer['id'] == $booking['cID'])
                                              {{$customer->cName}} 
                                              @if($customer['cVerifyStatus'] == "Verified")
                                                <span data-feather="check"></span>
                                              @else
                                                <span data-feather="x"></span>
                                              @endif
                                            @endif
                                          @endforeach 
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Membership</th>
                                        <td>
                                        @foreach($customers as $customer)
                                          @if($customer['id'] == $booking['cID'])
                                            @foreach($memberships as $membership)
                                                @if($membership['cID'] == $customer['id'])
                                                  @if((($membership['membershipEntry'] > 0) || ($membership['membershipExpired'] >= Carbon\Carbon::today())) && ($membership['membershipStatus'] == "Approved"))
                                                    <a>Member</a>
                                                  @else
                                                    <a>Non-Member</a>
                                                  @endif
                                                @else
                                                  <a>Non-Member</a>
                                                @endif
                                              
                                            @endforeach 
                                          @endif
                                        @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Payment Proof</th>
                                        <td><img src="data:image/jpg;base64,{{ chunk_split(base64_encode($booking['bookingReceipt'] )) }}" alt="No payment receipt" class="img-fluid mb-2 border border-secondary" width="512" height="512"> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div> -->
                        </div>
                    </div>
                    
                <!-- modal button -->
                </div>
                @if($booking['bookingStatus'] == "Pending")
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Review</button>
                @endif
                
                @if($booking['bookingStatus'] == "Pending")
                  <form action="/Booking/{{ $booking->id }}" method="post" class="d-inline">
                      @method('PUT')
                      @csrf
                      <input id="toUpdate" type="hidden" name="toUpdate" value="Approved">
                      <input id="toUpdateVar" type="hidden" name="toUpdateVar" value="bookingStatus">
                      <button class="btn btn-success border-0" onclick="return confirm('Are you sure?')">Approve</button>
                  </form>
                  <form action="/Booking/{{ $booking->id }}" method="post" class="d-inline">
                      @method('PUT')
                      @csrf
                      <input id="toUpdate" type="hidden" name="toUpdate" value="Rejected">
                      <input id="toUpdateVar" type="hidden" name="toUpdateVar" value="bookingStatus">
                      <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')">Reject</button>
                  </form>
                @else
                  @if($booking['bookAttendance'] == "0")
                  <form action="/Booking/{{ $booking->id }}" method="post" class="d-inline">
                      @method('PUT')
                      @csrf
                      <input id="toUpdate" type="hidden" name="toUpdate" value="1">
                      <input id="toUpdateVar" type="hidden" name="toUpdateVar" value="bookAttendance">
                      <button class="btn btn-success border-0" onclick="return confirm('Are you sure?')">Check In</button>
                  </form>
                  @else
                  <form action="/Booking/{{ $booking->id }}" method="post" class="d-inline">
                      @method('PUT')
                      @csrf
                      <button class="btn btn-warning border-0" disabled>Checked In</button>
                  </form>
                  @endif
                @endif
               
              </td>
              <input id="id" type="hidden" name="id" value="{{ $booking->id }}">
            </tr>
            @php
                $counter ++;
            @endphp
          @endforeach
          </tbody>
        </table>
        {{ $bookings->links() }}
      </div>
<script type='text/javascript'>
    $(document).ready(function)
    {
        $('.')
    }
</script>
@endsection
    