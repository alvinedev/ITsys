@extends('templates.admin')

@section('title',$title)
@section('titleHead')
    <ol class="breadcrumb">
    	<li><a href="/">HOME</a></li>
    	<li><a href="/ipaddress">IP ADDRESS</a></li>
    	<li class="active">ADD</li>
    </ol>
@endsection
@section('body')

	<div class="col-md-12">
		{!! Form::open(['action'=>'IpaddressesController@store','method'=>'POST'])!!}
		<div class="col-md-6">
			<div class="form-group">
				{{ Form::label('ipaddress','IP ADDRESS')}}
				{{ Form::text('ipaddress','',['class'=>'form-control'])}}
			</div>
			<div class="form-group">
				{{ Form::label('subnet_mask','SUBNET MASK')}}
				{{ Form::text('subnet_mask','',['class'=>'form-control'])}}
			</div>
			<div class="form-group">
				{{ Form::label('default_gateway','DEFAULT GATEWAY')}}
				{{ Form::text('default_gateway','',['class'=>'form-control'])}}
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				{{ Form::label('dns_server1','DNS SERVER 1')}}
				{{ Form::text('dns_server1','',['class'=>'form-control'])}}
			</div>
			<div class="form-group">
				{{ Form::label('dns_server2','DNS SERVER 2')}}
				{{ Form::text('dns_server2','',['class'=>'form-control'])}}
			</div>
		</div>
		<div class="col-md-12">
			{{ Form::submit('SAVE',['class'=>'btn btn-primary btn-block'])}}
		</div>
		{!! Form::close()!!}

	</div>
@endsection