<?php $__env->startSection('content'); ?>
    <h1>Create New Customer</h1>
    <?php echo Form::open(['url' => 'customers']); ?>

    <div class="form-group">
        <?php echo Form::label('name', 'Name:'); ?>

        <?php echo Form::text('name',null,['class'=>'form-control']); ?>

    </div>
    <div class="form-group">
        <?php echo Form::label('cust_number', 'Customer ID'); ?>

        <?php echo Form::text('cust_number',null,['class'=>'form-control']); ?>

    </div>
    <div class="form-group">
        <?php echo Form::label('address', 'Street Address:'); ?>

        <?php echo Form::text('address',null,['class'=>'form-control']); ?>

    </div>
    <div class="form-group">
        <?php echo Form::label('city', 'City:'); ?>

        <?php echo Form::text('city',null,['class'=>'form-control']); ?>

    </div>
    <div class="form-group">
        <?php echo Form::label('state', 'State:'); ?>

        <?php echo Form::text('state',null,['class'=>'form-control']); ?>

    </div>
    <div class="form-group">
        <?php echo Form::label('zip', 'Zip:'); ?>

        <?php echo Form::text('zip',null,['class'=>'form-control']); ?>

    </div>
    <div class="form-group">
        <?php echo Form::label('email', 'Primary Email:'); ?>

        <?php echo Form::text('email',null,['class'=>'form-control']); ?>

    </div>
    <div class="form-group">
        <?php echo Form::label('home_phone', 'Home Phone:'); ?>

        <?php echo Form::text('home_phone',null,['class'=>'form-control']); ?>

    </div>
    <div class="form-group">
        <?php echo Form::label('cell_phone', 'Cell Phone:'); ?>

        <?php echo Form::text('cell_phone',null,['class'=>'form-control']); ?>

    </div>


    <div class="form-group">
        <?php echo Form::submit('Save', ['class' => 'btn btn-primary form-control']); ?>

    </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>