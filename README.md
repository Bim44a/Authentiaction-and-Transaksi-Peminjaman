# Authentiaction-&-Transaksi-Peminjaman
Mengimplementasikan sistem login/register menggunakan Laravel Breeze, melindungi halaman dengan middleware, serta membuat fitur transaksi peminjaman yang melibatkan relasi antar tabel (buku, anggota, transaksi). Transaksi peminjaman akan otomatis mengurangi stok buku dan mencatat siapa yang meminjam.

# Tugas Pertemuan 14

**Nama:** Bima Adi Nugroho  
**NIM:** 60324077  

---

## Tugas 1: Fitur Pengembalian Buku (40%)

Instruksi: Implementasi lengkap fitur pengembalian buku dengan perhitungan denda.

### Spesifikasi

- View Detail Transaksi dengan button "Kembalikan Buku"
- Method kembalikan() di Controller (sudah ada template)
- Perhitungan Denda:
  - Denda Rp 5.000/hari
  - Hanya jika terlambat
  - Tampilkan total denda di detail
- Update Stok:
  - Stok buku bertambah 1 saat dikembalikan

---

### 1. View transaksi dengan button "Kembalikan Buku" dan denda

<img width="1467" height="901" alt="image" src="https://github.com/user-attachments/assets/b5b53f15-0b2f-46f4-91c0-7be207a26ab5" />

### 2. Tampilan stok berkurang saat buku dipinjam (21)

<img width="1382" height="286" alt="image" src="https://github.com/user-attachments/assets/e3387cd8-1dca-4d01-9b59-4ee5ff86918e" />


### 3. Tampilan setelah buku dikembalikan stok normal kembali (22)

<img width="1380" height="278" alt="image" src="https://github.com/user-attachments/assets/bc0de9ef-ead4-45c9-bed3-267949957a5e" />

---

## Tugas 2: Laporan Transaksi (30%)

Instruksi: Buat halaman laporan transaksi dengan filter.

### Spesifikasi

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

---

### 1. Filter, tampilan transaksi, dan export PDF

<img width="1418" height="773" alt="image" src="https://github.com/user-attachments/assets/161a514d-8ae8-4378-bf60-5c9964527d06" />

### 2. Hasil export PDF

<img width="1153" height="497" alt="image" src="https://github.com/user-attachments/assets/418149c8-a354-4be1-9082-649c362273e6" />

---

## Tugas 3: Notifikasi Terlambat (30%)

Instruksi: Tambah fitur notifikasi untuk buku yang terlambat dikembalikan.

### Spesifikasi

### Dashboard Widget

- Card "Buku Terlambat"
- Jumlah transaksi yang terlambat
- List anggota yang terlambat

### Badge Terlambat

- Di index transaksi, tambah badge "Terlambat" warna merah
- Tampilkan berapa hari terlambat

### Reminder

- Di detail transaksi, tampilkan warning jika sudah melewati tanggal kembali

---

### 1. Dashboard Widget: Card "Buku Terlambat", Jumlah transaksi yang terlambat, List anggota yang terlambat

<img width="1500" height="905" alt="image" src="https://github.com/user-attachments/assets/f2f440ed-9479-4f20-8756-93b6ee58a069" />


### 2. Badge terlambat di index Transaksi

<img width="1709" height="772" alt="image" src="https://github.com/user-attachments/assets/c6d3e14b-d6eb-46e2-9a8d-9dade3df7eb5" />

### 3. Reminder keterlambatan di detail transaksi

<img width="1096" height="871" alt="image" src="https://github.com/user-attachments/assets/9efa85ed-840d-4eee-ad81-d37bffb53a46" />

```
