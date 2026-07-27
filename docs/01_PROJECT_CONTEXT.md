# DIDISPEN (Digital Information Dispensation System)

## Nama Aplikasi
DIDISPEN

## Deskripsi
DIDISPEN adalah sistem informasi dispensasi sekolah berbasis web yang dirancang untuk mendigitalisasi proses pengajuan, persetujuan, pencetakan surat, validasi keluar-masuk siswa, hingga pelaporan dispensasi secara real-time.

## Tujuan

- Menghilangkan surat dispensasi manual.
- Mempermudah proses persetujuan.
- Mengurangi penyalahgunaan dispensasi.
- Mencatat seluruh aktivitas dispensasi.
- Memudahkan monitoring oleh pihak sekolah.
- Memudahkan validasi oleh Satpam menggunakan QR Code.
- Menyediakan dashboard statistik secara real-time.

## Framework

Laravel 13

## Database

MySQL

## Frontend

- Blade
- Livewire 4
- Tailwind CSS
- Alpine.js

## Backend

Laravel 13

## Build

Vite

## Role

- Admin
- Guru
- Siswa
- Satpam

## Target

Website modern, cepat, responsive, aman, scalable, dan mudah dikembangkan.

## Authentication

Sistem login DIDISPEN menggunakan autentikasi berdasarkan role.

### Admin
- Email
- Password

### Guru
- NIP
- Password

### Satpam
- Username
- Password

### Siswa
- NIS
- Tanggal Lahir

Tujuan:
- Mempermudah siswa login tanpa email.
- Mengurangi kasus lupa password.
- Memanfaatkan data yang sudah dimiliki sekolah.