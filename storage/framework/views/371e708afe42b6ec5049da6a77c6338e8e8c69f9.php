<?php $__env->startSection('content'); ?>
    <h1>Update Investment</h1>
    <?php echo Form::model($investment,['method' => 'PATCH','route'=>['investments.update',$investment->id]]); ?>

       <div class="form-group">
        <?php echo Form::label('category', 'Category:'); ?>

        <?php echo Form::text('category',null,['class'=>'form-control']); ?>

    </div>
    <div class="form-group">
        <?php echo Form::label('description', 'Description:'); ?>

        <?php echo Form::text('description',null,['class'=>'form-control']); ?>

    </div>
    <div class="form-group">
        <?php echo Form::label('acquired_value', 'Aquired Value:'); ?>

        <?php echo Form::text('acquired_value',null,['class'=>'form-control']); ?>

    </div>
    <div class="form-group">
        <?php echo Form::label('acquired_date', 'Acquired Date:'); ?>

        <?php echo Form::text('acquired_date',null,['class'=>'form-control']); ?>

    </div>

    <div class="form-group">
        <?php echo Form::submit('Update', ['class' => 'btn btn-primary']); ?>

    </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>