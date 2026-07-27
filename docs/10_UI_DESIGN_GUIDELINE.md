# UI DESIGN GUIDELINE
## DIDISPEN

Dokumen ini menjadi acuan seluruh desain website agar konsisten.

---

# Design Concept

Modern

Professional

Clean

Responsive

Glassmorphism Light

Minimalis

Dashboard Enterprise

---

# Target User

- Admin
- Guru
- Siswa
- Satpam

---

# Design Style

Gunakan tampilan seperti:

- Laravel Cloud
- Linear
- Notion
- Vercel Dashboard
- Stripe Dashboard

---

# Color Palette

## Primary

#2563EB

Blue

---

## Secondary

#1E293B

Dark Blue

---

## Success

#22C55E

Green

---

## Warning

#F59E0B

Orange

---

## Danger

#EF4444

Red

---

## Background

#F8FAFC

---

## Card

#FFFFFF

---

## Border

#E5E7EB

---

# Typography

Font

Poppins

Fallback

Inter

Hierarchy

H1 32px

H2 24px

H3 20px

Body 16px

Small 14px

Caption 12px

---

# Border Radius

Card

16px

Button

12px

Input

12px

Modal

20px

---

# Shadow

Gunakan

shadow-sm

shadow-md

shadow-lg

Jangan menggunakan shadow berlebihan.

---

# Sidebar

Posisi

Kiri

Lebar

280px

Isi

Logo

Menu

Collapse

Profile

Logout

---

# Navbar

Logo

Search

Notification

Profile

Dark Mode

---

# Dashboard

Summary Card

Chart

Quick Action

Recent Activity

Statistics

Calendar

---

# Button

Primary

Blue

Secondary

Gray

Danger

Red

Success

Green

Semua button memiliki hover dan transition.

---

# Input

Rounded XL

Focus Ring

Label di atas

Helper Text

Error Validation

---

# Table

Search

Filter

Pagination

Export

Action

Badge Status

Hover Row

---

# Status Badge

Pending

Yellow

Approved

Green

Rejected

Red

Out

Blue

Returned

Purple

Completed

Gray

Expired

Dark Gray

---

# Card

Padding 24px

Rounded XL

Shadow MD

Title

Description

Action

---

# Icons

Gunakan Heroicons.

Ukuran

20px

24px

28px

---

# Animation

Hover Scale

Fade In

Slide Up

Transition

300ms

Respect prefers-reduced-motion.

---

# Responsive Breakpoint

Mobile

Tablet

Laptop

Desktop

---

# Layout

Sidebar + Navbar + Content + Footer

---

# Halaman yang Akan Dibuat

Authentication

Dashboard

Master Data

Data Siswa

Data Guru

Data Satpam

Data Jurusan

Data Kelas

Pengajuan Dispensasi

Approval

QR Code

Gate Validation

Riwayat

Laporan

Statistik

Audit Log

Profile

Settings

---

# UX Rules

- Maksimal 3 klik menuju fitur utama.
- Seluruh aksi penting menggunakan dialog konfirmasi.
- Feedback sukses dan gagal menggunakan toast notification.
- Semua form memiliki validasi yang jelas.
- Dashboard menampilkan informasi penting tanpa perlu scroll panjang.
- QR Code mudah diakses oleh siswa saat diperlukan.
- Tampilan Satpam dibuat sederhana agar proses scan cepat.
- Gunakan loading indicator pada proses yang membutuhkan waktu.
- Konsisten menggunakan komponen (button, card, table, modal, badge) di seluruh aplikasi.

# Login page

Satu halaman login.

Terdapat pilihan role:

○ Siswa
○ Guru
○ Satpam
○ Admin