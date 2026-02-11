@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
<div class="row">

    <div class="col-md-4">
        <div class="card card-admin p-3">
            <h5>Total Berita</h5>
            <h2>12</h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-admin p-3">
            <h5>Total Guru</h5>
            <h2>20</h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-admin p-3">
            <h5>Total Galeri</h5>
            <h2>35</h2>
        </div>
    </div>

</div>

<div class="card card-admin mt-4 p-4">
    <h5>Selamat Datang di Admin Dashboard 🎉</h5>
    <p>Silakan kelola website melalui menu di samping.</p>
</div>
@endsection
