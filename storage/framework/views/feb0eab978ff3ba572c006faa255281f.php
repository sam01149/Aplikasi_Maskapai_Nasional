

<?php $__env->startSection('title', 'Admin Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<main class="dashboard-container">
    <h1>Admin Dashboard</h1>
    <p style="font-size: 1.1rem; color: #e0e7ff; margin-bottom: 2.5rem;">Selamat datang <?php echo e(Auth::user()->name); ?>. anda dapat mengelola sistem dari sini.</p>

    <div class="features-grid">
        <div class="feature-card">
            <h2>Kelola Anggota</h2>
            <p>Lihat, edit, atau hapus data anggota yang terdaftar di sistem.</p>
            <a href="<?php echo e(route('admin.members.index')); ?>" class="button">Kelola Anggota</a>
        </div>

        <div class="feature-card">
            <h2>Kelola Tiket</h2>
            <p>Lihat, edit, atau hapus semua tiket yang dipesan oleh pengguna.</p>
            <a href="<?php echo e(route('admin.tickets.index')); ?>" class="button">Kelola Tiket</a>
        </div>

        <div class="feature-card">
            <h2>Kelola Voucher</h2>
            <p>Tambah, edit, atau nonaktifkan voucher diskon untuk promosi.</p>
            <a href="<?php echo e(route('admin.vouchers.index')); ?>" class="button">Kelola Voucher</a>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\sam\Documents\File_Coding\HTML_CSS_JAVASCRIPT_dan_GAMBAR\Kuliah\airlines\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>