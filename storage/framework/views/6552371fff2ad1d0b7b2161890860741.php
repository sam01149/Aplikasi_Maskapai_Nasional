

<?php $__env->startSection('title', 'Admin - Kelola Tiket'); ?>

<?php $__env->startSection('content'); ?>
<main class="dashboard-container" style="max-width: 1000px;">
    <h1>Kelola Tiket Pengguna</h1>
    <p style="font-size: 1.1rem; color: #e0e7ff; margin-bottom: 2.5rem;">Lihat, edit, atau hapus tiket yang dipesan pengguna.</p>

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

    <?php if($tickets->isEmpty()): ?>
        <div class="alert-message success">
            Belum ada tiket yang dipesan oleh pengguna.
        </div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="member-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Lengkap</th>
                        <th>NIK</th>
                        <th>Rute</th>
                        <th>Tanggal</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Kursi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($ticket->id); ?></td>
                            <td><?php echo e($ticket->nama_lengkap); ?></td>
                            <td><?php echo e($ticket->NIK); ?></td>
                            <td><?php echo e($ticket->lokasi_keberangkatan); ?> <i class="fas fa-arrow-right"></i> <?php echo e($ticket->tujuan_penerbangan); ?></td>
                            <td><?php echo e(\Carbon\Carbon::parse($ticket->tanggal_pemesanan)->format('d M Y')); ?></td>
                            <td>Rp <?php echo e(number_format($ticket->harga_tiket, 0, ',', '.')); ?></td>
                            <td><span class="ticket-status status-<?php echo e(Str::slug($ticket->status)); ?>"><?php echo e($ticket->status); ?></span></td>
                            <td><?php echo e($ticket->seat_number ?? '-'); ?></td>
                            <td>
                                <a href="<?php echo e(route('admin.tickets.edit', $ticket->id)); ?>" class="button small-button" style="background-color: #007bff;color:white;padding:0.5rem 1rem;border-radius:20px">Edit</a>
                                <br><br>
                                <form action="<?php echo e(route('admin.tickets.destroy', $ticket->id)); ?>" method="POST" style="display:inline-block;">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="button small-button" style="background-color: #dc3545;padding:0.5rem 1rem;border-radius:20px;color:black;" onclick="return confirm('Anda yakin ingin menghapus tiket ini?');">Hapus</button>
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
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\sam\Documents\File_Coding\HTML_CSS_JAVASCRIPT_dan_GAMBAR\Kuliah\airlines\resources\views/admin/tickets/index.blade.php ENDPATH**/ ?>