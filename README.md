<div align="center">

# ⚠️ IReport
### Platform Pelaporan Infrastruktur Publik

**Laporkan · Pantau · Perbaiki**

[![Laravel](https://img.shields.io/badge/Laravel-10.50.2-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2.4-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-MariaDB_10.4-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://mariadb.org)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-4.0-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com)

[![Status](https://img.shields.io/badge/Status-Portfolio_Project-22c55e?style=flat-square)](.)
[![License](https://img.shields.io/badge/License-MIT-f59e0b?style=flat-square)](LICENSE)
[![PHPUnit](https://img.shields.io/badge/Testing-PHPUnit_10-3178c6?style=flat-square)](https://phpunit.de)

</div>

---

## 📖 Tentang Proyek

**IReport** adalah sistem pelaporan infrastruktur publik berbasis web yang memungkinkan warga melaporkan kerusakan seperti jalan berlubang, lampu mati, dan trotoar rusak — agar segera ditindaklanjuti oleh pihak berwenang.

Proyek ini dikembangkan sebagai **portofolio akademik** oleh tim 5 mahasiswa, dibangun di atas **Laravel 10** (di-upgrade dari Laravel 6) dengan sistem autentikasi berbasis role (*Role-Based Access Control*).

> 🔗 **Live Demo (Static Showcase):** Tersedia di folder [`/deploy`](./deploy) — dapat di-host di Netlify

---

## ✨ Fitur Utama

| Fitur | Deskripsi |
|-------|-----------|
| 📝 **Kirim Laporan** | Reporter dapat membuat laporan lengkap dengan foto, lokasi provinsi, dan kategori kerusakan |
| 👍 **Sistem Voting** | Upvote/downvote laporan untuk menentukan prioritas penanganan secara demokratis |
| 💬 **Komentar** | Warga bisa menambahkan komentar pada laporan untuk informasi tambahan |
| 📰 **Berita Infrastruktur** | Admin mempublikasikan berita terkini seputar pembangunan & perbaikan |
| 🗺️ **Filter Provinsi** | Saring laporan berdasarkan wilayah provinsi |
| 🛡️ **Panel Admin** | Dashboard pengelolaan lengkap: moderasi laporan, kelola user, approve reporter |
| 👤 **Manajemen Profil** | Upload foto diri, kelola data profil pribadi |
| 🔐 **RBAC** | 3 level akses: Guest, Reporter, Admin dengan middleware khusus |

---

## 🏗️ Arsitektur Sistem

```
Browser → Router (routes/web.php) → Middleware (Auth, CSRF, CheckRole)
       → Controller (Business Logic)
       → Model (Eloquent ORM) ↔ MySQL Database
       → View (Blade Template) → Response
```

### Sistem Role

```
role = 0  →  User     : Lihat laporan & berita, registrasi
role = 1  →  Reporter : Buat laporan, upload foto, vote, komentar, profil
role = 2  →  Admin    : Semua akses + moderasi, kelola user, kelola berita
```

Pengajuan menjadi Reporter harus di-**approve** oleh Admin terlebih dahulu.

---

## 🗄️ Skema Database

<details>
<summary><b>Lihat 6 tabel database</b></summary>

```
┌─────────────────────────────────────────────────────┐
│  users          │  profile                           │
│  ─────────      │  ─────────                         │
│  id (PK)        │  id (PK)                           │
│  name           │  tempatLahir                       │
│  email (unique) │  tanggalLahir (date)               │
│  password       │  pengajuan (default '-')           │
│  pengajuan      │  foto (nullable)                   │
│  role (0/1/2)   │  point (nullable)                  │
│  timestamps     │  user_id (FK → users)              │
└─────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────┐
│  laporan        │  berita                            │
│  ─────────      │  ─────────                         │
│  id (PK)        │  id (PK)                           │
│  judul          │  judul                             │
│  deskripsi      │  deskripsi (text)                  │
│  foto           │  sumber                            │
│  provinsi       │  tgl (date, nullable)              │
│  kategori       │  foto (nullable)                   │
│  status         │  user_id (FK → users, nullable)    │
│  vote (int)     │  timestamps                        │
│  tanggal (date) │                                    │
│  user_id (FK)   │                                    │
│  timestamps     │                                    │
└─────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────┐
│  komentar       │  ourteam                           │
│  ─────────      │  ─────────                         │
│  id (PK)        │  id (PK)                           │
│  isi (text)     │  foto                              │
│  profil_id (FK) │  nama                              │
│  laporan_id(FK) │  quote                             │
│  timestamps     │  (no timestamps)                   │
└─────────────────────────────────────────────────────┘
```

</details>

---

## 🚀 Instalasi & Menjalankan

### Prasyarat

- PHP >= 8.2
- Composer 2.x
- MySQL / MariaDB
- Git

### Langkah Instalasi

```bash
# 1. Clone repository
git clone https://github.com/alaric2001/IREPORT.git
cd IREPORT

# 2. Install dependensi PHP
composer install

# 3. Salin konfigurasi environment
cp .env.example .env
php artisan key:generate
```

### Konfigurasi Database

Edit file `.env` sesuai konfigurasi lokal:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_ireport
DB_USERNAME=root
DB_PASSWORD=
```

### Migrasi & Seeding

```bash
# Buat tabel + isi data awal
php artisan migrate --seed

# Atau reset total dari awal
php artisan migrate:fresh --seed

# Jalankan server
php artisan serve
```

Akses di: **http://localhost:8000**

---

## 🔑 Akun Default (Setelah Seeding)

> Semua akun menggunakan password: **`123`** (di-hash dengan bcrypt)

| Email | Role | Akses |
|-------|------|-------|
| `w@mail.com` | Admin | Panel admin penuh |
| `tes@mail.com` | Reporter | Buat laporan, vote, komentar |
| `bro@mail.com` | User | Lihat laporan & berita |

---

## 📁 Struktur Proyek

```
IREPORT/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/               ← Login, register, reset password
│   │   │   ├── BeritaController.php
│   │   │   ├── KomentarController.php
│   │   │   ├── LaporanController.php
│   │   │   ├── OurteamController.php
│   │   │   └── ProfileController.php
│   │   └── Middleware/
│   │       ├── CheckRole.php       ← RBAC middleware
│   │       └── ...
│   ├── Berita.php                  ← Model (di app/, bukan app/Models/)
│   ├── Laporan.php
│   ├── Komentar.php
│   ├── Profile.php
│   ├── Ourteam.php
│   └── User.php
│
├── database/
│   ├── migrations/                 ← 9 anonymous-class migrations (L10)
│   └── seeders/                    ← User, Profile, Berita, Laporan, Komentar, Ourteam
│
├── resources/views/
│   ├── admin/                      ← Panel admin
│   ├── auth/                       ← Login & register
│   ├── berita/
│   ├── laporan/
│   └── layouts/                    ← Base layout Blade
│
├── routes/
│   └── web.php                     ← Semua route (FQCN syntax)
│
├── deploy/                         ← Static showcase (Netlify)
│   ├── index.html
│   ├── docs.html                   ← Dokumentasi teknis untuk recruiter
│   └── assets/ (css, js, data)
│
├── .env.example
├── composer.json                   ← Laravel 10, PHP ^8.2
└── CLAUDE.md                       ← Panduan konteks untuk AI assistant
```

---

## 🛠️ Tech Stack

| Teknologi | Versi | Peran |
|-----------|-------|-------|
| **Laravel** | 10.50.2 | Framework PHP utama — routing, ORM, auth, Blade |
| **PHP** | 8.2.4 | Runtime server-side |
| **MySQL/MariaDB** | 10.4 | Database relasional |
| **Bootstrap** | 4.0 | UI framework — grid, komponen, responsif |
| **JavaScript** | ES6+ | Interaksi client-side |
| **PHPUnit** | 10.1 | Framework testing |
| **Composer** | 2.x | Package manager PHP |
| **Laravel UI** | 4.0 | Auth scaffolding (login, register) |

<details>
<summary><b>Catatan Upgrade: Laravel 6 → 10</b></summary>

Proyek ini mengalami upgrade major dari Laravel 6 ke Laravel 10. Perubahan utama yang dilakukan:

- ✅ Anonymous class migrations (menggantikan class bernama)
- ✅ `$middlewareAliases` menggantikan `$routeMiddleware` di `Kernel.php`
- ✅ FQCN controllers di routes (menggantikan string-based namespace)
- ✅ `fideloper/proxy` → built-in `Illuminate\Http\Middleware\TrustProxies`
- ✅ `facade/ignition` → `spatie/laravel-ignition ^2.0`
- ✅ `Handler.php` menggunakan interface `Throwable` (PHP 8)
- ✅ PHPUnit 8 → PHPUnit 10 dengan format konfigurasi baru
- ✅ Seeders dipindah ke `database/seeders/` dengan namespace `Database\Seeders`

</details>

---

## 🔒 Keamanan

- **bcrypt** — semua password di-hash menggunakan `Hash::make()`
- **CSRF Protection** — semua form dilindungi token CSRF bawaan Laravel
- **Role Middleware** — `CheckRole` memblokir akses berdasarkan kolom `role`
- **Input Validation** — validasi Laravel Form Request di sisi server
- **Session Auth** — session diinvalidasi saat logout

---

## 🌐 Static Showcase (Netlify)

Folder [`/deploy`](./deploy) adalah versi statis yang di-deploy ke **Netlify** sebagai demo tanpa server PHP. Tampilannya meniru UI asli aplikasi IReport — lengkap dengan navbar, search bar, dan grid kartu laporan.

```
deploy/
├── index.html        ← Demo UI halaman laporan (data inline di app.js)
├── docs.html         ← Dokumentasi teknis untuk recruiter
├── favicon.ico / .svg / .png
└── assets/
    ├── css/          ← style.css (user pages), docs.css
    ├── js/           ← app.js (render kartu laporan), docs.js (scroll-spy)
    └── data/         ← laporan.json + data dokumentasi lainnya
```

> **Catatan:** Data laporan di-embed langsung di `app.js` (bukan via `fetch`) agar berfungsi saat dibuka lokal via `file://` maupun setelah deploy ke Netlify.

**Deploy ke Netlify:** Sudah dikonfigurasi via `netlify.toml` di root repo:
```toml
# netlify.toml (root repository)
[build]
  publish = "deploy"
```

--- 

## 👥 Tim Pengembang

| Nama | Kontribusi |
|------|-----------|
| **Kamilia** | *"Istiqomah itu berat, yang ringan mah istirahat"* |
| **Hanafi Muammar** | *"Jika memulai karena Allah, maka jangan menyerah karena manusia"* |
| **Alaric Rasendriya** | *"Sukses bukan dia yang tidak pernah gagal, tetapi dia yang menggagalkan kegagalan"* |
| **Irfan Arifin** | *"Di saat kita mau berusaha, di situlah kebahagiaan akan indah pada waktunya"* |
| **Raafi Asta** | *"Ingat kata tukang parkir, stangnya jangan dikunci"* |

---

## 📬 Kontak

**Alaric Rasendriya**
- 📧 Email: [alaric2001ra@gmail.com](mailto:alaric2001ra@gmail.com)
- 🐙 GitHub: [@alaric2001](https://github.com/alaric2001)

---

<div align="center">

Dibuat dengan ❤️ oleh Alaric sebagai proyek portofolio akademik · 2022

</div>
