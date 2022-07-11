@extends('layouts.main')
@section('container')

<script>
  function clear() {

    alert("clear");
  }
    function validatedate()
    {
      var date = document.getElementById('monday').value;
      if(date('D', date) === 'Mon')
      {

        alert(date);
          
      } 
      else
      {
        alert('Please choose valid date');
        return false;
      }
    }
</script>

<div clas="d-flex justify-content-between flex-wrap flex-md-nowrap align -items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Gymnasium Session</h1>
</div>
<div class="col-lg-8">
    <form method="post" action="/Gymnasium">
    @csrf

    <div class="table" >
                    <table class="table caption-top">
                        <thead>
                          <tr>
                            <th scope="col">Day</th>
                            <th scope="col">Date</th>
                            <th scope="col">Availability</th>
                          </tr>
                        </thead>
                        <tbody>
    <!-- MONDAY -->                       
                          <tr>
                            <th scope="row">Monday</th>
                            <td>                               
                                <input class="form-select" type="date" id="monday" name="monday" value="{{ old('monday')}}" required>                              
                            </td>
                            <td>                               
                              <select class="form-select" name="sessionStatusMon" required>
                                  <option value="Open">Open</option>
                                  <option value="Close">Close</option>
                              </select>                              
                            </td>
                          </tr>
    <!-- TUESDAY -->                      
                          <tr>
                            <th scope="row">Tuesday</th>
                            <td>                               
                                <input class="form-select" type="date" id="tuesday" name="tuesday" value="{{ old('tuesday')}}" required>                              
                            </td>
                            <td>                               
                              <select class="form-select" name="sessionStatusTue" required>
                                  <option value="Open">Open</option>
                                  <option value="Close">Close</option>
                              </select>                              
                            </td>
                          </tr>
    <!-- WEDNESDAY -->                      
                          <tr>
                            <th scope="row">Wednesday</th>
                            <td>                               
                                <input class="form-select" type="date" id="wednesday" name="wednesday" value="{{ old('wednesday')}}" required>                              
                            </td>
                            <td>                               
                              <select class="form-select" name="sessionStatusWed" required>
                                  <option value="Open">Open</option>
                                  <option value="Close">Close</option>
                              </select>                              
                            </td>
                          </tr>
    <!-- THURSDAY -->                      
                          <tr>
                            <th scope="row">Thursday</th>
                            <td>                               
                                <input class="form-select" class="form-select" type="date" id="thursday" value="{{ old('thursday')}}" name="thursday" required>                              
                            </td>
                            <td>                               
                              <select class="form-select" name="sessionStatusThu" required>
                                  <option value="Open">Open</option>
                                  <option value="Close">Close</option>
                              </select>                              
                            </td>
                          </tr>
    <!-- FRIDAY -->                      
                          <tr>
                            <th scope="row">Friday</th>
                            <td>                               
                                <input class="form-select" type="date" id="friday" name="friday" value="{{ old('monday')}}" required>                              
                            </td>
                            <td>                               
                              <select class="form-select" name="sessionStatusFri" required>
                                  <option value="Open">Open</option>
                                  <option value="Close">Close</option>
                              </select>                              
                            </td>
                          </tr>
    <!-- SATURDAY -->                      
                          <tr>
                            <th scope="row">Saturday</th>
                            <td>                               
                                <input class="form-select" type="date" id="saturday" name="saturday" value="{{ old('saturday')}}" required>                              
                            </td>
                            <td>                               
                              <select class="form-select" name="sessionStatusSat" required>
                                  <option value="Open">Open</option>
                                  <option value="Close">Close</option>
                              </select>                              
                            </td>
                          </tr>
    <!-- SUNDAY -->                      
                          <tr>
                            <th scope="row">Sunday</th>
                            <td>                               
                                <input class="form-select" type="date" id="sunday" name="sunday" value="{{ old('sunday')}}" required>                              
                            </td>
                            <td>                               
                              <select class="form-select" name="sessionStatusSun" required>
                                  <option value="Open">Open</option>
                                  <option value="Close">Close</option>
                              </select>                              
                            </td>
                          </tr>
                          
                           
                        </tbody>
                  </table>
                    
    </div>
    <button  class="btn btn-primary" onclick="clear()">Create Sessions</button>
    </form>
</div>


@endsection