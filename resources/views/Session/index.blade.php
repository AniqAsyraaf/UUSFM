@extends('layouts.main')
@section('container')
@php
    $counter = 1;
    $blob = 0;
    $status = "";
@endphp

<h2 style="text-align: center;">Facilties & Sessions</h2>
<style>
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
</style>
<div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid">
                            
                            <div class="row">
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-primary text-white mb-4">
                                        <div class="card-body"><b>Gymnasium</b></div>
                                        <img src="{{ asset('img/gymnasium.jpg') }}" alt="Trulli" width="300" height="200"  class="center">
                                        <br>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="/Gymnasium"><b>Manage</b></a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-warning text-white mb-4">
                                        <div class="card-body"><b>Stadium</b></div>
                                        <img src="{{ asset('img/stadium.jpg') }}" alt="Trulli" width="300" height="200" class="center">
                                        <br>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            
                                            <a class="small text-white stretched-link" href="/Stadium"><b>Manage</b></a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-success text-white mb-4">
                                        <div class="card-body"><b>Football Field</b></div>
                                        <img src="{{ asset('img/football_field.png') }}" alt="Trulli" width="300" height="200" class="center">
                                        <br>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="/FootballField"><b>Manage</b></a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         
                            
                        </div>
                    </main>
                    <footer class="py-4 bg-light mt-auto">
                        <div class="container-fluid">
                            <div class="d-flex align-items-center justify-content-between small">
                                
                        </div>
                    </footer>
                </div>
@endsection