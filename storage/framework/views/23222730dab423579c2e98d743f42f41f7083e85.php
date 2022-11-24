<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8 mb-3">
            <div class="card">
                <div class="card-header">ホーム</div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('posts.store')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 p-3 w-100 d-flex">
                               
                                <div class="ml-2 d-flex flex-column">
                                    <p class="mb-0"><?php echo e($user->name); ?></p>
                                    <a href="<?php echo e(url('users/' .$user->id)); ?>" class="text-secondary"><?php echo e($user->screen_name); ?></a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control <?php if ($errors->has('text')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('text'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="text" placeholder="いまどうしてる？" required autocomplete="text" rows="1"><?php echo e(old('text')); ?></textarea>

                                <?php if ($errors->has('text')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('text'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-right">
                                <p class="mb-4 text-danger">140文字以内</p>
                                <button type="submit" class="btn btn-primary">
                                    つぶやく
                                </button>
                            </div>
                        </div>
                    </form>

                    
                </div>
            </div>
        </div>
        <?php if(isset($timelines)): ?>
            <?php $__currentLoopData = $timelines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timeline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-8 mb-1">
                    <div class="card">
                        <div class="card-haeder p-2 w-100 d-flex">
                            
                            <div class="ml-2 d-flex flex-column ">
                                <p class="post_user"><?php echo e($timeline->user->user_id); ?></p>
                            </div>
                            <div class="d-flex justify-content-end flex-grow-1">
                                <p class="mb-0 text-secondary"><?php echo e($timeline->created_at->format('Y-m-d H:i')); ?></p>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php echo nl2br(e($timeline->body)); ?>

                            <?php if($timeline->user->id === Auth::user()->id): ?>
                                
                            <div class="d-flex justify-content-end flex-grow-1">        
                                <form method="POST" action="<?php echo e(url('posts/' .$timeline->id)); ?>" class="mb-0">
                                         <?php echo csrf_field(); ?>
                                         <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn-sm btn-outline-secondary">削除</button>
                                </form>
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
<?php echo $__env->make('layouts.timeline', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/6/resources/views/posts/index.blade.php ENDPATH**/ ?>