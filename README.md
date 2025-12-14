Sistem Informasi Inventaris Barang Berbasis Web
  Deskripsi Singkat
Sistem Informasi Inventaris Barang merupakan aplikasi berbasis web yang digunakan untuk mengelola data inventaris secara terstruktur. Sistem ini dirancang untuk membantu proses pencatatan barang agar lebih rapi, terpusat, dan mudah diakses dibandingkan pencatatan manual.
Proyek ini dibuat sebagai **mini project Sistem Informasi** dengan ruang lingkup sederhana namun fungsional.
  
  Tujuan Pengembangan
* Mempermudah pencatatan data inventaris barang
* Mengurangi kesalahan pencatatan manual
* Menyediakan informasi stok barang secara cepat dan akurat

  Ruang Lingkup Sistem
* Sistem hanya digunakan oleh **admin**
* Fitur utama meliputi:
  - Login dan logout
  - Pengelolaan data barang (Create, Read, Update, Delete)
  - Pencarian data barang
  - Perhitungan total stok

* Tidak mencakup:
  - Multi-user
  - Laporan PDF
  - Notifikasi

  Teknologi yang Digunakan
* PHP Native
* MySQL
* HTML & CSS
  
  Struktur Folder
inventaris/
│
├── assets/
│   └── style.css
│
├── auth/
│   ├── login.php
│   └── logout.php
│
├── barang/
│   ├── index.php
│   ├── tambah.php
│   ├── edit.php
│   └── hapus.php
│
├── config/
│   └── database.php
│
├── dashboard.php
└── index.php

  Struktur Database
### Tabel `users`

| Field    | Tipe    | Keterangan      |
| -------- | ------- | --------------- |
| id       | INT     | Primary key     |
| username | VARCHAR | Username admin  |
| password | VARCHAR | Password (hash) |

### Tabel `barang`

| Field       | Tipe      | Keterangan                    |
| ----------- | --------- | ----------------------------- |
| id          | INT       | Primary key                   |
| nama_barang | VARCHAR   | Nama barang                   |
| jumlah      | INT       | Stok barang                   |
| lokasi      | VARCHAR   | Lokasi penyimpanan            |
| kondisi     | ENUM      | Kondisi barang (baik / rusak) |
| created_at  | TIMESTAMP | Waktu input data              |

  Alur Sistem

1. Admin melakukan login
2. Sistem memverifikasi data login menggunakan session
3. Admin mengakses dashboard
4. Admin mengelola data barang (tambah, ubah, hapus, lihat)
5. Admin dapat melakukan pencarian barang
6. Admin logout dari sistem

  Keamanan Dasar

* Menggunakan session untuk pembatasan akses halaman
* Password disimpan dalam bentuk hash
* Validasi akses halaman agar tidak bisa diakses tanpa login

Status Proyek

* Status: **Selesai**
* Jenis: Mini Project Sistem Informasi
* Skala: Kecil / Pemula

---

  Catatan
mini proyek ini merupakan pembelajaran pertama bagi pembuat program dalam memahami alur mode view controller menggunakan bahasa PHP
