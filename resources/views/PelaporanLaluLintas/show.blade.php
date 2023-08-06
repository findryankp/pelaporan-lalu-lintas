@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container mt-5 mb-5">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <img src="{{ asset('storage/posts/'.$pelaporanJalan->image) }}" class="w-100 rounded mb-2">
                                    @auth
                                    <form action="{{ route('updateStatus', $pelaporanJalan->id) }}" method="POST">
                                        @csrf <!-- CSRF protection -->
                                        <label for="status"><strong>Update Status:</strong></label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="{{$pelaporanJalan->status}}">{{$pelaporanJalan->status}}</option>
                                            <hr>
                                            <option value="" disabled>Pilih Status</option>
                                            <option value="Laporan Masuk">Laporan Masuk</option>
                                            <option value="Laporan Ditindaklanjuti">Laporan Ditindaklanjuti</option>
                                            <option value="Proses Penanganan">Proses Penanganan</option>
                                            <option value="Penanganan Selesai">Penanganan Selesai</option>
                                        </select>
                                        <br>
                                        <button type="submit" class="btn btn-warning">Update Status</button>
                                    </form>
                                    @endauth
                                </div>

                                <div class="col-6">
                                    <p><strong>Status:</strong>
                                    @if($pelaporanJalan->status == "Laporan Masuk")
                                        <span class="badge bg-gradient-info">Laporan Masuk</span>
                                    @elseif($pelaporanJalan->status == "Laporan Ditindaklanjuti")
                                        <span class="badge bg-gradient-warning">Laporan Masuk</span>
                                    @elseif($pelaporanJalan->status == "Proses Penanganan")
                                        <span class="badge bg-gradient-primary">Proses Penanganan</span>
                                    @else
                                        <span class="badge bg-gradient-success">Penanganan Selesai</span>
                                    @endif
                                    </p>
                                    <div class="form-group">
                                        <label class="font-weight-bold">Latitude</label>
                                        <input id="latitude" type="text" class="form-control" value="{{ $pelaporanJalan->latitude }}"  readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold">Longitude</label>
                                        <input id="latitude" type="text" class="form-control" value="{{ $pelaporanJalan->longitude }}"  readonly>
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Kecamatan</label>
                                        <input id="Kecamatan" type="text" class="form-control" value="{{ $pelaporanJalan->kecamatan }}"  readonly>
                                    </div>


                                    <div class="form-group">
                                        <label class="font-weight-bold">Kategori</label>
                                        <input id="Kategori" type="text" class="form-control" value="{{ $pelaporanJalan->kategori }}"  readonly>
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Dampak</label>
                                        <input id="Dampak" type="text" class="form-control"
                                         value="{{ $pelaporanJalan->dampak }}"  readonly>
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Tipe Kerusakan</label>
                                        <input id="Tipe Kerusakan" type="text" class="form-control"
                                         value="{{ $pelaporanJalan->tipe_kerusakan }}"  readonly>
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Catatan</label>
                                        <p class="tmt-3">
                                            {!! $pelaporanJalan->content !!}
                                        </p>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>\
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
    //message with toastr
            @if(session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');

            @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');

            @endif
        </script>
    </div>
</div>
@endsection
