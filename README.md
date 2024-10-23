
# Pengaduan Siswa

Pengaduan Siswa adalah aplikasi web untuk mengelola keluhan siswa di institusi pendidikan. Proyek ini dibangun menggunakan Laravel dan memanfaatkan Vite untuk kompilasi aset.

## Persyaratan Sistem

- PHP 8.1 atau lebih tinggi
- Composer
- Node.js dan npm
- MySQL atau database lain yang didukung oleh Laravel
## Instalasi
1. Clone repositori:
   ```bash
   git clone https://github.com/MuhammadRidwan01/pengaduan_siswa.git
   cd pengaduan_siswa
   ```
2. Instal dependensi PHP:
    ```bash
    composer install
     ```
3. Instal dependensi JavaScript:
    ```bash
    npm install
    ```
4. Buat salin file .env.example dan ubah namanya menjadi .env:
    ```bash
    cp .env.example .env
    ```
5. Buat laravel Aplication key:
    ```bash
    php artisan key:generate
    ```
6. Konfigurasi pengaturan database Anda di file .env:
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nama_database_anda
    DB_USERNAME=username_database_anda
    DB_PASSWORD=password_database_anda
     ```
7. Jalankan migrasi database:
    ```bash
    php artisan migrate
    ```
## Run Locally

 Mulai server development Laravel:
   ```bash
   php artisan serve
   ```

Jalankan NPM run dev di terminal lain
  ```bash
  npm run dev
  ```
Buka browser Anda http://localhost:8000 untuk mengakses aplikasi.


## Features


- Autentikasi dan otorisasi pengguna
- Pengajuan keluhan siswa
- Manajemen keluhan untuk administrator
- Manajemen profil
- Bagian berita


## Contributing

Kontribusi sangat diterima! Jangan ragu untuk mengajukan Pull Request.

