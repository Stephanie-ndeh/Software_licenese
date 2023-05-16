<?php
  session_start();
  include '../assets/db/db.php';
  $query = "SELECT * FROM user ";
  $result = mysqli_query($conn,$query);

  $license = "SELECT * FROM license ";
  $output = mysqli_query($conn, $license);
       
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="../assets/css/dashboard.css">
	<title>AdminHub</title>
</head>
<body>
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">AdminHub</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Users</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">license</span>
				</a>
			</li>
			<li>
				<a href="logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>

	<section id="content">
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
				</div>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>Number of Users</h3>
						<p>
						<?php 
						$query = "SELECT id FROM user ORDER BY id";
						$query_run = mysqli_query($conn, $query);
						$row = mysqli_num_rows($query_run);
						
						echo '<h1> '.$row.'</h1>';
						?>
						</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-book' ></i>
					<span class="text">
						<h3>Number of Licenses</h3>
						<p>
						<?php
						$query = "SELECT id FROM license ORDER BY id";
						$query_run = mysqli_query($conn, $query);
						$row = mysqli_num_rows($query_run);
						
						echo '<h1> '.$row.'</h1>';
						?> 
						</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>All Users</h3>
					</div>
					<table>
						<thead>
							<tr>
								<th>id</th>
								<th>firstName</th>
								<th>LastName</th>
								<th>email</th>
								<th>registerDate</th>
							</tr>
						</thead>
						<tbody>
							<tr>
							<?php 
                      while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['firstName'] ?></td>
                        <td><?php echo $row['lastName'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['registerDate'] ?></td>
                        </tr> 
                        <?php
                     }
                      
                     ?>
					</tbody>
					</table>
				</div>
			</div>

			<div class="table-data">
			<div class="order">
					<div class="head">
					<h3>Licenses</h3>
					</div>
				<table>
					<thead>
						<tr>
                        <th>id</th>
                        <th>userID</th>
                        <th>Label</th>
                        <th>token</th>
                        <th>Date Created</th>
                        <th>Due Date</th>
                        <th>Days Before</th>
						</tr>
					</thead>
					<tbody>
                    <tr>
                    <?php 
                      while($row = mysqli_fetch_assoc($output)){
                        ?>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['user_id'] ?></td>
                        <td><?php echo $row['label'] ?></td>
                        <td><?php echo $row['token'] ?></td>
                        <td><?php echo $row['dateCreated'] ?></td>
                        <td><?php echo $row['dueDate'] ?></td>
                        <td><?php echo $row['daysBefore'] ?></td>
					</tr>
                        
                    <?php } ?>

					</tbody>
				
				</table>
			</div>
			</div>
		</main>
	</section>
	
	<script src="script.js"></script>

</body>
</html>