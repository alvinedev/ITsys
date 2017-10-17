@extends('templates.admin')

@section('title',$title)
@section('titleHead')
    <ol class="breadcrumb">
    	<li><a href="/">HOME</a></li>
    	<li><a href="/subjects">SUBJECTS</a></li>
    	<li class="active">EDIT</li>

    </ol>
@endsection
@section('body')

	<div class="col-md-12">
		{!! Form::open(['action'=>['SubjectsController@update',$subject->id],'method'=>'POST']) !!}
			<div class="form-group">
				{{ Form::label('name','NAME:') }}
				{{ Form::text('name', $subject->name,['class'=>'form-control','placeholder'=>'NAME'])}}
			</div>
			<div class="form-group">
				{{ Form::label('location','OFFICE LOCATION:') }}
				{{ Form::select('location', array('IT'=>'IT',
												'Creative'=>'Creative',
												'Inventory'=>'inventory',
												'Accounting'=>'Accounting',
												'Admin'=>'Admin',
												'PDD'=>'PDD',
												'HR'=>'HR',
												'Production'=>'Production',
												'Franchise'=>'Franchise',
												'Purchasing'=>'Purchasing',
												'OTHER'=>'OTHER'),
					$subject->location,['class'=>'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('computer_name','COMPUTER NAME:') }}
				{{ Form::text('computer_name',$subject->computer_name,['class'=>'form-control','placeholder'=>'COMPUTER NAME'])}}
			</div>
			<div class="form-group">
				{{ Form::label('domain_name','DOMAIN NAME:') }}
				{{ Form::text('domain_name',$subject->domain_name,['class'=>'form-control','placeholder'=>'DOMAIN NAME'])}}
			</div>

				{{  Form::hidden('_method','PUT')}}

				{{ Form::submit('SAVE',['class'=>'btn btn-primary btn-block'])}}
		{!! Form::close() !!}

	</div>
@endsection