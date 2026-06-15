<?php
// File: Tiket.php

abstract class Tiket {
    // Properti terenkapsulasi (protected) untuk memetakan kolom dari database
    protected $id_tiket;
    protected $nama_film;
    protected $jadwal_tayang;
    protected $jumlah_kursi;
    protected $harga_dasar_tiket;

    // Konstruktor untuk inisialisasi nilai properti saat objek dibuat
    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket) {
        $this->id_tiket = $id_tiket;
        $this->nama_film = $nama_film;
        $this->jadwal_tayang = $jadwal_tayang;
        $this->jumlah_kursi = $jumlah_kursi;
        $this->harga_dasar_tiket = $harga_dasar_tiket;
    }

    // Metode abstrak untuk menghitung total harga (wajib diimplementasikan oleh kelas anak)
    abstract public function hitungTotalHarga();

    // Metode abstrak untuk menampilkan informasi fasilitas spesifik studio
    abstract public function tampilkanInfoFasilitas();

    // Getter untuk mengambil data id_tiket jika diperlukan di luar kelas
    public function getIdTiket() {
        return $this->id_tiket;
    }

    // Getter untuk mengambil data nama_film
    public function getNamaFilm() {
        return $this->nama_film;
    }
}