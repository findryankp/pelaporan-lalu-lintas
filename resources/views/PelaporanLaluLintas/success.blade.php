@extends('layouts.user_type.auth')

@section('content')
  <section class="min-vh-100 mb-8">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 mx-3 border-radius-lg" style="background-image: url('../assets/img/curved-images/curved14.jpg');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">Laporan Diterima</h1>
            <p class="text-lead text-white">Terima kasih telah memberikan laporan.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card">
            <div class="card-header text-center">
              <h5>ID Laporan : </h5>
              <h1 class="text-primary">{{ $create->id }}</h1>
              <p>dibuat pada : {{$create->created_at}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection

