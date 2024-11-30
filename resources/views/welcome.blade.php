<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/js/navbar.js'])

    <!-- icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="antialiased font-sans">
    <!-- header -->
    <header>
        <nav id="navbar" class="flex justify-between px-[10%] py-3 items-center fixed top-0 right-0 left-0 z-[99999] text-white transition-all ease-in duration-150 max-md:px-[5%]">
            <h1 class="font-bold text-3xl">Kepuh</h1>
            <div>
                <ul class="flex gap-5 max-md:hidden">
                    <li class="font-bold">
                        <a href="">Beranda</a>
                    </li>
                    <li>
                        <a href="">Profil</a>
                    </li>
                    <li><a href="">Potensi Desa</a></li>
                    <li><a href="">Layanan</a></li>
                    <li><a href="">Kontak</a></li>
                </ul>
                <div id="hamburger" class="md:hidden ">
                    <i class="fa-solid fa-bars text-xl"></i>
                </div>
            </div>
        </nav>
        <div id="mobileMenu" class="z-[9999] hidden fixed top-0 left-0 w-full h-full bg-black bg-opacity-90 text-white flex flex-col items-center justify-center gap-5 md:hidden">
            <a href="#" class="font-bold text-2xl">Beranda</a>
            <a href="#">Profil</a>
            <a href="#">Potensi Desa</a>
            <a href="#">Layanan</a>
            <a href="#">Kontak</a>
        </div>
    </header>
    <!-- hero section -->
    <div style="background-image: url('/img/kepuh-bg.jpg')" class="relative h-screen bg-cover bg-center bg-no-repeat">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative z-10 text-white text-center flex flex-col justify-center items-center h-full gap-5">
            <h1 class="font-bold text-6xl w-[900px] max-md:text-5xl max-sm:text-4xl max-lg:w-auto">Membangun Desa, Merangkul Semua</h1>
            <p class="text-lg w-[600px] max-lg:w-auto">Mewujudkan kesejahteraan masyarakat melalui pelayanan prima dan pembangunan berkelanjutan</p>
            <a href="#" class="font-semibold py-3 px-6 rounded-lg bg-sky-600 hover:bg-sky-700">Hubungi Kami</a>
        </div>
    </div>
    <!-- profile section -->
    <section id="profil">
        <div class="w-full h-full">
            <div class="py-20 flex justify-center gap-5 items-center w-full px-[10%]  mx-auto max-md:block max-md:px-[5%]">
                <div style="background-image: url('/img/kepuh-bg.jpg')" class="bg-cover bg-center bg-no-repeat w-[28rem] h-[28rem] max-md:w-full rounded-md"></div>
                <div class="w-[30rem] max-md:w-full max-md:mt-5">
                    <h1 class="text-slate-600 font-bold">Profil Desa</h1>
                    <h1 class="text-3xl font-bold mb-2">Kepuh, Lemahsugih</h1>
                    <p class="text-justify leading-7 text-lg mb-8">Kepuh adalah desa di Kecamatan Lemahsugih, Majalengka, Jawa Barat, Indonesia. Desa Kepuh berdiri pada Tanggal 14 Agustus 1848. <br><br>Desa Kepuh terdiri dari dua Kelurahan: Kelurahan Karang Anyar dan Kelurahan Sukapulang, dari dua kelurahan tersebut dibagi ke beberapa blok diantaranya Babakan Sukamanah, Cilendi, Mitra Tani, Meteor, Cisampih, Cinangka, Garunggang, Kubang, Madrasah, Cihamplas, Cijengkol, PasirRengit, Cilame.</p>
                    <a href="#" class="font-semibold py-3 px-6 rounded-lg bg-sky-600 hover:bg-sky-700 text-white">Kunjungi Desa Kami</a>
                </div>
            </div>
            <div class="bg-sky-600 flex justify-evenly py-3 max-md:py-5 max-md:block">
                <div class="text-white text-center ">
                    <p class=" text-lg">Luas</p>
                    <h1 class="text-3xl font-bold max-md:text-2xl">78,64 Km2</h1>
                </div>
                <div class="text-white text-center max-md:my-5">
                    <p class="text-lg">Jumlah Penduduk</p>
                    <h1 class="text-3xl font-bold max-md:text-2xl">6.797 Jiwa</h1>
                    <p class="">Pada Tahun 2023</p>
                </div>
                <div class="text-white text-center ">
                    <p class="text-lg">Kepadatan</p>
                    <h1 class="text-3xl font-bold max-md:text-2xl">278 jiwa/Km2</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- visi misi section -->
    <section>
        <div class="w-full h-full">
            <div class="py-20 flex justify-center gap-5 items-center w-full px-[10%]  mx-auto max-md:block max-md:px-[5%]">
                <div class="w-[35rem] max-md:w-full max-md:mb-5">
                    <h1 class="text-slate-600 font-bold">Visi Misi</h1>
                    <h1 class="text-3xl font-bold mb-2">Visi</h1>
                    <p class="text-justify leading-7 text-lg mb-8">Menjadi desa yang mandiri, sejahtera, dan berkelanjutan, dengan memanfaatkan potensi lokal dan menjaga kearifan budaya.</p>
                    <h1 class="text-3xl font-bold mb-2">Misi</h1>
                    <div class="flex items-center gap-3 mb-3">
                        <div class=" h-5 w-5 p-5 flex justify-center items-center text-white rounded-full bg-sky-600 text-xl">1</div>
                        <p class="text-justify leading-7 text-lg">Meningkatkan kualitas hidup masyarakat melalui pendidikan dan pelatihan keterampilan.</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class=" h-5 w-5 p-5 flex justify-center items-center text-white rounded-full bg-sky-600 text-xl">2</div>
                        <p class="text-justify leading-7 text-lg">Meningkatkan kualitas hidup masyarakat melalui pendidikan dan pelatihan keterampilanMengembangkan potensi ekonomi lokal dengan mendukung usaha mikro, kecil, dan menengah (UMKM).
                        <p>
                    </div>
                </div>
                <div style="background-image: url('/img/kepuh-bg.jpg')" class="bg-cover bg-center bg-no-repeat w-[28rem] h-[28rem] rounded-md max-md:w-full"></div>
            </div>
        </div>
    </section>

    <!-- informasi section -->
    <section class="bg-gradient-to-br from-sky-600 to-sky-400 py-10 h-screen max-md:h-full flex justify-center flex-col items-center">
        <div class="text-center py-5">
            <p class="text-white">Informasi dan Layanan</p>
            <h1 class="font-bold text-3xl text-white">Desa Kepuh</h1>
            <p class="text-white">berkomitmen untuk memberikan layanan yang prima dan transparan untuk seluruh masyarakat.</p>
        </div>
        <div class="px-[10%] grid place-items-center grid-cols-3 max-lg:grid-cols-2 gap-5 my-5 max-md:block max-md:px-[5%]">
            <div class="bg-white  h-72 flex items-start  flex-col justify-center rounded-md p-5 max-md:mb-5 max-md:h-auto max-md:w-full">
                <img src="/img/admin.svg" alt="" class="">
                <h1 class="font-bold text-xl my-3">Pelayanan Administrasi</h1>
                <p>Pengurusan Surat Domisili, Pembuatan Kartu Keluarga (KK) dan Akta Kelahiran, Pengurusan KTP Elektronik (e-KTP), dll.</p>
            </div>
            <div class="bg-white  h-72 flex items-start  flex-col justify-center rounded-md p-5 max-md:mb-5 max-md:h-auto max-md:w-full">
                <img src="/img/health.svg" alt="" class="">
                <h1 class="font-bold text-xl my-3">Pelayanan Kesehatan</h1>
                <p>Posyandu dan puskesmas keliling, Program Vaksinasi dan Pemeriksaan gratis</p>
            </div>
            <div class="bg-white  h-72 flex items-start  flex-col justify-center rounded-md p-5 max-md:mb-5 max-md:h-auto max-md:w-full">
                <img src="/img/bantuan-sosial.svg" alt="" class="">
                <h1 class="font-bold text-xl my-3">Bantuan Sosial</h1>
                <p>Pengurusan Surat Domisili, Pembuatan Kartu Keluarga (KK) dan Akta Kelahiran, Pengurusan KTP Elektronik (e-KTP), dll.</p>
            </div>
        </div>
    </section>

    <!-- contact section -->
    <section class="h-screen w-full max-md:h-full">
        <div class="flex justify-center items-center h-full">
            <div class="border shadow-md p-5 rounded-md w-[1000px]">
                <h1 class="font-bold text-3xl text-center py-3">Apa Yang Bisa Anda Sampaikan</h1>
                <div class="flex justify-center items-center gap-5 my-5 max-md:block">
                    <img src="/img/kepuh-contact.svg" alt="" class="max-md:mx-auto">
                    <div class="w-full">
                        <form class="w-full">
                            <label for="name" class="font-semibold">Nama Lengkap</label><br>
                            <input type="text" name="name" id="name" placeholder="John Doe" class="w-full rounded-md shadow-sm my-2"><br>
                            <label for="email" class="font-semibold">Email</label><br>
                            <input type="email" name="email" id="email" placeholder="johndoe@gmail.com" class="w-full rounded-md shadow-sm my-2"><br>
                            <label for="pesan" class="font-semibold">Pesan Anda</label><br>
                            <textarea name="pesan" id="pesan" placeholder="Pesan Anda" class="w-full rounded-md shadow-sm my-2"></textarea><br>
                            <button type="submit" class="bg-sky-600 w-full py-2 text-white font-semibold rounded-md hover:bg-sky-700">Kirim Pesan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <footer class="bg-sky-600 px-[10%] py-10 text-white max-md:px-[5%]">
        <div class="flex justify-between max-lg:block">
            <h1 class="font-bold text-3xl max-lg:mb-3">Kepuh</h1>
            <div class="flex justify-between gap-5 max-md:block">
                <div>
                    <h1 class="font-bold text-xl max-lg:mb-3">Hubungi Kami</h1>
                    <div class="flex items-center gap-5 my-2">
                        <i class="fa-solid fa-location-dot"></i>
                        <p>Jl. Raya Kepuh No. 123, Majalengka, Jawa Barat</p>
                    </div>
                    <div class="flex items-center gap-5 my-2">
                        <i class="fa-solid fa-phone"></i>
                        <p>(0332) 123456</p>
                    </div>
                    <div class="flex items-center gap-5 my-2">
                        <i class="fa-solid fa-envelope"></i>
                        <p>info@desakepuh.id</p>
                    </div>
                    <div class="flex items-center gap-5 my-2">
                        <i class="fa-solid fa-clock"></i>
                        <p>Senin - Jumat, 08.00 - 16.00 WIB</p>
                    </div>
                </div>
                <div class="max-md:my-3">
                    <h1 class="font-bold text-xl max-lg:mb-3">Jelajahi</h1>
                    <a href="#" class="block my-2 hover:underline">Beranda</a>
                    <a href="#" class="block my-2 hover:underline">Profil Desa</a>
                    <a href="#" class="block my-2 hover:underline">Potensi Desa</a>
                    <a href="#" class="block my-2 hover:underline">Layanan</a>
                    <a href="#" class="block my-2 hover:underline">Kontak</a>
                </div>
                <div>
                    <h1 class="font-bold text-xl">Sosial Media</h1>
                    <div class="text-2xl my-2 flex gap-5">
                        <i class="fa-brands fa-facebook-f"></i>
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-twitter"></i>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>