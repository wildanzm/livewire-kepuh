<!-- header -->
<header>
    <nav id="navbar" class="flex justify-between px-[10%] py-3 items-center fixed top-0 right-0 left-0 z-[99999] text-white transition-all ease-in duration-150 max-md:px-[5%]">
        <h1 class="font-bold text-3xl">Kepuh</h1>
        <div>
            <ul class="flex items-center gap-5 max-md:hidden">
                <li class="font-bold">
                    <a href="" wire:navigate>Beranda</a>
                </li>
                <li>
                    <a href="" wire:navigate>Profil</a>
                </li>
                <li><a href="" wire:navigate>Potensi Desa</a></li>
                <li><a href="" wire:navigate>Layanan</a></li>
                <li><a href="" wire:navigate>Kontak</a></li>
                <li><a href="{{route('login')}}" id="loginButton" class="py-2 px-5 border rounded-md hover:bg-white transition-all duration-150 ease-in-out hover:text-black" wire:navigate>Login</a></li>
                <li><a href="{{route('register')}}" id="registerButton" class="py-2 px-5 border rounded-md hover:bg-transparent transition-all duration-150 ease-in-out  bg-white text-black" wire:navigate>Daftar</a></li>
            </ul>
            <div id="hamburger" class="md:hidden cursor-pointer">
                <i class="fa-solid fa-bars text-xl"></i>
            </div>
        </div>
    </nav>
    <div id="mobileMenu" class="z-[9999]  hidden fixed top-0 left-0 w-full h-full bg-black bg-opacity-90 text-white flex flex-col items-center justify-center gap-5 md:hidden">
        <a href="#" class="font-bold text-2xl" wire:navigate>Beranda</a>
        <a href="#" wire:navigate>Profil</a>
        <a href="#" wire:navigate>Potensi Desa</a>
        <a href="#" wire:navigate>Layanan</a>
        <a href="#" wire:navigate>Kontak</a>
        <a href="{{route('login')}}" class="bg-sky-600 px-4 py-2 rounded-md border-2 border-sky-600" wire:navigate>Login</a>
        <a href="{{route('register')}}" class="border-2 px-4 py-2 rounded-md" wire:navigate>Daftar</a>
    </div>
</header>