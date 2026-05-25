```markdown
# Aplikasi Maskapai Nasional

Aplikasi Maskapai Nasional adalah sistem manajemen informasi penerbangan berbasis web yang dibangun menggunakan **Laravel Framework**. Sistem ini dirancang untuk mengelola data operasional maskapai, jadwal penerbangan, manifest penumpang, serta proses pemesanan tiket pesawat secara terintegrasi.

## Fitur Utama

* **Manajemen Jadwal Penerbangan (Flight Scheduling):** Autentikasi admin untuk menambah, mengubah, dan menghapus rute, nomor pesawat, serta waktu keberangkatan/kedatangan.
* **Pemesanan Tiket Online (Booking System):** Pencarian jadwal berdasarkan rute asal/tujuan, pemilihan kelas penerbangan (Ekonomi, Bisnis), dan alokasi nomor kursi.
* **Manajemen Penumpang & Manifes:** Penyimpanan data identitas penumpang yang otomatis terhubung dengan kode booking (PNR) unik.
* **Sistem Transaksi & Invoice:** Kalkulasi harga tiket otomatis beserta generate invoice pemesanan.
* **Dashboard Admin:** Visualisasi data jumlah penerbangan, total penumpang, dan ringkasan pendapatan.

## Struktur Direktori Utama (Laravel)

```text
Aplikasi_Maskapai_Nasional/
├── app/
│   ├── Http/
│   │   ├── Controllers/     # Logika bisnis (FlightController, BookingController, dll)
│   │   └── Requests/        # Validasi input form
│   └── Models/              # Entitas database (Flight, Passenger, Ticket, Airplane)
├── database/
│   ├── migrations/          # Struktur tabel basis data maskapai
│   └── seeders/             # Data awal simulator (user admin, daftar bandara/pesawat)
├── routes/
│   └── web.php              # Definisi routing aplikasi web
└── resources/
    └── views/               # Antarmuka pengguna berbasis Blade templates

```

## Prasyarat Sistem

* PHP >= 8.1
* Composer
* MySQL / MariaDB
* Node.js & NPM (untuk aset frontend)

## Langkah Instalasi

1. Kloning repositori:
```bash
git clone [https://github.com/sam01149/Aplikasi_Maskapai_Nasional.git](https://github.com/sam01149/Aplikasi_Maskapai_Nasional.git)
cd Aplikasi_Maskapai_Nasional

```


2. Instal dependensi PHP:
```bash
composer install

```


3. Salin file lingkungan dan generate application key:
```bash
cp .env.example .env
php artisan key:generate

```


4. Konfigurasi database pada file `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_anda
DB_USERNAME=root
DB_PASSWORD=

```


5. Jalankan migrasi database beserta data awal (seeder):
```bash
php artisan migrate --seed

```


6. Instal dan kompilasi aset frontend:
```bash
npm install
npm run dev

```


7. Jalankan server lokal:
```bash
php artisan serve

```


Aplikasi dapat diakses melalui `http://127.0.0.1:8000`.

## Kontributor

* **Samuel Armando Napitu** - [sam01149](https://www.google.com/search?q=https://github.com/sam01149)

```

```
