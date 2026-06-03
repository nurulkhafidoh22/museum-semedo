<x-app-layout>

<div class="min-h-screen py-24 bg-[#f8fafc]">

    <div class="max-w-5xl mx-auto px-6 space-y-14">

        <!-- ========================================= -->
        <!-- HERO -->
        <!-- ========================================= -->

        <section class="relative overflow-hidden rounded-[32px]
            bg-gradient-to-br
            from-[#062b30]
            via-[#0f3c44]
            to-[#14535d]
            text-white">

            <div class="absolute inset-0 bg-black/20"></div>

            <div class="relative grid lg:grid-cols-2 gap-10
                items-center p-10 lg:p-14">

                <!-- TEXT -->
                <div>

                    <span class="inline-flex items-center
                        px-4 py-2 rounded-full
                        bg-white/10 border border-white/10
                        text-sm font-medium">

                        Museum Situs Semedo

                    </span>

                    <h1 class="mt-6
                        text-4xl md:text-5xl
                        font-bold leading-tight">

                        Mengenal

                        <span class="block text-cyan-300">

                            Museum Semedo

                        </span>

                        Lebih Dekat

                    </h1>

                    <p class="mt-6 text-white/80 leading-8 text-justify">

                        Museum Semedo merupakan pusat pelestarian,
                        penelitian, dan edukasi yang menyimpan berbagai
                        temuan fosil serta artefak penting dari Situs
                        Semedo sebagai bagian dari sejarah kehidupan
                        manusia purba di Indonesia.

                    </p>

                </div>

                <!-- FOTO -->
                <div>

                    <img
                        src="{{ asset('images/bg-tentang.jpg') }}"
                        alt="Museum Semedo"
                        class="rounded-3xl shadow-2xl
                        object-cover w-full h-[320px]">

                </div>

            </div>

        </section>


        <!-- ========================================= -->
        <!-- TIMELINE SEJARAH -->
        <!-- ========================================= -->

        <section class="bg-white border border-gray-200
            rounded-3xl shadow-sm p-8 md:p-10">

            <div class="mb-10">

                <span class="text-sm font-medium text-[#0f766e]">

                    Perjalanan Museum

                </span>

                <h2 class="mt-2 text-3xl font-bold text-[#0f2a2c]">

                    Sejarah Museum Situs Semedo

                </h2>

                <p class="mt-3 text-gray-600 max-w-3xl">

                    Museum Situs Semedo dibangun sebagai upaya pelestarian
                    hasil temuan arkeologi dan paleontologi dari Situs Semedo,
                    salah satu kawasan penting penelitian manusia purba di Indonesia.

                </p>

            </div>

            <div class="relative">

                <!-- GARIS TIMELINE -->
                <div class="absolute left-4 top-0 bottom-0
                    w-0.5 bg-gray-200">
                </div>

                <!-- ITEM 1 -->
                <div class="relative flex gap-6 pb-10">

                    <div class="relative z-10
                        w-8 h-8 rounded-full
                        bg-[#0f766e]
                        border-4 border-white
                        shadow">

                    </div>

                    <div>

                        <span class="text-sm font-medium text-[#0f766e]">

                            Sebelum 2015

                        </span>

                        <h3 class="text-lg font-semibold text-gray-900 mt-1">

                            Penemuan Fosil dan Artefak

                        </h3>

                        <p class="mt-2 text-gray-600 leading-7 text-justify">

                            Situs Semedo mulai dikenal melalui berbagai
                            penemuan fosil fauna purba, artefak batu,
                            dan fragmen Homo erectus oleh masyarakat sekitar.
                            Temuan-temuan tersebut menarik perhatian para peneliti
                            karena menunjukkan jejak kehidupan prasejarah di wilayah Tegal.

                        </p>

                    </div>

                </div>

                <!-- ITEM 2 -->
                <div class="relative flex gap-6 pb-10">

                    <div class="relative z-10
                        w-8 h-8 rounded-full
                        bg-[#0f766e]
                        border-4 border-white
                        shadow">

                    </div>

                    <div>

                        <span class="text-sm font-medium text-[#0f766e]">

                            2015

                        </span>

                        <h3 class="text-lg font-semibold text-gray-900 mt-1">

                            Pembangunan Museum Dimulai

                        </h3>

                        <p class="mt-2 text-gray-600 leading-7 text-justify">

                            Pemerintah mulai membangun Museum Situs Semedo
                            sebagai sarana penyimpanan, pelestarian,
                            penelitian, dan pameran berbagai temuan
                            dari kawasan Situs Semedo.

                        </p>

                    </div>

                </div>

                <!-- ITEM 3 -->
                <div class="relative flex gap-6 pb-10">

                    <div class="relative z-10
                        w-8 h-8 rounded-full
                        bg-[#0f766e]
                        border-4 border-white
                        shadow">

                    </div>

                    <div>

                        <span class="text-sm font-medium text-[#0f766e]">

                            2021

                        </span>

                        <h3 class="text-lg font-semibold text-gray-900 mt-1">

                            Museum Mulai Beroperasi

                        </h3>

                        <p class="mt-2 text-gray-600 leading-7 text-justify">

                            Museum mulai beroperasi dan menjadi pusat
                            edukasi serta informasi mengenai hasil penelitian
                            Situs Semedo bagi masyarakat, pelajar,
                            maupun peneliti.

                        </p>

                    </div>

                </div>

                <!-- ITEM 4 -->
                <div class="relative flex gap-6">

                    <div class="relative z-10
                        w-8 h-8 rounded-full
                        bg-[#0f766e]
                        border-4 border-white
                        shadow">

                    </div>

                    <div>

                        <span class="text-sm font-medium text-[#0f766e]">

                            12 Oktober 2022

                        </span>

                        <h3 class="text-lg font-semibold text-gray-900 mt-1">

                            Peresmian Museum Situs Semedo

                        </h3>

                        <p class="mt-2 text-gray-600 leading-7 text-justify">

                            Museum Situs Semedo resmi diresmikan dan
                            menjadi salah satu destinasi edukasi sejarah,
                            penelitian, dan wisata budaya yang penting
                            di Kabupaten Tegal.

                        </p>

                    </div>

                </div>

            </div>

        </section>



        <!-- ================= VISI MISI ================= -->
        <section class="grid md:grid-cols-2 gap-8">

            <!-- VISI -->
            <div class="bg-white border border-gray-200
                        rounded-2xl shadow-sm p-8 space-y-4">

                <h2 class="text-2xl font-semibold text-[#0f2a2c]">
                    Visi
                </h2>

                <p class="text-gray-700 leading-relaxed text-justify">
                    Menjadi ruang jelajah warisan budaya dan sejarah yang bersifat
                    kolaboratif serta mendorong daya cipta, perubahan sosial, dan
                    pembangunan karakter masyarakat yang berbudaya melalui pelestarian
                    nilai-nilai sejarah prasejarah.
                </p>
            </div>


            <!-- MISI -->
            <div class="bg-white border border-gray-200
                        rounded-2xl shadow-sm p-8 space-y-4">

                <h2 class="text-2xl font-semibold text-[#0f2a2c]">
                    Misi
                </h2>

                <ul class="list-disc ml-5 space-y-2 text-gray-700 text-justify">
                    <li>Mewujudkan pengelolaan koleksi dan cagar budaya yang berkelanjutan.</li>
                    <li>Melaksanakan pelayanan dan pelibatan masyarakat secara terpadu.</li>
                    <li>Mengembangkan edukasi sejarah yang inovatif dan interaktif.</li>
                    <li>Mendukung penelitian ilmiah dan pembelajaran akademik.</li>
                    <li>Menjalin kemitraan dalam pelestarian budaya.</li>
                    <li>Mewujudkan tata kelola museum yang profesional.</li>
                </ul>

            </div>

        </section>

        <!-- ========================================= -->
        <!-- KONTRIBUSI MUSEUM -->
        <!-- ========================================= -->

        <section>

            <div class="text-center mb-10">

                <span class="text-sm font-medium text-[#0f766e]">

                    Kontribusi Museum

                </span>

                <h2 class="mt-2 text-3xl font-bold text-[#0f2a2c]">

                    Nilai dan Manfaat Museum Semedo

                </h2>

                <p class="mt-4
                    max-w-2xl mx-auto
                    text-sm text-gray-500
                    leading-7">

                    Museum Semedo tidak hanya berfungsi sebagai tempat
                    penyimpanan koleksi, tetapi juga menjadi pusat edukasi,
                    penelitian, pelestarian, dan pengembangan wisata budaya.

                </p>

            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">

                <!-- EDUKASI -->
                <div class="bg-white border border-gray-200
                    rounded-3xl p-6 shadow-sm">

                    <div class="w-12 h-12 rounded-2xl
                        bg-cyan-50 flex items-center justify-center mb-5">

                        <i data-lucide="graduation-cap"
                            class="w-6 h-6 text-cyan-600">
                        </i>

                    </div>

                    <h3 class="font-semibold text-gray-900">

                        Edukasi

                    </h3>

                    <p class="mt-3 text-sm text-gray-600 leading-6">

                        Menjadi media pembelajaran mengenai
                        kehidupan prasejarah melalui koleksi
                        fosil dan artefak autentik.

                    </p>

                </div>

                <!-- PENELITIAN -->
                <div class="bg-white border border-gray-200
                    rounded-3xl p-6 shadow-sm">

                    <div class="w-12 h-12 rounded-2xl
                        bg-emerald-50 flex items-center justify-center mb-5">

                        <i data-lucide="microscope"
                            class="w-6 h-6 text-emerald-600">
                        </i>

                    </div>

                    <h3 class="font-semibold text-gray-900">

                        Penelitian

                    </h3>

                    <p class="mt-3 text-sm text-gray-600 leading-6">

                        Mendukung penelitian ilmiah terkait
                        paleontologi, arkeologi, dan sejarah
                        manusia purba di Indonesia.

                    </p>

                </div>

                <!-- PELESTARIAN -->
                <div class="bg-white border border-gray-200
                    rounded-3xl p-6 shadow-sm">

                    <div class="w-12 h-12 rounded-2xl
                        bg-amber-50 flex items-center justify-center mb-5">

                        <i data-lucide="shield-check"
                            class="w-6 h-6 text-amber-600">
                        </i>

                    </div>

                    <h3 class="font-semibold text-gray-900">

                        Pelestarian

                    </h3>

                    <p class="mt-3 text-sm text-gray-600 leading-6">

                        Menjaga dan melestarikan warisan budaya
                        serta temuan prasejarah untuk generasi
                        masa depan.

                    </p>

                </div>

                <!-- PARIWISATA -->
                <div class="bg-white border border-gray-200
                    rounded-3xl p-6 shadow-sm">

                    <div class="w-12 h-12 rounded-2xl
                        bg-purple-50 flex items-center justify-center mb-5">

                        <i data-lucide="map-pinned"
                            class="w-6 h-6 text-purple-600">
                        </i>

                    </div>

                    <h3 class="font-semibold text-gray-900">

                        Pariwisata

                    </h3>

                    <p class="mt-3 text-sm text-gray-600 leading-6">

                        Menjadi destinasi wisata edukatif yang
                        memperkenalkan sejarah dan budaya
                        Kabupaten Tegal.

                    </p>

                </div>

            </div>

        </section>

        <!-- ========================================= -->
        <!-- PERAN MUSEUM -->
        <!-- ========================================= -->

        <section class="bg-gradient-to-br
            from-[#062b30]
            via-[#0f3c44]
            to-[#14535d]
            rounded-[32px]
            p-10 md:p-12
            text-white">

            <div class="max-w-4xl">

                <span class="text-sm font-medium text-cyan-300">

                    Peran bagi Masyarakat

                </span>

                <h2 class="mt-3 text-3xl font-bold">

                    Museum Sebagai Pusat Edukasi dan Pelestarian

                </h2>

                <p class="mt-6 text-white/80 leading-8 text-justify">

                    Museum Semedo berperan sebagai pusat edukasi,
                    penelitian, dan wisata budaya yang membantu
                    meningkatkan kesadaran masyarakat terhadap
                    pentingnya pelestarian warisan sejarah.
                    Selain menjadi sarana pembelajaran bagi pelajar,
                    mahasiswa, dan peneliti, museum juga mendukung
                    pengembangan pariwisata edukatif yang memberikan
                    manfaat sosial dan budaya bagi masyarakat
                    Kabupaten Tegal dan sekitarnya.

                </p>

            </div>

        </section>

    </div>

</div>

</x-app-layout>