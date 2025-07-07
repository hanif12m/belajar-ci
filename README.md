# CodeIgniter 4 Application Starter

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

You can read the [user guide](https://codeigniter.com/user_guide/)
corresponding to the latest version of the framework.

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 8.1 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> [!WARNING]
> - The end of life date for PHP 7.4 was November 28, 2022.
> - The end of life date for PHP 8.0 was November 26, 2023.
> - If you are still using PHP 7.4 or 8.0, you should upgrade immediately.
> - The end of life date for PHP 8.1 will be December 31, 2025.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library


# Aplikasi Toko Online (CodeIgniter 4)

Aplikasi ini adalah sistem toko online sederhana yang dikembangkan menggunakan framework **CodeIgniter 4**. Aplikasi mendukung manajemen produk, kategori, diskon, keranjang belanja, checkout, dan riwayat transaksi. Sistem juga menggunakan **library Cart**, integrasi API ongkir RajaOngkir, dan fitur dashboard monitoring berbasis webservice.

---

## 🧩 Fitur

### 🛒 Pengelolaan Produk
- Tambah, ubah, dan hapus data produk
- Unggah gambar produk
- Tampilkan data produk dengan DataTables (search & pagination)

### 📂 Kategori Produk
- CRUD kategori produk
- Pengelompokan produk berdasarkan kategori

### 🎁 Diskon Produk
- CRUD diskon
- Diskon disimpan dalam session dan diterapkan saat menambahkan produk ke keranjang

### 🛍️ Keranjang Belanja
- Tambah produk ke keranjang
- Edit dan hapus isi keranjang
- Kosongkan keranjang
- Hitung subtotal per item dan total keseluruhan

### 📦 Checkout & Transaksi
- Form checkout dengan input alamat & username
- Perhitungan ongkir via **API RajaOngkir Komerce**
- Penyimpanan transaksi dan detailnya ke database

### 📊 Riwayat Transaksi
- Menampilkan semua pembelian oleh user
- Modal detail transaksi (produk, jumlah, diskon, subtotal)

### 🌐 Webservice (API)
- Endpoint RESTful (`/api`) dengan API key
- Return JSON berisi data transaksi dan detailnya

### 📈 Dashboard Monitoring
- Akses data pembelian dari endpoint API
- Menampilkan data username, alamat, total, status, dan **jumlah item** setiap transaksi

## ⚙️ Instalasi

1. **Clone repositori**

```bash
git clone https://github.com/hanif12m/belajar-ci
cd projek-toko

##Install Dependensi
composer install

##Salin file .env
cp env .env

##Konfigurasi file .env
database.default.hostname = localhost
database.default.database = db_ci4
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi

COST_KEY = [API_KEY_RAJAKONGKIR]
API_KEY = random123678abcghi

##Jalankan server
php spark serve

#struktur proyek
app/
├── Controllers/
│   ├── ProdukController.php
│   ├── ProductControllerr.php
│   ├── ProductCategory.php
│   ├── DiskonController.php
│   ├── TransaksiController.php
│   └── ApiController.php
├── Models/
│   ├── ProductModel.php
│   ├── UserModel.php
│   ├── ProductCategoryModel.php
│   ├── DiskonModel.php
│   ├── TransactionModel.php
│   └── TransactionDetailModel.php
├── Views/
│   ├── v_contact.php
│   ├── v_faq.php
│   ├── v_home.php
│   ├── v_produk.php
│   ├── v_profile.php
│   ├── v_diskon.php
│   ├── v_keranjang.php
│   ├── v_checkout.php
│   ├── v_riwayat.php
│   └── layout.php
├── Config/
│   └── Routes.php


#webservice API
Key: random123678abcghi
