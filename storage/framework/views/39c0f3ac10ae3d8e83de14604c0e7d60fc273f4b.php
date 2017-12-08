<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Weight Application</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="<?php echo e(route('weights.create')); ?>"> Create New Article</a>
            </div>
        </div>
    </div>

    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>

    <table class="table table-bordered">
        <tr>
            <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('date'));?></th>
            <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('max'));?></th>
            <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('min'));?></th>
            <th>Variance</th>
            <th width="280px">Action</th>
        </tr>
        <?php
            $sum_max = 0;
            $sum_min = 0;
            $sum_var = 0;
        ?>
        <?php $__currentLoopData = $weights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $weight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <?php
                $sum_max+=$weight->max;
                $sum_min+=$weight->min;
                $sum_var+=($weight->max-$weight->min);
            ?>
            <td><?php echo e($weight->date); ?></td>
            <td><?php echo e($weight->max); ?></td>
            <td><?php echo e($weight->min); ?></td>
            <td><?php echo e($weight->max-$weight->min); ?></td>
            <td>
                <a class="btn btn-info" href="<?php echo e(route('weights.show',$weight->id)); ?>">Show</a>
                <a class="btn btn-primary" href="<?php echo e(route('weights.edit',$weight->id)); ?>">Edit</a>
                
                
                
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th>Average</th>
            <td><?php echo e($sum_max/count($weights)); ?></td>
            <td><?php echo e($sum_min/count($weights)); ?></td>
            <td><?php echo e($sum_var/count($weights)); ?></td>
            <td></td>
        </tr>
    </table>

    <?php echo $weights->appends(\Request::except('page'))->render(); ?>

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>