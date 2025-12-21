

<?php $__env->startSection('title', 'Admin - Tambah Voucher'); ?>

<?php $__env->startSection('content'); ?>
<main class="form-container" style="max-width: 600px;">
    <h1>Tambah Voucher Baru</h1>

    <form action="<?php echo e(route('admin.vouchers.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="code">Kode Voucher:</label>
            <input type="text" id="code" name="code" value="<?php echo e(old('code')); ?>" required>
            <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small style="color: #ff6b6b;"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
            <label for="discount_percentage">Persentase Diskon (%):</label>
            <input type="number" id="discount_percentage" name="discount_percentage" step="0.01" min="1" max="100" value="<?php echo e(old('discount_percentage')); ?>" required>
            <?php $__errorArgs = ['discount_percentage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small style="color: #ff6b6b;"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group" style="display: flex; align-items: center;">
            <input type="checkbox" id="is_active" name="is_active" value="1" checked style="width: auto; margin-right: 10px;">
            <label for="is_active" style="margin-bottom: 0;">Aktifkan voucher ini</label>
        </div>

        <button type="submit" class="form-submit-button">Simpan Voucher</button>
    </form>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\sam\Documents\File_Coding\HTML_CSS_JAVASCRIPT_dan_GAMBAR\Kuliah\airlines\resources\views/admin/vouchers/create.blade.php ENDPATH**/ ?>