@extends('index')

@section('data')

    <div class="bg-white shadow-md rounded p-6 m-6">
        <h5 class="font-bold text-lg mb-3">Tambah Admin</h5>
        <form method="post" action="{{route('store.menu')}}">
            @csrf
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-600">Nama Makanan</label>
                <input type="text" class="form-input mt-1 block w-full border-2 rounded-md p-1" id="nama_makanan" name="nama_makanan" required>
            </div>
            <div class="mb-4">
                <label for="id_produk" class="block text-sm font-medium text-gray-600">Jenis Makanan</label>
                <input type="text" class="form-input mt-1 block w-full border-2 rounded-md p-1" id="jenis_makanan" name="jenis_makanan" required>
            </div>
            <div class="mb-4">
                <label for="jumlah_beli" class="block text-sm font-medium text-gray-600">Harga</label>
                <input type="text" class="form-input mt-1 block w-full border-2 rounded-md p-1" id="harga_makanan" name="harga_makanan" required>
            </div>
            <div class="mb-4">
                <label for="jumlah_beli" class="block text-sm font-medium text-gray-600">ID Stok</label>
                <input type="text" class="form-input mt-1 block w-full border-2 rounded-md p-1" id="id_stok" name="id_stok" required>
            </div>
            <div class="text-center">
                <input type="submit" class="bg-blue-500 hover:bg-blue-800 text-white py-2 px-4 rounded" value="Tambah" />
            </div>
        </form>
    </div>

    <div class="overflow-x-auto mx-8">
        <div class="flex font-bold text-2xl mb-3">
            Data Stok
        </div>
        <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
            <table class="min-w-full">
                {{--Header--}}
                <thead>
                <tr>
                    <th
                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                        ID Stok</th>
                    <th
                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                        Nama Bahan</th>
                    <th
                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                        Jenis Bahan</th>
                    <th
                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                        Jumlah</th>
                </tr>
                </thead>
                @if($data_stok != null)
                    @php
                        $index_p = 1;
                    @endphp
                    @foreach($data_stok as $data)
                        {{--Table Content--}}
                        <tbody class="bg-white">
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="flex items-center">
                                    {{$data->id_stok}}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900">{{$data->nama_bahan}}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900">{{$data->jenis_bahan}}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <p>{{$data->jumlah_bahan}}</p>
                            </td>

                        </tr>
                        </tbody>
                    @endforeach
                @else
                    {{--Table Content--}}
                    <tbody class="bg-white">
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="flex items-center">
                                -
                            </div>

                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-900">
                                -
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <p>-</p>
                        </td>

                        <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                            <span>-</span>
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                            <span>-</span>
                        </td>



                    </tr>
                    </tbody>
                @endif

            </table>
        </div>
    </div>
@endsection
