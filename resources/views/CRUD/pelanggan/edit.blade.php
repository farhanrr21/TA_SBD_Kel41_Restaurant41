@extends('index')

@section('data')

    <div class="bg-white shadow-md rounded p-6 m-6">
        <h5 class="font-bold text-lg mb-3">Edit Pelanggan</h5>
        <form method="post" action="{{route('update.pelanggan', $data_pelanggan[0]->id_pelanggan)}}">
            @csrf
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-600">Nama Pelanggan</label>
                <input type="text" class="form-input mt-1 block w-full border-2 rounded-md p-1" id="nama_pelanggan" name="nama_pelanggan" required
                       value="{{$data_pelanggan[0]->nama_pelanggan}}">
            </div>
            <div class="mb-4">
                <label for="id_produk" class="block text-sm font-medium text-gray-600">Nomor Meja</label>
                <input type="text" class="form-input mt-1 block w-full border-2 rounded-md p-1" id="nomor_meja" name="nomor_meja" required
                       value="{{$data_pelanggan[0]->nomor_meja}}">
            </div>
            <div class="mb-4">
                <label for="jumlah_beli" class="block text-sm font-medium text-gray-600">Porsi Menu</label>
                <input type="text" class="form-input mt-1 block w-full border-2 rounded-md p-1" id="porsi_menu" name="porsi_menu" required
                       value="{{$data_pelanggan[0]->porsi_menu}}">
            </div>
            <div class="mb-4">
                <label for="jumlah_beli" class="block text-sm font-medium text-gray-600">ID Pesanan</label>
                <input type="text" class="form-input mt-1 block w-full border-2 rounded-md p-1" id="id_makanan" name="id_makanan" required
                       value="{{$data_pelanggan[0]->id_makanan}}">
            </div>
            <div class="text-center">
                <input type="submit" class="bg-blue-500 hover:bg-blue-800 text-white py-2 px-4 rounded" value="Edit Data" />
            </div>
        </form>
    </div>

    {{--Data Menu--}}
    <div class="overflow-x-auto mx-8">
        <div class="flex font-bold text-2xl mb-3">
            Data Menu
        </div>
        <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
            <table class="min-w-full">
                {{--Data Menu--}}
                <div class="overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                    <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                        <table class="min-w-full">
                            {{--Header--}}
                            <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    ID_Menu</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Nama Makanan</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Jenis Makanan</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Harga</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    ID Stok</th>

                            </tr>
                            </thead>
                            @if($data_menu != null)
                                @php
                                    $index_p = 1;
                                @endphp
                                @foreach($data_menu as $data)
                                    {{--Table Content--}}
                                    <tbody class="bg-white">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="flex items-center">
                                                {{$data->id_makanan}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-900">{{$data->nama_makanan}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-900">{{$data->jenis_makanan}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                            <span>{{$data->harga_makanan}}</span>
                                        </td>
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                            <span>{{$data->id_stok}}</span>
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
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                        <span>-</span>
                                    </td>


                                </tr>
                                </tbody>
                            @endif

                        </table>
                    </div>
                </div>

            </table>
        </div>
    </div>
@endsection
