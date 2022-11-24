<?php $__env->startSection('title', 'ニュースの新規作成'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ホーム
                </h2>
                <form action="<?php echo e(action('TimelineController@showTimelinePage')); ?>" method="post" enctype="multipart/form-data">

                    <?php if(count($errors) > 0): ?>
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($e); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
                    
                    <div class="form-group row">
                        <label class="col-md-2" for="body">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" placeholder="いまどうしてる？" rows="1"><?php echo e(old('body')); ?></textarea>
                        </div>
                    </div>
                    
                    <?php echo e(csrf_field()); ?>

                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.timeline', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/6/resources/views/timeline.blade.php ENDPATH**/ ?>