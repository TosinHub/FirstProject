<?php
		session_start();
		

		#connect to databse


		$page_title = "Categories";

		 include 'includes/db.php';
		 include 'includes/function.php';

		authenticate ();
		 include 'includes/header.php';



	if(array_key_exists('add', $_POST)){
		$clean = array_map('trim', $_POST);
	  	addCategory($conn,$clean);


	 	 }


	 if(array_key_exists('edit', $_POST)){
		$clean = array_map('trim', $_POST);
	  	editCategory($conn,$clean);


		}
	
?>



	<div class="wrapper">
		<div id="stream"><br/><br/>

<p>



<?php 

	if(isset($_GET['success']))
				{

					echo $_GET['success'];
				}


	if(isset($_GET['action']))
			{

	if($_GET['action']= "edit")
				{

?>

<h3>Edit Category</h3>
	<form  id="register" method="post" action="category.php">
			<input type="text" name="cat_name" placeholder="Category Name" value="<?php echo $_GET['cat_name']; ?>" />
			<input type="hidden" name="cat_id" value="<?php echo $_GET['cat_id']; ?>">
			<input type="submit" name="edit">

	</form>

<?php
				}

			}	


	if(isset($_GET['act'])){


	if ($_GET['act']= "delete") {
				deleteCat($conn,$_GET['cat_id']);
			}

		}



?>


<h3>Add Category</h3>


		<form  id="register" method="post" action="category.php">
			<input type="text" name="cat_name" placeholder="Category Name" />
			<input type="submit" name="add" value="Add">

		</form>


		</p><br/><br/>

<hr>

		<h3>Available categories</h3>
			<table id="tab">
				<thead>
					<tr>
						<th>Category Id</th>
						<th>Category Name</th>
						<th>edit</th>
						<th>delete</th>
					</tr>
				</thead>
				<tbody>
					
						<?php  $view = showCategory($conn); echo $view; ?>
						
						
          		</tbody>
			</table>
		</div>
		
		<div class="paginated">
			<a href="#">1</a>
			<a href="#">2</a>
			<span>3</span>
			<a href="#">2</a>
		</div>
	</div>

	<section class="foot">
		<div>
			<p>&copy; 2016;
		</div>
	</section>
</body>
</html>
