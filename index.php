<?php
// File: index.php
require_once 'database.php';
require_once 'TiketRegular.php';
require_once 'TiketIMAX.php';
require_once 'TiketVelvet.php';

// Mengambil seluruh data tiket dari database tanpa menggunakan alias tabel
$query = "SELECT id_tiket, nama_film, jadwal_tayang, jumlah_kursi, harga_dasar_tiket, jenis_studio, 
                 tipe_audio, lokasi_baris, kacamata_3d_id, efek_gerak_fitur, bantal_selimut_pack, layanan_butler 
          FROM tabel_tiket 
          ORDER BY jenis_studio ASC, id_tiket ASC";

$stmt = $db->prepare($query);
$stmt->execute();
$daftar_tiket_raw = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Mengelompokkan data ke dalam objek polimorfik berdasarkan jenis studio
$studio_regular = [];
$studio_imax = [];
$studio_velvet = [];

foreach ($daftar_tiket_raw as $row) {
    if ($row['jenis_studio'] === 'Regular') {
        $studio_regular[] = new TiketRegular(
            $row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], $row['jumlah_kursi'], $row['harga_dasar_tiket'],
            $row['tipe_audio'], $row['lokasi_baris']
        );
    } elseif ($row['jenis_studio'] === 'IMAX') {
        $studio_imax[] = new TiketIMAX(
            $row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], $row['jumlah_kursi'], $row['harga_dasar_tiket'],
            $row['kacamata_3d_id'], $row['efek_gerak_fitur']
        );
    } elseif ($row['jenis_studio'] === 'Velvet') {
        $studio_velvet[] = new TiketVelvet(
            $row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], $row['jumlah_kursi'], $row['harga_dasar_tiket'],
            $row['bantal_selimut_pack'], $row['layanan_butler']
        );
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pesanan Tiket Bioskop</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f4f6f9; color: #333; }
        h1 { text-align: center; color: #2c3e50; margin-bottom: 30px; }
        h2 { color: #2980b9; border-bottom: 2px solid #2980b9; padding-bottom: 8px; margin-top: 40px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; background: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #34495e; color: #fff; }
        tr:hover { background-color: #f9f9f9; }
        .harga { font-weight: bold; color: #27ae60; }
        .fasilitas { font-style: italic; color: #555; }
    </style>
</head>
<body>

    <h1>Sistem Informasi Manajemen Tiket Bioskop</h1>

    <h2>Daftar Tiket - Studio Regular</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Film</th>
                <th>Jadwal Tayang</th>
                <th>Jumlah Kursi</th>
                <th>Harga Dasar</th>
                <th>Informasi Fasilitas Spesifik</th>
                <th>Total Harga (Polimorfik)</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($studio_regular)): ?>
                <tr><td colspan="7" style="text-align:center;">Tidak ada data tiket Regular.</td></tr>
            <?php else: ?>
                <?php foreach ($studio_regular as $tkt): ?>
                    <tr>
                        <td><?= $tkt->getIdTiket(); ?></td>
                        <td><?= $tkt->getNamaFilm(); ?></td>
                        <td><?= $tkt->getJadwalTayang(); ?></td>
                        <td><?= $tkt->getJumlahKursi(); ?></td>
                        <td>Rp <?= number_format($tkt->getHargaDasarTiket(), 0, ',', '.'); ?></td>
                        <td class="fasilitas"><?= $tkt->tampilkanInfoFasilitas(); ?></td>
                        <td class="harga">Rp <?= number_format($tkt->hitungTotalHarga(), 0, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <h2>Daftar Tiket - Studio IMAX</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Film</th>
                <th>Jadwal Tayang</th>
                <th>Jumlah Kursi</th>
                <th>Harga Dasar</th>
                <th>Informasi Fasilitas Spesifik</th>
                <th>Total Harga (Polimorfik)</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($studio_imax)): ?>
                <tr><td colspan="7" style="text-align:center;">Tidak ada data tiket IMAX.</td></tr>
            <?php else: ?>
                <?php foreach ($studio_imax as $tkt): ?>
                    <tr>
                        <td><?= $tkt->getIdTiket(); ?></td>
                        <td><?= $tkt->getNamaFilm(); ?></td>
                        <td><?= $tkt->getJadwalTayang(); ?></td>
                        <td><?= $tkt->getJumlahKursi(); ?></td>
                        <td>Rp <?= number_format($tkt->getHargaDasarTiket(), 0, ',', '.'); ?></td>
                        <td class="fasilitas"><?= $tkt->tampilkanInfoFasilitas(); ?></td>
                        <td class="harga">Rp <?= number_format($tkt->hitungTotalHarga(), 0, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <h2>Daftar Tiket - Studio Velvet</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Film</th>
                <th>Jadwal Tayang</th>
                <th>Jumlah Kursi</th>
                <th>Harga Dasar</th>
                <th>Informasi Fasilitas Spesifik</th>
                <th>Total Harga (Polimorfik)</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($studio_velvet)): ?>
                <tr><td colspan="7" style="text-align:center;">Tidak ada data tiket Velvet.</td></tr>
            <?php else: ?>
                <?php foreach ($studio_velvet as $tkt): ?>
                    <tr>
                        <td><?= $tkt->getIdTiket(); ?></td>
                        <td><?= $tkt->getNamaFilm(); ?></td>
                        <td><?= $tkt->getJadwalTayang(); ?></td>
                        <td><?= $tkt->getJumlahKursi(); ?></td>
                        <td>Rp <?= number_format($tkt->getHargaDasarTiket(), 0, ',', '.'); ?></td>
                        <td class="fasilitas"><?= $tkt->tampilkanInfoFasilitas(); ?></td>
                        <td class="harga">Rp <?= number_format($tkt->hitungTotalHarga(), 0, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>