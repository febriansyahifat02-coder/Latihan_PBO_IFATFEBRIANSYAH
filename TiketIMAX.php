<?php
// File: TiketIMAX.php
require_once 'Tiket.php';
require_once 'database.php';

class TiketIMAX extends Tiket {
    protected $kacamata_3d_id;
    protected $efek_gerak_fitur;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket, $kacamata_3d_id, $efek_gerak_fitur) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket);
        $this->kacamata_3d_id = $kacamata_3d_id;
        $this->efek_gerak_fitur = $efek_gerak_fitur;
    }

    // Fungsi statis untuk mengambil data IMAX berdasarkan ID tiket
    public static function getById($db, $id) {
        // Menyiapkan query SQL tanpa menggunakan alias tabel
        $query = "SELECT id_tiket, nama_film, jadwal_tayang, jumlah_kursi, harga_dasar_tiket, kacamata_3d_id, efek_gerak_fitur 
                  FROM tabel_tiket 
                  WHERE id_tiket = :id AND jenis_studio = 'IMAX'";
        
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
            $row['kacamata_3d_id'],
            $row['efek_gerak_fitur']
        );
    }

    public function hitungTotalHarga() {
        return $this->harga_dasar_tiket * $this->jumlah_kursi;
    }

    public function tampilkanInfoFasilitas() {
        return "Studio: IMAX, ID Kacamata 3D: " . $this->kacamata_3d_id . ", Fitur Efek: " . $this->efek_gerak_fitur;
    }
}