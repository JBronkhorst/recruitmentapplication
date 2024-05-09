

<?php $__env->startSection('content_logged_in'); ?>
    <div class="card">
        <div class="card-header">
            <h1 class="mt-2 text-center"><?php echo e($candidate->personal_information->first_name); ?> <?php echo e($candidate->personal_information->surname); ?></h1>
        </div>
        <div class="card-content m-3 mb-0">
            <h3 class="font-bold">Personal information</h3>
            <span class="font-bold">Location: </span><span><?php echo e($candidate->personal_information->city); ?></span><br>
            <span class="font-bold">Email: </span><span><?php echo e($candidate->email); ?></span><br>
            <span class="font-bold">Phone number: </span><span><?php echo e($candidate->personal_information->phone_number); ?></span>
        </div> 
        <div class="card-content m-3 mb-0">
            <hr>
            <h3 class="font-bold">Work experience</h3>
            <?php $__empty_1 = true; $__currentLoopData = $candidate->work_experience; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $work_experience): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
            <?php $__empty_1 = true; $__currentLoopData = $candidate->education; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
            <?php $__empty_1 = true; $__currentLoopData = $candidate->certification; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $certification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <span class="font-bold"><?php echo e($certification->title); ?></span><br>
                <span><a href="<?php echo e(asset('storage/' . $certification->certification)); ?>" target="_blank">Download file</a></span><br><br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <span>No certifications added.</span>
            <?php endif; ?>
        </div>
        <div class="card-content m-3 mb-0 mt-0">
            <hr>
            <h3 class="font-bold">Skills</h3>
            <ul class="max-w-md space-y-1 list-disc list-inside">
                <?php $__empty_1 = true; $__currentLoopData = $candidate->skill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <li><?php echo e($skill->name); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <span>No skills added.</span>
                <?php endif; ?>
            </ul>
        </div>
        <div class="flex justify-center card-content m-2 mb-4">
            <button class="bg-blue-400 hover:bg-blue-500 rounded-lg shadow px-10 text-sm h-10 mt-2 mr-5">
                <a class="nav-link text-white" href="mailto:<?php echo e($candidate->email); ?>" target="_blank">Contact <?php echo e($candidate->personal_information->first_name); ?></a>
            </button>
            <button class="bg-blue-400 hover:bg-blue-500 rounded-lg shadow px-10 text-sm h-10 mt-2">
                <a class="nav-link text-white" href="/profiles/<?php echo e($candidate->id); ?>/generate-pdf" class="btn btn-primary">Download CV</a>
            </button>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.loggedin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jbron\job-portal-app\resources\views/candidate/show.blade.php ENDPATH**/ ?>