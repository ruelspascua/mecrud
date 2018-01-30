<?php

	require('function.php');

?>

<html xml:lang="en" lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  
  <title>Crud</title> 
  
  <script src="js/jquery.js"></script> 
  <script src="js/bootstrap.js"></script>
  
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"> </script>
  <script type="text/javascript" language="javascript" src="js/dataTables.bootstrap.min.js"> </script>
  <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.min.css">
  <script>
	$(document).ready( function () {
		$('#table_id').DataTable(); 
	});
  </script>
</head>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" title="Create Read Update Delete - Single Page">&nbsp; CRUD &nbsp;</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>  
	  
	  <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class='glyphicon glyphicon-cog'></span> Account
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Student</a></li>
          <li><a href="#">Parents</a></li>
          <li><a href="#">Staff</a></li>
        </ul>
      </li>
	  
	  <li>
		<!--<button style='postition:center;' class='btn btn-success' data-toggle="modal" data-target="#Add">Add Data</button>-->
	  </li>  
    </ul>
	
	 
	<ul class="nav navbar-nav navbar-right"> 
      <button style='postition:center;' class='btn btn-primary' data-toggle="modal" data-target="#Add">Add Data</button>
    </ul> 
  </div>
</nav>


<div class='container-fluid'>

	<div class='row'> 
		<div class='col-md-12'> 
			 <div class="panel panel-default">
                        <div class="panel-heading">
                            <div align='center'><kbd><font size='3'>User List<font></kbd></div> 							
                        </div> 
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="table_id">
                                    <thead>
                                        <tr> 
											<th>Name</th>  
											<th>Email</th>  
											<th>Phone</th>  
											<th>Address</th>  
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
										<?php
											viewUser($db);
										?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
		</div> 
	</div>
</div>


<div id="Add" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">User Details</h4>
      </div>
      <div class="modal-body">
		<form action='function.php' method='post'> 
			<div class="form-group"> 
			<label>Name</label> 
				<input type="text" class="form-control" name='name' required autofocus>
			</div>
			<div class="form-group"> 
			<label>Email</label> 
				<input type="email" class="form-control" name='email' required>
			</div>  
			<div class="form-group"> 
			<label>Phone</label>
				<input type="text" class="form-control" name='phone' required>
			</div> 
			<div class="form-group"> 
			<label>Address</label>
				<input type="text" class="form-control" name='address' required>
			</div>  
			<div class="form-group"> 
				<input type="submit" class="form-control btn btn-primary" name='adddata' value='Confirm'>
			</div> 
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div> 
  </div>
</div>

<div id="Edit" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit User Details</h4>
      </div>
      <div class="modal-body">
		<form action='function.php' method='post'>
			<input type="hidden" class="form-control id" name='id' required>
			<div class="form-group"> 
			<label>Name</label> 
				<input type="text" class="form-control name" name='name' required>
			</div>
			<div class="form-group"> 
			<label>Email</label> 
				<input type="email" class="form-control email" name='email' required>
			</div>  
			<div class="form-group"> 
			<label>Phone</label>
				<input type="text" class="form-control phone" name='phone' max='12' required>
			</div> 
			<div class="form-group"> 
			<label>Address</label>
				<input type="text" class="form-control address" name='address'required>
			</div> 
			<div class="form-group"> 
				<input type="submit" class="form-control btn btn-primary editdata" name='editdata' value='Save'>
			</div> 
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div> 
  </div>
</div>

<script>
	$(document).ready( function () {
		$(".EditUser" ).click(function() {
		
			var id 		    = $(this).data('id');
			var name      	= $(this).data('name');
			var email 		= $(this).data('email');
			var phone 		= $(this).data('phone'); 
			var address		= $(this).data('address');
			$(".id").val(id);
			$(".name").val(name);
			$(".email").val(email);
			$(".phone").val(phone); 
			$(".address").val(address);
		
		});
		
		$(".editdata" ).click(function() {
			if (confirm('Are you sure to edit this?\nThis could mean affecting some data.')) {
				return true;
			} 
			else {
				alert('Why did you press cancel? You should have confirmed');
				return false;
			}  
		});
		
		$(".DeleteUser" ).click(function() {
			if (confirm('Are you sure to delete this?\nThis could mean affecting some data.')) {
				return true;
			} 
			else {
				alert('Why did you press cancel? You should have confirmed');
				return false;
			}  
		});
	});
</script>