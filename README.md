# Laravel Backend Starter

Laravel Backend Starter adalah sebuah proyek boilerplate untuk memulai pengembangan aplikasi backend menggunakan framework Laravel. Proyek ini bertujuan untuk memudahkan proses awal pembuatan aplikasi backend dengan menyediakan struktur dasar yang sudah siap digunakan.

## Instalasi

### Persyaratan Sistem

Pastikan sistem Anda sudah memenuhi persyaratan berikut sebelum memulai instalasi:

- PHP >= 8.1
- Composer
- MySQL atau database lainnya yang didukung oleh Laravel

### Langkah-langkah Instalasi

1. Clone repositori ini ke dalam direktori lokal Anda:

    ```bash
    https://github.com/AcongDev/backend-starter-laravel.git
    ```

2. Masuk ke direktori proyek:

    ```bash
    cd backend-starter-laravel
    ```

3. Salin file `.env.example` menjadi `.env` dan sesuaikan pengaturan database Anda:

    ```bash
    cp .env.example .env
    ```

4. Instal semua dependensi PHP menggunakan Composer:

    ```bash
    composer install
    ```

5. Generate kunci aplikasi:

    ```bash
    php artisan key:generate
    ```

6. Jalankan migrasi database untuk membuat skema tabel:

    ```bash
    php artisan migrate
    ```

7. Jalankan server pengembangan:

    ```bash
    php artisan serve
    ```
    atau
   ```bash
    php -S localhost:{{port}} -t public
    ```


Proyek sekarang dapat diakses di `http://localhost:{{port}}`.

## Kontribusi

Kami sangat menghargai kontribusi dari siapa pun untuk meningkatkan proyek ini. Jika Anda ingin berkontribusi, berikut adalah langkah-langkahnya:

1. Fork repositori ini.
2. Buat branch baru untuk fitur atau perbaikan Anda: `git checkout -b {{nama-kamu}}`.
3. Lakukan perubahan yang diperlukan dan commit perubahan Anda: `git commit -am '{{pesan commit}}'`.
4. Push ke branch yang Anda buat: `git push origin {{nama-kamu}}`.
5. Buat pull request di repositori asli.

## Library Tambahan yang Digunakan

- [Laravel](https://laravel.com) - Framework PHP untuk pengembangan aplikasi web

## Dokumen Tambahan
Dokumen tambahan seperti Entity Relationship Diagram (ERD) dan flowchart akan ditambahkan segera setelah tersedia.
