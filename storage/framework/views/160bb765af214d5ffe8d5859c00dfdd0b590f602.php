<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Weight</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="<?php echo e(route('weights.index')); ?>"> Back</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Date</th>
            <th><?php echo e($weight->date); ?></th>
        </tr>
        <tr>
            <th>Max</th>
            <td><?php echo e($weight->max); ?></td>
        </tr>
        <tr>
            <th>Min</th>
            <td><?php echo e($weight->min); ?></td>
        </tr>
        <tr>
            <th>Variance</th>
            <td><?php echo e($weight->max-$weight->min); ?></td>
        </tr>
    </table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>