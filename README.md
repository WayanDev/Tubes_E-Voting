# Sistem E-Voting Ketua Kelas

<img alt="HTML5" src="https://img.shields.io/badge/html5%20-%23E34F26.svg?&style=for-the-badge&logo=html5&logoColor=white"> 
<img alt="CSS3" src="https://img.shields.io/badge/css3%20-%231572B6.svg?&style=for-the-badge&logo=css3&logoColor=white">
<img alt="PHP" src="https://img.shields.io/badge/php-%23777BB4.svg?&style=for-the-badge&logo=php&logoColor=white">
<img alt="Bootstrap" src="https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white">
<img alt="Bootstrap" src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white">

## Deskripsi

Sistem ini dibuat untuk memenuhi Tugas Besar Mata Kuliah Pemrograman Web berbasis Framework. Sistem ini berguna untuk memilih ketua kelas TI-3B.

Aplikasi ini dibangun menggunakan **CSS (Cascading Style Sheet)**,**HTML (Hypertext Markup Language)**,**Laravel 8**,**Bootstrap(Admin LTE)** dan **PHP (Hypertext Preprocessor)**.

## Fitur

Fitur yang ada pada Sistem E-Voting Ketua Kelas TI-3B:

1. Tambah data pemilih(manual & import file Excel)
2. Tambah data paslon
3. Login/Logout
4. Menghentikan voting dengan klik tombol Vote Selesai pada dashboard
5. Pemilih hanya dapat memilih 1 kali

## Langkah-Langkah

1. Download Source Code dari repo Github laravote dalam bentuk Zip.
2. Extract file zip (source code) ke dalam direktori htdocs pada XAMPP, misal htdocs/evoting-pemilihan.
3. Melalui terminal, cd ke direktori evoting-pemilihan.
4. (Sesuai petunjuk installasi) Pada terminal, berikan perintah composer install. Ini yang perlu koneksi internet.
5. Composer akan menginstall dependency paket dari source code tersebut hingga selesai.
6. Jalankan perintah php artisan, untuk menguji apakah perintah artisan Laravel bekerja.
7. Buat database baru (kosong) pada mysql (via phpmyadmin) dengan nama pemilu. import file pemilu.sql ke database evoting
8. Duplikat file .env.example, lalu rename menjadi .env.
9. Kembali ke terminal, php artisan key:generate.
10. Setting koneksi database di file .env (DB_DATABASE, DB_USERNAME, DB_PASSWORD).
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=pemilu
    DB_USERNAME=root
    DB_PASSWORD=
11. Setelah selesai, Jalankan perintah "php artisan serve" maka dapat diakses dengan http://localhost:8000/

## Requirements

-   XAMPP : PHP >= minimal 7.3
-   Google Chrome atau web browser lainnya
-   Composer telah ter-install, cek dengan perintah composer -V melalui terminal.
-   Koneksi Internet

## Catatan

Login admin

> Username : Administrator
> Password : admin

Login pemilih

> Username : Wayan
> Password : wayan123

## Tampilan Admin
![Login](https://user-images.githubusercontent.com/113874200/211324522-7e08a59b-cc39-4b96-956e-8a51a8b4e5cb.png)
![Dashboard](https://user-images.githubusercontent.com/113874200/211324578-ecb66f88-b6ea-4def-83f1-34854c9f0274.png)
![Data Akun](https://user-images.githubusercontent.com/113874200/211324603-ed372203-b472-484e-87ff-2fe52c69ce9b.png)
![Data Paslon](https://user-images.githubusercontent.com/113874200/211324625-1169c51f-9440-4188-8a41-6c90e4d258ad.png)

## Tampilan Pemilih
![Voting](https://user-images.githubusercontent.com/113874200/211324685-b26e06de-d9f5-4d02-aa82-02de856b2a2e.png)


## Kredit

-   Aplikasi dibuat pada 27/08/2022 oleh Wayan dan Zulfa Safitri
