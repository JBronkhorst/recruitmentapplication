

<?php $__env->startSection('content_logged_in'); ?>
    <div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
        <h2 class="mb-2">Certification</h2>
        <p class="italic text-sm mb-4">Fields with * are required</p>
        <form method="POST" action="/profiles/<?php echo e(auth()->user()->id); ?>/certification" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
            <div class="form-group mb-2">
                <label for="title">Title *</label>
                <input type="text" id="title" name="title" class="form-control" value="<?php echo e(old('title')); ?>" required>
                <?php $__errorArgs = ['title'];
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
                <label for="certification">Certification *</label>
                <input type="file" id="certification" name="certification" class="form-control" value="<?php echo e(old('certification')); ?>" required>
                <?php $__errorArgs = ['degree'];
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
<?php echo $__env->make('layouts.loggedin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jbron\job-portal-app\resources\views/certification/create.blade.php ENDPATH**/ ?>