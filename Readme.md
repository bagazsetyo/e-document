# Instalasi 


## Alat 
1. php 7.4 keatas 
2. laragon / xampp (harus menggunakan apache)
3. composer (jika tidak menggunakan laragon)

## Cara instalasi
intall laragon atau xampp terlebih dahulu 

### Menggunakan laragon
buka folder laragon biasanya berada di 
```bash
C:\laragon\www
```
buka terminal dan arah  ke folder www
```bash
cd C:\laragon\www
```

### Menggunakan xampp
buka folder xampp biasanya berada di 
```bash
C:\xampp\htdocs
```
buka terminal dan arah  ke folder htdocs
```bash
cd C:\xampp\htdocs
```

### Clone repository
1. Clone repository ini
```bash
git clone https://github.com/bagazsetyo/e-document.git
```

2. Masuk ke folder e-document
```bash
cd e-document
```
3. autoload composer
```bash
composer dump-autoload
```

## Membuat database 
1. Buka phpmyadmin atau HeidiSQL
2. Buat database baru dengan nama `e-document` (atau bisa ubah di /app/Config/DB.php)
3. Jalankan perintah 
```bash
composer run migrate
```
4. jika pada step 3 di anggap firus, bisa upload manual file yang berada di root project dengan nama `e-document.sql`

## Menjalankan aplikasi
1. Buka browser dan ketikkan `http://localhost/e-document` atau `e-document.test` jika menggunakan laragon
2. Login dengan username `admin` dan password `admin`