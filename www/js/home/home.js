$(function(){
	baseUrl = $('#base_url').val();
	
	//autocomplete name search
	$('#name').keyup(function(){
			$.ajax({
				url: baseUrl + 'home/search',
				data:{
					'name':$('#name').val(),
					'sex': $( "input[name=sex]:checked" ).val()
				},
				type:"POST",
				dataType:"json",
				 success: function(data,textStatus,jqXHR) {
							detailStore = data['list'];
							reDraw();
				        },
				        error: function() {
				          alert('失敗');
				        },
				        complete: function() {
				          	
				        }
			});
		});
	//register with check in
	$('#reg-check').click(function(){
		name = $('#reg-name').val();
		sex = $( "#reg-select" ).val();
		$.ajax({
				url: baseUrl + 'home/register',
				data:{
					'name':$('#reg-name').val(),
					'sex': $( "#reg-select" ).val()
				},
				type:"POST",
				dataType:"json",
				 success: function(data,textStatus,jqXHR) {
							//detailStore = data['list'];
							count = data['no'];
							$('#check-res').val(sex+' '+name+' '+count+'號');
				        },
				        error: function() {
				          alert('失敗');
				        },
				        complete: function() {
				          	
				        }
			});
	});
	
	//toggle checked list
	$('#show-checked').click(function(){
		//$('#checked-res').slideToggle();
		$.ajax({
				url: baseUrl + 'home/show_checked',
				data:{
					//'name':$('#name').val(),
					'sex': $( "input[name=sex]:checked" ).val()
				},
				type:"POST",
				dataType:"json",
				 success: function(data,textStatus,jqXHR) {
							detailStore = data['list'];
							checkedDraw();
				        },
				        error: function() {
				          alert('失敗');
				        },
				        complete: function() {
				          	
				        }
		});
		
		
	});
	
	
		
});
	
			function reDraw(){
				
				var detailBox = $('#search-res').empty();
				
				//var tr = $('<tr></tr>').appendTo(detailBox);
				//var tr = $('').appendTo(detailBox);
	
				$.each(detailStore, function() {
					//避免呼叫到元素的this
					var me = this;
					if(me.checked == '1'){
						$('<tr class="warning"></tr>')
						.append('<td>' + me.id + '</td>')
						.append('<td>' + me.sex + '</td>')
						.append('<td>' + me.name + '</td>')
						.append('<input type="hidden" id="id-'+me.id+'"value="' + me.id + '"/>')
						.append('<td><button disabled class="btn btn-danger fa-lg" id="check-'+me.id+'" type="button"><i class="fa fa-check-circle-o"></i></button></td>')
						.appendTo(detailBox);
					}else{
						$('<tr></tr>')
						.append('<td>' + me.id + '</td>')
						.append('<td>' + me.sex + '</td>')
						.append('<td>' + me.name + '</td>')
						.append('<input type="hidden" id="id-'+me.id+'"value="' + me.id + '"/>')
						.append('<td><button class="btn btn-primary" id="check-'+me.id+'" type="button"><i class="fa fa-user-plus"></i></button></td>')
						.appendTo(detailBox);
					}
					
						$('#check-'+me.id).click(function(){
							$.ajax({
								url: baseUrl + 'home/checkin',
								data:{
									'p_id':$('#id-'+me.id).val(),
									'sex': $( "input[name=sex]:checked" ).val()
								},
								type:"POST",
								dataType:"json",
								 success: function(data,textStatus,jqXHR) {
											//^detailStore = data['list'];
											//reDraw();
											msg = data['msg'];
											count = data['no'];
											
											if(msg === undefined){
												$('#check-'+me.id).attr('disabled',true);
												$('#check-'+me.id).empty().text(count+'號');
												$('#check-res').val(me.sex+' '+me.name+' '+count+'號');											
												//$('#check-res').html(me.sex+' '+me.name+'<span class="badge">'+count+'</span>號');
												
												//alert(count);
											}else{
												alert('已經簽到過了，請注意是否有出錯？！');
												$('#check-'+me.id).attr('disabled',true);
											}
											
								        },
								        error: function() {
								          alert('失敗');
								          //alert($('#id-'+me.id).val());
								        },
								        complete: function() {
								          	
								        }
							});
							
						});
						
				});
				//$('<div><button id = "buy_'+me.order_id +'">購買</button></div>').appendTo(detailBox);
			}
			
			
			
			
			
			
			
			
			function checkedDraw(){
				
				var detailBox = $('#checked-res').empty();
				
				//var tr = $('<tr></tr>').appendTo(detailBox);
				//var tr = $('').appendTo(detailBox);
	
				$.each(detailStore, function() {
					//避免呼叫到元素的this
					var me = this;
					
						$('<tr></tr>')
						.append('<td>' + me.no + '</td>')
						.append('<td>' + me.sex + '</td>')
						.append('<td>' + me.name + '</td>')
						//.append('<input type="hidden" id="id-'+me.id+'"value="' + me.id + '"/>')
						//.append('<td><button class="btn btn-primary" id="check-'+me.id+'" type="button"><i class="fa fa-user-plus"></i></button></td>')
						.appendTo(detailBox);
					
					
						
				});
				//$('<div><button id = "buy_'+me.order_id +'">購買</button></div>').appendTo(detailBox);
			}
