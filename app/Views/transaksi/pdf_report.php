<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h2>Laporan Transaksi</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>NIP</th>
                <th>Id Transaksi</th>
                <th>Keterangan</th>
                <th>Jenis Transaksi</th>
                <th>Jumlah</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1;
                foreach ($transaksi as $t):
            ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= date('d-m-Y', strtotime($t['tanggal_transaksi'])); ?></td>
                <td><?= $t['nip']; ?></td>
                <td><?= $t['id_transaksi']; ?></td>
                <td><?= $t['keterangan']; ?></td>
                <td><?= $t['jenis_transaksi']; ?></td>
                <td><?= $t['jumlah']; ?></td>
                <td><?= $t['status']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
