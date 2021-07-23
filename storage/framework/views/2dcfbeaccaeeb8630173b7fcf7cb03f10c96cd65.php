<?php $__env->startSection('links'); ?>
<link href="<?php echo e(asset('css/users/style.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <h3 class="text-dark mb-4">Profile</h3>
    <div class="row mb-3">
        <div class="col-lg-4">

            <div class="card mb-3">
                <div class="card-body text-center shadow">
                    <?php if(str_contains($user->profile->image ?? ' ' , 'http://gravatar.com/avatar/')): ?>
                    <img src="<?php echo e($user->profile->image); ?>" class="rounded-circle mb-3 mt-4"  width="160" height="160">
                    <?php else: ?>
                    <img src="<?php echo e(asset('storage/'. $user->profile->image ?? ' ')); ?>" class="rounded-circle mb-3 mt-4"  width="160" height="160">
                    <?php endif; ?>
                    <div class="mb-3">
                        <button class="btn btn-primary btn-sm" type="button" id="photo">Choose Picture</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
            <div class="col">
                <div class="card shadow mb-3">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">User Profile</p>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('users.update')); ?>" method="POST" enctype="multipart/form-data">
                            <input type="file" class="d-none" name="image" id="upload">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo e($user->name); ?>">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" value="<?php echo e($user->email); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col col-sm-12">
                                    <div class="mb-3">
                                        <label for="aboute">aboute</label>
                                        <textarea class="form-control" rows="3" name="about"><?php echo e($user->profile->about ?? ''); ?></textarea>
                                    </div>
                                </div>
                                <div class="col col-sm-6">
                                    <div class="mb-3">
                                        <label for="aboute">Faceboock</label>
                                        <input type="text" class="form-control" id="facebook" name="facebook" value="<?php echo e($user->profile->facebook ?? ''); ?>">
                                    </div>
                                </div>
                                <div class="col col-sm-6">
                                    <div class="mb-3">
                                        <label for="aboute">Twitter</label>
                                        <input type="text" class="form-control" id="twitter" name="twitter" value="<?php echo e($user->profile->twitter ?? ''); ?> ">
                                    </div>
                                </div>

                            </div>
                            <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit">Save Profile</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('jsfiles'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $(function(){
      $('#upload').change(function(){
        var input = this;
        var url = $(this).val();
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
        if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg"))
         {
            var reader = new FileReader();

            reader.onload = function (e) {
               $('img').attr('src', e.target.result);
            }
           reader.readAsDataURL(input.files[0]);
        }
      });
    });


    $('#photo').click(function(){
        $('#upload').click();
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cms\Blog\resources\views/dashboard/users/profile.blade.php ENDPATH**/ ?>