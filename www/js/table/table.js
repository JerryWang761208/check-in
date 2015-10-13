$(function(){
	baseUrl = $('#base_url').val();
	//autocomplete name search
	$('#name').keyup(function(){
			$.ajax({
				url: baseUrl + 'mgmt/home/search',
				data:{
					'name':$('#name').val(),
					'sex': $( '#first_sex' ).text()
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
		
		
	$("#exchange").click(function(){
		fId = $('input[name=firstId]').val();
		sId = $('input[name=secondId]').val();
		sex = $( '#first_sex' ).text();
		location.href = baseUrl+'mgmt/home/exchange/'+fId+'/'+sId+'/'+sex;
		//$('#myModal').modal('hide');
	});
	
});

function showChe(sex){
	 location.href = baseUrl+'mgmt/home/show_che/'+sex+'#a_head';
}

//delete all check list

function deleteAll(){
	if(confirm('是否清除所有名單')){
		location.href = baseUrl+'mgmt/home/delete_all';
	}
}

//delete specific checked person

function deleteChe(id,sex,no){
	if(confirm('是否刪除此位'+sex+' '+no+'號')){
		location.href = baseUrl+'mgmt/home/delete_che/'+id+'/'+sex+'/'+no;
	}
}




function reDraw(){
				
				var detailBox = $('#modalCheck').empty();
				
				//var tr = $('<tr></tr>').appendTo(detailBox);
				//var tr = $('').appendTo(detailBox);
	
				$.each(detailStore, function() {
					//避免呼叫到元素的this
					var me = this;
					
					
						// $('<tr id="tr-'+me.id+'"></tr>')
						$('<tr class="tr"></tr>')
						.append('<td>' + me.no + '</td>')
						.append('<td>' + me.sex + '</td>')
						.append('<td>' + me.name + '</td>')
						.append('<td>' + me.id + '</td>')
						.append('<input type="hidden" id="id-'+me.id+'"value="' + me.id + '"/>')
						// .append('<td><button class="btn btn-primary" id="check-'+me.id+'" type="button"><i class="fa fa-user-plus"></i></button></td>')
						.appendTo(detailBox);
				
					
						$('.tr').click(function(){
							$('.tr').removeClass('success');
							$(this).addClass('success');
							secondId = $(this).find('td').eq(3).text();
							$('#secondId').val(secondId);
						});
						
				});
				//$('<div><button id = "buy_'+me.order_id +'">購買</button></div>').appendTo(detailBox);
}


function swap(id,name,sex,no){
	$('#myModal').modal();
	$('#firstId').val(id);
	$('#first_no').text(no);
	$('#first_name').text(name);
	$('#first_sex').text(sex);
	$('#first_id').text(id);
	
}


