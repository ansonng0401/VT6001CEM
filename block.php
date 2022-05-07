<!DOCTYPE html>
<?php
include 'header.php';
?>
</head>


<body>
    <div class="container">
</body>
<br>

<center>
    <h4 class="display-6">Block List</h4>
</center>

<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<?php

include('./action/conn.php');
if(isset($_GET['page']))
{
    $page = $_GET['page'];
}
else
{
    $page = 1;
}

$num_per_page =03 ;
$start_from = ($page-1)*02;

$sql = "select * from userinfo e, blocklist b where e.userid = b.blockuserid and b.userid = '".$_SESSION['userid']."'limit $start_from,$num_per_page";
$sql1 = "select * from userinfo e, blocklist b where e.userid = b.blockuserid and b.userid = '".$_SESSION['userid']."'";

$rs1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));

$row = mysqli_num_rows($rs1);


$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo"<h5>&nbsp;&nbsp;&nbsp;Count of Blocked Users:  ".$row."<br> </h5>Page: ".$page." <div class='row align-items-start'><br> ";
    while($row = $result->fetch_assoc()) {
  
      $today = date("Y-m-d");
      $age = date_diff(date_create($row["birth"]), date_create($today));    
      if (empty($row['image'])) {
        $image = '<center><img src="./assets/image/defuserimage.png" width=123px; height=140px" alt="user"></center>';
      } else {
        $image = '<center><img  src="data:image;base64,' . $row['image'] . '"  width=123px; height=140px" alt="user"></center>';
      }  
      ?>

<div class="col">
				<div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px;">
        <?=$image?><br>
					<h5 style="text-align:center;" ><?=$row["firstname"]?> <?=$row["lastname"]?></h4>
					<p><b>Gender : </b><?=$row["gender"]?><br />
					<b>Age :  </b><?=$age->format('%y');?><br />
					<b>Personality : </b><?=$row['personality']?><br />
					<b>Occupation : </b><?=$row['occupation'] ?><br />
					<b>Interests </b>: <?=$row['interests'] ?></p>
					<center> <a class="btn btn-outline-danger" href="./action/removeblock?userid=<?=$_SESSION['userid']?>&blockuserid=<?=$row['blockuserid']?>&firstname=<?=$row['firstname']?>&lastname=<?=$row['lastname']?>"><i style="font-size:24px" class="fa">&#xf09c;</i> Unblcok</a></center>
				</div>
        </div>
       
   <? };
        echo" </div><center><br>";
     $pr_query = "select * from userinfo e, blocklist b where e.userid = b.blockuserid and b.userid = '".$_SESSION['userid']."'";
     $pr_result = mysqli_query($conn,$pr_query);
     $total_record = mysqli_num_rows($pr_result);
     
     $total_page = ceil($total_record/$num_per_page);

     if($page>1) 
     {
        echo "<a href='block?page=".($page-1)."' class='btn btn-outline-danger'>PREVIOUS</a>";
     }

     for($i = 1; $i < $total_page + 1; $i++) 
     {
     
       if($i==$page){
        echo "<a href='block?page=".$i."' class='btn btn-primary'>$i</a>";}
        else{
          echo "<a href='block?page=".$i."' class='btn btn-outline-primary'>$i</a>";
        }
     }

     if($i-1>$page) 
     {
        echo "<a href='block?page=".($page+1)."' class='btn btn-outline-danger'>NEXT</a>";
     }


echo"</center>";

} else {?>
<br>
<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">No Blocked User</h4>
  <p></p>
  <hr>
  <p class="mb-0">No Blocked User Record Found</p>

</div>

<?

}

?>

<Br>

</div>


</div>
</div>
<br><br>

</html>