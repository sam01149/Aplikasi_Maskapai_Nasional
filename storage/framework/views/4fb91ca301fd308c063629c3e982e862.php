    

    <?php $__env->startSection('title', 'Admin - Edit Tiket'); ?>

    <?php $__env->startSection('content'); ?>
    <main class="form-container" style="max-width: 700px;">
        <h1>Edit Detail Tiket</h1>
        <p style="text-align: center; color: #e0e7ff; margin-bottom: 20px;">Perbarui informasi tiket penerbangan ini.</p>

        <?php if($errors->any()): ?>
            <div class="alert-message error">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('admin.tickets.update', $ticket->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?> 

            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap:</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?php echo e(old('nama_lengkap', $ticket->nama_lengkap)); ?>" required>
            </div>

            <div class="form-group">
                <label for="nomor_telepon">Nomor Telepon:</label>
                <input type="tel" id="nomor_telepon" name="nomor_telepon" value="<?php echo e(old('nomor_telepon', $ticket->nomor_telepon)); ?>" required>
            </div>

            <div class="form-group">
                <label for="NIK">NIK:</label>
                <input type="number" id="NIK" name="NIK" value="<?php echo e(old('NIK', $ticket->NIK)); ?>" required>
            </div>

            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="laki-laki" <?php echo e(old('jenis_kelamin', $ticket->jenis_kelamin) == 'laki-laki' ? 'selected' : ''); ?>>Laki-laki</option>
                    <option value="perempuan" <?php echo e(old('jenis_kelamin', $ticket->jenis_kelamin) == 'perempuan' ? 'selected' : ''); ?>>Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="lokasi_keberangkatan">Lokasi Keberangkatan:</label>
                <input type="text" id="lokasi_keberangkatan" name="lokasi_keberangkatan" value="<?php echo e(old('lokasi_keberangkatan', $ticket->lokasi_keberangkatan)); ?>" required>
                
            </div>

            <div class="form-group">
                <label for="tujuan_penerbangan">Tujuan Penerbangan:</label>
                <input type="text" id="tujuan_penerbangan" name="tujuan_penerbangan" value="<?php echo e(old('tujuan_penerbangan', $ticket->tujuan_penerbangan)); ?>" required>
                
            </div>

            <div class="form-group">
                <label for="tanggal_pemesanan">Tanggal Penerbangan:</label>
                <input type="date" id="tanggal_pemesanan" name="tanggal_pemesanan" value="<?php echo e(old('tanggal_pemesanan', \Carbon\Carbon::parse($ticket->tanggal_pemesanan)->format('Y-m-d'))); ?>" required>
            </div>

            <div class="form-group">
                <label for="harga_tiket">Harga Tiket:</label>
                <input type="number" step="0.01" id="harga_tiket" name="harga_tiket" value="<?php echo e(old('harga_tiket', $ticket->harga_tiket)); ?>" required>
            </div>

            <div class="form-group">
                <label for="status">Status Tiket:</label>
                <select id="status" name="status" required>
                    <option value="belum check-in" <?php echo e(old('status', $ticket->status) == 'belum check-in' ? 'selected' : ''); ?>>Belum Check-in</option>
                    <option value="checked-in" <?php echo e(old('status', $ticket->status) == 'checked-in' ? 'selected' : ''); ?>>Checked-in</option>
                </select>
            </div>

            <div class="form-group">
                <label for="seat_number">Nomor Kursi:</label>
                <input type="text" id="seat_number" name="seat_number" value="<?php echo e(old('seat_number', $ticket->seat_number)); ?>">
                <small style="color: #bbb; display: block; margin-top: 5px;">Biarkan kosong jika belum check-in.</small>
            </div>

            <button type="submit" class="form-submit-button">Perbarui Tiket</button>
            <a href="<?php echo e(route('admin.tickets.index')); ?>" class="button" style="background:rgb(220, 181, 66);border-radius:30px;color:black; width: auto; padding: 12px 30px; margin-top: 20px; display: block; text-align: center;">Kembali ke Daftar Tiket</a>
        </form>
    </main> 
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\sam\Documents\File_Coding\HTML_CSS_JAVASCRIPT_dan_GAMBAR\Kuliah\airlines\resources\views/admin/tickets/edit.blade.php ENDPATH**/ ?>