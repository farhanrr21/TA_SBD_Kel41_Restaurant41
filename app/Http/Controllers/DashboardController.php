<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\search;

class DashboardController extends Controller
{
    public function showDashboard(){
        $data_pelanggan = DB::select('SELECT * FROM pelanggan INNER JOIN menu ON pelanggan.id_makanan = menu.id_makanan WHERE pelanggan.is_deleted = 0 AND menu.is_deleted = 0');
        $data_menu = DB::select('SELECT * FROM menu INNER JOIN stok ON menu.id_stok = stok.id_stok WHERE stok.is_deleted = 0 AND menu.is_deleted = 0');
        $data_stok = DB::select('SELECT * FROM stok WHERE stok.is_deleted = 0');

        return view('index', compact('data_pelanggan', 'data_menu', 'data_stok'));
    }

    public function showTrash(){
        $data_pelanggan = DB::select('SELECT * FROM pelanggan WHERE is_deleted = 1');
        $data_menu = DB::select('SELECT * FROM menu WHERE is_deleted = 1');
        $data_stok = DB::select('SELECT * FROM stok WHERE is_deleted = 1');

        return view('index', compact('data_pelanggan', 'data_menu', 'data_stok'));
    }

    //Show Data
    public function showPelanggan(){
        $data_pelanggan = DB::select('SELECT * FROM pelanggan WHERE is_deleted = 0');
        return view('index', compact('data_pelanggan'));
    }
    public function showMenu(){
        $data_menu = DB::select('SELECT * FROM menu WHERE is_deleted = 0');
        return view('index', compact('data_menu'));
    }
    public function showStok(){
        $data_stok = DB::select('SELECT * FROM stok WHERE is_deleted = 0');
        return view('index', compact('data_stok'));
    }

    //Show Add Data Page
    public function addDataPelanggan(){
        $data_menu = DB::select('SELECT * FROM menu');
        return view('CRUD.pelanggan.add', compact('data_menu'));
    }
    public function addDataMenu(){
        $data_stok = DB::select('SELECT * FROM stok');
        return view('CRUD.menu.add', compact('data_stok'));
    }
    public function addDataStok(){
        return view('CRUD.stok.add');
    }

    //Edit
    public function editDataPelanggan($id){
        $data_pelanggan = DB::select('SELECT * FROM pelanggan WHERE id_pelanggan = :id', ['id' => $id]);
        $data_menu = DB::select('SELECT * FROM menu');
//        dd($data_pelanggan);
        return view('CRUD.pelanggan.edit', compact('data_menu','data_pelanggan'));
    }

    public function editDataMenu($id){
        $data_menu = DB::select('SELECT * FROM menu WHERE id_makanan = :id', ['id' => $id]);
        $data_stok = DB::select('SELECT * FROM stok');
        return view('CRUD.menu.edit', compact('data_stok', 'data_menu'));
    }
    public function editDataStok($id){
        $data_stok = DB::select('SELECT * FROM stok WHERE id_stok = :id', ['id' => $id]);
        return view('CRUD.stok.edit', compact('data_stok'));
    }

    //Searching
    public function searchData($db,Request $request){
        $searching = "{$request->search}%";
        if ($db == "pelanggan"){
            $data_pelanggan = DB::select('SELECT * FROM pelanggan WHERE is_deleted = 0 AND nama_pelanggan LIKE :searching ',['searching'=>$searching]);
            return view('index', compact('data_pelanggan'));
        }
        elseif ($db == "menu"){
            $data_menu = DB::select('SELECT * FROM menu WHERE is_deleted = 0 AND nama_makanan LIKE :searching ',['searching'=>$searching]);
            return view('index', compact('data_menu'));
        }
        else{
            $data_stok = DB::select('SELECT * FROM stok WHERE is_deleted = 0 AND nama_bahan LIKE :searching ',['searching'=>$searching]);
            return view('index', compact('data_stok'));
        }
    }
}
