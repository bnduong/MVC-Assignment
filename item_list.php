<?php include 'view/header.php'; ?>
<main>
<section>
<?php if ( sizeof($categories) != 0) { ?>
<form action="." method="get" id="category_selection">
<label>Category:</label>
<select name="category_id">
<option value="0">View All Categories</option>
<?php foreach ($categories as $category) : ?>
<option value="<?php echo $category['categoryID']; ?>">
<?php echo $category['categoryName']; ?>
</option>
<?php endforeach; ?>
</select> 
<input type="submit" value="Submit">
</form>
<?php } ?>
<?php if( sizeof($items) != 0 ) { ?>
<div id="table-overflow">
<table>
<thead>
<tr>
<th>Title</th>
<th>Description</th>
<th colspan="2">Category</th>
</tr>
</thead>
<tbody>
<?php foreach ($items as $item) : ?>
<tr>
<td><?php echo $item['Title']; ?></td>
<td><?php echo $item['Description']; ?></td>
<?php if ($item['categoryName'] == null || $item['categoryName'] == false) { ?>
<td>None</td>
<?php } else { ?>
<td><?php echo $item['categoryName']; ?></td>
<?php } ?>
<td>
<form action="." method="post">
<input type="hidden" name="action" value="delete_item">
<input type="hidden" name="item_id"
value="<?php echo $item['ItemNum']; ?>">
<input type="submit" value="Remove">
</form>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
<p><a href="?action=show_add_form">Click here</a> to add a new item to the list.</p>     
<?php } else { ?>
<p>No to do list items exist yet. <a href="?action=show_add_form">Click here</a> to add an item.</p>     
<?php } ?>
<br>
<p><a href="index.php?action=list_categories">View/Edit Categories</a></p>
</section>
</main>
<?php include 'view/footer.php'; ?>