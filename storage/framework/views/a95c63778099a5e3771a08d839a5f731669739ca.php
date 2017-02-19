<?php $__env->startSection('content'); ?>
    <h1>Update Stock</h1>
    <?php echo Form::model($stock,['method' => 'PATCH','route'=>['stocks.update',$stock->id]]); ?>

       <div class="form-group">
        <?php echo Form::label('symbol', 'Symbol:'); ?>

        <?php echo Form::text('symbol',null,['class'=>'form-control']); ?>

    </div>
    <div class="form-group">
        <?php echo Form::label('name', 'St Name:'); ?>

        <?php echo Form::text('name',null,['class'=>'form-control']); ?>

    </div>
    <div class="form-group">
        <?php echo Form::label('shares', 'Shares:'); ?>

        <?php echo Form::text('shares',null,['class'=>'form-control']); ?>

    </div>
    <div class="form-group">
        <?php echo Form::label('purchase_price', 'Purchase Price:'); ?>

        <?php echo Form::text('purchase_price',null,['class'=>'form-control']); ?>

    </div>
    <div class="form-group">
        <?php echo Form::label('purchased', 'Purchase Date:'); ?>

        <?php echo Form::text('purchased',null,['class'=>'form-control']); ?>

    </div>

    <div class="form-group">
        <?php echo Form::submit('Update', ['class' => 'btn btn-primary']); ?>

    </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>