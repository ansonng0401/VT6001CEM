<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<?php
session_start();
include('./action/conn.php');

if (isset($_POST["action"])) {
	$query = "SELECT * FROM userinfo Where email NOT IN ('" . $_SESSION['email'] . "')";
	$GET = "";
	if (isset($_POST["minimum_age"], $_POST["maximum_age"])  && !empty($_POST["maximum_age"])) {

		date_default_timezone_set("Asia/Taipei");
		$nowYear = date("Y");
		$minageyear = $nowYear - $_POST["minimum_age"];

		$nowYear = date("Y");
		$maxageyear = $nowYear - $_POST["maximum_age"];

		$query .= " AND birth BETWEEN '" . $maxageyear  . "-1-1 ' AND '" . $minageyear . "-12-31'";
		$GET .= "&minimum_age=" . $_POST["minimum_age"]  . "&maximum_age" . $_POST["maximum_age"] . "";
	}
	if (isset($_POST["inter"])) {
		$inter_filter = implode("','", $_POST["inter"]);
		$inter_get = implode(",", $_POST["inter"]);
		$query .= " AND interests IN('" . $inter_filter . "')";
		$GET .= "&inter=" . $inter_get . "";
	}
	if (isset($_POST["occ"])) {
		$occ_filter = implode("','", $_POST["occ"]);
		$query .= " AND occupation IN('" . $occ_filter . "')";
	}
	if (isset($_POST["personality"])) {
		$personality_filter = implode("','", $_POST["personality"]);
		$query .= "AND personality IN('" . $personality_filter . "')
		";
	}
	if (isset($_POST["gender"])) {
		$gender_filter = implode("','", $_POST["gender"]);
		$query .= " AND gender IN('" . $gender_filter . "')
		";
	}

	// echo $query;

	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '';
	if ($total_row > 0) {
		foreach ($result as $row) {
			if (empty($row['image'])) {
				$image = '<center><img src="./assets/image/defuserimage.png" width=123px; height=140px" alt="user"></center>';
			} else {
				$image = '<center><img  src="data:image;base64,' . $row['image'] . '"  width=123px; height=140px" alt="user"></center>';
			}

			$dateOfBirth = $row["birth"];
			$today = date("Y-m-d");
			$diff = date_diff(date_create($dateOfBirth), date_create($today));
			$userage = $diff->format('%y');



		
			$sql = "select * from favoritelist where userid ='".$_SESSION['userid']."' and addfavuserid = '".$row["userid"]."'";

			
			$favresult = $conn->query($sql);
			

			if ($favresult->num_rows > 0) {
				$fav='<form action="./action/adddelfavlist.php" method="POST" style="display: inline;"> 
				<input type="hidden" name="action" id="action" value="deletefavourite" />
				<input type="hidden" name="userid" id="userid" value='.$_SESSION['userid'].' />
				<input type="hidden" name="addfavuserid"  id="addfavuserid" value='.$row['userid'].' />
				<input type="submit" class="btn btn-outline-danger" value="♡ Favourite" ></form>';
			}else{
				$fav='
				<form action="./action/adddelfavlist.php" method="POST" style="display: inline;"> 
				<input type="hidden" name="action" id="action" value="addfavourite" />
				<input type="hidden" name="userid" id="userid" value='.$_SESSION['userid'].' />
				<input type="hidden" name="addfavuserid"  id="addfavuserid" value='.$row['userid'].' />
				<input type="submit" class="btn btn-outline-dark" value="♡ Favourite" ></form>';
			}


			$output .= '
			    <div class="col-sm-4 ">
				<div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; ">
					' . $image . '<br>
					<h5 style="text-align:center;" >' . $row['firstname'] . ' ' . $row['lastname'] . '</h4>
					<p><b>Gender : </b>' . $row['gender'] . '<br />
					<b>Age :  </b>' . $userage . ' <br />
					<b>Personality : </b>' . $row['personality'] . ' <br />
					<b>Occupation : </b>' . $row['occupation'] . '<br />
					<b>Interests </b>: ' . $row['interests'] . ' </p>
					<center>
			
					'.$fav.'
					<a class="btn btn-success" href="chat.php?toUser=' . $row['userid'] . '&firstname=' . $row['firstname'] . '&lastname=' . $row['lastname'] . '" role="button"><i class="fa fa-comments-o" aria-hidden="true"></i> Chat</a></center>

				</div>

			</div>
			';
		}
	} else {
		$output = '<br><br><br><center><div class="alert alert-warning" role="alert">No Match Users</div></center>';
	}
	echo $output;
}

?>
  

<!-- 	
<?php

if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = 1;
}

$num_per_page = 06;
$start_from = ($page - 1) * 05;


// $sql = "select * from `userinfo`limit $start_from,$num_per_page";
$sql = "SELECT *  FROM `userinfo`  limit $start_from,$num_per_page";;

$pr_query = "select * from userinfo";
$pr_result = mysqli_query($conn, $pr_query);
$total_record = mysqli_num_rows($pr_result);

$total_page = ceil($total_record / $num_per_page);

if ($page > 1) {
	echo "<a href='usermatching.php?page=" . ($page - 1) . "' class='btn btn-danger'>PREVIOUS</a>";
}

for ($i = 1; $i < $total_page + 1; $i++) {
	if ($i == $page) {
		echo "<a href='usermatching.php?page=" . $i . "'class='btn btn-outline-primary'>$i</a></li>";
	} else {
		echo "<a href='usermatching.php?page=" . $i . "' class='btn btn-primary'>$i</a>";
	}
}


?> -->