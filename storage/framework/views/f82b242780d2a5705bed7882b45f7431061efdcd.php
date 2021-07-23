<?php $__env->startSection('cssfiles'); ?>
<link href="<?php echo e(asset('css/users/style.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('them'); ?>
navbar-light
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <header class="masthead" style="background-image:url('assets/img/home-bg.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto position-relative">
                    <div class="site-heading">
                        <h1>Clean Blog</h1><span class="subheading">A Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8">
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card mb-3">
                        <h5 class="card-header text-left">
                            <a href="<?php echo e(route('publisher.profile', $post->user->id)); ?>">
                                 <?php if(str_contains($post->user->profile->image ?? ' ' , 'http://gravatar.com/avatar/')): ?>
                                <img src="<?php echo e($post->user->profile->image); ?>" class="rounded mx-auto Custom-avatar ">
                                <?php else: ?>
                                <img src="<?php echo e(asset('storage/'. $post->user->profile->image ?? ' ')); ?>" class="rounded mx-auto Custom-avatar">
                                <?php endif; ?>
                                <?php echo e($post->user->name); ?>

                            </a>
                        </h5>
                        <div class="card-body text-center">
                        <h5 class="card-title"><?php echo e($post->title); ?></h5>
                        <p class="card-text"><?php echo e($post->description); ?></p>
                        <p class="card-text"><small class="text-muted">Last updated <?php echo e($post->updated_at->diffForHumans()); ?></small></p>
                        </div>
                        <img class="card-img-top " src="<?php echo e(asset('storage/'.$post->image)); ?>" style="height: 250px">
                        <a href="<?php echo e(route('show.post' , $post )); ?>" class="btn btn-primary mt-2">View Content</a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="row">
                    <div class="col offset-lg-4">
                        <nav>
                            <ul class="pagination">
                                <?php echo e($posts->links()); ?>

                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="clearfix">
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.blog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cms\Blog\resources\views/blog/welcome.blade.php ENDPATH**/ ?>