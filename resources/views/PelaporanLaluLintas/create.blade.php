@extends('layouts.user_type.auth')

@section('content')
<div>
    <div class="container-fluid">
        <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="../assets/img/bimbingan-3.jpeg" alt="..." class="w-100 border-radius-lg shadow-sm">

                        </a>
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ __('Pelaporan Lalu Lintas') }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{ __('Kota Binjai') }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('pelaporan-lalu-lintas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="font-weight-bold">KATEGORI</label>
                        <select id="kategori" class="form-control @error('kategori') is-invalid @enderror" name="kategori">
                            <option value="">Pilih Kategori</option>
                            <option value="jalan" @if(old('kategori') === 'jalan') selected @endif>Jalan</option>
                            <option value="rambu" @if(old('kategori') === 'rambu') selected @endif>Rambu</option>
                        </select>

                        @error('kategori')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="font-weight-bold">TIPE KERUSAKAN</label>
                            <select class="form-control @error('tipe_kerusakan') is-invalid @enderror" name="tipe_kerusakan" id="tipeKerusakan">
                                <option value="">Pilih Tipe Kerusakan</option>
                            </select>

                            <!-- error message untuk tipe_kerusakan -->
                            @error('tipe_kerusakan')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label class="font-weight-bold">DAMPAK</label>
                            <select id="dampak" class="form-control @error('dampak') is-invalid @enderror" name="dampak">
                                <option value="">Pilih Dampak</option>
                            </select>

                            @error('dampak')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Tambahkan field untuk atribut-atribut pada model PelaporanJalan -->
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="font-weight-bold">LATITUDE</label>
                            <input id="latitude" type="text" class="form-control @error('latitude') is-invalid @enderror" name="latitude" value="{{ old('latitude') }}" placeholder="Masukkan Latitude" readonly>

                            @error('latitude')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label class="font-weight-bold">LONGITUDE</label>
                            <input id="longitude" type="text" class="form-control @error('longitude') is-invalid @enderror" name="longitude" value="{{ old('longitude') }}" placeholder="Masukkan Longitude" readonly>

                            @error('longitude')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Kecamatan</label>
                        <select class="form-control @error('alamat') is-invalid @enderror" name="kecamatan">
                            <option value="">Pilih Kecamatan</option>
                            <option value="binjai barat" @if(old('alamat') === 'binjai barat') selected @endif>Binjai Barat</option>
                            <option value="binjai kota" @if(old('alamat') === 'binjai kota') selected @endif>Binjai Kota</option>
                            <option value="binjai selatan" @if(old('alamat') === 'binjai selatan') selected @endif>Binjai Selatan</option>
                            <option value="binjai timur" @if(old('alamat') === 'binjai timur') selected @endif>Binjai Timur</option>
                            <option value="binjai utara" @if(old('alamat') === 'binjai utara') selected @endif>Binjai Utara</option>
                        </select>

                        @error('alamat')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">GAMBAR</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="imageInput" accept=".png, .jpg, .jpeg">

                        <!-- Display image preview -->
                        <img id="imagePreview" src="#" alt="Preview" style="display: none; max-width: 100%; max-height: 200px; margin-top: 10px;">

                        <!-- error message untuk image -->
                        @error('image')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">CATATAN</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="5" placeholder="Masukkan Konten Pelaporan">{{ old('content') }}</textarea>

                        <!-- error message untuk content -->
                        @error('content')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-md bg-gradient-success">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
                // Function to get the user's current location
            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else {
                    console.log("Geolocation is not supported by this browser.");
                }
            }

                // Function to display the latitude and longitude in the input fields
            function showPosition(position) {
                document.getElementById('latitude').value = position.coords.latitude;
                document.getElementById('longitude').value = position.coords.longitude;
            }

                // Get the location when the page loads
            window.onload = function() {
                getLocation();
            };

            function updateImpacts() {
                var category = document.getElementById('kategori').value;
                var impactField = document.getElementById('dampak');

            // Clear existing options
                impactField.innerHTML = "";

            // Set the appropriate options based on the selected category
                var impacts;
                if (category === 'jalan') {
                    impacts = [
                        'Kemacetan',
                        'Lalu lintas terganggu',
                        'Kecelakaan',
                        'Meninggal dunia',
                        'Cedera',
                        'Logistik terhambat'
                        ];
                } else if (category === 'rambu') {
                    impacts = [
                        'Kecelakaan lalu lintas',
                        'Kesalahan arah',
                        'Kemacetan',
                        'Perjalanan tidak efisien'
                        ];
                } else {
                // Default to an empty array if no category is selected
                    impacts = [];
                }

                var defaultOption = document.createElement('option');
                defaultOption.value = "";
                defaultOption.text = "Pilih Dampak Kerusakan";
                impactField.appendChild(defaultOption);

            // Create new option elements and append them to the select field
                for (var i = 0; i < impacts.length; i++) {
                    var option = document.createElement('option');
                    option.value = impacts[i];
                    option.text = impacts[i];
                    impactField.appendChild(option);
                }
            }

        // Add event listener to the category select field
            document.getElementById('kategori').addEventListener('change', updateImpacts);

        // Call the updateImpacts function on page load to initialize the impacts
            updateImpacts();

            function handleImagePreview() {
                var imageInput = document.getElementById('imageInput');
                var imagePreview = document.getElementById('imagePreview');

                imageInput.addEventListener('change', function() {
                    var file = imageInput.files[0];

                    if (file) {
                        var reader = new FileReader();

                        reader.addEventListener('load', function() {
                            imagePreview.src = reader.result;
                            imagePreview.style.display = 'block';
                        });

                        reader.readAsDataURL(file);
                    } else {
                        imagePreview.style.display = 'none';
                        imagePreview.src = '#';
                    }
                });
            }
    </script>

<script>
    // Function to handle the selected category and update the "TIPE KERUSAKAN" select options
    function handleCategoryChange() {
        var category = document.getElementById('kategori').value;
        var tipeKerusakan = document.getElementById('tipeKerusakan');

        // Clear existing options
        tipeKerusakan.innerHTML = "";

        // Set the appropriate options based on the selected category
        var tipeOptions;
        if (category === 'jalan') {
            tipeOptions = [
                'Berlubang',
                'Retak-retak',
                'Bergelombang',
                'Kerusakan Pada Bahu jalan',
                'Aspal Retak'
            ];
        } else if (category === 'rambu') {
            tipeOptions = [
                'Pudar',
                'Lepas',
                'Tertutup Tumbuhan',
                'Daun Rambu Patah',
                'Hilang',
                'Buram'
            ];
        } else {
            // Default to an empty array if no category is selected
            tipeOptions = [];
        }

        // Create a default "Pilih Tipe Kerusakan" option
        var defaultOption = document.createElement('option');
        defaultOption.value = "";
        defaultOption.text = "Pilih Tipe Kerusakan";
        tipeKerusakan.appendChild(defaultOption);

        // Create new option elements and append them to the "TIPE KERUSAKAN" select field
        for (var i = 0; i < tipeOptions.length; i++) {
            var option = document.createElement('option');
            option.value = tipeOptions[i];
            option.text = tipeOptions[i];
            tipeKerusakan.appendChild(option);
        }
    }

    // Add event listener to the category select field
    document.getElementById('kategori').addEventListener('change', handleCategoryChange);

    // Call the handleCategoryChange function on page load to initialize the "TIPE KERUSAKAN" select options
    handleCategoryChange();
</script>

@endsection
