
<!DOCTYPE html>
<html lang="en" style="margin:50px 150px 50px 150px; background-color:#D4D4D4;">
<head>
  <title>Book Order System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<!-- Include Required Prerequisites -->

<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/latest/css/bootstrap.css" />
 
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />


<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
<!-- Include jQuery -->


<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
  
</head>
<style>

.panel-body {
    padding: 15px;
    background-color: orange;
}

.modal {
  text-align: center;
  padding: 0!important;
}

.modal:before {
  content: '';
  display: inline-block;
  height: 100%;
  vertical-align: middle;
  margin-right: -4px;
}

.modal-dialog {
  display: inline-block;
  text-align: left;
  vertical-align: middle;
}
th{
  text-align: center;
}
td{
  text-align: center;
}
.logo {
  font-size: 200px;
}
@media screen and (max-width: 768px) {
  .col-sm-4 {
      text-align: center;
      margin: 25px 25px 25px 25px;
  }
  .col-sm-8 {
      text-align: center;
      color: blue;
  }
}
.center{background-color: #FFA500;
  color: white;
}

</style>
<body>
<div class="center" >
  <div class="row" >
    <div class="col-sm-4">
      <img src="https://cobbhabitatfamilies.files.wordpress.com/2010/02/books.png" style=" margin:20px 20px 20px 20px;" alt="main image" width="170" height="150"> 
    </div>
    <br>
    <br>
    <br>
    <div class="col-sm-8">
      <i><h1 style="color:blue; margin:0 10px0 0 0px;" >BOOK ORDERING SYSTEM</h1></i>
    </div>
  </div>

  <div class="center" style="background-color:  #FF7F50">
      <ul class="nav nav-pills"  style="margin:0 0 0 400px;" >
        <li role="presentation" class="active"><a style="color: navy; background-color: #CD5C5C;margin:8px 8px 8px 8px;  " href="http://localhost/bookOrderSystem/">MANAGE BOOKS</a></li>
        <li role="presentation" class="active"><a style="color: navy; background-color: #CD5C5C;margin:8px 8px 8px 8px;" href="http://localhost/bookOrderSystem/orders">MANAGE ORDERS</a></li>
       <li role="presentation" class="active"><a style="color: navy; background-color: #CD5C5C ;margin:8px 8px 8px 0;" id="click" class="btn btn-default" data-toggle="modal" data-target="#myModal">GET STATISTICS</a></li>
	   <li role="presentation" class="active"><a style="color: navy; background-color: #CD5C5C ;margin:8px 8px 8px 0;" class="btn btn-default" data-toggle="modal" data-target="#myModal2">REGISTER NEW ADMIN</a></li>
        <li role="presentation" class="active"><a style="color: navy; background-color: red ;margin:8px 8px 8px 0; " href="http://localhost/bookOrderSystem/login">LOG OUT</a></li>
       
      </ul>
  </div>
  
  
   <!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content"  style="color:blue;">
					  <div class="modal-header" >
					  
					 
					  
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						
						<h2 class="modal-title" align="center" id="myModalLabel">Get Statistics</h2>
					  </div>
					  <div class="modal-body">




					   <?php 
					   $data= Session::get('datedata');
					   if(isset($data)){
						  $date=Session::get('date1');
						  $date2=Session::get('date2');
						  $getStat=Session::get('dateStat');
						  echo '<h3>Between Dates: ' . $date .' ~ '.$date2 . '</h3>';
					  }
						  
					  ?>
					  
								<div id="st_container" style="min-width: 860px; height: 400px; margin: 0 auto"></div>
								
