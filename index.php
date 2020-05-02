<?php  include('server.php'); 

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];	
        $edit_state = true;
		$rec = mysqli_query($db, "SELECT * FROM info WHERE id=$id " );
$record=mysqli_fetch_array($rec);
        $name = $record['name'];
        $id =$record['id'];
		
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD: CReate, Update, Delete PHP MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript">
    
$(document).on( 'click', '.done-action', function() {
	    var id = $(this).parent().attr('id');
		$.ajax({
            type: 'POST',
          
			dataType: 'json',
            data: {
                'id': id,
                'action':"update",
            },
            success: function() {
               	$(this).parent().parent('tr').addClass('done');
            },
        });	
                    
	  $(this).parent().parent('tr').addClass('done');
	});      
	
    </script>

</head>
<body>
        <?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>

<?php endif ?>
    <form method="post" action="server.php" >
                <input type="hidden" id="i" name="id" value="<?php echo $id; ?>">

		<div class="input-group">
			<label>Name</label>
			<input type="text" id="ti" name="name" value="<?php echo $name; ?>">
		</div>
 
		<div class="input-group">
            <?php if ($edit_state == false): ?>
			<button class="btn"  type="submit" name="save" >Save</button>
            <?php else: ?>
            <button class="btn" type="update" name="update" >update</button>
<?php endif ?>
            
		</div>
	</form>
    

    

    
    
    <table>
	<thead>
		<tr>
			<th>Name</th>
						<th colspan="2"></th>
            
		</tr>
	</thead>
	
        
<tbody>
    
        
        	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr class="list-group-item  <?php if($row['status'] == 1) { echo 'done'; } ?>">
			<td><?php echo $row['name'];  ?></td>
			<span class="bt1">
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			
			
    	<a href="index.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
		 <a href ="#" class="done-action">Mark as Done </a>
            </td>
            </span>
		</tr>
	<?php } ?>
        
        </tbody>
</table>

     
</body>
</html>