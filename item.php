<?php
	//Redirect to index if not stock ID has been created
	if(!isset($_GET['id'])){
		header("Location: index.php");
	}
	
	$item_sql="SELECT * FROM books WHERE id=".$_GET['id'];
?>

<p><a href="javascript:history.back()">Go Back</a></p>

<?php
	if($item_query=mysqli_query($dbconnect, $item_sql)){
		$item_rs=mysqli_fetch_assoc($item_query);
?>
		<h1><?php echo $item_rs['Title'];?></h1>
		<br/>
		<img width="220" height="342"src="images/photos/<?php echo $item_rs['cover'];?>">
        <p><?php echo $item_rs['Description'];?></p>
		<p>$<?php echo $item_rs['Price'];?></p>
		<p><?php echo $item_rs['Author'];?></p>
		<p>Rating: <?php echo $item_rs['Rating'];?></p>
	<?php
	}
	?>