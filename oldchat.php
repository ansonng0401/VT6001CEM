<!-- <?php
include 'header.php';
include('./action/conn.php');
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<br>
<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="matchPG.php">Matching</a></li>
      <li class="breadcrumb-item active" aria-current="page">Chat</li>
    </ol>
  </nav>
  <div class="row">
    <div class="col-md-3">

      <p><?php echo $_SESSION['firstname']; ?> </p>
      <input type="text" id="fromUser" value=<?php echo $_SESSION["userid"]; ?> hidden />
      <p>//Send message</p>
      <ul>
        <?php
        $sql = "SELECT * FROM userinfo Where userid NOT IN ('" . $_SESSION['userid'] . "')";

        $msgs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        while ($msg = mysqli_fetch_assoc($msgs)) {
        ?>
          <li><a href="?toUser=<?= $msg['userid']; ?>"><?= $msg['firstname']; ?> </a></li>

        <?php
        }
        ?>
      </ul>
    </div>
    <div class="col-md-9">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <?php
            if (isset($_GET["toUser"]) && isset($_GET["firstname"]) && isset($_GET["lastname"])) {

              $userName =  "SELECT * FROM userinfo Where (userid = " . $_GET['toUser'] . " AND firstname = '" . $_GET["firstname"] .  "' AND lastname = '" . $_GET["lastname"] . "')";
              $usersql = mysqli_query($conn, $userName) or die(mysqli_error($conn));
              $uName = mysqli_fetch_assoc($usersql);
              echo '<input type="Text" value=' . $_GET["toUser"] . ' id="toUser" hidden/>';
              echo $uName["firstname"] . " " . $uName["lastname"];
            } else {
              echo "Go Match";
            }
            ?>
          </div>


          <div class="modal-body" id="msgBody" class="overflow-auto" style="heigh: 150px;%;overflow:auto;">
            <?php
            if (isset($_GET["toUser"]) && isset($_GET["firstname"]) && isset($_GET["lastname"])) {
              $chatrecsql = "SELECT * FROM chatmessages Where (fromuser =" . $_SESSION['userid'] . " AND touser = " . $_GET["toUser"] . ")OR (fromuser =" . $_GET["toUser"] . " AND touser = " . $_SESSION['userid'] . ")";
              $chatrec = mysqli_query($conn, $chatrecsql) or die(mysqli_error($conn));
              while ($chat = mysqli_fetch_assoc($chatrec)) {
                if ($chat["fromuser"] == $_SESSION['userid']) {
                  echo "<div class='comments'style='text-align: right; '>
                  <p style='background-color:lightblue; word-wrap: break-word;display:inline-block; padding: 5px; border-radius:3px; width:auto; max width:70%;'>
                  " . $chat["message"] . "
                  </p>
                  </div>";
                } else {

                  echo "<div class='comments'style='text-align: left;'>
              <p style='background-color:yellow; word-wrap: break-word;display:inline-block; padding: 5px; border-radius:10px; max width:70%;'>
              " . $chat["message"] . "
              </p>
              </div>";
                }
              }
            } else {
              echo "Go Match";
            }
            ?>
            <?php
            if (isset($_GET["toUser"]) && isset($_GET["firstname"]) && isset($_GET["lastname"])) {
            ?></div>
          <div class="form-group">

            <div class="modal-footer">
              <textarea id="message" class="form-control" style="width:72%;" required></textarea>
              <button type="button" id="send" class="btn btn-primary" style="height:70%;">Send</button>
              <p id="alert"></p>
            </div>
          </div>
        <?php
            }; ?>

        </h5>
        </div>
      </div>
      </body>
      <script type="text/javascript">
        $(document).ready(function() {

          $("#msgBody").animate({
            scrollTop: $("#msgBody").get(0).scrollHeight
          }, 500);

          $("#msgBody").click(function() {
            var height = $(this).prop("scrollHeight");
            $(this).scrollTop(height, 100);
          })

          $("#send").on("click", function() {
            const inpObj = document.getElementById("message");
            if (!inpObj.checkValidity()) {
              document.getElementById("alert").innerHTML = inpObj.validationMessage;
            } else {
              $.ajax({
                url: "./action/chatsendmessage.php",
                method: "POST",
                data: {
                  fromuser: $("#fromUser").val(),
                  touser: $("#toUser").val(),
                  message: $("#message").val()
                },
                dateType: "text",
                success: function(data) {
                  $('#message').val("")
                }
              });
            }
          });

          setInterval(function() {
            $.ajax({
              url: "./action/realTimeChat.php",
              method: "POST",
              data: {
                fromuser: $("#fromUser").val(),
                touser: $("#toUser").val()
              },
              dataType: "Text",
              success: function(data) {
                $("#msgBody").html(data)

              }
            });
          }, 700);
        });
      </script>

      </html> -->