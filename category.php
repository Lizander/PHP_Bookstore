<?php
    include ("dbconnect.php");
	//If category is not set, redirect back to index page
	if(!isset($_GET['categoryID'])){
		header("Location:index.php");
	}
	
	//Select all stock items belonging to the selected categoryID
	//AS name; is used to add variuos names to a name
	//JOIN is used to join two tables
	$stock_sql="SELECT books.*, category.name AS catname FROM books JOIN 
	category ON books.categoryID=category.categoryID WHERE books.categoryID=".$_GET['categoryID'];
	
	if($stock_query=mysqli_query($dbconnect,$stock_sql)){
		$stock_rs=mysqli_fetch_assoc($stock_query);
	}
	
	if(mysqli_num_rows($stock_query)==0){
		echo "Sorry, we have no items currently in stock";
	}else{
		?>
		<h1><?php echo $stock_rs['catname'];?></h1>
		<?php
		do{
			?>
			<div class="item">
				<a href="index.php?page=item&id=<?php echo $stock_rs['id'];?>">
				<p><img src="images/photos/<?php echo $stock_rs['cover'];?>" height="150"></p>
				<p><?php echo $stock_rs['Title'];?></p></a>
				<p>Rating: <?php echo $stock_rs['Rating'];?></p></a>
				<br /><br />
			</div>
			<?php
		}while ($stock_rs=mysqli_fetch_assoc($stock_query));
	}
?>