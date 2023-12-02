@extends('layouts.app')

@section('title', 'Landing Page')

@section('content')
    <div class="min-h-screen bg-gray-100">
        <header class="bg-red-500">
            <nav class="max-w-7xl mx-auto px-6">
                <div class="flex items-center justify-between h-16">
                    <div class="font-bold text-white text-3xl">Restaurant41</div>
                    <div class="flex items-center">
                        <div class="hidden md:block">
                            <div class="flex items-baseline space-x-4">
                                <a href="{{route('home.dashboard')}}" class="{{ request()->routeIs('home.*') ? 'bg-red-700 hover:text-gray-200 hover:bg-red-900 text-white px-3 py-2 rounded-md text-sm font-medium' : 'text-white hover:text-gray-200 hover:bg-red-900 px-3 py-2 rounded-md text-sm font-medium' }}">Home</a>
                                <a href="{{route('pelanggan.dashboard')}}" class="{{ request()->routeIs('pelanggan.*') ? 'bg-red-700 hover:text-gray-200 hover:bg-red-900 text-white px-3 py-2 rounded-md text-sm font-medium' : 'text-white hover:text-gray-200 hover:bg-red-900 px-3 py-2 rounded-md text-sm font-medium' }}">Pelanggan</a>
                                <a href="{{route('menu.dashboard')}}" class="{{ request()->routeIs('menu.*') ? 'bg-red-700 hover:text-gray-200 hover:bg-red-900 text-white px-3 py-2 rounded-md text-sm font-medium' : 'text-white hover:text-gray-200 hover:bg-red-900 px-3 py-2 rounded-md text-sm font-medium' }}">Menu</a>
                                <a href="{{route('stok.dashboard')}}" class="{{ request()->routeIs('stok.*') ? 'bg-red-700 hover:text-gray-200 hover:bg-red-900 text-white px-3 py-2 rounded-md text-sm font-medium' : 'text-white hover:text-gray-200 hover:bg-red-900 px-3 py-2 rounded-md text-sm font-medium' }}">Stok</a>
                                <a href="{{route('trash.dashboard')}}" class="{{ request()->routeIs('trash.*') ? 'bg-red-700 hover:text-gray-200 hover:bg-red-900 text-white px-3 py-2 rounded-md text-sm font-medium' : 'text-white hover:text-gray-200 hover:bg-red-900 px-3 py-2 rounded-md text-sm font-medium' }}">Trash</a>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center font-bold text-white text-3xl">
                        <a href="{{route('do-logout')}}" class="bg-red-700 hover:text-gray-200 hover:bg-red-900 text-white px-3 py-2 rounded-md text-sm font-medium">Logout</a>
                    </div>
                </div>
            </nav>
        </header>
        @yield('data')
        @if(request()->routeIs('home.*'))
            @include('inner_content.home', with(['$data_pelanggan' => $data_pelanggan, 'data_menu' => $data_menu, 'data_stok' => $data_stok]))
        @elseif(request()->routeIs('pelanggan.*'))
            @include('inner_content.pelanggan', with(['$data_pelanggan' => $data_pelanggan]))
        @elseif(request()->routeIs('menu.*'))
            @include('inner_content.menu', with(['$data_menu' => $data_menu]))
        @elseif(request()->routeIs('stok.*'))
            @include('inner_content.stok', with(['$data_stok' => $data_stok]))
        @elseif(request()->routeIs('trash.*'))
            @include('inner_content.trash', with(['$data_pelanggan' => $data_pelanggan, 'data_menu' => $data_menu, 'data_stok' => $data_stok]))
        @endif
</div>
@endsection
