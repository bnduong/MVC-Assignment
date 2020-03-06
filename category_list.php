<?php include 'view/header.php'; ?>
<main>
<h2>Category List</h2>
<section>
<table>
<tr>
<th colspan="2">Name</th>
</tr>        
<?php foreach ($categories as $category) : ?>
<tr>
<td><?php echo $category['categoryName']; ?></td>
<td>
<form action="." method="post">
<input type="hidden" name="action" value="delete_category">
<input type="hidden" name="category_id"
value="<?php echo $category['categoryID']; ?>"/>
<input type="submit" value="Remove"/>
</form>
</td>
</tr>
<?php endforeach; ?>    
</table>
</section>
<section>
<h2>Add Category</h2>
<form action="." method="post" id="add_category_form">
<input type="hidden" name="action" value="add_category">
<label>Name:</label>
<input type="text" name="category_name" max="20" required><br>
<label>&nbsp;</label>
<input id="add_category_button" type="submit" value="Add Category"><br>
</form>
</section>
<section>
<p><a href="index.php">View To Do List</a></p>
</section>
</main>
<div id="footer">
<p>&copy; <?php echo date("Y"); ?> My To Do List</p>
</footer>
</div>
</body>
</html>