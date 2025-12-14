-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 14 Des 2025 pada 08.14
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pofin_deposito`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_simpan_simulasi_lengkap` (IN `p_id_user` INT, IN `p_id_bank` INT, IN `p_nominal_deposito` DECIMAL(15,2), IN `p_jangka_waktu_bulan` INT, OUT `p_status` VARCHAR(50), OUT `p_message` VARCHAR(255), OUT `p_bunga_diterima` DECIMAL(15,2), OUT `p_total_akhir` DECIMAL(15,2))   BEGIN
    DECLARE v_suku_bunga DECIMAL(5,2);
    DECLARE v_suku_bunga_per_bulan DECIMAL(10,8);
    DECLARE v_power_result DECIMAL(20,10);
    
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SET p_status = 'ERROR';
        SET p_message = 'Terjadi kesalahan saat menyimpan';
    END;

    START TRANSACTION;

    
    IF p_nominal_deposito < 1000000 THEN
        SET p_status = 'ERROR';
        SET p_message = 'Nominal minimal Rp 1.000.000';
        ROLLBACK;
    
    ELSEIF p_jangka_waktu_bulan NOT IN (1, 3, 6, 12) THEN
        SET p_status = 'ERROR';
        SET p_message = 'Jangka waktu harus 1, 3, 6, atau 12 bulan';
        ROLLBACK;
    
    ELSE
        
        SELECT suku_bunga_dasar INTO v_suku_bunga
        FROM banks
        WHERE id_bank = p_id_bank AND is_active = 'aktif'
        LIMIT 1;

        
        IF v_suku_bunga IS NULL THEN
            SET p_status = 'ERROR';
            SET p_message = 'Bank tidak ditemukan atau tidak aktif';
            ROLLBACK;
        ELSE
            
            
            
            SET v_suku_bunga_per_bulan = (v_suku_bunga / 100) / 12;
            
            
            SET v_power_result = POW((1 + v_suku_bunga_per_bulan), p_jangka_waktu_bulan);
            
            
            SET p_total_akhir = p_nominal_deposito * v_power_result;
            
            
            SET p_bunga_diterima = p_total_akhir - p_nominal_deposito;

            
            INSERT INTO simulations (
                id_user, id_bank, nominal_deposito,
                jangka_waktu_bulan, bunga_diterima, total_akhir,
                waktu_simulasi, created_at, updated_at
            ) VALUES (
                p_id_user, p_id_bank, p_nominal_deposito,
                p_jangka_waktu_bulan, ROUND(p_bunga_diterima, 0), ROUND(p_total_akhir, 0),
                NOW(), NOW(), NOW()
            );

            SET p_status = 'SUCCESS';
            SET p_message = 'Simulasi berhasil dihitung dan disimpan';
            COMMIT;
        END IF;
    END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `banks`
--

CREATE TABLE `banks` (
  `id_bank` bigint(20) UNSIGNED NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `kode_bank` varchar(50) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `suku_bunga_dasar` decimal(5,2) NOT NULL,
  `is_active` enum('aktif','nonaktif') NOT NULL DEFAULT 'nonaktif',
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_backup_replikasi`
--

CREATE TABLE `log_backup_replikasi` (
  `id_log` bigint(20) UNSIGNED NOT NULL,
  `jenis_aktivitas` enum('backup','restore','replikasi') NOT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  `lokasi_file` varchar(255) DEFAULT NULL,
  `ukuran_file` bigint(20) DEFAULT NULL COMMENT 'Ukuran dalam bytes',
  `status` enum('berhasil','gagal','proses') NOT NULL,
  `keterangan` text DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'User yang melakukan aktivitas',
  `tanggal_aktivitas` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_12_11_105911_create_banks_table', 1),
(5, '2025_12_11_110217_create_log_backup_replikasi_table', 1),
(6, '2025_12_13_092352_simulations', 1),
(7, '2025_12_13_093441_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `simulations`
--

CREATE TABLE `simulations` (
  `id_simulasi` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_bank` bigint(20) UNSIGNED NOT NULL,
  `nominal_deposito` decimal(15,2) NOT NULL,
  `jangka_waktu_bulan` int(11) NOT NULL,
  `bunga_diterima` decimal(15,2) NOT NULL,
  `total_akhir` decimal(15,2) NOT NULL,
  `waktu_simulasi` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama_lengkap`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', NULL, '$2y$12$.a0vsLmJFgoIVdhB5EiVruCq5afrqW17mVycLtzJhAWgryyQwC4Hu', 'admin', NULL, '2025-12-14 07:13:50', '2025-12-14 07:13:50');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log_backup_replikasi`
--
ALTER TABLE `log_backup_replikasi`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `log_backup_replikasi_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `simulations`
--
ALTER TABLE `simulations`
  ADD PRIMARY KEY (`id_simulasi`),
  ADD KEY `simulations_id_user_foreign` (`id_user`),
  ADD KEY `simulations_id_bank_foreign` (`id_bank`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `banks`
--
ALTER TABLE `banks`
  MODIFY `id_bank` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `log_backup_replikasi`
--
ALTER TABLE `log_backup_replikasi`
  MODIFY `id_log` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `simulations`
--
ALTER TABLE `simulations`
  MODIFY `id_simulasi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `log_backup_replikasi`
--
ALTER TABLE `log_backup_replikasi`
  ADD CONSTRAINT `log_backup_replikasi_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `simulations`
--
ALTER TABLE `simulations`
  ADD CONSTRAINT `simulations_id_bank_foreign` FOREIGN KEY (`id_bank`) REFERENCES `banks` (`id_bank`) ON DELETE CASCADE,
  ADD CONSTRAINT `simulations_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
