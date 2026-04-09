<?php $__env->startSection('title', 'Profil Saya'); ?>

<?php $__env->startSection('content'); ?>
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Profil Saya</h1>
                <p class="text-gray-500 text-sm">Kelola informasi akun Anda</p>
            </div>
            <a href="<?php echo e(route('user.profile.edit')); ?>"
                class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                <i class="fas fa-edit mr-2"></i>Edit Profil
            </a>
        </div>

        <?php if(session('success')): ?>
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded">
                <i class="fas fa-check-circle mr-2"></i><?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <?php if(session('error')): ?>
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded">
                <i class="fas fa-exclamation-circle mr-2"></i><?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <div class="bg-gray-50 rounded-lg p-6 text-center">
                <div class="relative inline-block">
                    <?php if($user->avatar): ?>
                        <img src="<?php echo e(asset('storage/' . $user->avatar)); ?>"
                            class="w-32 h-32 rounded-full mx-auto object-cover border-4 border-indigo-200">
                    <?php else: ?>
                        <div
                            class="w-32 h-32 rounded-full mx-auto bg-indigo-100 flex items-center justify-center border-4 border-indigo-200">
                            <i class="fas fa-user text-5xl text-indigo-400"></i>
                        </div>
                    <?php endif; ?>

                    <!-- Upload Avatar Button -->
                    <form action="<?php echo e(route('user.profile.upload-avatar')); ?>" method="POST" enctype="multipart/form-data"
                        class="mt-3">
                        <?php echo csrf_field(); ?>
                        <label class="cursor-pointer">
                            <input type="file" name="avatar" accept="image/*" class="hidden" onchange="this.form.submit()">
                            <span class="text-indigo-600 text-sm hover:underline">
                                <i class="fas fa-camera mr-1"></i>Ganti Foto
                            </span>
                        </label>
                    </form>
                </div>

                <h3 class="font-bold text-lg text-gray-800 mt-4"><?php echo e($user->name); ?></h3>
                <p class="text-gray-500 text-sm"><?php echo e($user->email); ?></p>
                <span class="inline-block px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full text-xs mt-2">
                    <i class="fas fa-user mr-1"></i><?php echo e(ucfirst($user->role)); ?>

                </span>

                <hr class="my-4">

                <p class="text-gray-500 text-sm">
                    <i class="fas fa-calendar mr-1"></i>
                    Bergabung: <?php echo e($user->created_at->format('d M Y')); ?>

                </p>
            </div>

            
            <div class="md:col-span-2">
                <form action="<?php echo e(route('user.profile.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-3">
                            <label class="block text-gray-700 font-medium mb-2">Nama Lengkap <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="name" value="<?php echo e(old('name', $user->name)); ?>"
                                class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:border-indigo-500 <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                required>
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 font-medium mb-2">Username</label>
                            <input type="text" value="<?php echo e($user->username); ?>"
                                class="w-full border rounded-lg px-3 py-2 bg-gray-100" readonly disabled>
                            <p class="text-gray-400 text-xs mt-1">Username tidak dapat diubah</p>
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 font-medium mb-2">Email <span
                                    class="text-red-500">*</span></label>
                            <input type="email" name="email" value="<?php echo e(old('email', $user->email)); ?>"
                                class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:border-indigo-500 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                required>
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 font-medium mb-2">No Telepon</label>
                            <input type="text" name="phone" value="<?php echo e(old('phone', $user->phone)); ?>"
                                class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:border-indigo-500">
                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-3 md:col-span-2">
                            <label class="block text-gray-700 font-medium mb-2">Alamat</label>
                            <textarea name="address" rows="3"
                                class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:border-indigo-500"><?php echo e(old('address', $user->address)); ?></textarea>
                            <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700">
                        <i class="fas fa-save mr-2"></i>Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>

        
        <div class="mt-6 bg-white rounded-lg shadow p-6">
            <h3 class="font-bold text-lg text-gray-800 mb-4">
                <i class="fas fa-lock text-warning mr-2"></i>Ganti Password
            </h3>
            <form action="<?php echo e(route('user.profile.change-password')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Password Saat Ini <span
                                class="text-red-500">*</span></label>
                        <input type="password" name="current_password" class="w-full border rounded-lg px-3 py-2" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Password Baru <span
                                class="text-red-500">*</span></label>
                        <input type="password" name="new_password" class="w-full border rounded-lg px-3 py-2" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Konfirmasi Password Baru <span
                                class="text-red-500">*</span></label>
                        <input type="password" name="new_password_confirmation" class="w-full border rounded-lg px-3 py-2"
                            required>
                    </div>
                </div>
                <button type="submit" class="mt-4 bg-yellow-500 text-white px-6 py-2 rounded-lg hover:bg-yellow-600">
                    <i class="fas fa-key mr-2"></i>Ganti Password
                </button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ponpes-main\resources\views/user/profil/index.blade.php ENDPATH**/ ?>