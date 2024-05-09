

<?php $__env->startSection('content_logged_in'); ?>
    <div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
        <h2 class="mb-2">Personal information</h2>
        <p class="italic text-sm mb-4">Fields with * are required</p>
        <form method="POST" action="/profiles/<?php echo e(auth()->user()->id); ?>/personal-information" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
            <div class="form-group mb-2">
                <label for="first_name">First name *</label>
                <input type="text" id="first_name" name="first_name" class="form-control" value="<?php echo e(old('first_name')); ?>" required>
                <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-2"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group mb-2">
                <label for="surname">Surname *</label>
                <input type="text" id="surname" name="surname" class="form-control" value="<?php echo e(old('surname')); ?>" required>
                <?php $__errorArgs = ['surname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-2"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group mb-2">
                <label for="phone_number">Phone number *</label>
                <input type="text" id="phone_number" name="phone_number" class="form-control" value="<?php echo e(old('phone_number')); ?>" required>
                <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-2"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group mb-2">
                <label for="city">City *</label>
                <input type="text" id="city" name="city" class="form-control" value="<?php echo e(old('city')); ?>" required>
                <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-2"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.loggedin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jbron\job-portal-app\resources\views/personal_information/create.blade.php ENDPATH**/ ?>