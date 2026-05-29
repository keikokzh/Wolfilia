```markdown
# Panduan Sistem Desain (Design System Specification) - Landing Page

Dokumen ini merangkum spesifikasi UI, tata letak, tipografi, dan aset visual dari landing page "Marketeam". Seluruh sistem warna dikonfigurasi menggunakan variabel agar mudah disesuaikan (*adjustable*) oleh pengguna.

---

## 1. Konfigurasi Warna & Gradien (Adjustable Theme)

Ubah nilai Hex Code di bawah ini untuk mengganti tema warna dasar landing page secara keseluruhan.

### Aturan Variabel Warna (CSS Variables)
```css
:root {
  /* Warna Utama & Latar Belakang */
  --bg-dark: #070510;         /* Warna gelap pekat di sudut kanan/bawah */
  --text-primary: #FFFFFF;    /* Warna teks utama */
  --text-muted: #A3A3A3;      /* Warna teks sekunder (navigasi/footer) */
  
  /* Komponen Gradien Abstrak (Aura/Mesh Gradient) */
  --gradient-color-1: #87d99eff; /* Ungu terang (dominan di tengah dan atas) */
  --gradient-color-2: #43a28aff; /* Kuning/pudar hangat (aksen di sudut kiri atas) */
  --gradient-color-3: #053813ff; /* Biru malam/ungu tua (transisi ke gelap) */

  /* Warna Aksen Komponen (Tombol & Efek Glow) */
  --accent-glow: rgba(98, 241, 139, 0.4); /* Efek bayangan menyala */
  --btn-cta: #110E24;          /* Latar belakang tombol utama */
}

```

### Implementasi Gradien Latar Belakang (Mesh Gradient)

Efek *aurora* pada background diimplementasikan menggunakan gabungan `radial-gradient`:

```css
body {
  background-color: var(--bg-dark);
  background-image: 
    radial-gradient(at 0% 20%, var(--gradient-color-2) 0px, transparent 40%),
    radial-gradient(at 40% 30%, var(--gradient-color-1) 0px, transparent 60%),
    radial-gradient(at 100% 100%, var(--gradient-color-3) 0px, transparent 70%);
  background-attachment: fixed;
}

```

---

## 2. Karakteristik Style UI

Landing page ini menggunakan perpaduan gaya modern yang bersih dengan sentuhan futuristik:

* **Dark Mode & Aurora/Mesh Glow:** Menggunakan latar belakang gelap yang dikombinasikan dengan pendaran cahaya (*glow effect*) lembut berwarna warni untuk memberikan kesan premium dan teknologi tinggi.
* **Glassmorphism Halus:** Elemen seperti tombol "Join Now" menggunakan efek semi-transparan dengan border tipis yang bercahaya (*illuminated border*).
* **Abstract Orbital Graphic:** Menggunakan elemen dekoratif berbentuk lingkaran konsentris (orbit) tipis di sisi kanan untuk menampilkan visualisasi jaringan talenta secara dinamis.
* **Minimalist & Clean Layout:** Jarak antar elemen (*whitespace*) yang luas, memberikan ruang bernapas yang lega pada teks *headline*.

---

## 3. Sistem Tipografi (Fonts)

Font yang digunakan memiliki karakteristik *sans-serif* geometris yang modern, bersih, dan tegas (Mirip seperti font **Plus Jakarta Sans**, **Inter**, atau **Satoshi**).

### Spesifikasi Teks:

1. **Headline Utama (Hero Text)**
* *Ukuran:* 48px - 56px (Tergantung responsivitas)
* *Ketebalan (Weight):* SemiBold / Bold (600/700)
* *Sifat:* Menggunakan *line-height* yang rapat agar terlihat padat dan kuat.


2. **Statistik ("20k+")**
* *Ukuran:* 64px
* *Ketebalan (Weight):* Bold (700)


3. **Navigasi & Teks Pendukung**
* *Ukuran:* 14px - 16px
* *Ketebalan (Weight):* Medium (500)
* *Warna:* Semi-transparan (`var(--text-muted)`)



---

## 4. Struktur & Komponen UI

### A. Navigation Bar (Header)

* **Kiri:** Logo "Marketeam" (Ikon minimalis + Teks tebal).
* **Tengah:** Menu Navigasi (*Your Team, Solutions, Blog, Pricing*).
* **Kanan:** Tombol "Log In" (Teks biasa) dan Tombol "Join Now" (Tombol dengan outline melingkar dan efek *glow* ungu).

### B. Hero Section (Kiri)

* **Headline:** Teks persuasif yang besar dan mencolok.
* **CTA Button ("Start Project"):** Tombol berbentuk pil (*capsule pill*) berwarna hitam pekat dengan ikon panah (`>`), memberikan kontras tinggi di atas latar belakang ungu.
* **Kursor David:** Aksen penunjuk grafis interaktif dengan label nama mini untuk memberikan kesan kolaboratif atau pengerjaan *real-time*.

### C. Orbital Interactive Graphic (Kanan)

* **Pusat Orbit:** Menampilkan teks statistik utama (`20k+ Specialists`).
* **Garis Orbit:** 3-4 lapisan lingkaran konsentris dengan garis putih tipis ber-opacity rendah (10%-20%).
* **Avatar & Node Ikon:** Foto profil bertema lingkaran tersebar di sepanjang garis orbit, diselingi dengan ikon fitur berbentuk kotak melingkar (*rounded square*) yang memiliki efek bayangan menyala sesuai warna tema.

### D. Client Logo Showcase (Footer)

Menampilkan jajaran logo mitra/klien dengan warna putih monokromtransparan (opacity 50%) agar tidak mendominasi visual:


```

### Tips Tambahan untuk Implementasi:
Jika kamu memindahkan desain ini ke kode real (HTML/CSS atau Tailwind), kamu tinggal menyuntikkan variabel `:root` tersebut ke dalam file CSS globalmu. Jika user ingin tema hijau-biru (Cyberpunk), mereka cukup mengganti isi `--gradient-color-1` dan `--gradient-color-2` menjadi kode hex hijau dan biru tanpa perlu merombak struktur CSS lainnya!

```