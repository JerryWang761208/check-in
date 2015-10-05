<!DOCTYPE html>
<html>
<head>
     <?php $this -> load -> view('layout/head')?>
     <link href="<?=base_url('css/home/home.css')?>" rel="stylesheet" />
</head>
<body>
     <?php $this -> load -> view('layout/header')?>
    <!-- LOGO HEADER END-->
     <?php $this -> load -> view('layout/nav_home')?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line"> <i class="fa fa-user"></i> 簽到系統</h1>
                        <i class="fa fa-user fa-3x" style="margin:0 auto !important;display:inline-block"></i>
                        <label class="radio-inline"><input type="radio" name="sex" value="m" checked/>Male</label> 
                        <label class="radio-inline"><input type="radio" name="sex" value="f"/>Female</label> 
                        <button type="button" id="show-checked" class="btn btn-success">顯示目前簽到狀況</button>
                        <!-- <h3 id="check-res"></h3> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
	                        <div class="panel-heading">
	                           <p style="display:inline-block">簽到</p> 
	                           <!-- <h3 id="check-res"></h3> -->
	                           <input type="text" class="form-control" id="check-res" value="" readonly />
	                        </div>
	                        <div class="panel-body">
		                       	<form class="form-inline">
								  <div class="form-group has-success">
								    <input type="text" class="form-control" id="name" name="name" placeholder="請輸入名字" />
								    <button class="btn btn-primary" ><i class="fa fa-search"></i></button>
								  </div>
								  
								  <div id="check-table">
								  	<table class="table table-bordered table-hover">
								  		<thead id="check-table-thead">
								  			<tr class="info">
								  				<th>id</th>
								  				<th>sex</th>
								  				<th>name</th>
								  				<th></th>
								  			</tr>
								  		</thead>
								  		
								  		<tbody id="search-res">
								  			
								  		</tbody>
								  	</table>
								  </div>
	                     	</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
	                        <div class="panel-heading">
	                           新增人員(預報名單沒有的人)
	                        </div>
                        	<div class="panel-body">
	                            <form role="form">
	                            	<div class="row">
	                                    <div class="col-xs-3">
									    	<input type="text" class="form-control" id="reg-name" placeholder="姓名">
									 	</div>
	                                    <div class="col-xs-3">
									    	<!-- <input type="text" class="form-control" placeholder="姓名"> -->
									    	<select id="reg-select"class="form-control">
									    		<option value="m">男生</option>
									    		<option value="f">女生</option>
									    	</select>
									 	</div>
	                                    <!-- <div class="col-xs-3">
									    	<input type="button" class="btn btn-success" value="註冊">
									 	</div> -->
	                                    <div class="col-xs-3">
									    	<input id="reg-check" type="button" class="btn btn-danger" value="註冊並簽到">
									 	</div>
								 	</div>
	                            </form>
                        	</div>
                        </div>
                        
                        
                        <!-- 2nd -->
                        
                        <div class="panel panel-default">
	                        <div class="panel-heading">
	                           目前簽到狀況
	                        </div>
                        	<div class="panel-body">
	                          	<table class="table table-bordered table-hover" id="test">
								  		<thead id="checked-table-thead">
								  			<tr class="success">
								  				<th>NO.</th>
								  				<th>sex</th>
								  				<th>name</th>
								  			</tr>
								  		</thead>
								  		
								  		<tbody id="checked-res">
								  			
								  		</tbody>
								</table>
                        	</div>
                        </div>
                        
                        
                        
                        
                    </div>
                </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
         <?php $this -> load -> view('layout/footer')?>
    </footer>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="<?=base_url();?>main_assets/assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="<?=base_url();?>main_assets/assets/js/bootstrap.js"></script>
    <script src="<?base_url('main_assets/assets/js/jquery-ui.js')?>"></script>
    <script src="<?=base_url();?>main_assets/assets/js/jquery-ui.min.js"></script>
    <script src="<?=base_url();?>js/home/home.js"></script>
</body>
</html>
