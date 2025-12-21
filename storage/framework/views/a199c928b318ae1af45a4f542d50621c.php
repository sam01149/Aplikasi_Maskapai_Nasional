

<?php $__env->startSection('title', 'Login - Abadi Airlines'); ?>

<?php $__env->startSection('content'); ?>
<main class="form-container">
    <h1>Login</h1>
    <?php if($errors->any()): ?>
        <div class="alert-message error">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <?php if(session('success')): ?>
        <div class="alert-message success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <form action="/sesi/login" method="POST" id="login-form">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" value="<?php echo e(Session::get('email')); ?>" name="email" required autocomplete="username">
        </div>

        <div class="form-group" style="position: relative;">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required autocomplete="current-password">
            <span class="eye-icon" onclick="togglePassword('password')">
                <i class="fas fa-eye"></i>
            </span>
        </div>

        <button name="submit" type="submit" class="form-submit-button">Login</button>
        <p class="text-center" style="margin-top: 1.5rem; color: #e0e7ff;">Belum punya akun? <a href="/sesi/signup" class="link-text">Daftar sekarang</a>.</p>
    </form>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\sam\Documents\File_Coding\HTML_CSS_JAVASCRIPT_dan_GAMBAR\Kuliah\airlines\resources\views/sesi/index.blade.php ENDPATH**/ ?>