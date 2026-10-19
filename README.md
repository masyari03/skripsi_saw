# 🏆 Sistem Rekomendasi Guru Terbaik (SPK Metode SAW)

Aplikasi Web Sistem Pendukung Keputusan (SPK) untuk menentukan rekomendasi pemilihan guru terbaik menggunakan algoritma **Simple Additive Weighting (SAW)** berbasis PHP dan MySQL.

---

## 🌟 Fitur Utama
- **Manajemen Data Guru**: Pengelolaan data tenaga pendidik lengkap (NIP, nama guru).
- **Manajemen Kriteria & Bobot**: Penentuan kriteria penilaian (Pedagogik, Kepribadian, Sosial, Profesional) beserta bobot preferensinya.
- **Input Skor Penilaian**: Penginputan nilai evaluasi guru oleh penilai/tim asesor.
- **Normalisasi Matriks SAW**: Perhitungan otomatis matriks ternormalisasi (*benefit/cost criteria*).
- **Perankingan Otomatis**: Kalkulasi nilai preferensi akhir ($V_i$) dan penentuan ranking guru terbaik secara instan.
- **Cetak Laporan PDF**: Export rekap hasil perankingan siap cetak menggunakan library FPDF.
- **Multi-Role Authentication**: Hak akses terpisah untuk **Admin** (kelola data & master) dan **Penilai** (input evaluasi).

---

## 🛠️ Tech Stack
- **Backend & Logic**: PHP (PDO Parameterized Queries)
- **Database**: MySQL / MariaDB (`skripsi_saw`)
- **Reporting**: FPDF 1.84
- **UI & Styling**: Vanilla CSS & Responsive Layout

---

## 🚀 Panduan Instalasi Lokal

### 1. Prasyarat
- Web Server (Laragon / XAMPP / Apache) dengan PHP 7.4 - 8.2
- MySQL Server 5.7 / 8.0

### 2. Setup Database
1. Buat database baru di MySQL bernama `skripsi_saw`.
2. Import file dump SQL `skripsi_saw.sql` ke dalam database tersebut.
3. Sesuaikan konfigurasi koneksi di file `db.php` jika diperlukan:
   ```php
   $host = "localhost";
   $dbname = "skripsi_saw";
   $user = "root";
   $pass = "";
   ```

### 3. Akses Aplikasi
- Akses melalui browser: `http://localhost/skripsi_saw` (atau `http://skripsi_saw.test` jika menggunakan Laragon).

---

## 🔐 Akun Login Default (Demo)
| Role | Username | Password |
| :--- | :--- | :--- |
| **Admin** | `admin` | `admin123` |
| **Penilai** | `arif` | `arif123` |
| **Penilai** | `difa` | `difa123` |

---

## 👨‍💻 Pengembang
Dikembangkan oleh **Muhammad Asy'ari Arif Yusuf**  
GitHub: [@masyari03](https://github.com/masyari03)
