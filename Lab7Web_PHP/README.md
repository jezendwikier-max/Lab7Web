# Lab7Web_PHP — Praktikum 7: Pemrograman Server-Side dengan PHP

**Mata Kuliah:** Pemrograman Web
**Nama / NIM:** Jezen Dwiki Erlangga(312510106)
**Kelas:** I252A

## 1. Tujuan Praktikum
- Memahami perbedaan pemrosesan client-side dan server-side.
- Menjalankan file PHP melalui server lokal.
- Menggunakan variabel, tipe data, operator, percabangan, perulangan, dan function.
- Memproses data form HTML dengan metode GET dan POST.
- Melakukan validasi dan sanitasi input dasar.
- Membangun aplikasi sederhana penerima dan penampil data pengguna.

## 2. Perangkat
- Laptop/PC dan web browser
- Visual Studio Code
- PHP dan server lokal XAMPP (Apache) / Laragon
- Git dan GitHub

## 3. Cara Menjalankan Server Lokal
1. Instal XAMPP atau Laragon.
2. Jalankan layanan **Apache** (XAMPP Control Panel → Start, atau tombol *Start All* pada Laragon).
3. Salin folder `Lab7Web_PHP` ke `C:\xampp\htdocs\` (XAMPP) atau `C:\laragon\www\` (Laragon).
4. Buka browser dan akses `http://localhost/Lab7Web_PHP/`.
5. **Jangan** membuka file PHP dengan klik ganda, karena kode PHP tidak akan dieksekusi.

## 4. Struktur File
```
Lab7Web_PHP/
├── index.php         
├── mini_project.php
└── README.md
```

## 5. Ringkasan Hasil
| File | Ringkasan |
|------|-----------|
| index.php        | File Praktikum PHP tersebut berisi serangkaian kode fungsional yang mencakup pesan sambutan beserta waktu server, simulasi perhitungan nilai mahasiswa atas nama Siti yang menghasilkan nilai akhir 93,00 dengan predikat A, serta penampilan daftar array mahasiswa berupa Alya, Bima, Citra, dan Doni. Selain itu, program ini memuat fungsi penghitungan diskon 10% dari Rp150.000 menjadi Rp135.000, serta penyediaan berbagai elemen formulir interaktif seperti form pencarian menggunakan metode GET, form input data diri mahasiswa dengan metode POST dan validasi kolom kosong, hingga kalkulator subtotal belanja yang dilengkapi validasi harga dan jumlah barang.
| mini_project.php | Form data mahasiswa dengan validasi lengkap dan ringkasan data. |

## 6. Jawaban Pertanyaan Evaluasi
1. **Client-side vs server-side:** client-side dijalankan di browser pengguna (HTML, CSS, JavaScript); server-side dijalankan di server (PHP), yang memproses permintaan lalu mengirim hasil (biasanya HTML) ke browser.
2. **Mengapa harus lewat web server:** browser tidak dapat menjalankan PHP. Web server (Apache/Nginx dengan modul PHP) yang menginterpretasi kode PHP dan mengirim output-nya. Jika dibuka dengan klik ganda (`file://`), kode PHP hanya tampil sebagai teks.
3. **Fungsi tanda `$`:** penanda bahwa sebuah nama adalah variabel (misal `$nama`).
4. **GET vs POST:** GET mengirim data lewat URL (terlihat, dibatasi panjangnya, cocok untuk permintaan yang tidak mengubah data seperti pencarian). POST mengirim data lewat body permintaan (tidak tampil di URL, lazim untuk form). POST bukan enkripsi; gunakan HTTPS.
5. **Validasi di sisi server:** validasi di browser (atribut `required`, dll.) bisa dilewati atau dimanipulasi. Server adalah pemeriksaan terakhir yang tidak bisa dihindari pengguna.
6. **Fungsi `htmlspecialchars()`:** mengubah karakter khusus HTML (`<`, `>`, `&`, `"`, `'`) menjadi entitas sehingga input tidak dieksekusi sebagai HTML/script (mencegah XSS).
7. **Manfaat function:** kode dapat dipakai ulang, lebih rapi dan mudah dibaca, mudah diuji dan dirawat, serta mengurangi duplikasi.

## 7. Input valid dan tidak valid
Simpan screenshot output setiap latihan dan hasil validasi form di folder `screenshots/`, lalu tampilkan di sini:

```
![Latihan 1](screenshots/latihan1.png)
```
