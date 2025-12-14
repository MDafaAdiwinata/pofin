  <nav data-aos="fade-down" data-aos-duration="1000" data-aos-delay="2000" id="navbar"
      class="z-50 backdrop-blur-md fixed w-full start-0 end-0 top-0 transition duration-500">
      <div
          class="max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl 2xl:max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto p-8 transition-all duration-300 ease-in-out" id="navbarContent">
          <!-- Logo -->
          <a href="#" class="flex items-center space-x-4 rtl:space-x-reverse">
              <img src="{{ Vite::asset('resources/img/logo.svg') }}" class="h-10" alt="Pofin Deposito" />
              <h1 class="text-[#1a1a1a] font-bold text-2xl">
                Pofin
              </h1>
          </a>

          <!-- Tombol (DESKTOP) -->
          @if (Route::has('login'))
              <div class="hidden md:flex md:order-2 space-x-2 rtl:space-x-reverse">
                  @auth
                      <a href="{{ route('dashboard') }}"
                          class="text-[#000]/60 border border-[#000]/30 font-bold rounded-xl text-md px-4 py-2 text-center hover:bg-[#000]/10 hover:cursor-pointer transition">
                          Dashboard
                      </a>
                  @else
                      @if (Route::has('register'))
                          <a href="{{ route('register') }}"
                              class="text-[#1a1a1a] border border-[#ccc] font-bold rounded-xl text-md px-4 py-2 text-center hover:bg-[#475449]/10 hover:cursor-pointer hover:scale-95 transition duration-300">
                              Daftar
                          </a>
                      @endif
                      <a href="{{ route('login') }}"
                          class="text-[#F6F6F8] border border-[#000]/0 font-bold rounded-xl text-md px-4 py-2 text-center bg-[#475449] hover:bg-black hover:scale-95 hover:cursor-pointer transition duration-300">
                          Masuk
                      </a>
                  @endauth
              </div>
          @endif

          <!-- HAMBURGER MENU (MOBILE) -->
          <button data-collapse-toggle="navbar-cta" type="button"
              class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-[#000]/50 rounded-lg md:hidden hover:bg-[#000]/10 focus:outline-none focus:ring-2 focus:ring-[#000]/40"
              aria-controls="navbar-cta" aria-expanded="false">
              <span class="sr-only">Open main menu</span>
              <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                  viewBox="0 0 17 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M1 1h15M1 7h15M1 13h15" />
              </svg>
          </button>

          <!-- NAVIGATION LINKS + TOMBOL DAFTAR/MASUK (MOBILE) -->
          <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="navbar-cta">
              <ul
                  class="text-lg flex flex-col font-light p-4 md:p-0 mt-8 md:bg-transparent border border-[#000]/20 bg-[var(--color-bg-secondary)] rounded-xl lg:space-x-10 rtl:space-x-reverse lg:flex-row lg:mt-0 lg:border-0">
                  <!-- Link Navigasi -->
                  <li>
                      <a href="/"
                          class="text-center md:text-start mb-3 md:mb-0 block py-2 px-3 md:p-0 text-[var(--color-txt-primary)] rounded-lg md:bg-transparent md:text-[#000]/80 md:dark:hover:text-[#000]">
                          Beranda
                      </a>
                  </li>
                  <li>
                      <a href="about"
                          class="text-center md:text-start mb-3 md:mb-0 block py-2 px-3 md:p-0 text-[var(--color-txt-primary)] rounded-lg md:bg-transparent md:text-[#000]/80 md:dark:hover:text-[#000]">
                          Tentang
                      </a>
                  </li>
                  <li>
                      <a href="bank"
                          class="text-center md:text-start mb-3 md:mb-0 block py-2 px-3 md:p-0 text-[var(--color-txt-primary)] rounded-lg md:bg-transparent md:text-[#000]/80 md:dark:hover:text-[#000]">
                          Bank
                      </a>
                  </li>
                  <li>
                      <a href="layanan"
                          class="text-center md:text-start mb-3 md:mb-0 block py-2 px-3 md:p-0 text-[var(--color-txt-primary)] rounded-lg md:bg-transparent md:text-[#000]/80 md:dark:hover:text-[#000]">
                          Layanan
                      </a>
                  </li>
                  <li>
                      <a href="kontak"
                          class="text-center md:text-start mb-3 md:mb-0 block py-2 px-3 md:p-0 text-[var(--color-txt-primary)] rounded-lg md:bg-transparent md:text-[#000]/80 md:dark:hover:text-[#000]">
                          Hubungi Kami
                      </a>
                  </li>

                  <!-- TOMBOL DAFTAR & MASUK (MOBILE SAJA) -->
                  <li class="block md:hidden mt-4 space-y-3">
                      @auth
                      @else
                          @if (Route::has('register'))
                              <a href="{{ route('register') }}"
                                  class="flex items-center justify-center w-full text-[#1a1a1a]/80 border border-[#000]/30 font-bold rounded-xl text-md px-4 py-2 text-center hover:bg-[#fff]/50 hover:cursor-pointer transition hover:scale-95">
                                  Daftar
                              </a>
                          @endif
                          <a href="{{ route('login') }}"
                              class="flex items-center justify-center text-[#F6F6F8] bg-[#475449] font-bold rounded-xl text-md px-4 py-2 text-center hover:scale-95 hover:cursor-pointer transition">
                              Masuk
                          </a>
                      @endauth
                  </li>
              </ul>
          </div>
      </div>
  </nav>
