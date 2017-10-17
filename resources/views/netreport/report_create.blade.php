@extends('templates.admin')

@section('title',$title)
@section('titleHead')
    <ol class="breadcrumb">
    	<li><a href="/">HOME</a></li>
    	<li><a href="/reports">REPORTS</a></li>
    	<li class="active">ADD</li>
    </ol>
@endsection
@section('body')

	<div class="col-md-12">
		{!! Form::open(['action'=>'ReportsController@store','method'=>'POST'])!!}
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">INFORMATION</div>

				<div class="panel-body">
					<div class="form-group">
						{{ Form::label('reported_by','REPORTED BY')}}
						<select class="form-control report_select" name="reported_by" id="reported_by">
							<option value="0" selected disabled>Select</option>
							@foreach($sub as $s)
							<option value="{{ $s->id}}">{{ $s->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
							{{ Form::label('location','DEPARTMENT')}}
							{{ Form::text('location','',['class'=>'form-control','readonly'=>'readonly'])}}
					</div>
					<div class="form-group">
							{{ Form::label('ticket','TICKET')}}
							{{ Form::text('ticket','A000001',['class'=>'form-control','readonly'=>'readonly'])}}
					</div>


				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">PROBLEM(S)</div>

				<div class="panel-body">
					<div class="form-group">
					{{ Form::label('problem','WRITE DOWN HERE')}}
					{{ Form::textarea('problem','',['class'=>'form-control'])}}
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			{{ Form::submit('SAVE',['class'=>'btn btn-primary btn-block'])}}
		</div>
		{!! Form::close()!!}
	</div>
@endsection