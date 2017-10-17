@extends('templates.admin')

@section('title',$title)

@section('titleHead')
    <ol class="breadcrumb">
    	<li><a href="/">HOME</a></li>
    	<li class="active">IP ADDRESS</li>

    </ol>
@endsection
@section('body')

	<div class="col-md-12">
		<a class="btn btn-primary btn-sm glyphicon glyphicon-plus" href="/ipaddress/create" role="button"><span style="font-family:arial;font-weight: bolder;font-size:15px">ADD</span></a>
	</div>
	<div>
		@if(count($ipadd) > 0)
		<table class="table table-hover sub-table">
			<thead> 
			<tr> 
				<th>#</th> 
				<th>IP ADDRESS</th> 
				<th>SUBNET MASK</th> 
				<th>DEFAULT GATEWAY</th> 
				<th>DNS SERVER 1</th> 
				<th>CREATED DATE</th> 
				<th>UPDATED DATE</th> 
				<th>ACTIONS</th> 
			</tr> 
			</thead> 
			<tbody>
			<?php
			$ctr = 1;
			?>
				@foreach($ipadd as $ip)

				<tr> 
					<th scope="row">{{$ctr}}</th> 
					<td>{{$ip->ipaddress}}</td> 
					<td>{{$ip->subnet_mask}}</td> 
					<td>{{$ip->default_gateway==null?"N/A":$ip->default_gateway}}</td> 
					<td>{{$ip->dns_server1==null?"N/A":$ip->dns_server1}}</td> 
					<td>{{$ip->created_at}}</td> 
					<td>{{$ip->updated_at}}</td> 
					<td>
						<div>
							<div class="btn-group" role="group" aria-label="...">
								<a href="/ipaddress/{{ $ip->id }}" class="btn btn-info glyphicon btn-xs glyphicon-eye-open" title="view"></a>
								<a href="/ipaddress/{{ $ip->id }}/edit" class="btn btn-primary btn-xs glyphicon glyphicon-pencil" title="edit"></a>
								<a href="#" class="btn btn-danger glyphicon btn-xs glyphicon-trash" title="delete"></a>	
							</div>
						</div>
					</td> 
				</tr>
				<?php $ctr++ ?>
				@endforeach 
			</tbody> 
		</table>
			<div class="col-md-12" style="text-align:center">
					{{ $ipadd->links() }}
			</div>
		@else
		<div style="text-align:center">
			No Record to Show
		</div>
		@endif	
	</div>
@endsection