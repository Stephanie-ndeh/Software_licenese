<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="../assets/css/dashboard.css">
	<title>UserHub</title>
</head>
<body>
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">UserHub</span>
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
					<span class="text"> My profile</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">My licenses</span>
				</a>
			</li>
            <li>
				<a href="create_license.php" class="CreateLicense">
                    <i class='bx bxs-comment-add' ></i>
					<span class="text">Add License</span>
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
		<?php
            session_start();
            include '../assets/db/db.php';
            $license_list = "SELECT * FROM license WHERE user_id='".$_SESSION['id']."' ";
            $result = mysqli_query($conn, $license_list);
        ?>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
				</div>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>Number Licenses</h3>
						<p>
						<?php
                            $query = "SELECT id FROM license WHERE user_id='".$_SESSION['id']."' ";
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
						<h3>My Licenses</h3>
					</div>
					<table>
						<thead>
							<tr>
							<th>Label</th>
                            <th>Token</th>
                            <th>Created Date</th>
                            <th>Expire Date</th>
                            <th>Expire Day</th>
                            <th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<tr>
							 <?php 
                            while($row = mysqli_fetch_assoc($result)){
                                ?>
                                <td><?php echo $row['label']; ?></td>
                                <td><?php echo $row['token']; ?></td>
                                <td><?php echo $row['dateCreated']; ?></td>
                                <td><?php echo $row['dueDate']; ?></td>
                                <td>
                                    <?php 
                                        $expireDate = strtotime($row['dueDate']);
                                        $currentDate = strtotime(date("Y-m-d H:i:s"));

                                        $daysNumberTimeStamp =  $expireDate - $currentDate;
                                        $realDaysNumber = ceil($daysNumberTimeStamp / 86400);

                                        if( $realDaysNumber <= $row['daysBefore']) {
                                            $license_expiring = $row['label'];
                                            $token_expiring = $row['token'];
                                            echo "<script> setTimeout(()=> {alert('The license $license_expiring : $token_expiring expires in $realDaysNumber days')}, 10000)</script>"; 
                                        }

                                        echo $realDaysNumber;
                                    ?>
                                </td>
								<td><a class="btn" href="deleteLicense.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                                </tr> 
                                    
                                <?php
                            }
                        ?>
					</tbody>
					</table>
				</div>
			</div>

			</div>
		</main>
	</section>
	
	<script src="script.js"></script>

</body>
</html>