<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php");
include 'connection.php'; ?>
<div class="container-fluid">
	<div class="row">

		<?php include "./templates/sidebar.php"; ?>

		<div class="row">
			<div class="col-10">
				<h2>Customers</h2>
			</div>
		</div>

		<div class="table-responsive">
			<table class="table table-striped table-sm">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Mobile</th>
						<th>Address</th>
					</tr>
				</thead>
				<tbody id="customer_list">
					<?php $sql = 'SELECT * FROM user_info';
					$result = mysqli_query($conn, $sql);
					$sno = 0;
					while ($row = mysqli_fetch_assoc($result)) {
						$sno++;
						//Use a loop to iterate through categories 
						$name = $row['username'];
						$email = $row['email'];
						$mobile = $row['mobile'];
						$address = $row['address'];

						echo '<tr>
                        <td>' . $sno . '</td>
                        <td>' . $name . '</td>
                        <td>' . $email . '</td>
                        <td>' . $mobile . '</td>
                        <td>' . $address . '</td>
                    </tr>';
						// <td><a class="btn btn-sm btn-info">Info</a>&nbsp;<a class="btn btn-sm btn-danger">Delete</a></td>
					}
					?>
				</tbody>
			</table>
		</div>
		</main>
	</div>
</div>


<?php include_once("./templates/footer.php"); ?>



<!-- <script type="text/javascript" src="./js/customers.js"></script> -->