<div class="bootstrap-iso" style="color:blue;">
 <div class="container-fluid" >
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">
    <form class="form-horizontal" method="POST" action="getstats">
			 <div class="form-group ">
			  <label class="control-label col-sm-3 requiredField" for="date">
			   Start Date
			   <span class="asteriskField">
				:
			   </span>
			  </label>
			  <div class="col-sm-9">
			   <div class="input-group">
				<div class="input-group-addon">
				 <i class="fa fa-calendar" >
				 </i>
				</div>
				<input class="form-control" style="color:blue;" id="date" name="date" placeholder="DD/MM/YYYY" type="text" autocomplete="off"/>
			   </div>
			  </div>
			 </div>
			 
			 <div class="form-group ">
			  <label class="control-label col-sm-3 requiredField" for="date">
			   End Date
			   <span class="asteriskField">
				:
			   </span>
			  </label>
			  <div class="col-sm-9">
			   <div class="input-group">
				<div class="input-group-addon">
				 <i class="fa fa-calendar" >
				 </i>
				</div>
				<input class="form-control" style="color:blue;" id="date2" name="date2" placeholder="DD/MM/YYYY" type="text" autocomplete="off"/>
			   </div>
			  </div>
			 </div>
     
   
   </div>
  </div>
 </div>
</div>
								
								
					  </div>
					  <div class="modal-footer">
					
					
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-success">Submit</button>
						
			 </form>
      </div>
    </div>
  </div>
</div>

 <!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  >
  <div class="modal-dialog modal-lg" role="document"style="width: 560px; height: 400px;">
    <div class="modal-content" style="color: blue; "  >
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						
						<h4 class="modal-title" id="myModalLabel" align="center"><strong>Register Admin</strong></h4>
					  </div>
					  <div class="modal-body" >
								
								
					<form style="width:200px" action='adminRegister' method="POST">
													
	
							  <div class="control-group" >
								<p style="color:blue;">Admin Name:</p>
								<input type="text" class="form-control"  name="reg_admin_name" id="reg_admin_name" placeholder="Enter admin name"  autocomplete="off">
								<p></p>
							  </div>
							  
							  <div class="control-group">
							  <p style="color:blue;">Admin Password:</p>
								<input type="password" class="form-control"  name="reg_admin_pwd" id="reg_admin_pwd" placeholder="Enter password"  autocomplete="off">
								<p></p>
							  </div>
						  
							  <div class="control-group">
							  <p style="color:blue;">Admin Adress:</p>
								 <input type="text" class="form-control"  name="reg_admin_addr" id="reg_admin_addr" placeholder="Enter adress"  autocomplete="off">
								 <p></p>
							  </div>
						  
							  <div class="control-group">
							  <p style="color:blue;">Admin Phone:</p>
								<input type="text" class="form-control"  name="reg_admin_phone" id="reg_admin_phone" placeholder="Enter phone"  autocomplete="off">
								<p></p>
							  </div>
						  
							  <div class="control-group">
							  <p style="color:blue;">Admin Email:</p>
								<input type="text" class="form-control"  name="reg_admin_mail" id="reg_admin_mail" placeholder="Enter email"  autocomplete="off">
								<p></p>
							  </div>
							
								
					  </div>
					  
					  <div class="modal-footer">
					
					
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-success">Register</button>
							
					</form>
      </div>
    </div>
  </div>
</div>
  
@if (\Session::has('success'))	
	
	<div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong> <ul>
            <li>{!! \Session::get('success') !!}</li>
			<li>{!! \Session::get('successdata') !!}</li>
        </ul> </strong>
	</div>
	
@endif

@if (\Session::has('fail'))
	
	<div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong> {!! \Session::get('fail') !!} </strong>
	</div>
@endif

<?php 

