<?php 
	session_start();
	

	// initialize variables
	$name = "";
	
	$id = 0;
	$edit_state=false;
$db = mysqli_connect('localhost', 'root', '', 'crud');
//add
    
	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$query= "INSERT INTO info (name) VALUES ('$name')"; 
        mysqli_query($db,$query);
		$_SESSION['message'] = "add task"; 
		header('location: index.php');
	}
        

        //update
    if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	

	mysqli_query($db, "UPDATE info SET name='$name' WHERE id=$id");
	$_SESSION['message'] = "task updated!"; 
	header('location: index.php');
}
        
        
        
        //delte
        if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM info WHERE id=$id");
	$_SESSION['message'] = "task deleted!"; 
	header('location: index.php');
            
            
       
            
}

  
    

	



    
 $results = mysqli_query($db, "SELECT * FROM info ORDER BY id DESC"); 
// ...?>