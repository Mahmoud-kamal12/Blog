<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/users/style.css')); ?>" rel="stylesheet">

    <?php echo $__env->yieldContent('links'); ?>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm ">
            <div class="container">
                <a class="navbar-brand " href="<?php echo e(url('/')); ?>">
                    <?php echo e(config('app.name', 'Laravel')); ?>

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                            </li>
                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>
                                <?php if(str_contains(auth()->user()->profile->image ?? ' ' , 'http://gravatar.com/avatar/')): ?>
                                <img src="<?php echo e(auth()->user()->profile->image); ?>" class=" Home-avatar">
                                <?php else: ?>
                                <img src="<?php echo e(asset('storage/'. auth()->user()->profile->image ?? ' ')); ?>" class="Home-avatar">
                                <?php endif; ?>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <?php if(session()->has('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session()->get('success')); ?>

            </div>
        <?php endif; ?>
        <?php if(auth()->guard()->check()): ?>
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-md-3">
                        <ul class="list-group py-4">
                            <?php if(auth()->user()->IsAdmin()): ?>
                            <li class="list-group-item"><a href="<?php echo e(route('users.index')); ?>">Users</a></li>
                            <li class="list-group-item"><a href="<?php echo e(route('tags.index')); ?>">Tags</a></li>
                            <li class="list-group-item"><a href="<?php echo e(route('categories.index')); ?>">Categories</a></li>
                            <?php endif; ?>
                            <li class="list-group-item"><a href="<?php echo e(route('posts.index')); ?>">Posts</a></li>
                            <li class="list-group-item"><a href="<?php echo e(route('comment.index')); ?>">Comments</a></li>
                            <li class="list-group-item"><a href="<?php echo e(route('trashed.index')); ?>" class="text-danger">Trashed Posts</a></li>
                            <li class="list-group-item"><a href="<?php echo e(route('users.profile' , auth()->user())); ?>">Profile</a></li>

                        </ul>
                    </div>
                    <div class="col-md-9">
                        <main class="py-4">
                            <?php echo $__env->yieldContent('content'); ?>
                        </main>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <main class="py-4">
                <?php echo $__env->yieldContent('content'); ?>
            </main>
        <?php endif; ?>

    </div>

    <?php echo $__env->yieldContent('scripts'); ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\cms\Blog\resources\views/layouts/app.blade.php ENDPATH**/ ?>