<?php

namespace App\Http\Controllers;

use App\Models\last_update_data;
use App\Models\paket_nasional;
use App\Models\userr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class crud extends Controller
{
    //
    public function tambah(Request $request)
    {
        // $tambah = new userr;
        // $tambah->name = $request->name;
        // $tambah->email = $request->email;
        // $tambah->phone = $request->phone;
        // $tambah->address = $request->address;
        // $tambah->save();

        // DB::table('users')->insert([
        //     'name' => $request->input('name'),
        //     'email' => $request->input('email'),
        //     'phone' => $request->input('phone'),
        //     'address' => $request->input('address'),
        // ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');

        // 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        // 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
        $data = array('name' => $name, "email" => $email, "address" => $address, "phone" => $phone, "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s'));
        DB::table('users')->insert($data);

        //return redirect('homepage');
    }
    public function edit(Request $request, $id)
    {
        DB::table('users')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->address,
            'address' => $request->phone,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
    public function hapus($id)
    {
        $user = userr::findOrFail($id);
        $user->delete();
    }

    public function createPaketNasional(Request $request)
    {
        $id_paket = $request->id_paket;
        $paket = $request->paket;
        $pagu = $request->pagu;
        $pengadaan = $request->pengadaan;
        $produk = $request->produk;
        $usaha = $request->usaha;
        $metode = $request->metode;
        $pemilihan = $request->pemilihan;
        $klpd = $request->klpd;
        $satuan = $request->satuan;
        $lokasi = $request->lokasi;
        try {
            $paketNasional = new paket_nasional();
            $paketNasional->id_paket = $request->id_paket;
            $paketNasional->paket = $request->paket;
            $paketNasional->pagu = $request->pagu;
            $paketNasional->pengadaan = $request->pengadaan;
            $paketNasional->produk = $request->produk;
            $paketNasional->usaha = $request->usaha;
            $paketNasional->metode = $request->metode;
            $paketNasional->pemilihan = $request->pemilihan;
            $paketNasional->klpd = $request->klpd;
            $paketNasional->satuan = $request->satuan;
            $paketNasional->lokasi = $request->lokasi;
            $paketNasional->save();
            echo 'berhasil';
        } catch (Exception $e) {
            echo 'gagal';
        }
    }

    public function getDataAPI()
    {
        $startData = 0;
        $endData = 0;
        $length = 5000;
        $lastUpdateData = last_update_data::max('id');
        if ($lastUpdateData != null) {
            $startData = last_update_data::find($lastUpdateData)->end_data;
            $endData = $startData;
        }
        $urlAPI = 'https://sirup.lkpp.go.id/sirup/ro/caripaket2/search?tahunAnggaran=2023&jenisPengadaan=&metodePengadaan=&minPagu=&maxPagu=&bulan=&lokasi=&kldi=&pdn=&ukm=&draw=4&columns%5B0%5D%5Bdata%5D=&columns%5B0%5D%5Bname%5D=&columns%5B0%5D%5Bsearchable%5D=false&columns%5B0%5D%5Borderable%5D=false&columns%5B0%5D%5Bsearch%5D%5Bvalue%5D=&columns%5B0%5D%5Bsearch%5D%5Bregex%5D=false&columns%5B1%5D%5Bdata%5D=paket&columns%5B1%5D%5Bname%5D=&columns%5B1%5D%5Bsearchable%5D=true&columns%5B1%5D%5Borderable%5D=true&columns%5B1%5D%5Bsearch%5D%5Bvalue%5D=&columns%5B1%5D%5Bsearch%5D%5Bregex%5D=false&columns%5B2%5D%5Bdata%5D=pagu&columns%5B2%5D%5Bname%5D=&columns%5B2%5D%5Bsearchable%5D=true&columns%5B2%5D%5Borderable%5D=true&columns%5B2%5D%5Bsearch%5D%5Bvalue%5D=&columns%5B2%5D%5Bsearch%5D%5Bregex%5D=false&columns%5B3%5D%5Bdata%5D=jenisPengadaan&columns%5B3%5D%5Bname%5D=&columns%5B3%5D%5Bsearchable%5D=true&columns%5B3%5D%5Borderable%5D=true&columns%5B3%5D%5Bsearch%5D%5Bvalue%5D=&columns%5B3%5D%5Bsearch%5D%5Bregex%5D=false&columns%5B4%5D%5Bdata%5D=isPDN&columns%5B4%5D%5Bname%5D=&columns%5B4%5D%5Bsearchable%5D=true&columns%5B4%5D%5Borderable%5D=true&columns%5B4%5D%5Bsearch%5D%5Bvalue%5D=&columns%5B4%5D%5Bsearch%5D%5Bregex%5D=false&columns%5B5%5D%5Bdata%5D=isUMK&columns%5B5%5D%5Bname%5D=&columns%5B5%5D%5Bsearchable%5D=true&columns%5B5%5D%5Borderable%5D=true&columns%5B5%5D%5Bsearch%5D%5Bvalue%5D=&columns%5B5%5D%5Bsearch%5D%5Bregex%5D=false&columns%5B6%5D%5Bdata%5D=metode&columns%5B6%5D%5Bname%5D=&columns%5B6%5D%5Bsearchable%5D=true&columns%5B6%5D%5Borderable%5D=true&columns%5B6%5D%5Bsearch%5D%5Bvalue%5D=&columns%5B6%5D%5Bsearch%5D%5Bregex%5D=false&columns%5B7%5D%5Bdata%5D=pemilihan&columns%5B7%5D%5Bname%5D=&columns%5B7%5D%5Bsearchable%5D=true&columns%5B7%5D%5Borderable%5D=true&columns%5B7%5D%5Bsearch%5D%5Bvalue%5D=&columns%5B7%5D%5Bsearch%5D%5Bregex%5D=false&columns%5B8%5D%5Bdata%5D=kldi&columns%5B8%5D%5Bname%5D=&columns%5B8%5D%5Bsearchable%5D=true&columns%5B8%5D%5Borderable%5D=true&columns%5B8%5D%5Bsearch%5D%5Bvalue%5D=&columns%5B8%5D%5Bsearch%5D%5Bregex%5D=false&columns%5B9%5D%5Bdata%5D=satuanKerja&columns%5B9%5D%5Bname%5D=&columns%5B9%5D%5Bsearchable%5D=true&columns%5B9%5D%5Borderable%5D=true&columns%5B9%5D%5Bsearch%5D%5Bvalue%5D=&columns%5B9%5D%5Bsearch%5D%5Bregex%5D=false&columns%5B10%5D%5Bdata%5D=lokasi&columns%5B10%5D%5Bname%5D=&columns%5B10%5D%5Bsearchable%5D=true&columns%5B10%5D%5Borderable%5D=true&columns%5B10%5D%5Bsearch%5D%5Bvalue%5D=&columns%5B10%5D%5Bsearch%5D%5Bregex%5D=false&columns%5B11%5D%5Bdata%5D=id&columns%5B11%5D%5Bname%5D=&columns%5B11%5D%5Bsearchable%5D=true&columns%5B11%5D%5Borderable%5D=true&columns%5B11%5D%5Bsearch%5D%5Bvalue%5D=&columns%5B11%5D%5Bsearch%5D%5Bregex%5D=false&order%5B0%5D%5Bcolumn%5D=5&order%5B0%5D%5Bdir%5D=DESC';
        $urlAPI .= '&start=';
        $urlAPI .= $startData;
        $urlAPI .= '&length=';
        $urlAPI .= $length;
        $urlAPI .= '&search%5Bvalue%5D=&search%5Bregex%5D=false';

        $response = Http::timeout(600)->withOptions([
            'verify' => false, // Matikan verifikasi sertifikat
        ])->get($urlAPI);

        if ($response->ok()) {
            $lastUpdateDataNew = new last_update_data();
            $lastUpdateDataNew->start_data = $startData;
            $lastUpdateDataNew->end_data = $endData;
            $lastUpdateDataNew->save();
            $responseData = json_decode($response->body());
            // Lakukan manipulasi atau pemrosesan lain dengan $responseData
            $data = $responseData->data;
            // @dd($data);
            foreach ($data as $loopData) {
                try {
                    $paketNasional = new paket_nasional();
                    $paketNasional->id_paket = $loopData->id;
                    $paketNasional->idBulan = $loopData->idBulan;
                    $paketNasional->pagu = $loopData->pagu;
                    $paketNasional->satuanKerja = $loopData->satuanKerja;
                    $paketNasional->isPDN = $loopData->isPDN;
                    $paketNasional->idLokasi = $loopData->idlokasi;
                    $paketNasional->idKldi = $loopData->idKldi;
                    $paketNasional->metode = $loopData->metode;
                    $paketNasional->kldi = $loopData->kldi;
                    $paketNasional->isUMK = $loopData->isUMK;
                    $paketNasional->id_referensi = $loopData->id_referensi;
                    $paketNasional->jenisPengadaan = $loopData->jenisPengadaan;
                    $paketNasional->pemilihan = $loopData->pemilihan;
                    $paketNasional->idMetode = $loopData->idMetode;
                    $paketNasional->idJenisPengadaan = $loopData->idJenisPengadaan;
                    $paketNasional->paket = $loopData->paket;
                    $paketNasional->lokasi = $loopData->lokasi;
                    $paketNasional->save();
                    $endData = $endData + 1;
                    $lastUpdateDataNew->end_data = $endData;
                    $lastUpdateDataNew->save();
                } catch (Exception $e) {
                }
            }
        }
    }
}
