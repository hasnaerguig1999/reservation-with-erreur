<?php 
	if(isset($_POST['find'])){
		$data = new RoomsController();
		$rooms = $data->findRooms();
	}else{
		$data = new RoomsController();
		$rooms = $data->getAllRooms();
	}
?>
<div class="container">
	<div class="row my-4">
		<div class="col-md-10 mx-auto">
			<?php include('./views/includes/alerts.php');?>
			<div class="card">
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL;?>add" class="btn btn-sm btn-primary mr-2 mb-2">
						<i class="fas fa-plus"></i>
					</a>
					<a href="<?php echo BASE_URL;?>" class="btn btn-sm btn-secondary mr-2 mb-2">
						<i class="fas fa-home"></i>
					</a>
					
					<form method="post" class="float-right mb-2 d-flex flex-row">
						<input type="text" class="form-control" name="search" placeholder="Recherche">
						<button class="btn btn-info btn-sm" name="find" type="submit"><i class="fas fa-search"></i></button>
					</form>
					<table class="table table-hover">
					  <thead>
					    <tr>
					      <th scope="col">room_type</th>
					      <th scope="col">room_price</th>
					      <th scope="col">room_image</th>
					      <th scope="col">reservation</th>
					      
					    </tr>
					  </thead>
					  <tbody>
					    <?php foreach($rooms as $room):?>
					    	<tr>
						      <th scope="row"><?php echo $room['room_type']; ?></th>
						      <td><?php echo $room['room_price'];?></td>
						      <td><?php echo $room['room_image'];?></td>
						      
						      <td>
						      	<?php echo $room['reservation']
						      			?
						      			'<span class="badge badge-success">non_reserver</span>'
						      			:
						      			'<span class="badge badge-danger">reserver</span>';
						      ;?></td>
						      <td class="d-flex flex-row">
						      	<form method="post" class="mr-1" action="update">
						      		<input type="hidden" name="room_id" value="<?php echo $room['room_id'];?>">
						      		<button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
						      	</form>
						      	<form method="post" class="mr-1" action="delete">
						      		<input type="hidden" name="room_id" value="<?php echo $room['room_id'];?>">
						      		<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
						      	</form>
						      </td>
						    </tr>
					   	<?php endforeach;?>
					  </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>