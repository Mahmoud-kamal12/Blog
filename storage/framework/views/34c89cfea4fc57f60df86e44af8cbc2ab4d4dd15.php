<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-0">Dashboard</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report</a>
        </div>
        <div class="row">
            <div class="col">
                <div class="row">
                    

                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                        <div class="col-lg-6 mb-4">
                            <a href="<?php echo e($item['route']!==null? route($item['route']):'#'); ?>" style="text-decoration:none" target="_blank">
                                <div class="card textwhite bg-<?php echo e($item['color']); ?> text-white shadow">
                                    <div class="card-body">
                                        <p class="m-0"><?php echo e($item['name']); ?></p>
                                        <p class="text-white-100 small m-0"><?php echo e($item['nummber']); ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cms\Blog\resources\views/dashboard/index.blade.php ENDPATH**/ ?>