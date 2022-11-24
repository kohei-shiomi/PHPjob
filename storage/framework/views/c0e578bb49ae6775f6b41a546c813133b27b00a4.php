<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-3">
            <div class="card">
                <div class="d-inline-flex">
                    
                    <div class="p-3 d-flex flex-column justify-content-between">
                        <div class="d-flex">
                            <div>
                                <?php if($user->id === Auth::user()->id): ?>
                                    <a href="<?php echo e(url('users/' .$user->id .'/edit')); ?>" class="btn btn-primary">プロフィールを編集する</a>
                                <?php else: ?>
                                    <?php if($is_following): ?>
                                        <form action="<?php echo e(route('unfollow', ['id' => $user->id])); ?>" method="POST">
                                            <?php echo e(csrf_field()); ?>

                                            <?php echo e(method_field('DELETE')); ?>


                                            <button type="submit" class="btn btn-danger">フォロー解除</button>
                                        </form>
                                    <?php else: ?>
                                        <form action="<?php echo e(route('follow', ['id' => $user->id])); ?>" method="POST">
                                            <?php echo e(csrf_field()); ?>


                                            <button type="submit" class="btn btn-primary">フォローする</button>
                                        </form>
                                    <?php endif; ?>

                                    <?php if($is_followed): ?>
                                        <span class="mt-2 px-1 bg-secondary text-light">フォローされています</span>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <div class="p-2 d-flex flex-column align-items-center">
                                <p class="font-weight-bold">ツイート数</p>
                                <span><?php echo e($post_count); ?></span>
                            </div>
                            <div class="p-2 d-flex flex-column align-items-center">
                                <p class="font-weight-bold">フォロー数</p>
                                <span><?php echo e($follow_count); ?></span>
                            </div>
                            <div class="p-2 d-flex flex-column align-items-center">
                                <p class="font-weight-bold">フォロワー数</p>
                                <span><?php echo e($follower_count); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if(isset($timelines)): ?>
            <?php $__currentLoopData = $timelines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timeline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-8 mb-3">
                    <div class="card">
                        <div class="card-haeder p-3 w-100 d-flex">
                            
                            <div class="ml-2 d-flex flex-column flex-grow-1">
                                <p class="mb-0"><?php echo e($timeline->user->name); ?></p>
                                <a href="<?php echo e(url('users/' .$timeline->user->id)); ?>" class="text-secondary"><?php echo e($timeline->user->screen_name); ?></a>
                            </div>
                            <div class="d-flex justify-content-end flex-grow-1">
                                <p class="mb-0 text-secondary"><?php echo e($timeline->created_at->format('Y-m-d H:i')); ?></p>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php echo e($timeline->text); ?>

                        </div>
                        <div class="card-footer py-1 d-flex justify-content-end bg-white">
                            <?php if($timeline->user->id === Auth::user()->id): ?>
                                <div class="dropdown mr-3 d-flex align-items-center">
                                    <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-fw"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <form method="POST" action="<?php echo e(url('posts/' .$timeline->id)); ?>" class="mb-0">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>

                                            <a href="<?php echo e(url('posts/' .$timeline->id .'/edit')); ?>" class="dropdown-item">編集</a>
                                            <button type="submit" class="dropdown-item del-btn">削除</button>
                                        </form>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
    <div class="my-4 d-flex justify-content-center">
        <?php echo e($timelines->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/6/resources/views/users/show.blade.php ENDPATH**/ ?>