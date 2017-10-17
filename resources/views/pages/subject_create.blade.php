@extends('templates.admin')

@section('title',$title)
@section('titleHead')
    <ol class="breadcrumb">
    	<li><a href="/">HOME</a></li>
    	<li><a href="/subjects">SUBJECTS</a></li>
    	<li class="active">ADD</li>
    </ol>
@endsection
@section('body')

	<div class="col-md-12">
		{!! Form::open(['action'=>'SubjectsController@store','method'=>'POST']) !!}
			<div class="form-group">
				{{ Form::label('name','NAME:') }}
				{{ Form::text('name','',['class'=>'form-control','placeholder'=>'NAME'])}}
			</div>
			<div class="form-group">
				{{ Form::label('location','DEPARTMENT:') }}
				<select id="location" name="location" class="form-control">
					<option value="IT">IT</option>
					<option value="Creative">Creative</option>
					<option value="Online">Online</option>
					<option value="Inventory">Inventory</option>
					<option value="Accounting">Accounting</option>
					<option value="Admin">Admin</option>
					<option value="PDD">PDD</option>
					<option value="HR">HR</option>
					<option value="Production">Production</option>
					<option value="Franchise">Franchise</option>
					<option value="Purchasing">Purchasing</option>
					<option value="OTHER">OTHER</option>
				</select>
			</div>
			<div class="form-group">
				{{ Form::label('computer_name','COMPUTER NAME:') }}
				{{ Form::text('computer_name','',['class'=>'form-control','placeholder'=>'COMPUTER NAME'])}}
			</div>
			<div class="form-group">
				{{ Form::label('domain_name','DOMAIN NAME:') }}
				{{ Form::text('domain_name','',['class'=>'form-control','placeholder'=>'DOMAIN NAME'])}}
			</div>

				{{ Form::submit('SAVE',['class'=>'btn btn-primary btn-block'])}}
		{!! Form::close() !!}

	</div>
@endsection