<?php
// File: TiketRegular.php
require_once 'Tiket.php';
require_once 'database.php';

class TiketRegular extends Tiket {
    protected $tipe_audio;
    protected $lokasi_baris;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket, $tipe_audio, $lokasi_baris) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket);
        $this->tipe_audio = $tipe_audio;
        $this->lokasi_baris = $lokasi_baris;
    }

    public static function getById($db, $id) {
        $query = "SELECT id_tiket, nama_film, jadwal_tayang, jumlah_kursi, harga_dasar_tiket, tipe_audio, lokasi_baris 
                  FROM tabel_tiket 
                  WHERE id_tiket = :id AND jenis_studio = 'Regular'";
        
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$row) {
            return null;
        }
        
        return new self(
            $row['id_tiket'],
            $row['nama_film'],
            $row['jadwal_tayang'],
            $row['jumlah_kursi'],
            $row['harga_dasar_tiket'],
            $row['tipe_audio'],
            $row['lokasi_baris']
        );
    }

    // Overriding: Menghitung total harga tiket Regular (tarif standar murni)
    public function hitungTotalHarga() {
        return $this->harga_dasar_tiket * $this->jumlah_kursi;
    }

    public function tampilkanInfoFasilitas() {
        return "Studio: Regular, Audio: " . $this->tipe_audio . ", Baris: " . $this->lokasi_baris;
    }
}