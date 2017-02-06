<?php $__env->startSection('content'); ?>
    <h1>Investments</h1>
    <a href="<?php echo e(url('/investments/create')); ?>" class="btn btn-success">Create Investment</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Cust No</th>
            <th>Cust Name</th>
            <th>Category</th>
            <th>Description</th>
            <th>Acquired Value</th>
            <th>Acquired Date</th>
            <th>Recent Value</th>
            <th>Recent Date</th>
            <th colspan="3">Actions</th>
        </tr>
        </thead>
        <tbody>
       
 <?php foreach($investments as $investment): ?>
           <tr>
                <td><?php echo e($investment->customer->cust_number); ?></td>
                <td><?php echo e($investment->customer->name); ?></td>
                <td><?php echo e($investment->category); ?></td>
                <td><?php echo e($investment->description); ?></td>
                <td><?php echo e($investment->acquired_value); ?></td>
                <td><?php echo e($investment->acquired_date); ?></td>
                <td><?php echo e($investment->recent_value); ?></td>
                <td><?php echo e($investment->recent_date); ?></td>
                <td><a href="<?php echo e(url('investments',$investment->id)); ?>" class="btn btn-primary">Read</a></td>
                <td><a href="<?php echo e(route('investments.edit',$investment->id)); ?>" class="btn btn-warning">Update</a></td>
                <td>
                    <?php echo Form::open(['method' => 'DELETE', 'route'=>['investments.destroy', $investment->id]]); ?>

                    <?php echo Form::submit('Delete', ['class' => 'btn btn-danger']); ?>

                    <?php echo Form::close(); ?>

                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>

    </table>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>