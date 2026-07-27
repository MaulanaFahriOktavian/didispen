# DATABASE SCHEMA
## DIDISPEN (Digital Information Dispensation System)

Dokumen ini berisi rancangan struktur database yang akan digunakan dalam pengembangan aplikasi DIDISPEN.

---

# 1. users

Digunakan untuk autentikasi seluruh pengguna sistem.

| Field | Type | Keterangan |
|--------|------|------------|
| id | bigint | Primary Key |
| username | varchar(100) | Username (Satpam) |
| email | varchar(100) |    Admin |
| password | varchar(255) | Password |
| role_id | bigint | Role |
| remember_token | varchar | Remember Login |
| created_at | timestamp |
| updated_at | timestamp |

---

# 2. roles

Hak akses pengguna.

| Field | Type |
|--------|------|
| id | bigint |
| name | varchar(50) |
| created_at | timestamp |
| updated_at | timestamp |

Data:

- Admin
- Guru
- Siswa
- Satpam

---

# 3. permissions

Digunakan oleh package Spatie Permission.

---

# 4. students

Data siswa.

| Field | Type | Keterangan |
|--------|------|------------|
| id | bigint | PK |
| user_id | bigint | Relasi User |
| nis | varchar(20) | Nomor Induk Siswa |
| name | varchar(100) | Nama |
| gender | enum | L/P |
| birth_date | date | Tanggal Lahir |
| phone | varchar(20) | No HP |
| address | text | Alamat |
| class_id | bigint | Relasi kelas |
| major_id | bigint | Relasi jurusan |
| created_at | timestamp | |
| updated_at | timestamp | |

---

# 5. teachers

Data guru.

| Field | Type |
|--------|------|
| id | bigint |
| user_id | bigint |
| nip | varchar(30) |
| name | varchar(100) |
| phone | varchar(20) |
| position | varchar(100) |

---

# 6. security_guards

Data satpam.

| Field | Type |
|--------|------|
| id | bigint |
| user_id | bigint |
| name | varchar(100) |
| phone | varchar(20) |
| created_at | timestamp |
| updated_at | timestamp |

---

# 7. majors

Jurusan.

Contoh:

- PPLG
- AKL
- PM
- TO
- MPLB

| Field | Type |
|--------|------|
| id | bigint |
| name | varchar(100) |
| code | varchar(20) |
| created_at | timestamp |
| updated_at | timestamp |

---

# 8. classes

Data kelas.

Contoh:

XI PPLG 1

| Field | Type |
|--------|------|
| id | bigint |
| major_id | bigint |
| homeroom_teacher_id | bigint |
| name | varchar(100) |
| level | enum(X,XI,XII) |
| created_at | timestamp |
| updated_at | timestamp |

---

# 9. academic_years

Tahun ajaran.

| Field | Type |
|--------|------|
| id | bigint |
| name | varchar(30) |
| is_active | boolean |
| created_at | timestamp |
| updated_at | timestamp |

---

# 10. dispensation_categories

Kategori dispensasi.

Contoh:

- Organisasi
- Pribadi
- Lomba
- Berobat
- Lainnya

| Field | Type |
|--------|------|
| id | bigint |
| name | varchar(100) |
| description | text |
| created_at | timestamp |
| updated_at | timestamp |

---

# 11. dispensations

Tabel utama.

| Field | Type |
|--------|------|
| id | bigint |
| student_id | bigint |
| teacher_id | bigint |
| category_id | bigint |
| destination | varchar(255) |
| purpose | text |
| attachment | varchar(255) |
| qr_code | varchar(255) |
| start_time | datetime |
| end_time | datetime |
| status | enum |
| notes | text |
| created_at | timestamp |
| updated_at | timestamp |

Status:

- Pending
- Approved
- Rejected
- Ready to Exit
- Out
- Returned
- Completed
- Expired

---

# 12. approval_logs

Riwayat approval.

| Field | Type |
|--------|------|
| id | bigint |
| dispensation_id | bigint |
| teacher_id | bigint |
| action | varchar(50) |
| notes | text |
| approved_at | datetime |

---

# 13. gate_logs

Log scan QR oleh satpam.

| Field | Type |
|--------|------|
| id | bigint |
| dispensation_id | bigint |
| security_guard_id | bigint |
| scan_type | enum |
| scanned_at | datetime |

Scan Type

- Exit
- Return

---

# 14. notifications

Notifikasi.

| Field | Type |
|--------|------|
| id | bigint |
| user_id | bigint |
| title | varchar(255) |
| message | text |
| is_read | boolean |
| created_at | timestamp |

---

# 15. audit_logs

Mencatat seluruh aktivitas sistem.

| Field | Type |
|--------|------|
| id | bigint |
| user_id | bigint |
| activity | varchar(255) |
| ip_address | varchar(100) |
| user_agent | text |
| created_at | timestamp |

---

# Relasi Database

User
│
├── Student
├── Teacher
└── Security Guard

Major
│
└── Class

Student
│
└── Dispensation

Teacher
│
└── Approval

Dispensation
│
├── Approval Log
├── Gate Log
└── Notification