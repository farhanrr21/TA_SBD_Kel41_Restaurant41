<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function storePelanggan(Request $request){
        $request->validate([
            'nama_pelanggan' => 'required',
            'nomor_meja' => 'required',
            'porsi_menu' => 'required',
            'id_makanan' => 'required'
        ]);
        DB::insert(
            'INSERT INTO pelanggan(nama_pelanggan, nomor_meja, porsi_menu, id_makanan, is_deleted) VALUES (:nama_pelanggan, :nomor_meja, :porsi_menu, :id_makanan, 0)',
            [
                'nama_pelanggan' => $request->nama_pelanggan,
                'nomor_meja' => $request->nomor_meja,
                'porsi_menu' => $request->porsi_menu,
                'id_makanan' => $request->id_makanan
            ]
        );
        return redirect()->route('pelanggan.dashboard')->with('success', 'Data berhasil disimpan');
    }
    public function storeMenu(Request $request){
        $request->validate([
            'nama_makanan' => 'required',
            'jenis_makanan' => 'required',
            'harga_makanan' => 'required',
            'id_stok' => 'required'
        ]);

        DB::insert(
            'INSERT INTO menu(nama_makanan, jenis_makanan, harga_makanan, id_stok, is_deleted) VALUES (:nama_makanan, :jenis_makanan, :harga_makanan, :id_stok, 0)',
            [
                'nama_makanan' => $request->nama_makanan,
                'jenis_makanan' => $request->jenis_makanan,
                'harga_makanan' => $request->harga_makanan,
                'id_stok' => $request->id_stok
            ]
        );
        return redirect()->route('menu.dashboard')->with('success', 'Data berhasil disimpan');
    }
    public function storeStok(Request $request){
        $request->validate([
            'nama_bahan' => 'required',
            'jenis_bahan' => 'required',
            'jumlah_bahan' => 'required',
        ]);

        DB::insert(
            'INSERT INTO stok(nama_bahan, jenis_bahan, jumlah_bahan, is_deleted) VALUES (:nama_bahan, :jenis_bahan, :jumlah_bahan, 0)',
            [
                'nama_bahan' => $request->nama_bahan,
                'jenis_bahan' => $request->jenis_bahan,
                'jumlah_bahan' => $request->jumlah_bahan
            ]
        );
        return redirect()->route('stok.dashboard')->with('success', 'Data berhasil disimpan');
    }



    //Update Data
    public function updatePelanggan($id, Request $request){
        $request->validate([
            'nama_pelanggan' => 'required',
            'nomor_meja' => 'required',
            'porsi_menu' => 'required',
            'id_makanan' => 'required'
        ]);
        DB::update(
            'UPDATE pelanggan SET nama_pelanggan = :nama_pelanggan, nomor_meja = :nomor_meja, porsi_menu = :porsi_menu, id_makanan = :id_makanan WHERE id_pelanggan = :id',
            [
                'id' => $id,
                'nama_pelanggan' => $request->nama_pelanggan,
                'nomor_meja' => $request->nomor_meja,
                'porsi_menu' => $request->porsi_menu,
                'id_makanan' => $request->id_makanan
            ]
        );
        return redirect()->route('pelanggan.dashboard')->with('success', 'Data berhasil disimpan');
    }
    public function updateMenu($id, Request $request){
        $request->validate([
            'nama_makanan' => 'required',
            'jenis_makanan' => 'required',
            'harga_makanan' => 'required',
            'id_stok' => 'required'
        ]);

        DB::update(
            'UPDATE menu SET nama_makanan = :nama_makanan, jenis_makanan = :jenis_makanan, harga_makanan = :harga_makanan, id_stok = :id_stok WHERE id_makanan = :id',
            [
                'id' => $id,
                'nama_makanan' => $request->nama_makanan,
                'jenis_makanan' => $request->jenis_makanan,
                'harga_makanan' => $request->harga_makanan,
                'id_stok' => $request->id_stok
            ]
        );
        return redirect()->route('menu.dashboard')->with('success', 'Data berhasil disimpan');
    }
    public function updateStok($id, Request $request){
        $request->validate([
            'nama_bahan' => 'required',
            'jenis_bahan' => 'required',
            'jumlah_bahan' => 'required',
        ]);

        DB::update(
            'UPDATE stok SET nama_bahan = :nama_bahan, jenis_bahan = :jenis_bahan, jumlah_bahan = :jumlah_bahan WHERE id_stok = :id',
            [
                'id' => $id,
                'nama_bahan' => $request->nama_bahan,
                'jenis_bahan' => $request->jenis_bahan,
                'jumlah_bahan' => $request->jumlah_bahan
            ]
        );
        return redirect()->route('stok.dashboard')->with('success', 'Data berhasil disimpan');
    }



    //Delete Data
    public function deletePelanggan($id)
    {
        DB::delete('DELETE FROM pelanggan WHERE id_pelanggan = :id_pelanggan', ['id_pelanggan' => $id]);
        return redirect()->route('pelanggan.dashboard');
    }
    public function deleteMenu($id)
    {
        DB::delete('DELETE FROM menu WHERE id_makanan = :id_makanan', ['id_makanan' => $id]);
        return redirect()->route('menu.dashboard');
    }
    public function deleteStok($id)
    {
        DB::delete('DELETE FROM stok WHERE id_stok = :id_stok', ['id_stok' => $id]);
        return redirect()->route('menu.dashboard');
    }


    //Soft Delete Data
    public function softPelanggan($id){
        DB::update('UPDATE pelanggan SET is_deleted = 1 WHERE id_pelanggan = :id',['id' => $id,]);
        return redirect()->route('pelanggan.dashboard');
    }
    public function softMenu($id){
        DB::update('UPDATE menu SET is_deleted = 1 WHERE id_makanan = :id',['id' => $id,]);
        return redirect()->route('menu.dashboard');
    }
    public function softStok($id){
        DB::update('UPDATE stok SET is_deleted = 1 WHERE id_stok = :id',['id' => $id,]);
        return redirect()->route('stok.dashboard');
    }


    //Restore Data
    public function restorePelanggan($id, $db){
        $id_query = "id_{$db}";
        if ($id_query == "id_menu") { $id_query = "id_makanan";}

        DB::update("UPDATE {$db} SET is_deleted = 0 WHERE {$id_query} = :id",['id' => $id]);
        return redirect()->route('trash.dashboard');
    }


}
