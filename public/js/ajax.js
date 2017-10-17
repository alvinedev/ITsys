var url = "http://127.0.0.1:8000/"

$('.ipinven-name').change(function(){
		
	id = $(this).val();
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
			type: "POST",
            dataType: "json",
			url : '/getsub',
			//here we set the data for the post based in our form
			data :{id:id},
			success:function(data){
				$('.ipinven #location').val(data[0].location);
			},

		});

});

$('.ipinven-ip').change(function(){
	ids = $(this).val();
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$.ajax({
		type: "POST",
		dataType: "json",
		url: '/getip',
		data:{id:ids},
		success:function(data){
			$('.ipinven #subnet_mask').val(data[0].subnet_mask);
			if(data[0].default_gateway == null){
				$('.ipinven #default_gateway').val("N/A");
			}else{
				$('.ipinven #default_gateway').val(data[0].default_gateway);
			}
			if(data[0].dns_server1 == null){
				$('.ipinven #dns_server1').val("N/A");
			}else{
				$('.ipinven #dns_server1').val(data[0].dns_server1);
			}
		}
	})
});

$('.report_select').change(function(){
	id = $(this).val();

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		'type': 'POST',
		'dataType': 'json',
		'data': {id:id},
		'url': '/getsub',
		success:function(datas){
			$('#location').val(datas[0].location);
		}

	});
});

$('.btnSearch').click(function(){
	id = $('#idSearch').val();
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		'type':'POST',
		'dataType':'json',
		'data':{id:id},
		'url':'/searching',
		success:function(data){
			//console.log(data);
			$('.sName td').html(data[0].name);
			$('.sDepartment td').html(data[0].location);
			$('.sDomain td').html(data[0].domain_name);
			$('.sComputer td').html(data[0].computer_name);
			$('.sIpaddress td').html(data[0].ipaddress);
			$('.sSubnet td').html(data[0].subnet_mask);
			if(data[0].default_gateway == null){
				$('.sDefault td').html("N/A");
			}else{
				$('.sDefault td').html(data[0].default_gateway);
			}

			if(data[0].dns_server1 == null){
				$('.sDns1 td').html("N/A");
			}else{
				$('.sDns1 td').html(data[0].dns_server1);
			}

			if(data[0].dns_server2 == null){
				$('.sDns2 td').html("N/A");
			}else{
				$('.sDns2 td').html(data[0].dns_server2);
			}
			$('.searchContainer').removeClass('hide');
			
		}
	});
});

$('#sub_search').keyup(function(){
	sub = $(this).val();
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$.ajax({
		'type':'POST',
		'dataType':'json',
		'data':{sub:sub},
		'url':'/subsearching',
		success:function(){
			return alert(1);
		}
	});
});


/*
$('.ipinven-name').change(function(){
	id = $(this).val();
	$.ajax({
		type:'GET',
		dataType:'JSON',
		data:'',
		url:'',
		success:function(){

		}
	})
});


*/