<?php
// File: TiketIMAX.php
require_once 'Tiket.php';

class TiketIMAX extends Tiket {
    // Properti spesifik untuk kelas studio IMAX
    protected $kacamata_3d_id;
    protected $efek_gerak_fitur;

    // Konstruktor untuk menginisialisasi properti induk dan properti spesifik anak
    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket, $kacamata_3d_id, $efek_gerak_fitur) {
        // Memanggil konstruktor dari abstract class Tiket
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket);
        $this->kacamata_3d_id = $kacamata_3d_id;
        $this->efek_gerak_fitur = $efek_gerak_fitur;
    }

    // Implementasi metode hitungTotalHarga untuk kelas IMAX
    public function hitungTotalHarga() {
        return $this->harga_dasar_tiket * $this->jumlah_kursi;
    }

    // Implementasi metode tampilkanInfoFasilitas untuk kelas IMAX
    public function tampilkanInfoFasilitas() {
        return "Studio: IMAX, ID Kacamata 3D: " . $this->kacamata_3d_id . ", Fitur Efek: " . $this->efek_gerak_fitur;
    }
}