@extends('templates.admin')

@section('title',$title)
@section('titleHead')
    <ol class="breadcrumb">
    	<li><a href="/">HOME</a></li>
    	<li><a href="/reports">REPORTS</a></li>
    	<li class="active">DISPLAY</li>
    </ol>
@endsection
@section('body')

	<div class="col-md-12">
		<div class="col-md-6">
			<div class="panel panel-default">
			<div class="panel-heading">PROBLEM(S)</div>

				<div class="panel-body">
					<div class="form-group">
						{{ Form::textarea('problem','',['class'=>'form-control'])}}
					</div>

				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
			<div class="panel-heading">INFORMATION</div>

				<div class="panel-body">

				</div>
			</div>
		</div>

	</div>
@endsection