<?php
// File: TiketRegular.php
require_once 'Tiket.php';

class TiketRegular extends Tiket {
    // Properti spesifik untuk kelas studio Regular
    protected $tipe_audio;
    protected $lokasi_baris;

    // Konstruktor untuk menginisialisasi properti induk dan properti spesifik anak
    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket, $tipe_audio, $lokasi_baris) {
        // Memanggil konstruktor dari abstract class Tiket
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket);
        $this->tipe_audio = $tipe_audio;
        $this->lokasi_baris = $lokasi_baris;
    }

    // Implementasi metode hitungTotalHarga untuk kelas Regular (harga dasar x jumlah kursi)
    public function hitungTotalHarga() {
        return $this->harga_dasar_tiket * $this->jumlah_kursi;
    }

    // Implementasi metode tampilkanInfoFasilitas untuk kelas Regular
    public function tampilkanInfoFasilitas() {
        return "Studio: Regular, Audio: " . $this->tipe_audio . ", Baris: " . $this->lokasi_baris;
    }
}