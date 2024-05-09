<nav class="navbar navbar-expand-sm bg-light justify-content-center mb-10">
    <ul class="navbar-nav text">
        <li class="nav-item">
            <button class="bg-gray-400 hover:bg-gray-500 rounded-lg shadow px-10 text-sm h-10 mr-5">
                <a class="nav-link text-white w-max" href="/home">Home</a>
            </button>
        </li>
        <?php if(auth()->guard()->check()): ?>
        <li class="nav-item">
            <button class="bg-gray-400 hover:bg-gray-500 rounded-lg shadow px-10 text-sm h-10 mr-5">
                <a class="nav-link text-white w-max" href="/profiles/<?php echo e(auth()->user()->id); ?>">Profile</a>
            </button>
        </li>
        <?php endif; ?>
        <li class="nav-item">
            <button class="bg-gray-400 hover:bg-gray-500 rounded-lg shadow px-10 text-sm h-10 mr-5">
                <a class="nav-link text-white w-max" href="/search">Search</a>
            </button>
        </li>
        <?php if(auth()->user()->is_admin): ?>
            <li class="nav-item">
                <button class="bg-blue-400 hover:bg-blue-500 rounded-lg shadow px-10 text-sm h-10 mr-5">
                    <a class="nav-link text-white w-max" href="/candidates">Search candidates</a>
                </button>
            </li>
            <li class="nav-item">
                <button class="bg-blue-400 hover:bg-blue-500 rounded-lg shadow px-10 text-sm h-10 mr-5">
                    <a class="nav-link text-white w-max" href="/users">User management</a>
                </button>
            </li>
            <li class="nav-item">
                <button class="bg-blue-400 hover:bg-blue-500 rounded-lg shadow px-10 text-sm h-10 mr-5">
                    <a class="nav-link text-white w-max" href="/vacancies">Vacancy management</a>
                </button>
            </li>
        <?php endif; ?>
        <?php if(auth()->guard()->check()): ?>
        <li class="nav-item">
            <button class="bg-gray-400 hover:bg-gray-500 rounded-lg shadow px-10 text-sm h-10 mr-5">
                <a class="nav-link text-white w-max" <?php echo e(route('logout')); ?>"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    <?php echo e(__('Log out')); ?>

                </a>

                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                    <?php echo csrf_field(); ?>
                </form>
            </button>
        </li>
        <?php endif; ?>
    </ul>
</nav><?php /**PATH C:\Users\jbron\job-portal-app\resources\views/components/navbar.blade.php ENDPATH**/ ?>