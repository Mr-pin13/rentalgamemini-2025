# Sistem Rental Game & Konsol Mini (Adesya Dwika Ryzanta)

## 1. Tujuan Sistem
Sistem ini dibuat untuk:

1. **Mencatat semua konsol dan game** yang tersedia di rental.  
2. **Mengelompokkan game berdasarkan kategori** (misalnya Action, Racing, Sports, dll).  
3. **Menyimpan data transaksi penyewaan (rental)**, termasuk siapa yang menyewa, kapan mulai, dan kapan selesai.  
4. **Memudahkan pencarian game atau konsol** berdasarkan nama atau kategori.  
5. **Melihat hubungan antar game dan konsol**, seperti game mana yang bisa dimainkan di konsol tertentu atau game yang sering dipinjam bersama.  
6. **Menyimpan riwayat penyewa dan antrian penyewaan** jika stok sedang penuh.  

---

## 2. Struktur Data yang Digunakan

### a. Tree (Kategori Game)
Struktur pohon digunakan untuk mengatur kategori game.  
Contoh: kategori utama seperti **Action** punya subkategori **Shooter** atau **Platformer**.  
Dengan tree, game bisa diorganisir secara hierarkis, sehingga memudahkan pencarian dan pengelompokan.  

### b. Linked List (Riwayat Rental)
Setiap transaksi rental dicatat seperti linked list, dari yang terbaru ke yang lama.  
Ini memudahkan sistem menelusuri **riwayat penyewaan** oleh client tertentu secara berurutan.

### c. Array (Stok Game dan Konsol)
Array digunakan untuk menyimpan stok setiap game atau konsol.  
Karena array bisa diakses dengan indeks, sistem dapat langsung mengecek jumlah yang tersedia atau mengupdate stok dengan cepat saat terjadi transaksi.

### d. Searching (Pencarian Game/Konsol)
Sistem memiliki fitur pencarian berdasarkan **judul game**, **nama konsol**, atau **kategori**.  
Searching dapat menggunakan metode **linear search** (untuk daftar kecil) atau **binary search** (untuk daftar yang sudah terurut).

### e. Queue (Antrian Rental)
Jika semua unit dari sebuah game atau konsol sedang disewa, maka calon penyewa berikutnya masuk ke **antrian**.  
Prinsipnya FIFO (First In, First Out), jadi yang mendaftar lebih dulu akan mendapatkan giliran terlebih dahulu.

### f. Graph (Relasi Konsol–Game)
Struktur graf digunakan untuk memetakan relasi antara konsol dan game.  
Misalnya, Nintendo Mini hanya bisa memainkan **Super Mario Bros.** dan **Zelda**, sedangkan PlayStation Classic mendukung **Gran Turismo**.  
Dengan graf ini sistem juga bisa memberi **rekomendasi** game pelengkap yang sering disewa bersama.
