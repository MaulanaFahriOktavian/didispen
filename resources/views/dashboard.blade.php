@extends('layouts.student')

@section('content')

<h1 class="text-3xl font-bold">

Dashboard Siswa

</h1>

<p class="mt-3">

Selamat datang,
{{ auth('student')->user()->name }}

</p>

@endsection