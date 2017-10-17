@extends('templates.admin')

@section('title',$title)

@section('titleHead')
    <ol class="breadcrumb">
    	<li><a href="/">HOME</a></li>
    	<li class="active">REPORTS</li>

    </ol>
@endsection
@section('body')

	<div class="col-md-12">
		<a class="btn btn-primary btn-sm glyphicon glyphicon-plus" href="/reports/create" role="button"><span style="font-family:arial;font-weight: bolder;font-size:15px">ADD</span></a>
	</div>
	<div>

	
	@if(count($rep) > 0)
	<table class="table table-hover sub-table">
		<thead> 
		<tr> 
			<th>#</th> 
			<th>NAME</th> 
			<th>DEPARTMENT</th> 
			<th>REPORTS</th> 
			<th>TICKET</th> 
			<th>STATUS</th> 
			<th>CREATED DATE</th> 
			<th>ACTIONS</th> 
		</tr> 
		</thead> 
		<tbody>
		<?php
		$ctr = 1;
		?>
			@foreach($rep as $r)

			<tr> 
				<th scope="row">{{$ctr}}</th> 
				<td>{{ $r->name}}</td>
				<td>{{ $r->location}}</td>
				<td>{{ $r->problem}}</td>
				<td>{{ $r->ticket}}</td>
				<td>{{ $r->status==1?"PENDING":"CLOSED"}}</td>
				<td>{{ $r->created_at}}</td>
				<td>
					<div>
					<div class="btn-group" role="group" aria-label="...">
						<a href="/reports/{{ $r->id }}" class="btn btn-info glyphicon btn-xs glyphicon-eye-open" title="view"></a>
						<a href="/reports/{{ $r->id }}/edit" class="btn btn-primary btn-xs glyphicon glyphicon-pencil" title="edit"></a>
						<a href="#" class="btn btn-danger glyphicon btn-xs glyphicon-folder-close" title="close"></a>	
					</div>
					</div>
				</td> 
			</tr>
			<?php $ctr++ ?>
			@endforeach 
		</tbody> 
	</table>
		<div class="col-md-12" style="text-align:center">

		</div>
	@else
	<div style="text-align:center">
		No Record to Show
	</div>
	@endif
		
	</div>
@endsection