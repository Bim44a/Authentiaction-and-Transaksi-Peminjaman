# Authentiaction-&-Transaksi-Peminjaman
Mengimplementasikan sistem login/register menggunakan Laravel Breeze, melindungi halaman dengan middleware, serta membuat fitur transaksi peminjaman yang melibatkan relasi antar tabel (buku, anggota, transaksi). Transaksi peminjaman akan otomatis mengurangi stok buku dan mencatat siapa yang meminjam.

# Tugas Pertemuan 14

**Nama:** Bima Adi Nugroho  
**NIM:** 60324077  

---

# Tugas 1: Fitur Pengembalian Buku (40%)

## Instruksi

Implementasi lengkap fitur pengembalian buku dengan perhitungan denda.

## Spesifikasi

- View Detail Transaksi dengan button "Kembalikan Buku"
- Method kembalikan() di Controller (sudah ada template)
- Perhitungan Denda:
  - Denda Rp 5.000/hari
  - Hanya jika terlambat
  - Tampilkan total denda di detail
- Update Stok:
  - Stok buku bertambah 1 saat dikembalikan

## Screenshot Hasil Implementasi

### 1. View transaksi dengan button "Kembalikan Buku" dan denda

![View Transaksi](screenshots/transaksi-detail.png)

### 2. Tampilan stok berkurang saat buku dipinjam

![Stok Berkurang](screenshots/stok-berkurang.png)

### 3. Tampilan setelah buku dikembalikan stok normal kembali

![Stok Normal](screenshots/stok-normal.png)

---

# Tugas 2: Laporan Transaksi (30%)

## Instruksi

Buat halaman laporan transaksi dengan filter.

## Spesifikasi

### Route

- `/transaksi/laporan`

### Filter

- Range tanggal (dari–sampai)
- Status (Semua / Dipinjam / Dikembalikan)
- Anggota (dropdown)

### Tampilan

- Tabel transaksi
- Total transaksi
- Total denda (jika ada)

### Export PDF

- Button untuk export laporan ke PDF

## Hasil Implementasi

### 1. Filter, tampilan transaksi, dan export PDF

![Laporan Transaksi](screenshots/laporan-transaksi.png)

### 2. Hasil export PDF

![Export PDF](screenshots/export-pdf.png)

---

# Tugas 3: Notifikasi Terlambat (30%)

## Instruksi

Tambah fitur notifikasi untuk buku yang terlambat dikembalikan.

## Spesifikasi

### Dashboard Widget

- Card "Buku Terlambat"
- Jumlah transaksi yang terlambat
- List anggota yang terlambat

### Badge Terlambat

- Di index transaksi, tambah badge "Terlambat" warna merah
- Tampilkan berapa hari terlambat

### Reminder

- Di detail transaksi, tampilkan warning jika sudah melewati tanggal kembali

## Hasil Implementasi

### 1. Dashboard Widget

![Dashboard Widget](screenshots/dashboard-widget.png)

### 2. Badge terlambat di index

![Badge Terlambat](screenshots/badge-terlambat.png)

### 3. Reminder keterlambatan di detail transaksi

![Reminder](screenshots/reminder-terlambat.png)

---

# Submission

## Link Repository GitHub

```text
https://github.com/username/repository
```
