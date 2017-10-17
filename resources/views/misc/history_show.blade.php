@extends('templates.admin')

@section('title',$title)

@section('titleHead')
    <ol class="breadcrumb">
    	<li><a href="/">HOME</a></li>
    	<li><a href="/history">HISTORY</a></li>
    	@foreach($history as $his)
    	<li class="active">DISPLAY - {{strtoupper($his->module)}}</li>
    	@endforeach
    </ol>
@endsection

@section('body')

	<div class="col-md-12">
		<?php
			$before = array();
			$after = array();
		?>

		<br />
		@foreach($history as $his)
			@if($his->module == 'subjects')
				
				@if($his->action == 'add')
					<?php
						$before = explode(',',$his->before);
					?>
					<div class="col-md-4 col-md-offset-4 ">
						<div class="actual_container">
							{{ $his->name}}
						</div>
						<p class="actual_text">ACTUAL NAME</p>
					</div>
					<div class="col-md-6 col-md-offset-3">
						<div class="panel panel-default">
							<div class="panel-heading">TEXT (ADD)</div>
							
							<div class="panel-body">
								<div class="col-md-6 col-sm-6">NAME</div>
								<div class="col-md-6 col-sm-6">{{ $before['0']}}</div>
								<div class="col-md-6 col-sm-6">DEPARTMENT</div>
								<div class="col-md-6 col-sm-6">{{ $before['3']}}</div>
								<div class="col-md-6 col-sm-6">COMPUTER NAME</div>
								<div class="col-md-6 col-sm-6">{{ $before['1']}}</div>
								<div class="col-md-6 col-sm-6">DOMAIN NAME</div>
								<div class="col-md-6 col-sm-6">{{ $before['2']}}</div>
								
								
							</div>
						</div>
						<div class="col-md-6">
							<div class="his_date_text">
								{{ $his->created_at}}
							</div>
							<p class="actual_text">CREATED DATE</p>
						</div>
						<div class="col-md-6">
							<div class="his_date_text">
								{{ $his->updated_at}}
							</div>
							<p class="actual_text">LATEST UPDATED DATE</p>
						</div>
					</div>
				@elseif($his->action == 'edit')
					
					<?php
						$before = explode(',',$his->before);
						$after = explode(',',$his->after);
					?>
					<div class="col-md-4 col-md-offset-4 ">
						<div class="actual_container">
							{{ $his->name}}
						</div>
						<p class="actual_text">ACTUAL NAME</p>
					</div>

					
					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading">BEFORE (EDIT)</div>
							
							<div class="panel-body">
								<div class="col-md-6 col-sm-6">NAME</div>
								<div class="col-md-6 col-sm-6">{{$before['0']}}</div>
								<div class="col-md-6 col-sm-6">DEPARTMENT</div>
								<div class="col-md-6 col-sm-6">{{$before['3']}}</div>
								<div class="col-md-6 col-sm-6">COMPUTER NAME</div>
								<div class="col-md-6 col-sm-6">{{$before['1']}}</div>
								<div class="col-md-6 col-sm-6">DOMAIN NAME</div>
								<div class="col-md-6 col-sm-6">{{$before['2']}}</div>
								
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading">AFTER (EDIT)</div>
							
							<div class="panel-body">
								<div class="col-md-6 col-sm-6">NAME</div>
								<div class="col-md-6 col-sm-6">{{$after['0']}}</div>
								<div class="col-md-6 col-sm-6">DEPARTMENT</div>
								<div class="col-md-6 col-sm-6">{{$after['3']}}</div>
								<div class="col-md-6 col-sm-6">COMPUTER NAME</div>
								<div class="col-md-6 col-sm-6">{{$after['1']}}</div>
								<div class="col-md-6 col-sm-6">DOMAIN NAME</div>
								<div class="col-md-6 col-sm-6">{{$after['2']}}</div>
								
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4"> 
						<div class="his_date_text">
							{{$his->created_date}}
						</div>
						<p class="actual_text">DATE / TIME</p>
					</div>
				@elseif($his->action == 'DELETE')
					{{ "delete"}}
				@else
					{{ "no action found"}}
				@endif
			@elseif($his->module == 'ipaddress')
				
				@if($his->action == 'add')
					
					<?php
						$before = explode(',',$his->before);
					?>

						<div class="col-md-4 col-md-offset-4 ">
							<div class="actual_container">
								{{ $his->ipaddress}}
							</div>
							<p class="actual_text">ACTUAL IP ADDRESS</p>
						</div>
						<div class="col-md-6 col-md-offset-3">
							<div class="panel panel-default">
								<div class="panel-heading">TEXT (ADD)</div>
								
								<div class="panel-body">
									<div class="col-md-6 col-sm-6">IP ADDRESS</div>
									<div class="col-md-6 col-sm-6">{{ $before['0']}}</div>
									<div class="col-md-6 col-sm-6">SUBNET MASK</div>
									<div class="col-md-6 col-sm-6">{{ $before['1']}}</div>
									<div class="col-md-6 col-sm-6">DEFAULT GATEWAY</div>
									<div class="col-md-6 col-sm-6">{{ $before['2'] == null?"N/A":$before['2']}}</div>
									<div class="col-md-6 col-sm-6">DNS SERVER1</div>
									<div class="col-md-6 col-sm-6">{{ $before['3'] == null?"N/A":$before['3']}}</div>
									<div class="col-md-6 col-sm-6">DNS SERVER2</div>
									<div class="col-md-6 col-sm-6">{{ $before['4'] == null?"N/A":$before['4']}}</div>
									
								</div>
							</div>
							<div class="col-md-6">
								<div class="his_date_text">
									{{ $his->created_at}}
								</div>
								<p class="actual_text">CREATED DATE</p>
							</div>
							<div class="col-md-6">
								<div class="his_date_text">
									{{ $his->updated_at}}
								</div>
								<p class="actual_text">LATEST UPDATED DATE</p>
							</div>
						</div>
						
					
				@elseif($his->action == 'edit')
				
				<?php
					$before = explode(',',$his->before);
					$after = explode(',',$his->after);
				?>
				<div class="col-md-4 col-md-offset-4 ">
					<div class="actual_container">
						{{ $his->ipaddress}}
					</div>
					<p class="actual_text">ACTUAL IP ADDRESS</p>
				</div>
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">BEFORE (EDIT)</div>
						
						<div class="panel-body">
							<div class="col-md-6 col-sm-6">IP ADDRESS</div>
							<div class="col-md-6 col-sm-6">{{ $before['0']}}</div>
							<div class="col-md-6 col-sm-6">SUBNET MASK</div>
							<div class="col-md-6 col-sm-6">{{ $before['1']}}</div>
							<div class="col-md-6 col-sm-6">DEFAULT GATEWAY</div>
							<div class="col-md-6 col-sm-6">{{ $before['2'] == null?"N/A":$before['2']}}</div>
							<div class="col-md-6 col-sm-6">DNS SERVER1</div>
							<div class="col-md-6 col-sm-6">{{ $before['3'] == null?"N/A":$before['3']}}</div>
							<div class="col-md-6 col-sm-6">DNS SERVER2</div>
							<div class="col-md-6 col-sm-6">{{ $before['4'] == null?"N/A":$before['4']}}</div>
							
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">AFTER (EDIT)</div>
						
						<div class="panel-body">
							<div class="col-md-6 col-sm-6">IP ADDRESS</div>
							<div class="col-md-6 col-sm-6">{{ $after['0']}}</div>
							<div class="col-md-6 col-sm-6">SUBNET MASK</div>
							<div class="col-md-6 col-sm-6">{{ $after['1']}}</div>
							<div class="col-md-6 col-sm-6">DEFAULT GATEWAY</div>
							<div class="col-md-6 col-sm-6">{{ $after['2'] == null?"N/A":$after['2']}}</div>
							<div class="col-md-6 col-sm-6">DNS SERVER1</div>
							<div class="col-md-6 col-sm-6">{{ $after['3'] == null?"N/A":$after['3']}}</div>
							<div class="col-md-6 col-sm-6">DNS SERVER2</div>
							<div class="col-md-6 col-sm-6">{{ $after['4'] == null?"N/A":$after['4']}}</div>
							
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4"> 
					<div class="his_date_text">
						{{$his->created_date}}
					</div>
					<p class="actual_text">DATE / TIME</p>
				</div>
				@elseif($his->action == 'DELETE')
				@else
					{{ "no action found"}}
				@endif
			@elseif($his->module == 'Ipinventory')
				{{ $his->module." ".$his->action }}
				@if($his->action == 'ADD')
				{{ $history}}
				@elseif($his->action == 'EDIT')
				@elseif($his->action == 'DELETE')
				@else
					{{ "no action found"}}
				@endif
			@else
				{{ "Nothing to Show"}}
				@if($his->action == 'ADD')
				@elseif($his->action == 'EDIT')
				@elseif($his->action == 'DELETE')
				@else
					{{ "no action found"}}
				@endif
			@endif
		@endforeach

	</div>
@endsection