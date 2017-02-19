<?php $__env->startSection('content'); ?>
    <h1>Customer</h1>
    <a href="<?php echo e(url('/customers/create')); ?>" class="btn btn-success">Create Customer</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th> Cust Number</th>
            <th>Name</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Zip</th>
            <th>Primary Email</th>
            <th>Home Phone</th>
            <th>Cell Phone</th>
            <th colspan="3">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($customers as $customer): ?>
            <tr>
                <td><?php echo e($customer->cust_number); ?></td>
                <td><?php echo e($customer->name); ?></td>
                <td><?php echo e($customer->address); ?></td>
                <td><?php echo e($customer->city); ?></td>
                <td><?php echo e($customer->state); ?></td>
                <td><?php echo e($customer->zip); ?></td>
                <td><?php echo e($customer->email); ?></td>
                <td><?php echo e($customer->home_phone); ?></td>
                <td><?php echo e($customer->cell_phone); ?></td>
                <td><a href="<?php echo e(url('customers',$customer->id)); ?>" class="btn btn-primary">View Portfolio</a></td>
                <td><a href="<?php echo e(route('customers.edit',$customer->id)); ?>" class="btn btn-warning">Update</a></td>
                <td>
                    <?php echo Form::open(['method' => 'DELETE', 'route'=>['customers.destroy', $customer->id]]); ?>

                    <?php echo Form::submit('Delete', ['class' => 'btn btn-danger']); ?>

                    <?php echo Form::close(); ?>

                </td>
            </tr>
        <?php endforeach; ?>

        </tbody>

    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>