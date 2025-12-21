

<?php $__env->startSection('title', 'Admin - Kelola Anggota'); ?>

<?php $__env->startSection('content'); ?>
<main class="dashboard-container" style="max-width: 1000px;">
    <h1>Kelola Data Pengguna</h1>
    <p style="font-size: 1.1rem; color: #e0e7ff; margin-bottom: 2.5rem;">Lihat, edit, atau hapus data anggota terdaftar.</p>

    <?php if(session('success')): ?>
        <div class="alert-message success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="alert-message error">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if($members->isEmpty()): ?>
        <div class="alert-message success">
            Belum ada anggota terdaftar.
        </div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="member-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Tanggal Bergabung</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($member->id); ?></td>
                            <td><?php echo e($member->name); ?></td>
                            <td><?php echo e($member->email); ?></td>
                            <td><?php echo e(\Carbon\Carbon::parse($member->created_at)->format('d M Y H:i')); ?></td>
                            <td>
                                <a href="<?php echo e(route('admin.members.edit', $member->id)); ?>" class="button small-button" style="background-color: #007bff;color:white;">Edit</a>
                                <form action="<?php echo e(route('admin.members.destroy', $member->id)); ?>" method="POST" style="display:inline-block;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="button small-button" style="background-color: #dc3545;" onclick="return confirm('Anda yakin ingin menghapus anggota ini? Ini akan menghapus semua tiket mereka juga!');">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
    <div style="text-align: center; margin-top: 30px;">
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="button"  style="background-color:rgb(220, 181, 66);border-radius:30px;color:black; width: auto; padding: 12px 30px;">Kembali ke Dashboard Admin</a>
    </div>
</main>
<style>
    /* Tambahkan gaya khusus untuk tabel admin jika diperlukan, atau gunakan yang sudah ada */
    .table-responsive {
        overflow-x: auto;
    }
    .small-button {
        padding: 0.5rem 1rem;
        font-size: 0.85rem;
        border-radius: 20px;
        margin: 0 5px;
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\sam\Documents\File_Coding\HTML_CSS_JAVASCRIPT_dan_GAMBAR\Kuliah\airlines\resources\views/admin/members/index.blade.php ENDPATH**/ ?>