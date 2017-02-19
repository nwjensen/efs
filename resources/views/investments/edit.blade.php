@extends('app')
@section('content')
    <h1>Update Investment</h1>
    {!! Form::model($investment,['method' => 'PATCH','route'=>['investments.update',$investment->id]]) !!}
       <div class="form-group">
        {!! Form::label('category', 'Category:') !!}
       {!! Form::select('category',['401k' => '401k', 'fund' => 'Fund', 'property' => 'Property', 'other' => 'Other']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::text('description',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('acquired_value', 'Aquired Value:') !!}
        {!! Form::text('acquired_value',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('acquired_date', 'Acquired Date:') !!}
        {!! Form::text('acquired_date',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@stop
