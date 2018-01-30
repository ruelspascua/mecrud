<?php 
	session_start();
	$db = new PDO('mysql:host=localhost;dbname=crud;charset=utf8mb4', 'root', '');
	

/*
	* ADD / INSERT DATA
*/
	
	if(isset($_POST['adddata'])){
		
		$name    = $_POST['name'];
		$email   = $_POST['email'];
		$phone   = $_POST['phone'];
		$address = $_POST['address'];
		
		$stmt = $db->prepare("INSERT INTO user(name,email,phone,address) VALUES(:name,:email,:phone,:address)");
		$stmt->execute(array(':name' => $name,':email' => $email,':phone' => $phone,':address' => $address));
		
		$affected_rows = $stmt->rowCount();
		
		if($affected_rows > 0){
			echo "<script>alert('Add User Success!') ; location.href = 'index'; </script>";
		}
		else{
			echo "<script>alert('Error Inserting!\nPlease Contact Administrator') ; location.href = 'index'; </script>";
		} 
	}

	
	

/*
	* VIEW / READ DATA
*/	

	function viewUser($db){
		foreach($db->query("SELECT * FROM user") as $row) {
			echo "<tr> 
					<td>".$row["name"]."</td> 
					<td>".$row["email"]   ."</td> 
					<td>".$row["phone"]   ."</td>  
					<td>".$row["address"]   ."</td>   					
					<td>
						<a href='' data-id   ='".$row['id']."' 
								   data-name ='".$row['name']."' 
								   data-email='".$row['email']."' 
								   data-phone='".$row['phone']."'
								   data-address='".$row['address']."'
									data-toggle='modal' data-target='#Edit' class='btn btn-warning EditUser'>Edit</a>
						<a href='function.php?DeleteUser=".$row['id']."'  class='btn btn-danger DeleteUser'>Delete</a>
					</td>";
			 
		}
	}



/*
	*	EDIT / UPDATA DATA
*/

	if(isset($_POST['editdata'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		
		$stmt = $db->prepare("UPDATE user SET name=?,email=?,phone=?,address=? WHERE id=?");
		$stmt->execute(array($name,$email,$phone,$address, $id));
		$affected_rows = $stmt->rowCount();
		
		if($affected_rows > 0){
				echo "<script>alert('User Details Save!') ; location.href = 'index'; </script>";
		}
		else{
				echo "<script>alert('Error Inserting!\nPlease Contact Administrator') ; location.href = 'index'; </script>";
		} 		 
	}

/*
	*	DELETE / DELETE DATA
*/
	if(isset($_GET['DeleteUser'])){
		$id = $_GET['DeleteUser']; 
		
		$stmt = $db->prepare("DELETE FROM user WHERE id = :id");
		$stmt->bindValue(':id', $id, PDO::PARAM_STR);
		$stmt->execute();
		$affected_rows = $stmt->rowCount();
		
		if($affected_rows > 0){
			echo "<script>alert('User Deleted!') ; location.href = 'index'; </script>";
		}
		else{
			echo "<script>alert('Error Inserting!\nPlease Contact Administrator') ; location.href = 'index'; </script>";
		} 
	}
?>


