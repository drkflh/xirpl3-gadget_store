<h2>Detail Pembelian</h2>
<?php
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan
    ON pembelian.id_pelanggan=pelanggan.id_pelanggan
    WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>
<p>
    Nama : <?php echo $detail['nama_pelanggan'] ?> <br>
    Telepon : <?php echo $detail['telepon_pelanggan'] ?> <br>
    Email : <?php echo $detail['email_pelanggan'] ?> <br>
    Tanggal : <?php echo $detail['tanggal_pembelian'] ?> <br>
    Total : <?php echo $detail['total_pembelian'] ?>
</p>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON
        pembelian_produk.id_produk = produk.id_produk 
        WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
        <?php while ($bagi = $ambil->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $nomor ?></td>
            <td><?php echo $bagi['nama_produk']; ?></td>
            <td><?php echo $bagi['harga_produk']; ?></td>
            <td><?php echo $bagi['jumlah']; ?></td>
            <td>
                <?php echo $bagi['harga_produk'] * $bagi['jumlah']; ?>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>