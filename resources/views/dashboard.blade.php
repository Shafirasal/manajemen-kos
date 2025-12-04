@extends('layouts.template')

@section('title')
    | Dashboard
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
        @include('layouts.breadcrumb', ['list' => ['Home', 'Dashboard']])
    </div>

    <div class="section-body">

        <div class="alert alert-primary">
            Selamat datang, <strong>{{ Auth::user()->username }}</strong>!
        </div>

        <div class="row">

            {{-- TOTAL KAMAR --}}
            <div class="col-lg-3 col-md-6">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-door-open"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header"><h4>Total Kamar</h4></div>
                        <div class="card-body">{{ $totalKamar }}</div>
                    </div>
                </div>
            </div>

            {{-- TOTAL PENYEWA --}}
            <div class="col-lg-3 col-md-6">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header"><h4>Total Penyewa</h4></div>
                        <div class="card-body">{{ $totalPenyewa }}</div>
                    </div>
                </div>
            </div>

            {{-- TOTAL PENGELOLA --}}
            <div class="col-lg-3 col-md-6">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header"><h4>Total Pengelola</h4></div>
                        <div class="card-body">{{ $totalPengelola }}</div>
                    </div>
                </div>
            </div>

            {{-- TOTAL TRANSAKSI BULAN INI --}}
            {{-- <div class="col-lg-3 col-md-6">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header"><h4>Transaksi Bulan Ini</h4></div>
                        <div class="card-body">{{ $totalTransaksi }}</div>
                    </div>
                </div>
            </div> --}}

        </div>

    </div>
</section>
@endsection