if(!isset($getStat)){


		
		

			 	$data = array("IN_BEGIN_DATE" => '01/01/1990', "IN_END_DATE" => '01/01/2050' );
			 	$data_string = json_encode($data);
			  //connection
			  	$ch = curl_init();
			  	curl_setopt($ch, CURLOPT_URL, 'orderbook.azurewebsites.net/stajorderbook/test/adminGetStatistics'); 
			  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));  
				$output = curl_exec($ch);   
				  
				  // convert response
				  $output = json_decode($output, true);
				  $dataa=$output;

																			echo'	<table id="charttable" style="display:none">
																						<thead>
																									<tr>
																										<th></th>
																										<th>Books</th>
																										
																									</tr>
																								</thead>
																						<tbody>
																												';
																					
												

												
																			foreach($dataa['data'] as $item) 
																			{	
																				echo '<tr>';
																				echo '<th>' . $item['BOOK_NAME'] . '</th>';
																				echo '<td>' . $item['SALES_COUNT'] . '</td>';
																				echo '</tr>';
																			}
						
																				echo		'</tbody>
																						</table>';
}else

									if(isset($getStat) && $getStat == 1){
						echo 								'<table id="charttable" style="display:none">
																	<thead>
																		<tr>
																			<th></th>
																			<th>Books</th>
																			
																		</tr>
																	</thead>
															<tbody>
																					';
																				$data=Session::get('datedata');	
												

												
																			foreach($data['data'] as $item) 
																			{	
																				echo '<tr>';
																				echo '<th>' . $item['BOOK_NAME'] . '</th>';
																				echo '<td>' . $item['SALES_COUNT'] . '</td>';
																				echo '</tr>';
																			}
						
																				echo '
																				<script type="text/javascript">
$(document).ready(function(){
    $("#click").trigger(\'click\'); 
});
</script>
																				
															</tbody>
															</table>';
									}else{
										
									}
									
									
?>



 <div class="center col-md-12"   style=" margin:20px 0px 10px 0; ">
            <input type="text" style="color:blue;margin-top: 2px;" id="search" placeholder="Type Order Id to search">
			<table class="table table-bordered" id='dataTable' style=" margin:20px 0 20px  0;" >
            <thead>
              <tr text-align:"center">
                <th id="orderID">ORDER ID</th>
                <th>BOOK ID</th>
                <th>USER ID</th>
                <th>BOOK NAME</th>
                <th>AUTHOR NAME</th>
                <th>ORDER DATE</th>
                <th>ORDER COUNT</th>
                <th>DISAPPROVE ORDER</th>
				<th>APPROVE ORDER</th>

              </tr>
            </thead>
            <tbody>
              <?php
				
										$conn = curl_init();
										curl_setopt($conn, CURLOPT_URL, 'orderbook.azurewebsites.net/stajorderbook/test/adminGetOrders'); 
										curl_setopt($conn, CURLOPT_RETURNTRANSFER, 1);
										curl_setopt($conn, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));  
										$output = curl_exec($conn); 

										$output = json_decode($output, true);
										
				
				foreach($output['data'] as $item) { 
					echo '<tr>';
					echo '<td class="orderId_class">' . $item['ORDER_ID'] . '</td>';
					echo '<td>' . $item['BOOK_ID'] . '</td>';
					echo '<td>' . $item['USER_ID'] . '</td>';
					echo '<td>' . $item['BOOK_NAME'] . '</td>';
					echo '<td>' . $item['AUTHOR_NAME'] . '</td>';
					echo '<td>' . $item['ORDER_DATE'] . '</td>';
					echo '<td>' . $item['ORDER_COUNT'] . '</td>';
					$order_id=$item['ORDER_ID'];
					
					
					
					 
					echo '';
					echo '<td>' . '<button type="button" style="background-color: #e69900;" class="btn btn-info btn-lg" data-order_id="'; echo htmlspecialchars($order_id);echo '" data-toggle="modal" data-target="#myDisApproveModal"><img src="http://www.pd4pic.com/images/cancel-delete-abort-remove-no-cross-arrow-button.png" alt="delete" width="35px" height="30px"  ></img>'.'</button>' . '</td>';
					echo 					'<div class="modal fade" id="myDisApproveModal" role="dialog">
								<div class="modal-dialog" >
										<div class="modal-content">
													  <div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															<h4 class="modal-title" style="color:blue;">Dispprove Order</h4>
													  </div>
													  
																<div class="modal-body">
														
																	
																	  <p style="color:blue;">Are you sure disapprove this order?</p>
																	  
																</div>
													 
															<div class="modal-footer">
															<form action=\'Disorders\' method="POST">
															<input type="" style="color:blue;" name="d_order_id" value=""/>
																<button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
														
																<!--<input type="text" style="color:blue;" id="order_id" name="order_id" placeholder="" class="input-xlarge" autofocus required>-->
																<button class="btn btn-success" value= >Confirm</button> 
																</form>												
															</div>
														
													  
													  
										</div><!-- /.modal-content -->
							  </div><!-- /.modal-dialog -->
					</div><!-- /.modal -->';
					
					echo '';
					echo '<td>' . '<button type="button" style="background-color: #e69900;" class="btn btn-info btn-lg" data-order_id="'; echo htmlspecialchars($order_id);echo '" data-toggle="modal" data-target="#myApproveModal"><img src="http://www.pd4pic.com/images/affirmative-confirm-checked-check-approve-button.png" alt="delete" width="px" height="30px"  ></img>'.'</button>' . '</td>';
					echo '					<div class="modal fade" id="myApproveModal" role="dialog">
								<div class="modal-dialog" >
										<div class="modal-content">
													  <div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															<h4 class="modal-title" style="color:blue;">Approve Order</h4>
													  </div>
													  
																<div class="modal-body">
														
																	
																	  <p style="color:blue;">Are you sure approve this order?</p>
																	  
																</div>
													 
															<div class="modal-footer">
															<form action=\'Apporders\' method="POST">
															<input type="" style="color:blue;" name="a_order_id" value=""/>
																<button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
														
																<!--<input type="text" style="color:blue;" id="order_id" name="order_id" placeholder="" class="input-xlarge" autofocus required>-->
																<button class="btn btn-success" value= >Confirm</button> 
															</form>												
															</div>
														
													  
													  
										</div><!-- /.modal-content -->
							  </div><!-- /.modal-dialog -->
					</div><!-- /.modal -->';
					
					

					
					echo '</tr>';
				} // end foreach
				?>
            </tbody>
          </table>
					

					

   

