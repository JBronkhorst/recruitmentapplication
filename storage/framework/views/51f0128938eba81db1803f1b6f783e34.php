
<div class="card">
    <div class="card-header">
        <h1 class="mt-2 text-center"><?php echo e($user->personal_information->first_name); ?> <?php echo e($user->personal_information->surname); ?></h1>
    </div>
    <div class="card-content m-3 mb-0">
        <h3 class="font-bold">Personal information</h3>
        <span class="font-bold">Location: </span><span><?php echo e($user->personal_information->city); ?></span><br>
        <span class="font-bold">Email: </span><span><?php echo e($user->email); ?></span><br>
        <span class="font-bold">Phone number: </span><span><?php echo e($user->personal_information->phone_number); ?></span>
    </div> 
    <div class="card-content m-3 mb-0">
        <hr>
        <h3 class="font-bold">Work experience</h3>
        <?php $__empty_1 = true; $__currentLoopData = $user->work_experience; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $work_experience): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <span class="font-bold"><?php echo e($work_experience->title); ?></span><br>
            <span><?php echo e($work_experience->company_name); ?> -</span>
            <span><?php echo e($work_experience->job_type); ?></span><br>
            <span><?php echo e(date('d-m-Y', strtotime($work_experience->start_date))); ?> -</span>
            <span><?php echo e(date('d-m-Y', strtotime($work_experience->end_date))); ?></span><br>
            <span><?php echo e($work_experience->company_location); ?></span><br><br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <span>No work experience added.</span>
        <?php endif; ?>
    </div>
    <div class="card-content m-3 mb-0 mt-0">
        <hr>
        <h3 class="font-bold">Education</h3>
        <?php $__empty_1 = true; $__currentLoopData = $user->education; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <span class="font-bold"><?php echo e($education->educational_institution); ?></span><br>
            <span><?php echo e($education->degree); ?>, </span>
            <span><?php echo e($education->field_of_study); ?></span><br>
            <span><?php echo e(date('d-m-Y', strtotime($education->start_date))); ?> -</span>
            <span><?php echo e(date('d-m-Y', strtotime($education->end_date))); ?></span><br><br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <span>No education added.</span>
        <?php endif; ?>
    </div>
    <div class="card-content m-3 mb-0 mt-0">
        <hr>
        <h3 class="font-bold">Certifications</h3>
        <?php $__empty_1 = true; $__currentLoopData = $user->certification; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $certification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <span class="font-bold"><?php echo e($certification->title); ?></span>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <span>No certifications added.</span>
        <?php endif; ?>
    </div>
    <div class="card-content m-3 mb-0 mt-0">
        <hr>
        <h3 class="font-bold">Skills</h3>
        <ul class="max-w-md space-y-1 list-disc list-inside">
            <?php $__empty_1 = true; $__currentLoopData = $user->skill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <li><?php echo e($skill->name); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <span>No skills added.</span>
            <?php endif; ?>
        </ul>
    </div>
</div><?php /**PATH C:\Users\jbron\job-portal-app\resources\views/pdf.blade.php ENDPATH**/ ?>