@extends('templates.admin')

@section('title',$title)
@section('titleHead')
    <ol class="breadcrumb">
    	<li><a href="/">HOME</a></li>
    	<li><a href="/ipinventory">IP INVENTORY</a></li>
    	<li class="active">EDIT</li>
    </ol>
@endsection
@section('body')

	<div class="col-md-12">
	<div class="alert alert-info">
	
	  <strong>NOTE: </strong> Select Name and Assign IP Address.
	</div>

	{!! Form::open(['action'=>'IpinventoriesController@store','method'=>'POST','class'=>'ipinven'])!!}
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">SUBJECT</div>

			<div class="panel-body">
				<div class="form-group">
					{{ Form::label('name','NAME:')}}
					<select id="name" name="name" class="form-control ipinven-name">
						<option value="" selected="selected" disabled="disabled">Choose Name</option>
						@foreach( $sub as $s)
						<option value="{{$s->id}}">{{$s->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					{{ Form::label('location','DEPARTMENT: ')}}
					{{ Form::text('location','',['class'=>'form-control','readonly'=>'readonly'])}}
				</div>

			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">IP ADDRESS</div>
			
			<div class="panel-body">
				<div class="form-group">
					{{ Form::label('ipaddress','IP ADDRESS:')}}
					<select id="ipaddress" name="ipaddress" class="form-control ipinven-ip">
					<option value="" selected="selected" disabled="disabled">Choose IP Address</option>
						@foreach( $ip as $p)
						<option value="{{$p->id}}">{{$p->ipaddress}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					{{ Form::label('subnet_mask','SUBNET MASK')}}
					{{ Form::text('subnet_mask','',['class'=>'form-control','readonly'=>'readonly'])}}
				</div>
				<div class="form-group">
					{{ Form::label('default_gateway','DEFAULT GATEWAY')}}
					{{ Form::text('default_gateway','',['class'=>'form-control','readonly'=>'readonly'])}}
				</div>
				<div class="form-group">
					{{ Form::label('dns_server1','DNS SERVER 1')}}
					{{ Form::text('dns_server1','',['class'=>'form-control','readonly'=>'readonly'])}}
				</div>

			</div>
		</div>
	</div>
	</div>
@endsection