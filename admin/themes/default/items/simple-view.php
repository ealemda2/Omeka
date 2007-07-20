<table id="items" class="simple" cellspacing="0" cellpadding="0">
	<thead>
		<tr>
		<th scope="col">ID</th>
		<th scope="col">Title</th>
		<th scope="col">Type</th>
		<th scope="col">Creator</th>
		<th scope="col">Date Added</th>
		<th scope="col">Public</th>
		<th scope="col">Featured</th>
		</tr>
	</thead>
	<tbody>
<?php foreach($items as $key => $item): ?>
<tr class="item<?php if($key%2==1) echo ' even'; else echo ' odd'; ?>">
	<td scope="row"><?php echo $item->id;?></td> 
	<td><a href="<?php echo uri('items/show/'.$item->id); ?>" class="permalink"><?php echo $item->title; ?></a></td>
	<td><?php echo $item->Type->name; ?></td>
	<td><?php echo $item->creator; ?></td>	
	<td><?php echo date('m.d.Y', strtotime($item->added)); ?></td>
	<td><?php checkbox('public'); ?></td>
	<td><?php checkbox('featured'); ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
