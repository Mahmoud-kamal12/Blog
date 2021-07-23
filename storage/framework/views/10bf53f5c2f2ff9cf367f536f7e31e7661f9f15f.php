<?php $__env->startSection('cssfiles'); ?>
<link href="<?php echo e(asset('css/users/style.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <h3 class="text-dark mb-4">All Comments</h3>
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>Post Title</th>
                            <th>First 100 character of Comment</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="col col-sm-2">
                            <?php if(str_contains($item->profile->image ?? ' ' , 'http://gravatar.com/avatar/')): ?>
                            <img src="<?php echo e($item->profile->image); ?>" class="rounded mx-auto d-block Custom-avatar">
                            <?php else: ?>
                            <img src="<?php echo e(asset('storage/'. $item->profile->image ?? ' ')); ?>" class="rounded mx-auto d-block Custom-avatar">
                            <?php endif; ?>
                            </td>
                            <td class="col col-sm-6 "><?php echo e($item->name); ?></td>

                            <td class="col col-sm-3">
                                <?php if(!$item->IsAdmin()): ?>
                                <form class="d-inline text-center " action="<?php echo e(route('users.make-admin' , $item->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('POST'); ?>
                                    <button type="submit" class="btn btn-success sm">Make Admin</button>
                                </form>
                                <?php else: ?>
                                <?php echo e($item->role); ?>

                                <?php endif; ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                        <?php echo e($users->links()); ?>

                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cms\Blog\resources\views/dashboard/users/index.blade.php ENDPATH**/ ?>