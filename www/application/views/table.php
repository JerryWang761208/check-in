<!DOCTYPE html>
<html >
<head>
	<?php $this -> load -> view('layout/head')?>
	<link href="<?=base_url('css/table/table.css')?>" rel="stylesheet" />
	
</head>
<body>
   <?php $this -> load -> view('layout/header')?>
   <?php $this -> load -> view('layout/nav_table')?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
	            <div id="che" class="col-md-12">
	                <h1 class="page-head-line">後台管理</h1>
	            </div>
            </div>
                <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-info">
                        <div class="panel-heading" id="a_head">
                            <i class="fa fa-list-ol"></i>
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          						簽到名單管理
        					</a>
        					<div class="btn-group btn-group-sm">
        						<button class="btn btn-default" onclick="showChe('m');"><i class="fa fa-male"></i> Male</button>
    							<button class="btn btn-default" onclick="showChe('f');" ><i class="fa fa-female"></i> Female</button>
        						<button class="btn btn-warning" onclick="deleteAll()" >清除名單</button>
        						<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->
    						</div>
                            <!-- <button type="button" id ="show-checkList-btn"></button> -->
                        </div>
                        
                      <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne"> 
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Sex</th>
                                            <th>Name</th>
                                            <th>ID</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?foreach($check_list as $each):?>
                                    	<tr>
                                    		<td><?=isset($check_list) ? $each -> no:''?></td>
                                    		<td><?=isset($check_list) ? $each -> sex:''?></td>
                                    		<td><?=isset($check_list) ? $each -> name:''?></td>
                                    		<td><?=isset($check_list) ? $each -> id:''?></td>
                                    		<td>
                                    			<div class="btn-group btn-group-sm">
					    							<button type="button" class="btn btn-info btn-lg" data-toggle="modal"  onclick="swap('<?= $each -> id?>','<?= $each -> name?>','<?= $each -> sex?>','<?= $each -> no?>');" >交換</button>
					        						<button class="btn btn-danger" onclick="deleteChe('<?= $each -> people_id?>','<?=$each -> sex?>','<?=$each -> no?>');" >刪除</button>
					    						</div>
                                    		</td>
                                    	</tr>
                                    	<?endforeach?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                   </div>
                </div>
                 <!-- End  Kitchen Sink -->
                <div id="pre" class="col-md-12">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <i class="fa fa-users"></i>
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          						預報名單管理
          						<a href=""><button type="button">Male</button></a>
          						<button type="button">Female</button>
        					</a>
                            <!-- <button type="button" id ="show-checkList-btn"></button> -->
                        </div>
                        
                      <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne"> 
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Sex</th>
                                            <th>Name</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?foreach($check_list as $each):?>
                                    	<tr>
                                    		<td><?=isset($check_list) ? $each -> id:''?></td>
                                    		<td><?=isset($check_list) ? $each -> sex:''?></td>
                                    		<td><?=isset($check_list) ? $each -> name:''?></td>
                                    		<td></td>
                                    	</tr>
                                    	<?endforeach?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                   </div>
                </div>
            
                
                    <!--  end  Context Classes  -->
                </div>
                
                
     <!-- ----------- -->
                <!-- <div class="row">
	                <div class="col-md-6">
	                  <!--   Kitchen Sink -->
	                    <!-- <div class="panel panel-default">
	                        <div class="panel-heading">
	                            簽到名單管理
	                        </div>
	                        <div class="panel-body">
	                            <div class="table-responsive">
	                                <table class="table table-striped table-bordered table-hover">
	                                    <thead>
	                                        <tr>
	                                            <th>#</th>
	                                            <th>First Name</th>
	                                            <th>Last Name</th>
	                                            <th>Username</th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
	                                        <tr>
	                                            <td>1</td>
	                                            <td>Mark</td>
	                                            <td>Otto</td>
	                                            <td>@mdo</td>
	                                        </tr>
	                                        <tr>
	                                            <td>2</td>
	                                            <td>Jacob</td>
	                                            <td>Thornton</td>
	                                            <td>@fat</td>
	                                        </tr>
	                                        <tr>
	                                            <td>3</td>
	                                            <td>Larry</td>
	                                            <td>the Bird</td>
	                                            <td>@twitter</td>
	                                        </tr>
	                                    </tbody>
	                                </table>
	                            </div>
	                        </div>
	                    </div>
	                     <!-- End  Kitchen Sink -->
	                <!-- </div>
                <div class="col-md-6">
                     <!--   Basic Table  -->
                    <!-- <div class="panel panel-default">
                        <div class="panel-heading">
                            預報名單管理
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Username</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Mark</td> -->
                                            <!-- <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> -->
                      <!-- End  Basic Table  -->
                <!-- </div>
            
                
                    <!--  end  Context Classes  -->
                <!-- </div>   -->
   <!-- ----------- -->
                
                
            </div>



        </div>
    
     <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">人員交換</h4>
        </div>
        <div class="modal-body">
        	<div class="row">
        		<label>1-id:</label>
        		<input type="text" name="firstId" id="firstId"/>
        		<label>2-id:</label>
        		<input type="text" name="secondId" id="secondId"/>
        		<label>Search:</label>
        		<input type="text" name="name" id="name"/>
        	</div>
        	<div class="row">
         		<table class="table table-bordered table-hover">
         			<tbody>
         				<tr class="danger">
         					<td id="first_no"></td>
         					<td id="first_sex"></td>
         					<td id="first_name"></td>
         					<td id="first_id"></td>
         				</tr>
         			</tbody>
         			<thead>
         				<tr>
         					<th>NO.</th>
         					<th>sex</th>
         					<th>name</th>
         					<th>id</th>
         				</tr>
         			</thead>
         			<tbody id="modalCheck">
         				
         			</tbody>
         		</table>
         	</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-default" id="exchange">確認交換</button>
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
    <script src="<?=base_url();?>js/table/table.js"></script>
</body>
</html>
