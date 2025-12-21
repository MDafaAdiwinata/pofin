<div id="modal-update" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-[#183120] rounded-xl shadow-sm">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-white/20">
                <h3 class="text-xl font-semibold text-[#f6f6f8]">
                    Informasi Update Fitur - Pofin
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="modal-update">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 md:pb-8 space-y-4">
                <p class="text-base leading-relaxed text-[#f6f6f8]/80">
                    Kami Menemukan Beberapa Kesalahan atau Bug di dalam website, sehingga di perlukan tindakan segera
                    untuk memperbaiki kesalahan atau bug tersebut demi kenyamanan pengguna dalam simulasi deposito
                    menggunakan platform pofin.
                </p>
                <p class="text-[#f6f6f8] font-bold text-md md:text-lg">
                    🔧 Perbaikan yang Telah Dilakukan
                </p>
                <ol class="text-[#f6f6f8] list-disc mx-6">
                    <li class="mb-4">
                        <p class="font-semibold">
                            Perbaikan logika pencarian data bank
                        </p>
                        <p class="font-light">
                            Sistem pencarian kini bekerja lebih akurat dan responsif dalam menampilkan data bank sesuai
                            kata kunci yang dimasukkan pengguna.
                        </p>
                    </li>
                    <li>
                        <p class="font-semibold">
                            Penambahan tombol Dashboard pada landing page ( Mobile View )
                        </p>
                        <p class="font-light">
                            Tombol Dashboard kini ditampilkan secara otomatis ketika pengguna sudah login, sehingga
                            memudahkan akses langsung ke halaman utama pengguna.
                        </p>
                    </li>
                    <li>
                        <p class="font-semibold">
                            Pembaruan informasi pada section FAQ
                        </p>
                        <p class="font-light">
                            Informasi pada bagian FAQ telah diperbarui dan disesuaikan dengan kondisi serta fitur
                            terbaru agar pengguna mendapatkan penjelasan yang lebih relevan dan jelas.
                        </p>
                    </li>
                </ol>
                <p class="text-[#f6f6f8] font-bold text-md md:text-lg">
                    🚀 Rencana Pengembangan Selanjutnya
                </p>
                <ol class="text-[#f6f6f8] list-disc mx-6">
                    <li class="">
                        <p class="font-semibold">
                            Pengembangan menggunakan React (Single Page Application)
                        </p>
                        <p class="font-light">
                            Pofin akan menggunakan teknologi React dan dikembangkan sebagai Single Page Application
                            (SPA), sehingga perpindahan halaman dapat dilakukan tanpa reload dan memberikan pengalaman
                            pengguna yang lebih cepat serta interaktif.
                        </p>
                    </li>
                </ol>
            </div>
            <!-- Modal footer -->
            <div
                class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">

                <p class="text-sm text-gray-600 dark:text-gray-300">
                    Bagikan Pofin melalui:
                </p>

                <div class="flex items-center gap-3">
                    <!-- WhatsApp -->
                    <a href="https://wa.me/?text=Yuk%20coba%20simulasi%20deposito%20di%20Pofin!%20👉%20https://pofin.my.id"
                        target="_blank"
                        class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700">
                        WhatsApp
                    </a>

                    <!-- Instagram -->
                    <a href="https://www.instagram.com/" target="_blank"
                        class="px-4 py-2 text-sm font-medium text-white bg-pink-600 rounded-lg hover:bg-pink-700">
                        Instagram
                    </a>

                    <!-- Copy Link -->
                    <button onclick="copyLink()"
                        class="px-4 py-2 text-sm font-medium text-gray-900 bg-gray-100 rounded-lg hover:bg-gray-200 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
                        Salin Tautan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
