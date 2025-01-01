<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<!-- header -->
<header>
    <nav id="navbar"
        class="flex bg-white justify-between px-[10%] py-4 items-center fixed top-0 right-0 left-0 z-[99999] transition-all ease-in duration-150 max-md:px-[5%]">
        <a href="{{ route('index') }}" class="font-bold text-3xl" wire:navigate>Kepuh</a>
        <div>
            <ul class="flex items-center gap-5 max-md:hidden">
                <li class="font-bold">
                    <a href="">Beranda</a>
                </li>
                <li>
                    <a href="">Profil</a>
                </li>
                <li><a href="">Potensi Desa</a></li>
                <li><a href="">Layanan</a></li>
                <li><a href="">Kontak</a></li>
                @guest
                    <li><a href="{{ route('login') }}" id="loginButton"
                            class="py-2 px-5 border rounded-md bg-sky-600 text-white transition-all duration-150 ease-in-out">Login</a>
                    </li>
                    <li><a href="{{ route('register') }}" id="registerButton"
                            class="py-2 px-5 border-2 border-sky-600 rounded-md transition-all duration-150 ease-in-out  bg-white text-sky-600">Daftar</a>
                    </li>
                @endguest
                @auth
                    <div>
                        <button type="button"
                            class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full"
                                src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=random"
                                alt="user photo">
                        </button>
                    </div>
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                        id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm text-gray-900 dark:text-white" role="none">
                                {{ Auth::user()->name }}
                            </p>
                        </div>
                        <ul class="py-1" role="none">
                            @hasrole('admin')
                                <li>
                                    <a href="{{ route('admin.request') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Dashboard</a>
                                </li>
                            @endhasrole
                            @hasrole('user')
                                <li>
                                    <a href="{{ route('dashboard.request') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Permintaan Surat</a>
                                </li>
                            @endhasrole
                            <li>
                                <a href="" wire:click="logout"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                    role="menuitem" onclick="event.preventDefault()">Logout</a>
                            </li>
                        </ul>
                    </div>
                @endauth
            </ul>
            <div id="hamburger" class="md:hidden cursor-pointer">
                @guest
                    <i class="fa-solid fa-bars text-xl"></i>
                @endguest
                @auth
                    <img class="w-8 h-8 rounded-full"
                        src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=random" alt="user photo">
                @endauth
            </div>
        </div>
    </nav>
    <div id="mobileMenu"
        class="z-[9999]  hidden fixed top-0 left-0 w-full h-full bg-black bg-opacity-90 text-white flex flex-col items-center justify-center gap-5 md:hidden">
        <a href="#" class="font-bold text-2xl" wire:navigate>Beranda</a>
        <a href="#" wire:navigate>Profil</a>
        <a href="#" wire:navigate>Potensi Desa</a>
        <a href="#" wire:navigate>Layanan</a>
        <a href="#" wire:navigate>Kontak</a>
        @guest
            <a href="{{ route('login') }}" class="bg-sky-600 px-4 py-2 rounded-md border-2 border-sky-600"
                wire:navigate>Login</a>
            <a href="{{ route('register') }}" class="border-2 px-4 py-2 rounded-md" wire:navigate>Daftar</a>
        @endguest
        @auth
            @hasrole('admin')
                <a href="{{ route('admin.request') }}" wire:navigate>Dashboard</a>
            @endhasrole
            @hasrole('user')
                <a href="{{ route('dashboard.request') }}" wire:navigate>Permintaan Surat</a>
            @endhasrole
            <a href="" wire:click="logout" onclick="event.preventDefault()">Logout</a>
        @endauth
    </div>
</header>
