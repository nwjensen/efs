<?php $__env->startSection('content'); ?>
    <h1>Stock</h1>
    <a href="<?php echo e(url('/stocks/create')); ?>" class="btn btn-success">Create Stock</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Cust No</th>
            <th>Cust Name</th>
            <th>Symbol</th>
            <th>Name</th>
            <th>Shares</th>
            <th>Purchase price</th>
            <th>Purchase Date</th>
            <th colspan="3">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($stocks as $stock): ?>
            <tr>
                <td><?php echo e($stock->customer->cust_number); ?></td>
                <td><?php echo e($stock->customer->name); ?></td>
                <td><?php echo e($stock->symbol); ?></td>
                <td><?php echo e($stock->name); ?></td>
                <td><?php echo e($stock->shares); ?></td>
                <td><?php echo e($stock->purchase_price); ?></td>
                <td><?php echo e($stock->purchased); ?></td>
                <td><a href="<?php echo e(url('stocks',$stock->id)); ?>" class="btn btn-primary">Read</a></td>
                <td><a href="<?php echo e(route('stocks.edit',$stock->id)); ?>" class="btn btn-warning">Update</a></td>
                <td>
                    <?php echo Form::open(['method' => 'DELETE', 'route'=>['stocks.destroy', $stock->id]]); ?>

                    <?php echo Form::submit('Delete', ['class' => 'btn btn-danger']); ?>

                    <?php echo Form::close(); ?>

                </td>
            </tr>
        <?php endforeach; ?>

        </tbody>

    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>