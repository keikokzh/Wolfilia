# 🌿 Wolfilium Management System

Aplikasi web modern untuk manajemen budidaya pakan akuakultur berkelanjutan berbasis *Wolffia* (duckweed). Sistem ini dirancang untuk mendigitalisasi proses budidaya—mulai dari pemantauan kondisi lingkungan (pH, suhu, tingkat hidrasi), pencatatan panen, hingga distribusi ke mitra pembudidaya ikan.

![Tech Stack](https://img.shields.io/badge/React_19-20232A?style=for-the-badge&logo=react&logoColor=61DAFB)
![Vite](https://img.shields.io/badge/Vite_8-B73BFE?style=for-the-badge&logo=vite&logoColor=FFD62E)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS_v4-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)

---

## 📑 Fitur Utama

- **Landing Page Publik:** Halaman muka modern dengan integrasi *Call-to-Action* (CTA) ke WhatsApp dan Instagram untuk menarik pelanggan dan mitra baru.
- **Dashboard AgriData:** Visualisasi ringkasan operasi budidaya dalam bentuk kartu data, grafik pertumbuhan eksponensial *Wolffia*, dan riwayat pengiriman terkini.
- **Operasional Vitalitas (Inventory):** Pemantauan *real-time* untuk parameter fisik setiap kontainer (pH, suhu, kepadatan, hidrasi), dilengkapi dengan fitur penambahan *batch* panen baru.
- **Jaringan Distribusi (Partners):** Basis data interaktif untuk mengelola dan melacak mitra pembudidaya dan status pesanan.

---

## 🚀 Cara Menjalankan Aplikasi

Aplikasi ini menggunakan [Node.js](https://nodejs.org/) dan bundler [Vite](https://vitejs.dev/). Pastikan Anda sudah menginstal **Node.js** di komputer Anda.

### 1. Instalasi Dependensi
Buka terminal/command prompt di dalam folder proyek ini (`d:\SEMESTER 6\pancasila\the app`), lalu jalankan perintah berikut untuk menginstal semua library (React, Tailwind, Recharts, dll):

```bash
npm install
```

### 2. Menjalankan Server Pengembangan (Development)
Setelah proses instalasi selesai, jalankan server pengembangan lokal dengan perintah:

```bash
npm run dev
```
Buka browser Anda dan kunjungi link yang muncul (biasanya **`http://localhost:5173/`**). Setiap kali Anda melakukan perubahan pada kode, browser akan otomatis memuat ulang (Hot Module Replacement).

### 3. Mem-build Aplikasi untuk Produksi (Deployment)
Jika Anda ingin me-*hosting* aplikasi ini ke server produksi (misalnya Vercel, Netlify, atau web hosting lainnya), jalankan perintah:

```bash
npm run build
```
Perintah ini akan membuat sebuah folder `dist/` yang berisi versi teroptimasi dari aplikasi web Anda. Anda dapat mengunggah file-file di dalam folder `dist/` tersebut ke server web Anda.

---

## 🛠 Struktur Direktori Penting

- `/src/components/` - Berisi seluruh *file* komponen antarmuka (UI) per halaman seperti `LandingPage.jsx`, `Dashboard.jsx`, `Inventory.jsx`, `Partners.jsx`, dan `Sidebar.jsx`.
- `/src/data/mockData.js` - Tempat semua *dummy data* (data palsu) disimpan untuk keperluan presentasi UI sebelum API backend dibuat.
- `/src/index.css` - Konfigurasi tema Tailwind CSS kustom, warna *emerald* dan *slate*, animasi *glassmorphism*, dan pengaturan *scrollbar*.
- `/src/App.jsx` - Pusat pengaturan rute jalan aplikasi (*routing*) menggunakan `react-router-dom` dan layout *sidebar*.

---

*Dibuat untuk mendukung digitalisasi protein hijau di Indonesia.*
