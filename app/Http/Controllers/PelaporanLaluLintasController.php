<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PelaporanLaluLintas;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PelaporanLaluLintasController extends Controller
{
    public function index(): View
    {
        //get pelaporan jalan
        $pelaporanJalan = PelaporanLaluLintas::orderBy('id','DESC')->get();

        //grafik kategori
        $dataKategori = PelaporanLaluLintas::select(
            DB::raw("kategori as kategori"),
            DB::raw("count(id) as total")
        )->groupBy('kategori')
        ->get()->toArray();
        $labelKategori = ["jalan", "rambu"];
        $grafik["kategori"] = [0,0];
        foreach($dataKategori as $d){
            if($d["kategori"] == $labelKategori[0]){
                $grafik["kategori"][0] = $d['total'];
            }else if($d["kategori"] == $labelKategori[1]){
                $grafik["kategori"][1] = $d['total'];
            }
        }
        $grafik["kategori"] = json_encode($grafik["kategori"]);

        //grafik kecamatan
        $dataKecamatan = PelaporanLaluLintas::select(
            DB::raw("kecamatan as kecamatan"),
            DB::raw("count(id) as total")
        )->groupBy('kecamatan')
        ->get()->toArray();
        $labelKecamatan = ["binjai barat", "binjai kota", "binjai selatan", "binjai timur", "binjai utara"];
        $grafik["kecamatan"] = [0,0,0,0,0];
        // dump($dataKecamatan);
        foreach($dataKecamatan as $d){
            if($d["kecamatan"] == $labelKecamatan[0]){
                $grafik["kecamatan"][0] = $d['total'];
            }else if($d["kecamatan"] == $labelKecamatan[1]){
                $grafik["kecamatan"][1] = $d['total'];
            } else if($d["kecamatan"] == $labelKecamatan[2]){
                $grafik["kecamatan"][2] = $d['total'];
            }else if($d["kecamatan"] == $labelKecamatan[3]){
                $grafik["kecamatan"][3] = $d['total'];
            }else if($d["kecamatan"] == $labelKecamatan[4]){
                $grafik["kecamatan"][4] = $d['total'];
            }
        }
        // dd($grafik["kecamatan"]);
        $grafik["kecamatan"] = json_encode($grafik["kecamatan"]);



        //tipe kerusakan rambu
        $dataKerusakanRambu = PelaporanLaluLintas::select(
            DB::raw("kategori"),
            DB::raw("tipe_kerusakan as kerusakanrambu"),
            DB::raw("count(id) as total")
        )->where('kategori',"=","rambu")
        ->groupBy('kategori','tipe_kerusakan')
        ->get()->toArray();

        $labelKerusakanRambu = ["Pudar", "Lepas", "Tertutup Pohon", "Hilang", "Daun Rambu Hilang"];
        $grafik["kerusakanrambu"] = [0,0,0,0,0];

        foreach($dataKerusakanRambu as $d){
            if($d["kerusakanrambu"] == $labelKerusakanRambu[0]){
                $grafik["kerusakanrambu"][0]= $d['total'];
            }else if($d["kerusakanrambu"] == $labelKerusakanRambu[1]){
                $grafik["kerusakanrambu"][1]= $d['total'];
            } else if($d["kerusakanrambu"] == $labelKerusakanRambu[2]){
                $grafik["kerusakanrambu"][2]= $d['total'];
            }else if($d["kerusakanrambu"] == $labelKerusakanRambu[3]){
                $grafik["kerusakanrambu"][3]= $d['total'];
            }else if($d["kerusakanrambu"] == $labelKerusakanRambu[4]){
                $grafik["kerusakanrambu"][4]= $d['total'];
            }
        }
        $grafik["kerusakanrambu"] = json_encode($grafik["kerusakanrambu"]);

        //dampak kerusakan rambu
        $dataDampakKerusakanRambu = PelaporanLaluLintas::select(
            DB::raw("dampak as dampakkerusakanrambu"),
            DB::raw("count(id) as total")
        )->where('kategori',"=","rambu")
        ->groupBy('dampak')
        ->get()->toArray();

        $labelDampakKerusakanRambu = ["Kecelakaan Lalu Lintas", "Salah Arah", "Kemacetan", "Perjalanan Tidak Efisien"];
        $grafik["dampakkerusakanrambu"] = [0,0,0,0];

        foreach($dataDampakKerusakanRambu as $d){
            if($d["dampakkerusakanrambu"] == $labelDampakKerusakanRambu[0]){
                $grafik["dampakkerusakanrambu"][0]= $d['total'];
            }else if($d["dampakkerusakanrambu"] == $labelDampakKerusakanRambu[1]){
                $grafik["dampakkerusakanrambu"][1]= $d['total'];
            } else if($d["dampakkerusakanrambu"] == $labelDampakKerusakanRambu[2]){
                $grafik["dampakkerusakanrambu"][2]= $d['total'];
            }else if($d["dampakkerusakanrambu"] == $labelDampakKerusakanRambu[3]){
                $grafik["dampakkerusakanrambu"][3]= $d['total'];
            }
        }
        $grafik["dampakkerusakanrambu"] = json_encode($grafik["dampakkerusakanrambu"]);

        //kerusakan jalan
        $dataKerusakanJalan = PelaporanLaluLintas::select(
            DB::raw("kategori"),
            DB::raw("tipe_kerusakan as kerusakanjalan"),
            DB::raw("count(id) as total")
        )->where('kategori',"=","jalan")
        ->groupBy('kategori','tipe_kerusakan')
        ->get()->toArray();

        $labelKerusakanJalan = ["Berlubang", "Retak-retak", "Bergelombang", "Aspal Longsor", "Bahu Jalan Rusak"];
        $grafik["kerusakanjalan"] = [0,0,0,0,0];

        foreach($dataKerusakanJalan as $d){
            if($d["kerusakanjalan"] == $labelKerusakanJalan[0]){
                $grafik["kerusakanjalan"][0]= $d['total'];
            }else if($d["kerusakanjalan"] == $labelKerusakanJalan[1]){
                $grafik["kerusakanjalan"][1]= $d['total'];
            } else if($d["kerusakanjalan"] == $labelKerusakanJalan[2]){
                $grafik["kerusakanjalan"][2]= $d['total'];
            }else if($d["kerusakanjalan"] == $labelKerusakanJalan[3]){
                $grafik["kerusakanjalan"][3]= $d['total'];
            }else if($d["kerusakanjalan"] == $labelKerusakanJalan[4]){
                $grafik["kerusakanjalan"][4]= $d['total'];
            }
        }
        $grafik["kerusakanjalan"] = json_encode($grafik["kerusakanjalan"]);

        //dampak kerusakan jalan
        $dataDampakKerusakanJalan = PelaporanLaluLintas::select(
            DB::raw("dampak as dampakkerusakanjalan"),
            DB::raw("count(id) as total")
        )->where('kategori',"=","jalan")
        ->groupBy('dampak')
        ->get()->toArray();

        $labelDampakKerusakanJalan = ["Kemacetan ", "Lalu Lintas Terganggu", "Kecelakaan", "Meninggal Dunia", "Luka Ringan", "Pengiriman Terganggu"];
        $grafik["dampakkerusakanjalan"] = [0,0,0,0,0,0];

        foreach($dataDampakKerusakanJalan as $d){
            if($d["dampakkerusakanjalan"] == $labelDampakKerusakanJalan[0]){
                $grafik["dampakkerusakanjalan"][0]= $d['total'];
            }else if($d["dampakkerusakanjalan"] == $labelDampakKerusakanJalan[1]){
                $grafik["dampakkerusakanjalan"][1]= $d['total'];
            } else if($d["dampakkerusakanjalan"] == $labelDampakKerusakanJalan[2]){
                $grafik["dampakkerusakanjalan"][2]= $d['total'];
            }else if($d["dampakkerusakanjalan"] == $labelDampakKerusakanJalan[3]){
                $grafik["dampakkerusakanjalan"][3]= $d['total'];
            }else if($d["dampakkerusakanjalan"] == $labelDampakKerusakanJalan[4]){
                $grafik["dampakkerusakanjalan"][4]= $d['total'];
            }else if($d["dampakkerusakanjalan"] == $labelDampakKerusakanJalan[5]){
                $grafik["dampakkerusakanjalan"][5]= $d['total'];
            }
        }
        $grafik["dampakkerusakanjalan"] = json_encode($grafik["dampakkerusakanjalan"]);

         //dampak kerusakan jalan
        $dataStatus = PelaporanLaluLintas::select(
            DB::raw("status"),
            DB::raw("count(id) as total")
        )->groupBy('status')
        ->get()->toArray();


        $labelStatus = ["Laporan Masuk", "Laporan Ditindaklanjuti", "Proses Penanganan", "Penanganan Selesai"];
        $grafik["labelstatus"] = $labelStatus;
        $grafik["status"] = [0,0,0,0];
        foreach($dataStatus as $d){
            if($d["status"] == $labelStatus[0]){
                $grafik["status"][0]= $d['total'];
            }else if($d["status"] == $labelStatus[1]){
                $grafik["status"][1]= $d['total'];
            } else if($d["status"] == $labelStatus[2]){
                $grafik["status"][2]= $d['total'];
            }else if($d["status"] == $labelStatus[3]){
                $grafik["status"][3]= $d['total'];
            }
        }

        //render view with pelaporan jalan
        return view('PelaporanLaluLintas.index', compact('pelaporanJalan','grafik'));
    }

    public function create(): View
    {
        return view('PelaporanLaluLintas.create');
    }

    public function store(Request $request): View
    {
        //validate form
        $this->validate($request, [
            'image'         => 'required|image|mimes:jpeg,jpg,png|max:10048',
            'tipe_kerusakan' => 'required|min:2',
            'content'       => 'required|min:2',
            'latitude'      => 'required',
            'longitude'     => 'required',
            'kecamatan'        => 'required',
            'kategori'      => 'required',
            'dampak'        => 'required',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        // dd($image->hashName());

        //create pelaporan jalan
        $create = PelaporanLaluLintas::create([
            'title'         => "laporan",
            'image'         => $image->hashName(),
            'tipe_kerusakan'=> $request->tipe_kerusakan,
            'content'       => $request->content,
            'latitude'      => $request->latitude,
            'longitude'     => $request->longitude,
            'kecamatan'     => $request->kecamatan,
            'kategori'      => $request->kategori,
            'dampak'        => $request->dampak,
            'status'        => "Laporan Masuk"
        ]);

        //redirect to index
        return view('PelaporanLaluLintas.success',compact("create"));
    }

    public function show(string $id): View
    {
        //get pelaporan jalan by ID
        $pelaporanJalan = PelaporanLaluLintas::findOrFail($id);

        //render view with pelaporan jalan
        return view('PelaporanLaluLintas.show', compact('pelaporanJalan'));
    }

    public function destroy($id): RedirectResponse
    {
        // Get the PelaporanJalan by ID
        $pelaporanJalan = PelaporanLaluLintas::findOrFail($id);

        // Delete the image
        Storage::delete('public/PelaporanJalan/' . $pelaporanJalan->image);

        // Delete the PelaporanJalan
        $pelaporanJalan->delete();

        // Redirect to index
        return redirect()->route('pelaporan-lalu-lintas.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function updateStatus(Request $request, string $id): RedirectResponse
    {
        // Get the PelaporanJalan by ID
        $pelaporanJalan = PelaporanLaluLintas::findOrFail($id);

        // Delete the PelaporanJalan
        $pelaporanJalan->update([
            "status" => $request->status,
        ]);

        $pelaporanJalan = PelaporanLaluLintas::findOrFail($id);

        // Redirect to index
        return redirect()->route('pelaporan-lalu-lintas.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
}
