@extends('templates.user')
@section('title',$title)

@section('body')
	<div class="col-md-4 col-md-offset-4">
		{!! Form::open(['action'=>'RegistrationsController@store','method'=>'POST'])!!}
		{{ csrf_field()}}
			<div class="form-group">
				{{ Form::label('name','USERNAME')}}
				{{ Form::text('name','',['class'=>'form-control'])}}
			</div>
			<div class="form-group">
				{{ Form::label('email','EMAIL')}}
				{{ Form::email('email','',['class'=>'form-control'])}}
			</div>
			<div class="form-group">
				{{ Form::label('password','PASSWORD')}}
				<input type="password" class="form-control" name="password" id="password">
			</div>
			<div class="form-group">
				{{ Form::label('password_confirmation','PASSWORD CONFIRMATION')}}
				<input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
			</div>

			{{ Form::submit('REGISTER',['class'=>'btn btn-primary'])}}
		{!! Form::close()!!}
	</div>
@endsection