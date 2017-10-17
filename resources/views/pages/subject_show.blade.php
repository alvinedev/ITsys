@extends('templates.admin')

@section('title',$title)

@section('titleHead')
    <ol class="breadcrumb">
    	<li><a href="/">HOME</a></li>
    	<li><a href="/subjects">SUBJECTS</a></li>
    	<li class="active">DISPLAY</li>
    </ol>
@endsection

@section('body')
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				 <span style="font-size:25px">{{$subject->name}}</span><br />
				<div  style="float:right;margin:-40px 0 0 0">
				<small>Created Date: {{ $subject->created_at}}</small><br>
				<small>Updated Date: {{ $subject->updated_at}}</small>
				</div>
			</div>
			<div class="panel-body">
					<table class="col-md-12 table-des1">
						<tr>
							<th>DEPARTMENT</th>
							<td>{{ $subject->location}}</td>
						</tr>
						<tr>
							<th>COMPUTER NAME</th>
							<td>{{ $subject->computer_name}}</td>
						</tr>
						<tr>
							<th>DOMAIN NAME</th>
							<td>{{ $subject->domain_name}}</td>
						</tr>


					</table>
			</div>
	</div>
@endsection
