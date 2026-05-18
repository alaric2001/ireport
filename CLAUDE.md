# IREPORT — Panduan Proyek untuk Claude

Platform pelaporan infrastruktur publik berbasis web. Proyek portofolio akademik tim 5 orang.

## Stack Teknologi

- **Framework**: Laravel 10.50.2
- **Runtime**: PHP 8.2.4
- **Database**: MySQL / MariaDB 10.4
- **Frontend**: Bootstrap 4, JavaScript ES6+
- **Auth**: Laravel UI (laravel/ui ^4.0)
- **Testing**: PHPUnit 10.1
- **Deploy (static)**: Folder `/deploy` → Netlify

## Perintah Penting

```bash
# Jalankan server development
php artisan serve

# Migrasi + seeding penuh
php artisan migrate --seed

# Reset dan ulang dari awal
php artisan migrate:fresh --seed

# Cek semua route terdaftar
php artisan route:list

# Cek info framework
php artisan about

# Install dependensi (pertama kali atau setelah clone)
composer install

# Update dependensi (setelah mengubah composer.json)
composer update
```

## Struktur Folder Penting

```
app/
├── Http/Controllers/       ← Semua controller (termasuk Auth/)
├── Http/Middleware/
├── Providers/
├── Exceptions/Handler.php
├── Berita.php              ← Model ada di app/, BUKAN app/Models/
├── Komentar.php
├── Laporan.php
├── Ourteam.php
├── Profile.php
└── User.php

database/
├── migrations/             ← 9 migration files (anonymous class L10)
└── seeders/                ← Namespace: Database\Seeders

routes/
└── web.php                 ← Semua route dengan sintaks FQCN

deploy/                     ← Static showcase untuk Netlify
├── index.html
├── docs.html
└── assets/
    ├── css/  (style.css, docs.css)
    ├── js/   (app.js, docs.js)
    └── data/ (stats, features, team, tech, roles — format JSON)
```

## Konvensi Kode

### Model
Model berada di `app/` langsung (warisan Laravel 6), **bukan** `app/Models/`. Namespace tetap `App\ModelName`.

### Migration
Semua migration menggunakan **anonymous class** syntax Laravel 10:
```php
return new class extends Migration {
    public function up(): void { ... }
    public function down(): void { ... }
};
```

### Routes
Semua route di `routes/web.php` menggunakan **Fully Qualified Class Name (FQCN)**:
```php
use App\Http\Controllers\LaporanController;
Route::get('/laporan', [LaporanController::class, 'index']);
```
Jangan gunakan string `'LaporanController@index'` — tidak berfungsi di Laravel 10 karena tidak ada namespace injection.

### Seeder
Namespace seeder: `Database\Seeders` (folder `database/seeders/`).
Semua seeder dipanggil dari `DatabaseSeeder.php` urutan: User → Profile → Berita → Laporan → Komentar → Ourteam.

### Password Seeder
Semua password pengguna di seeder di-hash dengan bcrypt:
```php
use Illuminate\Support\Facades\Hash;
'password' => Hash::make('123'),
```
Password login untuk semua akun seed: **123**

## Database

6 tabel utama:

| Tabel | Keterangan |
|-------|-----------|
| `users` | Kolom `role`: 0=Guest, 1=Reporter, 2=Admin. Kolom `pengajuan` untuk status pengajuan reporter |
| `profile` | Relasi 1-to-1 ke users. Kolom: `tempatLahir`, `tanggalLahir` (date), `foto`, `point`, `pengajuan` |
| `laporan` | Laporan kerusakan infrastruktur. Kolom `vote` (int), `status`, `provinsi`, `kategori` |
| `berita` | Berita infrastruktur yang dipublikasi admin |
| `komentar` | FK ke `profile` (bukan `users`) dan `laporan` |
| `ourteam` | Data anggota tim. **Tidak ada timestamps** |

## Sistem Role (RBAC)

| Nilai `role` | Level | Akses |
|---|---|---|
| `0` | Guest/User | Lihat laporan & berita, registrasi |
| `1` | Reporter | Buat laporan, upload foto, vote, komentar, profil |
| `2` | Admin | Semua akses termasuk moderasi, berita, kelola user |

Middleware `CheckRole` di `app/Http/Middleware/CheckRole.php` mengatur akses berbasis kolom `role`.

## Hal Penting yang Perlu Diingat

- **Model di `app/` bukan `app/Models/`** — jangan pindahkan, sudah sesuai namespace yang ada.
- **`FoundationServiceProvider` harus ada** di `config/app.php` providers — jangan dihapus, menyebabkan error `MaintenanceMode is not instantiable`.
- **Windows Defender** bisa memblokir `composer install` dengan error `file_put_contents`. Solusi: tambahkan folder project ke exclusion Defender.
- Setelah mengubah `composer.json`, jalankan `composer update` bukan `composer install` (lock file lama akan konflik).
- `database/seeds/DatabaseSeeder.php` (lama, Laravel 6) sudah tidak dipakai — yang aktif adalah `database/seeders/DatabaseSeeder.php`.

## Deploy

Folder `/deploy` adalah static site terpisah untuk showcase di Netlify. **Tidak berhubungan dengan server Laravel** — murni HTML/CSS/JS statis.

- `index.html` memuat data dari file JSON via `fetch()` di `app.js`
- `docs.html` adalah halaman dokumentasi teknis untuk recruiter
- `netlify.toml` sudah dikonfigurasi: `publish = "."`

Untuk deploy ke Netlify: arahkan Netlify ke folder `deploy/` sebagai publish directory.
