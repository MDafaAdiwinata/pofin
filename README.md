<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Website Simulasi Deposito Bank **POFIN (Deposito Finansial)**

## 📌 Deskripsi Proyek

Website **Simulasi Deposito Bank POFIN (Deposito Finansial)** adalah aplikasi berbasis web yang dibuat untuk membantu pengguna melakukan simulasi perhitungan deposito pada berbagai bank. Aplikasi ini menyediakan fitur simulasi, pencatatan histori, serta pembuatan laporan dalam format **PDF** dan **Excel**, baik untuk pengguna (user) maupun admin.

Aplikasi ini dibangun menggunakan framework **Laravel** dengan pendekatan modern dan antarmuka yang responsif.

---

## 👤 Identitas Pembuat

* **Nama**: *Muhammad Dafa Adiwinata*
* **Role**: Web Developer / Fullstack Developer
* **Proyek**: Project SAS Pemrograman Website | Simulasi Deposito Bank

---

## 🛠️ Teknologi & Framework yang Digunakan

### Backend

* **PHP**
* **Laravel Framework**
* **Laravel Breeze (Authentication)**
* **Composer**

### Frontend

* **HTML**
* **CSS**
* **JavaScript**
* **Tailwind CSS**
* **Alpine.js**

### Library Tambahan

* **DOMPDF** (Cetak laporan PDF)
* **Laravel Excel** (Ekspor laporan ke Excel)

### Database & Server

* **MySQL**
* **XAMPP**
* **phpMyAdmin**

### Tools Pendukung

* **Visual Studio Code**
* **Node.js**
* **NPM**

---

## 🔐 Fitur Autentikasi

### User

* Registrasi akun user
* Login user
* Logout

### Admin

* Login admin
* Logout

---

## 👤 Fitur Manajemen Akun (User)

* Update profil pengguna
* Update password
* Hapus akun pengguna

---

## 📊 Fitur Dashboard User

Dashboard user menyediakan berbagai informasi dan fitur, antara lain:

* Statistik data simulasi
* Total uang deposito
* Total bank yang tersedia
* Total simulasi deposito
* Form simulasi deposito
* Histori simulasi deposito
* Cetak laporan histori deposito dalam format **PDF**
* Cetak laporan histori deposito dalam format **Excel** (khusus histori yang dapat dipilih)

---

## 🛠️ Fitur Dashboard Admin

Dashboard admin berfungsi untuk pengelolaan data sistem secara menyeluruh, meliputi:

### Statistik Admin

* Statistik total user
* Statistik total simulasi deposito
* Statistik total uang deposito
* Statistik total bank

### Manajemen Data

* **CRUD Bank** (Create, Read, Update, Delete)
* **CRUD User**

### Laporan

* Cetak laporan simulasi deposito dalam format **PDF**
* Cetak laporan simulasi deposito dalam format **Excel**

---

## 📄 Jenis Laporan yang Didukung

* Laporan histori simulasi deposito user (PDF & Excel)
* Laporan keseluruhan simulasi deposito (Admin)

---

## ⚙️ Cara Instalasi & Menjalankan Proyek

Berikut langkah-langkah untuk melakukan **cloning**, konfigurasi, dan menjalankan website **POFIN Deposito Finansial** di lingkungan lokal.

### 1️⃣ Clone Repository dari GitHub

```bash
git clone https://github.com/username/nama-repository.git
```

Masuk ke folder project:

```bash
cd nama-repository
```

---

### 2️⃣ Install Dependency Backend (Laravel)

Pastikan **Composer** sudah terinstall, lalu jalankan:

```bash
composer install
```

---

### 3️⃣ Install Dependency Frontend

Pastikan **Node.js & NPM** sudah terinstall:

```bash
npm install
npm run build
```

---

### 4️⃣ Konfigurasi File Environment (.env)

Salin file `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

Atur konfigurasi database di file `.env`:

```env
DB_DATABASE=db_pofin_deposito
DB_USERNAME=root
DB_PASSWORD=
```

---

### 5️⃣ Migrasi Database

Jalankan perintah migrasi untuk membuat tabel:

```bash
php artisan migrate
```

---

### 6️⃣ Jalankan Seeder

Untuk mengisi data awal (admin, bank, dll):

```bash
php artisan db:seed
```

Atau seeder tertentu:

```bash
php artisan db:seed --class=AdminSeeder
```

---

### 7️⃣ Jalankan Server Laravel

```bash
php artisan serve
```

Akses aplikasi melalui browser:

```
http://127.0.0.1:8000
```

---

### 8️⃣ Akun Admin Default

Gunakan akun berikut untuk login sebagai admin:

* **Email**: [admin@gmail.com](mailto:admin@gmail.com)
* **Password**: admin123

---

## 🚀 Tujuan Pengembangan

* Membantu pengguna memahami perhitungan deposito bank
* Melatih penerapan framework Laravel dalam proyek nyata
* Mengimplementasikan fitur autentikasi, CRUD, dan reporting

---

## 📝 Catatan

Proyek ini dikembangkan sebagai bagian dari pembelajaran dan implementasi konsep **Pemrograman Website**, **Database Management**, dan **Framework Laravel**.

---

## 📌 Penutup

Website **POFIN Deposito Finansial** diharapkan dapat menjadi media simulasi yang informatif, mudah digunakan, dan bermanfaat bagi pengguna dalam memahami produk deposito perbankan.

---

✨ *Dikembangkan dengan Laravel & Tailwind CSS*
