<?php

namespace App\Http\Controllers;

use App\Models\paket_nasional;
use App\Models\userr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class crud extends Controller
{
    //
    public function tambah(Request $request){
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
        $data=array('name'=>$name,"email"=>$email,"address"=>$address,"phone"=>$phone,"created_at"=>Carbon::now()->format('Y-m-d H:i:s'),"updated_at"=>Carbon::now()->format('Y-m-d H:i:s'));
        DB::table('users')->insert($data);
        
        //return redirect('homepage');
    }
    public function edit(Request $request,$id){
        DB::table('users')->where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->address,
            'address' => $request->phone,
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
    public function hapus($id)
    {
        $user= userr::findOrFail($id);
        $user->delete();
    }

    public function createPaketNasional(Request $request){
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
        try{
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
        }catch(Exception $e){
            echo 'gagal';
        }
    }
}
