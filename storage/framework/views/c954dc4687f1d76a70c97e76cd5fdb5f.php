

<?php $__env->startSection('content_logged_in'); ?>
    <div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
        <h2 class="mb-2">Education</h2>
        <p class="italic text-sm mb-4">Fields with * are required</p>
        <form method="POST" action="/profiles/<?php echo e(auth()->user()->id); ?>/education" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
            <div class="form-group mb-2">
                <label for="educational_institution">Educational institution *</label>
                <input type="text" id="educational_institution" name="educational_institution" class="form-control" value="<?php echo e(old('educational_institution')); ?>" required>
                <?php $__errorArgs = ['educational_institution'];
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
                <label for="degree">Degree *</label>
                <input type="text" id="degree" name="degree" class="form-control" value="<?php echo e(old('degree')); ?>" required>
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
            <div class="form-group mb-2">
                <label for="field_of_study">Field of study *</label>
                <input type="text" id="field_of_study" name="field_of_study" class="form-control" value="<?php echo e(old('field_of_study')); ?>" required>
                <?php $__errorArgs = ['field_of_study'];
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
                <label for="start_date">Start date *</label>
                <input type="date" id="start_date" name="start_date" class="form-control" value="<?php echo e(old('start_date')); ?>" required>
                <?php $__errorArgs = ['start_date'];
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
                <label for="end_date">End date *</label>
                <input type="date" id="end_date" name="end_date" class="form-control" value="<?php echo e(old('end_date')); ?>" required>
                <?php $__errorArgs = ['end_date'];
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
                <label for="grade">Grade *</label>
                <input type="text" id="grade" name="grade" class="form-control" value="<?php echo e(old('grade')); ?>" required>
                <?php $__errorArgs = ['grade'];
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
<?php echo $__env->make('layouts.loggedin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jbron\job-portal-app\resources\views/education/create.blade.php ENDPATH**/ ?>