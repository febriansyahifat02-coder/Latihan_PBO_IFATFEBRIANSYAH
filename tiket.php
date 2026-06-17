<?php
// File: Tiket.php

abstract class Tiket {
    // Properti terenkapsulasi (protected)
    protected $id_tiket;
    protected $nama_film;
    protected $jadwal_tayang;
    protected $jumlah_kursi;
    protected $harga_dasar_tiket;

    // Konstruktor
    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket) {
        $this->id_tiket = $id_tiket;
        $this->nama_film = $nama_film;
        $this->jadwal_tayang = $jadwal_tayang;
        $this->jumlah_kursi = $jumlah_kursi;
        $this->harga_dasar_tiket = $harga_dasar_tiket;
    }

    // Metode abstrak
    abstract public function hitungTotalHarga();
    abstract public function tampilkanInfoFasilitas();

    // Getter untuk ID Tiket
    public function getIdTiket() {
        return $this->id_tiket;
    }

    // Getter untuk Nama Film
    public function getNamaFilm() {
        return $this->nama_film;
    }

    // Getter untuk Jadwal Tayang (Ini yang dicari oleh index.php)
    public function getJadwalTayang() {
        return $this->jadwal_tayang;
    }

    // Getter untuk Jumlah Kursi
    public function getJumlahKursi() {
        return $this->jumlah_kursi;
    }

    // Getter untuk Harga Dasar Tiket
    public function getHargaDasarTiket() {
        return $this->harga_dasar_tiket;
    }
}