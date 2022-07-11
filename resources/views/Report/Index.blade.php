@extends('layouts.main')
@section('container')
@php
    $counter = 1;
@endphp

      <h2 style="text-align: center;">Report</h2>

      <canvas class="my-4 w-100 chartjs-render-monitor" id="myChart" width="1152" height="486" style="display: block; width: 1152px; height: 486px;"></canvas>

@endsection
    