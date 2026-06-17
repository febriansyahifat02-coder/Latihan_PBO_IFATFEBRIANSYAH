<?php
// File: TiketVelvet.php
require_once 'Tiket.php';
require_once 'database.php';

class TiketVelvet extends Tiket {
    protected $bantal_selimut_pack;
    protected $layanan_butler;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket, $bantal_selimut_pack, $layanan_butler) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket);
        $this->bantal_selimut_pack = $bantal_selimut_pack;
        $this->layanan_butler = $layanan_butler;
    }

    public static function getById($db, $id) {
        $query = "SELECT id_tiket, nama_film, jadwal_tayang, jumlah_kursi, harga_dasar_tiket, bantal_selimut_pack, layanan_butler 
                  FROM tabel_tiket 
                  WHERE id_tiket = :id AND jenis_studio = 'Velvet'";
        
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
            $row['bantal_selimut_pack'],
            $row['layanan_butler']
        );
    }

    // Overriding: Menghitung total harga Velvet dengan tambahan surcharge premium sebesar 50%
    public function hitungTotalHarga() {
        return ($this->harga_dasar_tiket * $this->jumlah_kursi) * 1.50;
    }

    public function tampilkanInfoFasilitas() {
        return "Studio: Velvet, Paket Kenyamanan: " . $this->bantal_selimut_pack . ", Butler: " . $this->layanan_butler;
    }
}