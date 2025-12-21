

<?php $__env->startSection('title', 'Admin - Edit Anggota'); ?>

<?php $__env->startSection('content'); ?>
<main class="form-container" style="max-width: 600px;">
    <h1>Edit Detail Anggota</h1>
    <p style="text-align: center; color: #e0e7ff; margin-bottom: 20px;">Perbarui informasi akun anggota ini.</p>

    <?php if($errors->any()): ?>
        <div class="alert-message error">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('admin.members.update', $member->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?> 

        <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" value="<?php echo e(old('name', $member->name)); ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo e(old('email', $member->email)); ?>" required>
        </div>

        <div class="form-group">
            <label for="password">Password (kosongkan jika tidak ingin diubah):</label>
            <input type="password" id="password" name="password" autocomplete="new-password">
            <small style="color: #bbb; display: block; margin-top: 5px;">Isi jika Anda ingin mengubah password anggota.</small>
        </div>

        
        
        <div class="form-group">
            <label for="profile_photo_path">Path Foto Profil (URL/Path Storage):</label>
            <input type="text" id="profile_photo_path" name="profile_photo_path" value="<?php echo e(old('profile_photo_path', $member->profile_photo_path)); ?>">
            <small style="color: #bbb; display: block; margin-top: 5px;">Untuk mengelola foto profil, Anda mungkin perlu sistem upload yang terpisah.</small>
        </div>

        <button type="submit" class="form-submit-button">Perbarui Anggota</button>
        <a href="<?php echo e(route('admin.members.index')); ?>" class="button" style="background-color: #555; width: auto; padding: 12px 30px; margin-top: 20px; display: block; text-align: center;">Kembali ke Daftar Anggota</a>
    </form>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\sam\Documents\File_Coding\HTML_CSS_JAVASCRIPT_dan_GAMBAR\Kuliah\airlines\resources\views/admin/members/edit.blade.php ENDPATH**/ ?>