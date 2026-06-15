<?php
// File: TiketVelvet.php
require_once 'Tiket.php';

class TiketVelvet extends Tiket {
    // Properti spesifik untuk kelas studio Velvet
    protected $bantal_selimut_pack;
    protected $layanan_butler;

    // Konstruktor untuk menginisialisasi properti induk dan properti spesifik anak
    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket, $bantal_selimut_pack, $layanan_butler) {
        // Memanggil konstruktor dari abstract class Tiket
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket);
        $this->bantal_selimut_pack = $bantal_selimut_pack;
        $this->layanan_butler = $layanan_butler;
    }

    // Implementasi metode hitungTotalHarga untuk kelas Velvet
    public function hitungTotalHarga() {
        return $this->harga_dasar_tiket * $this->jumlah_kursi;
    }

    // Implementasi metode tampilkanInfoFasilitas untuk kelas Velvet
    public function tampilkanInfoFasilitas() {
        return "Studio: Velvet, Paket Kenyamanan: " . $this->bantal_selimut_pack . ", Butler: " . $this->layanan_butler;
    }
}