<?php $__env->startSection('content'); ?>
    <h1>Update Investment</h1>
    <?php echo Form::model($investment,['method' => 'PATCH','route'=>['investments.update',$investment->id]]); ?>

       <div class="form-group">
        <?php echo Form::label('category', 'Category:'); ?>

       <?php echo Form::select('category',['401k' => '401k', 'fund' => 'Fund', 'property' => 'Property', 'other' => 'Other']); ?>

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
        <?php echo Form::label('recent_value', 'Recent Value:'); ?>

        <?php echo Form::text('recent_value',null,['class'=>'form-control']); ?>

    </div>
    <div class="form-group">
        <?php echo Form::label('recent_date', 'Recent Date:'); ?>

        <?php echo Form::text('recent_date',null,['class'=>'form-control']); ?>

    </div>

    <div class="form-group">
        <?php echo Form::submit('Update', ['class' => 'btn btn-primary']); ?>

    </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>