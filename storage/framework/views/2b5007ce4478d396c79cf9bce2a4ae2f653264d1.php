<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php $__currentLoopData = $all_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card px-2 m-3" >
                        <div class="card-haeder p-3 w-100 d-flex">
                            <div class="ml-2 d-flex flex-column">
                                <p class="mb-0"><?php echo e($user->user_id); ?></p>
                                <a href="<?php echo e(url('users/' .$user->id)); ?>" class="text-secondary"><?php echo e($user->screen_name); ?></a>
                            </div>
                            <?php if(auth()->user()->isFollowed($user->id)): ?>
                                <div class="px-2">
                                    <span class="px-2 bg-secondary text-muted">フォローされています</span>
                                </div>
                            <?php endif; ?>
                            <div class="d-flex justify-content-end flex-grow-1">
                                <?php if(auth()->user()->isFollowing($user->id)): ?>
                                    <form action="<?php echo e(route('unfollow', ['id' => $user->id])); ?>" method="POST">
                                        <?php echo e(csrf_field()); ?>

                                        <?php echo e(method_field('DELETE')); ?>


                                        <button type="submit" class="btn btn-outline-danger">フォロー解除</button>
                                    </form>
                                <?php else: ?>
                                    <form action="<?php echo e(route('follow', ['id' => $user->id])); ?>" method="POST">
                                        <?php echo e(csrf_field()); ?>


                                        <button type="submit" class="btn btn-primary">フォローする</button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div class="my-4 d-flex justify-content-center">
            <?php echo e($all_users->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.timeline', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/6/resources/views/users/index.blade.php ENDPATH**/ ?>