<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <!-- Menampilkan pesan sukses jika login berhasil -->
        <?php if (session()->getFlashdata('redirect_success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('redirect_success') ?>
            </div>
        <?php endif; ?>

        <!-- Menampilkan pesan error jika login gagal -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string() == '') ? "" : "collapsed" ?>" href="/">
                <i class="bi bi-grid"></i>
                <span>Home</span>
            </a>
        </li><!-- End Home Nav -->

        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string() == 'keranjang') ? "" : "collapsed" ?>" href="keranjang">
                <i class="bi bi-cart-check"></i>
                <span>Keranjang</span>
            </a>
        </li><!-- End Keranjang Nav -->
        
        <?php
        if (session()->get('role') == 'admin') {
        ?>
            <li class="nav-item">
                <a class="nav-link <?php echo (uri_string() == 'produk') ? "" : "collapsed" ?>" href="produk">
                    <i class="bi bi-receipt"></i>
                    <span>Produk</span>
                </a>
            </li><!-- End Produk Nav -->
        <?php
        }
        ?>

        <?php
if (session()->get('role') == 'admin') {
?>
    <li class="nav-item">
        <a class="nav-link <?php echo (uri_string() == 'productcategory') ? "" : "collapsed" ?>" href="productcategory">
            <i class="bi bi-tags"></i>
            <span>Kategori Produk</span>
        </a>
    </li><!-- End Kategori Produk Nav -->
<?php
}
?>


        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string() == 'faq') ? "" : "collapsed" ?>" href="faq">
                <i class="bi bi-question-circle"></i>
                <span>F.A.Q</span>
            </a>
        </li><!-- End F.A.Q Nav -->

    </ul>

</aside><!-- End Sidebar -->
