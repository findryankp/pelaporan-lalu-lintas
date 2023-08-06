@extends('layouts.user_type.auth')

@section('content')

  <div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Masuk</p>
                <h5 class="font-weight-bolder mb-0">
                    {{$grafik["status"][0]}}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                <i class="ni ni-bell-55 text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Ditindaklanjuti</p>
                <h5 class="font-weight-bolder mb-0">
                    {{$grafik["status"][1]}}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-warning shadow text-center border-radius-md">
                <i class="ni ni-chart-bar-32 text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Penanganan</p>
                <h5 class="font-weight-bolder mb-0">
                    {{$grafik["status"][2]}}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-sound-wave text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Selesai</p>
                <h5 class="font-weight-bolder mb-0">
                    {{$grafik["status"][3]}}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                <i class="ni ni-trophy text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-lg-7 mb-lg-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-lg-6">
              <div class="d-flex flex-column h-100">
                <p class="mb-1 pt-2 text-bold text-dark">PTDI STTD</p>
                <h5 class="font-weight-bolder">Sekolah Tinggi Transportasi Darat</h5>
                <p class="mb-5">PTDI STTD memiliki visi sebagai pusat pendidikan transportasi darat modern, unggul dan profesional</p>
                <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="https://ptdisttd.ac.id/halaman-tentang">
                  Read More
                  <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                </a>
              </div>
            </div>
            <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
              <div class="bg-gradient-dark border-radius-lg h-100">
                <img src="../assets/img/shapes/waves-white.svg" class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                <div class="position-relative d-flex align-items-center justify-content-center h-100">
                  <img class="w-90 position-relative z-index-2" src="../assets/img/logo-sttd.png" alt="rocket">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-5">
      <div class="card h-100 p-3">
        <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('../assets/img/ivancik.jpg');">
          <span class="mask bg-gradient-dark"></span>
          <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
            <h5 class="text-white font-weight-bolder mb-2 pt-2">Pelaporan Lalu Lintas Berbasis Web</h5>
            <p class="text-white">Perencanaan web ini berasal dari masyarakat semakin terkoneksi dan memiliki akses ke teknologi. Tujuan dari sistem pelaporan berbasis web untuk meningkatkan keselamatan dan kenyamanan berlalu lintas, serta memberikan layanan yang lebih baik kepada masyarakat.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-lg-6 mb-1 ">
        <div class="card z-index-2">
            <div class="card-body p-3">
            <div class="chart">
                <canvas id="chartKategori"></canvas>
            </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 mb-1">
        <div class="card z-index-2">
            <div class="card-body p-3">
            <div class="chart">
                <canvas id="chartKecamatan"></canvas>
            </div>
            </div>
        </div>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-lg-6 mb-1 ">
        <div class="card z-index-2">
            <div class="card-body p-3">
            <div class="chart">
                <canvas id="chartKerusakanRambu"></canvas>
            </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 mb-1">
        <div class="card z-index-2">
            <div class="card-body p-3">
            <div class="chart">
                <canvas id="chartDampakKerusakanRambu"></canvas>
            </div>
            </div>
        </div>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-lg-6 mb-1 ">
        <div class="card z-index-2">
            <div class="card-body p-3">
            <div class="chart">
                <canvas id="chartKerusakanJalan"></canvas>
            </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 mb-1">
        <div class="card z-index-2">
            <div class="card-body p-3">
            <div class="chart">
                <canvas id="chartDampakKerusakanJalan"></canvas>
            </div>
            </div>
        </div>
    </div>
  </div>

  <div class="row my-4">
    <div class="col-lg-12 col-12">
      <div class="card">
        <div class="card-header pb-0">
          <div class="row">
            <div class="col-lg-12 col-12">
              <h6>Data Pelaporan</h6>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive">
            <table id="myTable" class="table align-items-center mb-0">
              <thead>
                <tr>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kecamatan</th>
                  <th class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kategori</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dampak</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tipe Kerusakan</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($pelaporanJalan as $i => $pelaporan)
                <tr>
                    <td class="text-center">{{ $i+1 }}</td>
                    <td class="text-center">{{ $pelaporan->kecamatan }}</td>
                    <td class="text-center">{{ $pelaporan->kategori }}</td>
                    <td class="text-center">{{ $pelaporan->dampak }}</td>
                    <td class="text-center">{{ $pelaporan->tipe_kerusakan }}</td>
                    <td class="text-center">
                        @if($pelaporan->status == "Laporan Masuk")
                            <span class="badge bg-gradient-info">Laporan Masuk</span>
                        @elseif($pelaporan->status == "Laporan Ditindaklanjuti")
                            <span class="badge bg-gradient-warning">Laporan Masuk</span>
                        @elseif($pelaporan->status == "Proses Penanganan")
                            <span class="badge bg-gradient-primary">Proses Penanganan</span>
                        @else
                            <span class="badge bg-gradient-success">Penanganan Selesai</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pelaporan-lalu-lintas.destroy', $pelaporan->id) }}" method="POST">
                            <a href="{{ route('pelaporan-lalu-lintas.show', $pelaporan->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                            @if (session('status'))
                            <a href="{{ route('pelaporan-lalu-lintas.edit', $pelaporan->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                            @endif
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">
                        <div class="alert alert-info text-white">
                            Data Pelaporan Jalan belum Tersedia.
                        </div>
                    </td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@push('dashboard')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
        //kategori
    let table = new DataTable('#myTable');

    const dataBarKategori = {
        labels: ["Jalan", "Rambu"],
        datasets: [{
            label: "Nama Kategori",
            data: JSON.parse('{{$grafik["kategori"]}}'),
            backgroundColor: "rgba(35, 177, 253, 0.2)",
            borderColor: "rgba(35, 177, 253, 0.84)",
            borderWidth: 1
        }]
    };

    const configBarKategori = {
        type: 'bar',
        data: dataBarKategori,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Kategori'
                }
            }
        }
    };

    const chartKategori = new Chart(document.getElementById('chartKategori'), configBarKategori);

        //kecamatan
    const dataBarKecamatan = {
        labels: ["Binjai Barat", "Binjai Kota", "Binjai Selatan", "Binjai Timur", "Binjai Utara"],
        datasets: [{
            label: "Nama Kecamatan",
            data: JSON.parse('{{$grafik["kecamatan"]}}'),
            backgroundColor: "rgba(250, 183, 54, 0.2)",
            borderColor: "rgba(250, 183, 54, 0.84)",
            borderWidth: 1
        }]
    };

    const configBarKecamatan = {
        type: 'bar',
        data: dataBarKecamatan,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Kecamatan'
                }
            }
        }
    };

    const myBarChartKec = new Chart(document.getElementById('chartKecamatan'), configBarKecamatan);

        //kerusakan rambu
    const dataBarKerusakanRambu = {
        labels: ["Pudar", "Lepas", "Tertutup Pohon", "Hilang", "Daun Rambu Hilang"],
        datasets: [{
            label: "Kerusakan Rambu",
            data: JSON.parse('{{$grafik["kerusakanrambu"]}}'),
            backgroundColor: "rgba(168,34,176, 0.2)",
            borderColor: "rgba(168,34,176, 1)",
            borderWidth: 1
        }]
    };

    const configBarKerusakanRambu = {
        type: 'bar',
        data: dataBarKerusakanRambu,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Kerusakan Rambu'
                }
            }
        }
    };

    const myBarChartKerusakanRambu = new Chart(document.getElementById('chartKerusakanRambu'), configBarKerusakanRambu);


        //dampak kerusakan rambu
    const dataBarDampakKerusakanRambu = {
        labels: ["Kecelakaan Lalu Lintas", "Salah Arah", "Kemacetan", "Perjalanan Tidak Efisien"],
        datasets: [{
            label: "Dampak Kerusakan Rambu",
            data: JSON.parse('{{$grafik["dampakkerusakanrambu"]}}'),
            backgroundColor: "rgba(168,34,176, 0.2)",
            borderColor: "rgba(168,34,176, 0.84)",
            borderWidth: 1
        }]
    };

    const configBarDampakKerusakanRambu = {
        type: 'bar',
        data: dataBarDampakKerusakanRambu,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Dampak Kerusakan Rambu'
                }
            }
        }
    };

    const chartDampakKerusakanRambu = new Chart(document.getElementById('chartDampakKerusakanRambu'), configBarDampakKerusakanRambu);


        //kerusakan jalan
    const dataBarKerusakanJalan = {
        labels: ["Berlubang", "Retak-retak", "Bergelombang", "Aspal Longsor", "Bahu Jalan Rusak"],
        datasets: [{
            label: "Kerusakan Jalan",
            data: JSON.parse('{{$grafik["kerusakanjalan"]}}'),
            backgroundColor: "rgba(246,73,57, 0.2)",
            borderColor: "rgba(246,73,57, 0.84)",
            borderWidth: 1
        }]
    };

    const configBarKerusakanJalan = {
        type: 'bar',
        data: dataBarKerusakanJalan,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Kerusakan Jalan'
                }
            }
        }
    };

    const chartKerusakanJalan = new Chart(document.getElementById('chartKerusakanJalan'), configBarKerusakanJalan);


        //dampak kerusakan jalan
    const dataBarDampakKerusakanJalan = {
        labels: ["Kemacetan ", "Lalu Lintas Terganggu", "Kecelakaan", "Meninggal Dunia", "Luka Ringan", "Pengiriman Terganggu"],
        datasets: [{
            label: "Dampak Kerusakan Jalan",
            data: JSON.parse('{{$grafik["dampakkerusakanjalan"]}}'),
            backgroundColor: "rgba(246,73,57, 0.2)",
            borderColor: "rgba(246,73,57, 0.84)",
            borderWidth: 1
        }]
    };

    const configBarDampakKerusakanJalan = {
        type: 'bar',
        data: dataBarDampakKerusakanJalan,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Dampak Kerusakan Jalan'
                }
            }
        }
    };

    const chartDampakKerusakanJalan = new Chart(document.getElementById('chartDampakKerusakanJalan'), configBarDampakKerusakanJalan);


        //message with toastr
    @if(session()->has('success'))
    toastr.success('{{ session('success') }}', 'BERHASIL!');
    @elseif(session()->has('error'))
    toastr.error('{{ session('error') }}', 'GAGAL!');
    @endif
</script>
@endpush

