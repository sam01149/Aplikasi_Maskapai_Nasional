

<?php $__env->startSection('title', 'Detail Profil - Abadi Airlines'); ?>

<?php $__env->startSection('content'); ?>
<main class="profile-container">
    <h1>Detail Profil Anda</h1>
    <p style="text-align: center; color: #e0e7ff; margin-bottom: 30px;">Kelola informasi pribadi dan foto profil Anda.</p>

    
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div class="alert alert-error"><?php echo e(session('error')); ?></div>
    <?php endif; ?>
    <?php if($errors->any()): ?>
        <div class="alert alert-error">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p><?php echo e($error); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>

    <div class="profile-card">
        <div class="profile-avatar-section">
    <?php
        // Force refresh dari database
        $currentUser = \App\Models\User::find(Auth::id());
        $photoPath = $currentUser->profile_photo_path;
        
        // Debug info
        \Log::info('Profile Detail - User ID: ' . $currentUser->id);
        \Log::info('Profile Detail - Photo Path: ' . ($photoPath ?? 'NULL'));
        
        // Generate URL
        if ($photoPath && \Storage::disk('public')->exists($photoPath)) {
            $profilePhotoUrl = asset('storage/' . $photoPath) . '?v=' . time();
            \Log::info('Profile Detail - Photo exists, URL: ' . $profilePhotoUrl);
        } else {
            $profilePhotoUrl = asset('images/default_profile.png');
            \Log::info('Profile Detail - Using default photo');
        }
    ?>
    <img src="<?php echo e($profilePhotoUrl); ?>" 
         alt="Profile Avatar" 
         class="profile-avatar" 
         id="profile-preview"
         onerror="console.error('Image load error:', this.src); this.src='<?php echo e(asset('images/default_profile.png')); ?>'">
    <br>

            <form action="<?php echo e(route('profile.updatePhoto')); ?>" method="POST" enctype="multipart/form-data" id="photo-upload-form">
                <?php echo csrf_field(); ?>
                <label for="profile_photo" class="upload-btn">
                    <i class="fas fa-camera"></i> Ganti Foto
                </label>
                <input type="file" id="profile_photo" name="profile_photo" accept="image/*" style="display: none;">
            </form>
    
            <p class="profile-name-display"><?php echo e($user->name); ?></p>
            <p class="profile-email-display"><?php echo e($user->email); ?></p>
        </div>

        <div class="profile-details-section">
            <div class="detail-group">
                <span class="detail-label">Nama Lengkap:</span>
                <span class="detail-value"><?php echo e($user->name); ?></span>
            </div>
            <div class="detail-group">
                <span class="detail-label">Email:</span>
                <span class="detail-value"><?php echo e($user->email); ?></span>
            </div>
            <div class="detail-group">
                <span class="detail-label">Bergabung Sejak:</span>
                <span class="detail-value"><?php echo e(\Carbon\Carbon::parse($user->created_at)->format('d F Y')); ?></span>
            </div>
        </div>

        <div class="profile-actions">
            <a style="background-color: #ffd54f;color:black;" href="/dashboard" class="button back-to-dashboard-btn">Kembali ke Dashboard</a>
        </div>
    </div>
</main>

<style>
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 5px;
        text-align: center;
    }
    
    .alert-success {
        background-color: rgba(40, 167, 69, 0.2);
        border: 1px solid #28a745;
        color: #28a745;
    }
    
    .alert-error {
        background-color: rgba(220, 53, 69, 0.2);
        border: 1px solid #dc3545;
        color: #dc3545;
    }

    .profile-container {
        max-width: 600px;
        margin: 2rem auto;
        background: rgba(0, 0, 0, 0.7);
        padding: 3rem;
        border-radius: 15px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.5);
        text-align: center;
    }

    .profile-card {
        background: rgba(255, 255, 255, 0.08);
        border-radius: 10px;
        padding: 30px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .profile-avatar-section {
        margin-bottom: 25px;
        text-align: center;
    }

    .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid #ffd54f;
        box-shadow: 0 0 15px rgba(255, 213, 79, 0.4);
        margin-bottom: 15px;
        background-color: #555;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .upload-btn {
        display: inline-block;
        background-color: #007bff;
        color: #fff;
        padding: 8px 15px;
        border-radius: 20px;
        cursor: pointer;
        font-size: 0.9rem;
        transition: background-color 0.3s ease;
        margin-top: 10px;
    }

    .upload-btn:hover {
        background-color: #0056b3;
    }

    .profile-name-display {
        font-size: 1.8rem;
        font-weight: 700;
        color: #ffd54f;
        margin-top: 15px;
        margin-bottom: 5px;
    }

    .profile-email-display {
        font-size: 1rem;
        color: #e0e7ff;
    }

    .profile-details-section {
        width: 100%;
        text-align: left;
        margin-top: 20px;
    }

    .detail-group {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px dashed rgba(255, 255, 255, 0.15);
        font-size: 1.05rem;
    }

    .detail-group:last-child {
        border-bottom: none;
    }

    .detail-label {
        font-weight: 500;
        color: #e0e7ff;
    }

    .detail-value {
        color: #fff;
        text-align: right;
    }

    .profile-actions {
        margin-top: 30px;
        display: flex;
        justify-content: center;
        gap: 20px;
    }

    .profile-actions .button {
        width: auto;
        padding: 12px 30px;
    }

    .back-to-dashboard-btn {
        background-color: #555;
    }

    .back-to-dashboard-btn:hover {
        background-color: #333;
    }

    #loading-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.7);
        z-index: 9999;
        justify-content: center;
        align-items: center;
    }

    #loading-overlay.active {
        display: flex;
    }

    .spinner {
        border: 4px solid #f3f3f3;
        border-top: 4px solid #ffd54f;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

<div id="loading-overlay">
    <div class="spinner"></div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const profilePhotoInput = document.getElementById('profile_photo');
        const profilePreview = document.getElementById('profile-preview');
        const photoUploadForm = document.getElementById('photo-upload-form');
        const loadingOverlay = document.getElementById('loading-overlay');

        if (profilePhotoInput) {
            profilePhotoInput.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    // Validasi ukuran file (max 2MB)
                    if (file.size > 2048000) {
                        alert('Ukuran file terlalu besar! Maksimal 2MB');
                        this.value = '';
                        return;
                    }
                    
                    // Validasi tipe file
                    const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
                    if (!validTypes.includes(file.type)) {
                        alert('Format file tidak valid! Hanya JPEG, PNG, JPG, dan GIF yang diperbolehkan');
                        this.value = '';
                        return;
                    }

                    // Preview gambar
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        profilePreview.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                    
                    // Tampilkan loading
                    loadingOverlay.classList.add('active');
                    
                    // Submit form
                    setTimeout(() => {
                        photoUploadForm.submit();
                    }, 500);
                }
            });
        }

        // Handle error loading image
        if (profilePreview) {
            profilePreview.addEventListener('error', function() {
                console.log('Error loading image, using default');
                this.src = '<?php echo e(asset("images/default_profile.png")); ?>';
            });
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\sam\Documents\File_Coding\HTML_CSS_JAVASCRIPT_dan_GAMBAR\Kuliah\airlines\resources\views/fitur/profile_detail.blade.php ENDPATH**/ ?>