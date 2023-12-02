@extends('layouts.app')

@section('title','Login Page')

@section('content')
    <div>
        <div class="flex h-screen">
            <button id="theme-toggle" type="button"
                    class="fixed z-90 bottom-10 right-8 text-gray-500 dark:text-gray-400 hover:bg-gray-400 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-full text-sm p-2.5">
                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5 fill-white" fill="currentColor"
                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                        fill-rule="evenodd" clip-rule="evenodd"></path>
                </svg>
            </button>

            <!-- Kotak 1 -->
            <div class="flex-initial w-4/12 bg-[#B31312]  hidden md:flex">
                <div class="bg-no-repeat bg-center"
                     style="background-image: url('{{ asset('assets/images/world-map.png') }}')">
                    <div class="flex flex-col h-screen p-8">
                        <div class="flex-grow-0 max-w-fit">
                            <a href="#">
                                <img src="" alt="" class="h-24">
                            </a>
                        </div>
                        <div class="flex flex-col flex-grow justify-center justify-items-center text-white">
                            <h1 class="text-2xl font-bold mb-4">
                                RESTAURANT 41
                            </h1>
                            <p class="text-justify font-light mb-3 ">
                                Tempat Restoran yang sederhana namun menggoda selera. Nikmati suasana nyaman dengan hidangan autentik Italia, mulai dari pasta segar hingga pizza lezat. Suasana ramah dan layanan yang baik membuat setiap kunjungan menjadi pengalaman yang tak terlupakan. Bergabunglah dengan kami untuk menikmati kelezatan Italia dalam suasana yang hangat dan menyenangkan
                            </p>
                        </div>
                        <div class="flex-grow-0">
                            <div class="text-sm font-semibold text-white">Made with Love by Kelompok 41 🤗</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Kotak 2 -->
            <div class="flex-initial w-full md:w-10/12 bg-center bg-no-repeat bg-cover"
                 style="background-image: url('{{ asset('assets/images/bg_login.jpg') }}')">

                <div class="flex w-full h-full flex-col items-center justify-center">
                    @if($errors->any())
                        <div class="rounded-md py-3 px-2 text-black font-semibold text-m md:text-base bg-[#FFA33C] mb-4">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div
                        class="max-h-fit dark:bg-gray-800 flex flex-col items-center justify-center py-10 px-8 rounded-md">
                        <div class="text-center mb-6">
                            <h1 class="text-2xl md:text-3xl font-bold dark:text-white mb-1">Login</h1>
                            {{--                        <div class="text-3xl font-medium mb-1">Login Account</div>--}}
                            <div class="text-base md:text-lg font-normal text-gray-500 dark:text-gray-400">Enter your
                                username and password
                            </div>
                        </div>
                        <div>
                            <form method="post" action="{{route("do-login")}}" class="flex flex-col w-[300px] md:w-[360px]">
                                @csrf
                                <div class="mb-6">
                                    <label for="username"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                    <input type="text" name="username" id="username"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                           placeholder="username" required>
                                </div>
                                <div class="mb-6">
                                    <label for="password"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                    <input type="password" name="password" id="password"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                           placeholder="•••••••••" required>
                                </div>
                                <input type="submit" value="Login"
                                       class="rounded-md py-3 px-2 text-white text-sm md:text-base w-full bg-[#B31312] hover:bg-[#860A35]">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

