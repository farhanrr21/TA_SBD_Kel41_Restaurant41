@extends('index')

@section('data')

    <div class="bg-white shadow-md rounded p-6 m-6">
        <h5 class="font-bold text-lg mb-3">Tambah Admin</h5>
        <form method="post" action="{{route('store.stok')}}">
            @csrf
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-600">Nama Bahan</label>
                <input type="text" class="form-input mt-1 block w-full border-2 rounded-md p-1" id="nama_bahan" name="nama_bahan" required>
            </div>
            <div class="mb-4">
                <label for="id_produk" class="block text-sm font-medium text-gray-600">Jenis Bahan</label>
                <input type="text" class="form-input mt-1 block w-full border-2 rounded-md p-1" id="jenis_bahan" name="jenis_bahan" required>
            </div>
            <div class="mb-4">
                <label for="jumlah_beli" class="block text-sm font-medium text-gray-600">Jumlah</label>
                <input type="text" class="form-input mt-1 block w-full border-2 rounded-md p-1" id="jumlah_bahan" name="jumlah_bahan" required>
            </div>
            <div class="text-center">
                <input type="submit" class="bg-blue-500 hover:bg-blue-800 text-white py-2 px-4 rounded" value="Tambah" />
            </div>
        </form>
    </div>
@endsection
