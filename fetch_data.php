 

 <?php



include('./action/conn.php');

	if (isset($_POST["action"])) {
		$query = "
		SELECT * FROM userinfo WHERE 1=1";

		if (isset($_POST["minimum_age"], $_POST["maximum_age"])  && !empty($_POST["maximum_age"])) {




			date_default_timezone_set("Asia/Taipei");
			$nowYear = date("Y");
			$minageyear = $nowYear - $_POST["minimum_age"];

			$nowYear = date("Y");
			$maxageyear = $nowYear - $_POST["maximum_age"];


			$query .= " AND birth BETWEEN '" . $maxageyear  . "-1-1 ' AND '" . $minageyear . "-12-31'
		";
		}
		if (isset($_POST["inter"])) {
			$inter_filter = implode("','", $_POST["inter"]);
			$query .= " AND interests IN('" . $inter_filter . "')";
		}
		if (isset($_POST["occ"])) {
			$occ_filter = implode("','", $_POST["occ"]);
			$query .= " AND occupation IN('" . $occ_filter . "')
";
		}
		if (isset($_POST["personality"])) {
			$personality_filter = implode("','", $_POST["personality"]);
			$query .= "
		 AND personality IN('" . $personality_filter . "')
		";
		}
		if (isset($_POST["gender"])) {
			$gender_filter = implode("','", $_POST["gender"]);
			$query .= "
		 AND gender IN('" . $gender_filter . "')
		";
		}

		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		$total_row = $statement->rowCount();
		$output = '';
		if ($total_row > 0) {
			foreach ($result as $row) {
				if (empty($row['image'])) {
					$image='<img src="./assets/image/defuserimage.png" width=160px; height=185px" alt="user">';
				} else {
					$image = '<img  src="data:image;base64,' . $row['image'] . '"  width=160px; height=185px" alt="user">';
				}

				$dateOfBirth = $row["birth"];
				$today = date("Y-m-d");
				$diff = date_diff(date_create($dateOfBirth), date_create($today));
				$userage=$diff->format('%y');
		
				$output .= '
			    <div class="col-sm-4 col-lg-3 col-md-3">
				<div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
					' . $image . '<br><br>
					<h5 style="text-align:center;" >' . $row['firstname'].' '.$row['lastname'] . '</h4>
					<p>Gender : ' . $row['gender'] . '<br />
					Age : ' . $userage . ' <br />
					Personality : ' . $row['personality'] . ' <br />
					Occupation : ' . $row['occupation'] . '<br />
					Interests : ' . $row['interests'] . ' </p>
				</div>

			</div>
			';
			}
		} else {
			$output = '<h3>No Data Found</h3>';
		}
		echo $output;
	}
	?>
