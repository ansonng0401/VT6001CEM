 <!DOCTYPE html>

 <?php 
include 'header.php';
?>
 <div class="container">
     <br>
     <center>
         <h2>Personality Match</h2>
     </center><br>


     <center>




         <form action="/action_page.php">
             <label for="scp">Search Personality:</label>
             <select name="scp" id="scp">
                 <option value="">All</option>
                 <option value="Openness to Experience">Openness to Experience</option>
                 <option value="Conscientiousness">Conscientiousness</option>
                 <option value="Extroversion">Extroversion</option>
                 <option value="Agreeableness">Agreeableness</option>
                 <option value="Neuroticism">Neuroticism</option>
             </select>
             <input type="submit" value="Submit">
         </form>
     </center>
     <br>

     <div class="card-group">
         <?php
    
    require_once('./action/conn.php');



    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = 1;
    }

    $num_per_page = 04;
    $start_from = ($page-1)*05;
    

$perosnalityfullsql="";



    $sql="select * from userinfo  $perosnalityfullsql  limit $start_from,$num_per_page ";
    
  // $sql = "SELECT * FROM `userinfo` limit $start_from,$num_per_page where userid ORDER BY `userid` DESC" ;  

  
  $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));  
  while($rc = mysqli_fetch_assoc($rs)){

 $birthDate =  $rc['birth'];;

$currentDate = date("d-m-Y");

$age = date_diff(date_create($birthDate), date_create($currentDate));

    ?>



         <div class="card">
             <?php if(empty($rc['image'])){
                         echo '<br><center><img   src="./assets/image/defuserimage.png" width=160px; height=185px" alt="user"></center>';
 } else{
    echo '<br><center><img  src="data:image;base64,'.$rc['image'].'"  width=160px; height=185px" alt="user"></center>';
           }          ?>
             <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
             <div class="card-body">
                 <h5 class="card-title"><?=$rc['firstname']," ", $rc['lastname'];?></h5>
                 <p class="card-text">Gender: <?=$rc['gender']; ?></p>
                 <p class="card-text">Age: <?=$age->format("%y"); ?></p>
                 <p class="card-text">Personality: <?=$rc['personality']; ?></p>
                 <p class="card-text">Occupation: <?=$rc['occupation'];  ?></p>
                 <p class="card-text">Interests: <?=$rc['interests'];  ?></p>
                 <button type="button" class="btn btn-success">Chat</button>
             </div>
         </div>




         <?php
  }
  
  ?>
     </div>
     <br>
     <center>
         <?php 
        
        $pr_query = "select * from userinfo $perosnalityfullsql";
        $pr_result = mysqli_query($conn,$pr_query);
        $total_record = mysqli_num_rows($pr_result );
        
        $total_page = ceil($total_record/$num_per_page);

        if($page>1) 
        {
           echo "<a href='personalitymatch.php?page=".($page-1)."' class='btn btn-danger'>PREVIOUS</a>";
        }

        for($i = 1; $i < $total_page + 1; $i++) 
        {
          if($i==$page){
            echo "<a href='personalitymatch.php?page=".$i."' class='btn btn-outline-primary'>$i</a></li>";
            }else{
                echo "<a href='personalitymatch.php?page=".$i."' class='btn btn-primary'>$i</a>";
            }
        }

        if($i-1>$page) 
        {
           echo "<a href='personalitymatch.php?page=".($page+1)."' class='btn btn-danger'>NEXT</a>";
        }

?>
     </center>