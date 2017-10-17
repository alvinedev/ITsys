@extends('templates.admin')

@section('title',$title)

@section('titleHead')
    <ol class="breadcrumb">
    	<li><a href="/">HOME</a></li>
    	<li><a href="/ipinventory">IP INVENTORY</a></li>
    	<li class="active">DISPLAY</li>
    </ol>
@endsection

@section('body')

	<div class="col-md-12">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">IP ADDRESS</div>
				
				<div class="panel-body table-des1">
					<table class="col-md-12">
						<tr>
							<th>IP ADDRESS</th>
							<td>{{ $ipinven[0]->ipaddress}}</td>
						</tr>
						<tr>
							<th>SUBNET MASK</th>
							<td> {{$ipinven[0]->subnet_mask}}</td>
						</tr>
						<tr>
							<th>DEFAULT GATEWAY</th>
							<td> {{ $ipinven[0]->default_gateway==null?"N/A":$ipinven[0]->default_gateway}}</td>
						</tr>
						<tr>
							<th>DNS SERVER 1</th>
							<td>{{ $ipinven[0]->dns_server1==null?"N/A":$ipinven[0]->dns_server1}}</td>
						</tr>
						<tr>
							<th>DNS SERVER 2</th>
							<td>{{ $ipinven[0]->dns_server2==null?"N/A":$ipinven[0]->dns_server2}}</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">SUBJECT</div>

				<div class="panel-body  table-des1">
					<table class="col-md-12">
						<tr>
							<th>NAME</th>
							<td>{{ $ipinven[0]->name}}</td>
						</tr>
						<tr>
							<th>DEPARTMENT</th>
							<td>{{ $ipinven[0]->location}}</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">DATE</div>

				<div class="panel-body table-des1">
					<table class="col-md-12">
						<tr>
							<th>CREATED DATE</th>
							<td>{{ $ipinven[0]->created_at}}</td>
						</tr>
						<tr>
							<th>UPDATED DATE</th>
							<td>{{ $ipinven[0]->updated_at}}</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading" style="text-align:center">ACTION</div>

				<div class="panel-body table-des1">
					<span class="cmd">CMD</span>
				</div>
			</div>
		</div>

	</div>
@endsection