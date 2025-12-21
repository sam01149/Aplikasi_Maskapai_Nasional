

<?php $__env->startSection('title', 'Admin - Kelola Voucher'); ?>

<?php $__env->startSection('content'); ?>
<main class="dashboard-container" style="max-width: 1000px;">
    <h1>Kelola Voucher Diskon</h1>
    <p style="font-size: 1.1rem; color: #e0e7ff; margin-bottom: 2rem;">Tambah, edit, atau hapus voucher promosi.</p>

    <div style="text-align: right; margin-bottom: 20px;">
        <a href="<?php echo e(route('admin.vouchers.create')); ?>" class="button" style="color:rgb(220, 181, 66)">
            <i  class="fas fa-plus"></i> Tambah Voucher Baru
        </a>
    </div>

    <?php if(session('success')): ?>
        <div class="alert-message success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="member-table">
            <thead>
                <tr>
                    <th>Kode Voucher</th>
                    <th>Diskon (%)</th>
                    <th>Status</th>
                    <th>Dibuat Pada</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $vouchers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $voucher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><strong><?php echo e($voucher->code); ?></strong></td>
                        <td><?php echo e($voucher->discount_percentage); ?>%</td>
                        <td>
                            <?php if($voucher->is_active): ?>
                                <span style="color: #6bff6b;">Aktif</span>
                            <?php else: ?>
                                <span style="color: #ff6b6b;">Tidak Aktif</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($voucher->created_at->format('d M Y')); ?></td>
                        <td>
                            <a href="<?php echo e(route('admin.vouchers.edit', $voucher->id)); ?>" class="button small-button" style="background-color: #3a8dff;color:white;padding: 0.5rem 1rem;
        font-size: 0.85rem;
        border-radius: 20px;
        margin: 0 5px;">Edit</a>
                            <form action="<?php echo e(route('admin.vouchers.destroy', $voucher->id)); ?>" method="POST" style="display:inline-block;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="button small-button" style="background-color: #dc3545;color:black;padding: 0.5rem 1rem;
        font-size: 0.85rem;
        border-radius: 20px;
        margin: 0 5px;" onclick="return confirm('Anda yakin ingin menghapus voucher ini?');"> Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" style="text-align: center;">Belum ada voucher yang dibuat.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div style="text-align: center; margin-top: 30px;">
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="button" style="background-color:rgb(220, 181, 66);border-radius:30px;color:black; width: auto; padding: 12px 30px;" >Kembali ke Dashboard Admin</a>
    </div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\sam\Documents\File_Coding\HTML_CSS_JAVASCRIPT_dan_GAMBAR\Kuliah\airlines\resources\views/admin/vouchers/index.blade.php ENDPATH**/ ?>