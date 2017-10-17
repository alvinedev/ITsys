@extends('templates.admin')

@section('title',$title)

@section('titleHead')
    <ol class="breadcrumb">
    	<li><a href="/">HOME</a></li>
    	<li class="active">IP INVENTORY</li>

    </ol>
@endsection
@section('body')

	<div class="col-md-12">
		<a class="btn btn-primary btn-sm glyphicon glyphicon-plus" href="/ipinventory/create" role="button"><span style="font-family:arial;font-weight: bolder;font-size:15px">ADD</span></a>
	</div>
	<div>
		@if(count($ipinven) > 0)
			<table class="table table-hover sub-table">
				<thead> 
				<tr> 
					<th>#</th> 
					<th>NAME</th>
					<th>DEPARTMENT</th>
					<th>IP ADDRESS</th>
					<th>CREATED DATE</th>
					<th>UPDATED DATE</th>
					<th>ACTIONS</th>
				</tr> 
				</thead> 
				<tbody>
				
				<?php
				$ctr = 1;
				?>

				@foreach($ipinven as $ip)
				<tr>
					<th scope="row">{{$ctr}}</th> 
					<td>{{ $ip->name}}</td>
					<td>{{ $ip->location}}</td>
					<td>{{ $ip->ipaddress}}</td>
					<td>{{ $ip->created_at}}</td>
					<td>{{ $ip->updated_at}}</td>
					<td>

						<div class="btn-group" role="group" aria-label="...">
							<a href="/ipinventory/{{$ip->id}}" class="btn btn-info glyphicon btn-xs glyphicon-eye-open" title="view"></a>
							
							<a href="#" class="btn btn-danger glyphicon btn-xs glyphicon-trash" title="delete"></a>	
						</div>

					</td> 
				</tr>
					<?php $ctr++ ?>
				@endforeach 

				</tbody> 
			</table>
			<div class="col-md-12" style="text-align:center">
					{{ $ipinven->links() }}
			</div>
		@else
		<div style="text-align:center">
			No Record to Show
		</div>
		@endif	
	</div>
@endsection