<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Blog Post - Brand</title>
    <link rel="stylesheet" href="<?php echo e(asset('assets/bootstrap/css/bootstrap.min.css')); ?> ">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/font-awesome.min.css')); ?>">
    <?php echo $__env->yieldContent('cssfiles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/untitled.css')); ?>">
    <style>
        header.masthead{padding-top:calc(6rem + 72px);padding-bottom:6rem}header.masthead h1,header.masthead .h1{font-size:3rem;line-height:3rem}header.masthead h2,header.masthead .h2{font-size:1.3rem;font-family:"Lato"}@media(min-width: 992px){header.masthead{padding-top:calc(6rem + 106px);padding-bottom:6rem}header.masthead h1,header.masthead .h1{font-size:4.75em;line-height:4rem}header.masthead h2,header.masthead .h2{font-size:1.75em}}
        nav ul.pagination{
            display: flex;
            padding-left: 0;
            list-style: none;
            justify-content: center;
            margin-top: 25px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
        <div class="container"><a class="navbar-brand" href="<?php echo e(url('/')); ?>">CMS</a><button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('blog')); ?>">Home</a></li>
                    <?php if(!auth()->user()): ?>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('register')); ?>">Register</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('prof')); ?>">Profile</a></li>
                    <?php endif; ?>
                    <?php if(auth()->guard()->check()): ?>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('home')); ?>">Dashbord</a></li>
                        <li class="nav-item"><a href="<?php echo e(route('logout')); ?>"onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo csrf_field(); ?>
                            </form>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </nav>

<?php echo $__env->yieldContent('header'); ?>

<?php echo $__env->yieldContent('article'); ?>

<?php if(!isset($nofooter)): ?>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-twitter fa-stack-1x fa-inverse"></i></span></li>
                        <li class="list-inline-item"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-facebook fa-stack-1x fa-inverse"></i></span></li>
                        <li class="list-inline-item"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-github fa-stack-1x fa-inverse"></i></span></li>
                    </ul>
                    <p class="text-muted copyright">Copyright&nbsp;©&nbsp;Mahmoud Kamal 2021</p>
                </div>
            </div>
        </div>
    </footer>
<?php endif; ?>


    <script src="<?php echo e(asset('assets/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/clean-blog.js')); ?>"></script>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\cms\Blog\resources\views/layouts/blog.blade.php ENDPATH**/ ?>