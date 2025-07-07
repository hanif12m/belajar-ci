<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
History Transaksi Pembelian <strong><?= $username ?></strong>
<hr>
<div class="table-responsive">
    <table class="table datatable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID Pembelian</th>
                <th scope="col">Waktu Pembelian</th>
                <th scope="col">Total Bayar</th>
                <th scope="col">Alamat</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($buy)) : ?>
                <?php foreach ($buy as $index => $item) : ?>
                    <tr>
                        <th scope="row"><?= $index + 1 ?></th>
                        <td><?= $item['id'] ?></td>
                        <td><?= $item['created_at'] ?></td>
                        <td><?= number_to_currency($item['total_harga'], 'IDR') ?></td>
                        <td><?= $item['alamat'] ?></td>
                        <td><?= ($item['status'] == "1") ? "Sudah Selesai" : "Belum Selesai" ?></td>
                        <td>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#detailModal-<?= $item['id'] ?>">
                                Detail
                            </button>
                        </td>
                    </tr>

                    <!-- Detail Modal Begin -->
<div class="modal fade" id="detailModal-<?= $item['id'] ?>" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Transaksi #<?= $item['id'] ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php if (!empty($product[$item['id']])) : ?>
          <?php foreach ($product[$item['id']] as $index2 => $item2) : ?>
            <p><strong><?= $index2 + 1 ?>.</strong></p>

            <?php if (!empty($item2['foto']) && file_exists("img/" . $item2['foto'])) : ?>
              <img src="<?= base_url("img/" . $item2['foto']) ?>" width="100px"><br>
            <?php endif; ?>

            <strong><?= $item2['nama'] ?></strong><br>

            <!-- Harga Asli -->
            Harga Asli: <strong><?= number_to_currency($item2['harga'] + $item2['diskon'], 'IDR') ?></strong><br>

            <!-- Harga Setelah Diskon -->
            Harga Setelah Diskon: <strong><?= number_to_currency($item2['harga'], 'IDR') ?></strong><br>

            <!-- Jumlah Item -->
            Jumlah: <?= $item2['jumlah'] ?> pcs<br>

            <hr>
          <?php endforeach; ?>
        <?php else : ?>
          <p>Tidak ada detail produk.</p>
        <?php endif; ?>
        Ongkir: <strong><?= number_to_currency($item['ongkir'], 'IDR') ?></strong>
      </div>
    </div>
  </div>
</div>
<!-- Detail Modal End -->

                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>
