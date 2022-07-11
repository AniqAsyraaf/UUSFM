@extends('layouts.main')
@section('container')
@php
    $counter = 1;
    $blob = 0;
    $status = "";
@endphp

      <h2 style="text-align: center;">Membership</h2>

      @if(session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
      @endif

      <form action="/Membership">
        <div style="width: 252px" class="input-group mb-3">
          <input  type="text" class="form-control" id="searchID" placeholder="Customer ID" name="searchID">
          <button class="btn btn-success" type="submit">Filter</button>
        </div>
      </form>

      <!-- <a href="/Membership/create" class="btn btn-primary mb-3">Create New Feed</a> -->
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Membership Type</th>
              <th scope="col">Application Date</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
              
          @foreach($memberships as $membership)
            <tr>
              <td scope="row">{{$counter}}</td>
              <td scope="row">{{$membership['membershipType']}}</td>
              <td scope="row">{{$membership['created_at']}}</td>
              <td scope="row">

                
                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{$membership->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Details Preview</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          
                          <table class="table table-hover table-sm  table-borderless">
                                <tbody>
                                  <tr>
                                        <th>Customer Name</th>
                                        <td>@foreach($customers as $customer)
                                        {{$customer->id}} {{$membership['cID']}}
                                        @if($customer['id'] == $membership['cID'])
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
                                        <th>Membership Type</th>
                                        <td>{{$membership->membershipType}}  </td>
                                    </tr>
                                    <tr>
                                        <th>Payment Proof</th>
                                        <td><img src="data:image/jpg;base64,{{ chunk_split(base64_encode($membership['membershipReceipt'] )) }}" alt="Payment Receipt" class="img-fluid mb-2 border border-secondary" width="512" height="512"> </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- <td scope="row">{{$membership->membershipType}}</td>
                            <td scope="row">{{$membership['membershipType']}}</td>
                            <td scope="row">{{$membership['created_at']}}</td> -->
                             
                          </div>
                          <!-- <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Save changes</button>
                          </div> -->
                        </div>
                    </div>
                    
                </div>
                <!-- <img src="data:image/png;base64,{{ $membership->membershipReceipt }}" alt="Payment Receipt" class="img-fluid mb-2 border border-secondary" width="128" height="128" /> -->
                   
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$membership->id}}">Review</button>
                
                @if($membership['membershipStatus'] == "Pending")
                    <form action="/Membership/{{ $membership->id }}" method="post" class="d-inline">
                        @method('PUT')
                        @csrf
                        <input id="membershipStatus" type="hidden" name="membershipStatus" value="Approved">
                        <button class="btn btn-success border-0" onclick="return confirm('Are you sure?')">Approve</button>
                    </form>
                    <form action="/Membership/{{ $membership->id }}" method="post" class="d-inline">
                        @method('PUT')
                        @csrf
                        <input id="membershipStatus" type="hidden" name="membershipStatus" value="Rejected">
                        <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')">Reject</button>
                    </form>
                @endif
               
              </td>
            </tr>
            @php
                $counter ++;
            @endphp
          @endforeach
          </tbody>
        </table>
        {{ $memberships->links() }}
      </div>
<script type='text/javascript'>
    $(document).ready(function)
    {
        $('.')
    }
</script>
@endsection
    