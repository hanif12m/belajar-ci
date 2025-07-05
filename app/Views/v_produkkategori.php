<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<?php if (session()->getFlashData('success')): ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= session()->getFlashData('success') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>

<!-- Tombol Tambah -->
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
  Tambah Kategori
</button>

<!-- TABEL DATA -->
<table class="table datatable">
  <thead>
    <tr>
      <th>#</th>
      <th>Nama</th>
      <th>Deskripsi</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($categories as $i => $row): ?>
      <tr>
        <td><?= $i + 1 ?></td>
        <td><?= esc($row['name']) ?></td>
        <td><?= esc($row['description']) ?></td>
        <td>
          <!-- Tombol Edit Modal -->
          <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editModal-<?= $row['id'] ?>">Ubah</button>
          <!-- Tombol Hapus -->
          <a href="<?= base_url('productcategory/delete/' . $row['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
        </td>
      </tr>

      <!-- Modal Edit -->
      <div class="modal fade" id="editModal-<?= $row['id'] ?>" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Kategori</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('productcategory/edit/' . $row['id']) ?>" method="post">
              <?= csrf_field(); ?>
              <div class="modal-body">
                <div class="mb-3">
                  <label>Nama</label>
                  <input type="text" name="name" class="form-control" value="<?= esc($row['name']) ?>" required>
                </div>
                <div class="mb-3">
                  <label>Deskripsi</label>
                  <input type="text" name="description" class="form-control" value="<?= esc($row['description']) ?>">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- End Modal Edit -->

    <?php endforeach ?>
  </tbody>
</table>

<!-- Modal Tambah -->
<div class="modal fade" id="addModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Kategori</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form action="<?= base_url('productcategory') ?>" method="post">
        <?= csrf_field(); ?>
        <div class="modal-body">
          <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Deskripsi</label>
            <input type="text" name="description" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal Tambah -->

<?= $this->endSection() ?>
