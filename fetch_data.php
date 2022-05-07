<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<?php
session_start();
include('./action/conn.php');



if (isset($_POST["action"])) {
	$query = "SELECT * FROM userinfo Where userid not in (select blockuserid from blocklist where userid =  " . $_SESSION['userid'] . ") and userid NOT IN ('" . $_SESSION['userid'] . "')";
	$GET = "";


	if (isset($_POST["minimum_age"], $_POST["maximum_age"])  && !empty($_POST["maximum_age"])) {

		date_default_timezone_set("Asia/Taipei");
		$nowYear = date("Y");
		$minageyear = $nowYear - $_POST["minimum_age"];

		$nowYear = date("Y");
		$maxageyear = $nowYear - $_POST["maximum_age"];

		$query .= " AND birth BETWEEN '" . $maxageyear  . "-1-1 ' AND '" . $minageyear . "-12-31'";
		$GET .= "minimum_age=" . $_POST["minimum_age"]  . "&maximum_age" . $_POST["maximum_age"] . "";
	}
	if (isset($_POST["inter"])) {
		$inter_filter = implode("','", $_POST["inter"]);
		$inter_GETfilter = implode(',', $_POST["inter"]);
		$query .= " AND interests IN('" . $inter_filter . "')";
		$GET .= "&inter=" . $inter_GETfilter . "";
	}
	if (isset($_POST["occ"])) {
		$occ_filter = implode("','", $_POST["occ"]);
		$occ_GETfilter = implode(',', $_POST["occ"]);
		$query .= " AND occupation IN('" . $occ_filter . "')";
		$GET .= "&occ=" . $occ_GETfilter . "";
	}
	if (isset($_POST["personality"])) {
		$personality_filter = implode("','", $_POST["personality"]);
		$personality_GETfilter = implode(',', $_POST["personality"]);
		$query .= "AND personality IN('" . $personality_filter . "')";
		$GET .= "&personality=" . $personality_GETfilter . "";
	}
	if (isset($_POST["gender"])) {
		$gender_filter = implode("','", $_POST["gender"]);
		$gender_GETfilter = implode(',', $_POST["gender"]);
		$query .= " AND gender IN('" . $gender_filter . "')";
		$GET .= "&gender=" .   $gender_GETfilter . "";
	}


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


			$sql = "select * from favoritelist where userid ='" . $_SESSION['userid'] . "' and addfavuserid = '" . $row["userid"] . "'";


			$favresult = $conn->query($sql);


			if ($favresult->num_rows > 0) {
				$fav = '<form action="./action/adddelfavlist" method="POST" style="display: inline;"> 
				<input type="hidden" name="action" id="action" value="deletefavourite" />
				<input type="hidden" name="userid" id="userid" value=' . $_SESSION['userid'] . ' />
				<input type="hidden" name="addfavuserid"  id="addfavuserid" value=' . $row['userid'] . ' />
				<input type="submit" class="btn btn-outline-danger" value="♡ Favorite" ></form>';
			} else {
				$fav = '
				<form action="./action/adddelfavlist" method="POST" style="display: inline;"> 
				<input type="hidden" name="action" id="action" value="addfavourite" />
				<input type="hidden" name="userid" id="userid" value=' . $_SESSION['userid'] . ' />
				<input type="hidden" name="addfavuserid"  id="addfavuserid" value=' . $row['userid'] . ' />
				<input type="submit" class="btn btn-outline-dark" value="♡ Favorite" ></form>';
			}
			$blcok = '	<form action="./action/addblock" method="POST" style="display: inline;"> 
			<input type="hidden" name="action" id="action" value="addblock" />
			<input type="hidden" name="userid" id="userid" value=' . $_SESSION['userid'] . ' />
			<input type="hidden" name="blockuser"  id="blockuser" value=' . $row['userid'] . ' />
			<input type="submit" class="btn btn-outline-dark fa" value="&#xf023; Block" ></form>';

			$output .= '
			    <div class="col-sm-4 ">
				<div class="card">
				<div class="card-body">
					' . $image . '<br>
					<h5 class="card-title" style="text-align:center;" >' . $row['firstname'] . ' ' . $row['lastname'] . '</h5>
					<p><b>Gender : </b>' . $row['gender'] . '<br />
					<b>Age :  </b>' . $userage . ' <br />
					<b>Personality : </b>' . $row['personality'] . ' <br />
					<b>Occupation : </b>' . $row['occupation'] . '<br />
					<b>Interests </b>: ' . $row['interests'] . ' </p>
					<center>
					' .	$blcok . '
					' . $fav . '
					<br>
					<a class="btn btn-success" href="chat?toUser=' . $row['userid'] . '&firstname=' . $row['firstname'] . '&lastname=' . $row['lastname'] . '" role="button"><i class="fa fa-comments-o" aria-hidden="true"></i> Chat</a></center>

				</div>
</div>	<br>	
			</div>	
			
			';
		}
	} else {
		$output = '<div class=container>  <div class="alert alert-danger" role="alert">
        <center>
            <p style="font-size:120px" >😭</p>
            <h4>No Match User Found</h4> <Br>
            <h5>Please Try Another Method To Match Users <Br> <Br>
            </br>
        </center>
    </div>';
	}
	echo $output;
}

?>