</div>


<!-- footer -->
<div class="centering" >
       <div class="panel panel-default">
        <div class="panel-body" >
        </div >
        <div class="panel-footer" style="background-color:#FFA500;"><p style="color:black; text-align:center;">Developed by CBOXPROJECTS Company Interns</p></div>
      </div>
</div>





 <script type="text/javascript">
						$(function() {
							$('input[name="startdate"]').daterangepicker({
								singleDatePicker: true,
								showDropdowns: true
							}, 
							function(start, end, label) {
								var years = moment().diff(start, 'years');
								
							});
						});
						
						$(function() {
							$('input[name="enddate"]').daterangepicker({
								singleDatePicker: true,
								showDropdowns: true
							}, 
							function(start, end, label) {
								var years = moment().diff(start, 'years');
								
							});
						});
</script>







<script>


$('#myApproveModal').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var order_id = $(e.relatedTarget).data('order_id');

    //populate the textbox
    $(e.currentTarget).find('input[name="a_order_id"]').val(order_id);
});

$('#myDisApproveModal').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var order_id = $(e.relatedTarget).data('order_id');

    //populate the textbox
    $(e.currentTarget).find('input[name="d_order_id"]').val(order_id);
});


function findRows(table, column, searchText) {
    var rows = table.rows,
        r = 0,
        found = false,
        anyFound = false;

    for (; r < rows.length; r += 1) {
        row = rows.item(r);
        found = (row.cells.item(column).textContent.indexOf(searchText) !== -1);
        anyFound = anyFound || found;

        row.style.display = found ? "table-row" : "none";
    }

    document.getElementById('noresults').style.display = anyFound ? "none" : "block";
}

function performSearch() {
    var searchText = document.getElementById('search').value,
        targetTable = document.getElementById('dataTable');

    findRows(targetTable, 0, searchText);
}

document.getElementById("search").onkeyup = performSearch;

$(function () {
    $('#st_container').highcharts({
        data: {
            table: 'charttable'
        },
        chart: {
            type: 'column'
        },
        title: {
            text: 'Statistics of Book Sales'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Sale Quantity'
            }
        },
        tooltip: {
            formatter: function () {
                return '<b>' + this.series.name + '</b><br/>' +
                    this.point.y + ' ' + this.point.name.toLowerCase();
            }
        }
    });
});


$('input[name="daterange"]').daterangepicker();

$('.input-daterange input').each(function() {
    $(this).datepicker("clearDates");
});

$(document).ready(function(){
		var date_input=$('input[name="date"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'dd/mm/yyyy',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})
	
	$(document).ready(function(){
		var date_input=$('input[name="date2"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'dd/mm/yyyy',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})


</script>



</body>

</html>