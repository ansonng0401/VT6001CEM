<?php
include 'header.php';
include('./action/conn.php');
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<br>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="matchingmainpage">Matching Home Page</a></li>
            <li class="breadcrumb-item active" aria-current="page">Chat</li>
        </ol>
    </nav>

    <style>
        i1:hover {
            color: #9B9DF9;
        }

        .bg-white {
            background-color: #DCDDFF;
        }

        .friend-list {
            list-style: none;
            margin-left: -40px;
        }

        .friend-list li {
            border-bottom: 1px solid #eee;
        }

        .friend-list li a img {
            float: left;
            width: 45px;
            height: 45px;
            margin-right: 10px;
        }

        .friend-list li a {
            position: relative;
            display: block;
            padding: 10px;
            transition: all .2s ease;
            -webkit-transition: all .2s ease;
            -moz-transition: all .2s ease;
            -ms-transition: all .2s ease;
            -o-transition: all .2s ease;
        }

        .friend-list li.active a {
            background-color: #f1f5fc;
        }

        .friend-list li a .friend-name,
        .friend-list li a .friend-name:hover {
            color: #777;
        }

        .friend-list li a .last-message {
            width: 65%;
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
        }

        .friend-list li a .time {
            position: absolute;
            top: 10px;
            right: 8px;
        }

        small,
        .small {
            font-size: 85%;
        }

        .friend-list li a .chat-alert {
            position: absolute;
            right: 8px;
            top: 27px;
            font-size: 10px;
            padding: 3px 5px;
        }

        .chat-message {
            padding: 60px 20px 115px;

            height: 600px;
            overflow: scroll;
        }

        .chat {
            list-style: none;
            margin: 0;
        }

        .chat-message {
            background: #f9f9f9;
        }

        .chat li img {
            width: 45px;
            height: 45px;
            border-radius: 50em;
            -moz-border-radius: 50em;
            -webkit-border-radius: 50em;
        }

        .img-circle {
            max-width: 100%;
            border-radius: 50%;
        }

        .chat-body {
            padding-bottom: 20px;
        }

        .chat li.left .chat-body {
            /* margin-left: 70px; */
            background-color: #fff;
        }

        .chat li .chat-body {
            position: relative;
            font-size: 11px;
            padding: 10px;
            border: 1px solid #f1f5fc;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
            -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
            -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .chat li .chat-body .header {
            padding-bottom: 5px;
            border-bottom: 1px solid #f1f5fc;
        }

        .chat li .chat-body p {
            margin: 0;
        }

        .chat li.left .chat-body:before {
            position: absolute;
            top: 10px;
            left: -8px;
            display: inline-block;
            background: #fff;
            width: 16px;
            height: 16px;
            border-top: 1px solid #f1f5fc;
            border-left: 1px solid #f1f5fc;
            content: '';
            transform: rotate(-45deg);
            -webkit-transform: rotate(-45deg);
            -moz-transform: rotate(-45deg);
            -ms-transform: rotate(-45deg);
            -o-transform: rotate(-45deg);
        }

        .chat li.right .chat-body:before {
            position: absolute;
            top: 10px;
            right: -8px;
            display: inline-block;
            background: #fff;
            width: 16px;
            height: 16px;
            border-top: 1px solid #f1f5fc;
            border-right: 1px solid #f1f5fc;
            content: '';
            transform: rotate(45deg);
            -webkit-transform: rotate(45deg);
            -moz-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            -o-transform: rotate(45deg);
        }

        .chat li {
            margin: 15px 0;
        }

        .chat li.right .chat-body {
            /* margin-right: 70px; */
            background-color: #fff;
        }

        .chat-box {

            position: fixed;
            bottom: 0;
            left: 444px;
            right: 0;

            padding: 15px;
            border-top: 1px solid #eee;
            transition: all .5s ease;
            -webkit-transition: all .5s ease;
            -moz-transition: all .5s ease;
            -ms-transition: all .5s ease;
            -o-transition: all .5s ease;
        }

        .primary-font {
            color: #3c8dbc;
        }

        a:hover,
        a:active,
        a:focus {
            text-decoration: none;
            outline: 0;
        }
    </style>



    <div class="container bootstrap snippets bootdey">
        <div class="row">
            <div class="col-md-4 bg-white ">

                <input type="text" id="fromUser" value=<?php echo $_SESSION["userid"]; ?> hidden />
                <?php
                if (isset($_GET["toUser"]) && isset($_GET["firstname"]) && isset($_GET["lastname"])) {
                    $userName =  "SELECT * FROM userinfo Where (userid = " . $_GET['toUser'] . " AND firstname = '" . $_GET["firstname"] .  "' AND lastname = '" . $_GET["lastname"] . "')";
                    $usersql = mysqli_query($conn, $userName) or die(mysqli_error($conn));
                    $uName = mysqli_fetch_assoc($usersql);
                    echo '<input type="Text" value=' . $_GET["toUser"] . ' id="toUser" hidden/>';

                ?>
                <?php
                } else {
                ?> <div class=" row border-bottom padding-sm" style="height: 40px;">
                        Plese Select Chat, Or Go Match
                    </div> <?php } ?>


                Recent Chat History
                <ul class="friend-list">
                    <?php

                    $sql = "select * from userinfo , chatmessages
                    where userid not in (select blockuserid from blocklist where userid =  " . $_SESSION['userid'] . ") and userid = touser and userid != " . $_SESSION['userid'] . " and
                    id in (select max(id) from chatmessages group by touser) and
                    (fromuser = " . $_SESSION['userid'] . " or touser = " . $_SESSION['userid'] . ")                                      
                    UNION            
                    select * from userinfo , chatmessages
                    where userid not in (select blockuserid from blocklist where userid =  " . $_SESSION['userid'] . ") and userid = fromuser and userid != " . $_SESSION['userid'] . " and
                    id in (select max(id) from chatmessages group by touser) and
                    (fromuser = " . $_SESSION['userid'] . " or touser = " . $_SESSION['userid'] . ")                       
                    order by id desc ";
                    $msgs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    while ($msg = mysqli_fetch_assoc($msgs)) {
                    ?>

                        <li>
                            <a href="chat?toUser=<?= $msg['userid'] ?>&firstname=<?= $msg['firstname'] ?>&lastname=<?= $msg['lastname'] ?>" class="clearfix">
                                <?php
                                if (empty($msg['image'])) {
                                    $image = '<center><img src="./assets/image/defuserimage.png" class="img-circle" alt="user"></center>';
                                } else {
                                    $image = '<center><img src="data:image;base64,' . $msg['image'] . '"  class="img-circle" alt="user"></center>';
                                }
                                echo $image;
                                ?>

                                <div class="friend-name">
                                    <strong><?= $msg['firstname']; ?> <?= $msg['lastname']; ?></strong>

                                </div>
                                <div class="last-message text-muted"><?= $msg['message'] ?></div>
                                <!-- <small class="time text-muted">5 mins ago</small> -->
                                <!-- <small class="chat-alert text-muted"><i class="fa fa-check"></i></small> -->
                            </a>
                        </li>
                    <?php

                    }

                    ?>

                </ul>
            </div>

            <div class="col-md-8 bg-white ">
                <?php if (isset($uName["firstname"], $uName["lastname"])) {

                    echo '<div style="font-size:25px;">' . $uName["firstname"] . " " . $uName["lastname"] . '<i1 style="color:#585BAB; display: inline-block; float: right; " data-toggle="modal" data-target="#exampleModalCenter" class="fa fa-info-circle"></i1></div>';

                ?>

                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"><?= $uName["firstname"] . " " . $uName["lastname"] ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row">

                                            <? $sql = "SELECT * FROM  userinfo  WHERE userid = '" . $_GET['toUser'] . "' and firstname='" . $_GET['firstname'] . "' and lastname = '" . $_GET['lastname'] . "' ";
                                            $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                                            while ($rc = mysqli_fetch_assoc($rs)) {
                                                $userid = $rc['userid'];
                                                $email = $rc['email'];
                                                $firstname = $rc['firstname'];
                                                $lastname = $rc['lastname'];
                                                $birth = $rc['birth'];
                                                $gender = $rc['gender'];
                                                $personality = $rc['personality'];
                                                $occupation = $rc['occupation'];
                                                $interests = $rc['interests'];
                                                $userimage = $rc['image'];
                                            }

                                            $today = date("Y-m-d");
                                            $age = date_diff(date_create($birth), date_create($today));

                                            $sql1 = "select * from favoritelist where userid ='" . $_SESSION['userid'] . "' and addfavuserid = '" .  $userid  . "'";


                                            $favresult = $conn->query($sql1);


                                            if ($favresult->num_rows > 0) {
                                                $fav = '<form action="./action/adddelfavlist" method="POST" style="display: inline;"> 
                                                <input type="hidden" name="action" id="action" value="deletefavourite" />
                                                <input type="hidden" name="userid" id="userid" value=' . $_SESSION['userid'] . ' />
                                                <input type="hidden" name="addfavuserid"  id="addfavuserid" value=' . $userid . ' />
                                                <input type="submit" class="btn btn-outline-danger" value="♡ Favorite" ></form>';
                                            } else {
                                                $fav = '
                                                <form action="./action/adddelfavlist" method="POST" style="display: inline;"> 
                                                <input type="hidden" name="action" id="action" value="addfavourite" />
                                                <input type="hidden" name="userid" id="userid" value=' . $_SESSION['userid'] . ' />
                                                <input type="hidden" name="addfavuserid"  id="addfavuserid" value=' . $userid . ' />
                                                <input type="submit" class="btn btn-outline-dark" value="♡ Favorite" ></form>';
                                            }
                                            $blcok = '	<form action="./action/addblock" method="POST" style="display: inline;"> 
                                                <input type="hidden" name="action" id="action" value="addblock" />
                                                <input type="hidden" name="userid" id="userid" value=' . $_SESSION['userid'] . ' />
                                                <input type="hidden" name="blockuser"  id="blockuser" value=' . $userid . ' />
                                                <input type="submit" class="btn btn-outline-dark fa" value="&#xf023; Block" ></form>';

                                            ?>

                                            <div class="col-3">
                                                <? if (empty($userimage)) {
                                                    echo '<center><img src="./assets/image/defuserimage.png" class="card-img-top"  alt="user"></center>';
                                                } else {
                                                    echo '<center><img src="data:image;base64,' . $userimage . '"  class="card-img-top"  alt="user"></center>';
                                                }        ?>
                                            </div>
                                            <div class="col-6">
                                                FirstName: <?= $firstname ?><br>
                                                LastName: <?= $lastname ?><br>
                                                Age: <?= $age->format('%y'); ?><br>
                                                Gender: <?= $gender ?> <br>
                                                Personality: <?= $personality ?><br>
                                                Occupation: <?= $occupation ?><br>
                                                Interests: <?= $interests ?>
                                                <?= $blcok . ' &nbsp;' . $fav ?>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php

                } ?>
                <div class="chat-message overflow-auto" id="chat-message">

                    <?php



                    if (isset($_GET["toUser"]) && isset($_GET["firstname"]) && isset($_GET["lastname"])) {
                        $chatrecsql = "SELECT * FROM chatmessages where  (fromuser =" . $_SESSION['userid'] . " AND touser = " . $_GET["toUser"] . ")OR (fromuser =" . $_GET["toUser"] . " AND touser = " . $_SESSION['userid'] . ")";
                        $chatrec = mysqli_query($conn, $chatrecsql) or die(mysqli_error($conn));
                        while ($chat = mysqli_fetch_assoc($chatrec)) {
                            if ($chat["fromuser"] == $_SESSION['userid']) { ?>
                                <?= "<div style='text-align: right;'>
                    <p style='background-color:lightblue; word-wrap: break-word;display:inline-block; padding: 5px; border-radius:3px; width:auto; max width:70%;'>
                    " . $chat["message"] . "<Br><datetime style='font-size:1px'>" . $chat["datetime"] . "</datetime></p> </div>"; ?>

                                <?php } else { ?><?= "
                  <div class='comments'style='text-align: left;'>
              <p style='background-color:yellow; word-wrap: break-word;display:inline-block; padding: 5px; border-radius: 3px; max width:70%;'>
              " . $chat["message"] . "<Br><datetime style='font-size:1px'>" . $chat["datetime"] . "</datetime></p> </div>";
                                                }
                                            }
                                        } else {
                                            echo "<div class='alert alert-success' role='alert'>
                              <h4 class='alert-heading'><i class='fa fa-comments-o' aria-hidden='true'></i> Chat</a></h4>
                              <p>Please Select Recent Chat Users </p>
                              <hr>
                              <p class='mb-0'>Or Go To Match Users</p>
                            </div>";
                                        }
                                                    ?>

                                <?php
                                if (isset($_GET["toUser"]) && isset($_GET["firstname"]) && isset($_GET["lastname"])) {
                                ?>
                </div>


                <div class="input-group">
                    <input id="message" class="form-control border no-shadow no-rounded" placeholder="Type your message here">
                    <span class="input-group-btn">
                        <button class="btn btn-success no-rounded" id="send" type="button">Send</button>

                    </span>
                </div>
            <?php
                                }; ?>




            <div id="demo"></div>

            <br><br><br>


            <script type="text/javascript">
                $(document).ready(function() {

                    var input = document.getElementById("message");
                    input.addEventListener("keypress", function(event) {
                        if (event.key === "Enter") {
                            const button = document.getElementById('send')

                            let x = document.getElementById("message").value;
                            let text;
                            message
                            if (x == "") {
                                text = "Input not valid";
                                document.getElementById("demo").innerHTML = text;
                                return;
                            } else {
                                button.disabled = true
                                $.ajax({
                                    url: "./action/chatsendmessage",
                                    method: "POST",
                                    data: {
                                        fromuser: $("#fromUser").val(),
                                        touser: $("#toUser").val(),
                                        message: $("#message").val()
                                    },
                                    dateType: "text",
                                    success: function(data) {
                                        $('#message').val("")
                                        button.disabled = false
                                    }
                                });
                            }

                        }
                    });


                    $("#send").on("click", function() {
                        const button = document.getElementById('send')

                        let x = document.getElementById("message").value;
                        let text;
                        message
                        if (x == "") {
                            text = "Input not valid";
                            document.getElementById("demo").innerHTML = text;
                            return;
                        } else {
                            button.disabled = true
                            $.ajax({
                                url: "./action/chatsendmessage",
                                method: "POST",
                                data: {
                                    fromuser: $("#fromUser").val(),
                                    touser: $("#toUser").val(),
                                    message: $("#message").val()
                                },
                                dateType: "text",
                                success: function(data) {
                                    $('#message').val("")
                                    button.disabled = false
                                }
                            });
                        }
                    })


                    setInterval(function() {
                        $.ajax({
                            url: "./action/realTimeChat",
                            method: "POST",
                            data: {
                                fromuser: $("#fromUser").val(),
                                matchimage: $("#matchimage").val(),
                                userimage: $("#userimage").val(),
                                touser: $("#toUser").val()
                            },
                            dataType: "Text",
                            success: function(data) {
                                $("#chat-message").html(data)
                            }
                        });
                    }, 500);
                });
            </script>
            </body>

            </html>

            <!--                       
                      
                        <li class="left clearfix">
                            <span class="chat-img pull-left">
                                <img src="https://bootdey.com/img/Content/user_3.jpg" alt="User Avatar">
                            </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">John Doe</strong>
                                    <small class="pull-right text-muted"><i class="fa fa-clock-o"></i> 12 mins
                                        ago</small>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                            </div>
                        </li>
                        <li class="right clearfix">
                            <span class="chat-img pull-right">
                                <img src="https://bootdey.com/img/Content/user_1.jpg" alt="User Avatar">
                            </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">Sarah</strong>
                                    <small class="pull-right text-muted"><i class="fa fa-clock-o"></i> 13 mins
                                        ago</small>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales at.
                                </p>
                            </div>
                        </li>
                        <li class="left clearfix">
                            <span class="chat-img pull-left">
                                <img src="https://bootdey.com/img/Content/user_3.jpg" alt="User Avatar">
                            </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">John Doe</strong>
                                    <small class="pull-right text-muted"><i class="fa fa-clock-o"></i> 12 mins
                                        ago</small>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                            </div>
                        </li>
                        <li class="right clearfix">
                            <span class="chat-img pull-right">
                                <img src="https://bootdey.com/img/Content/user_1.jpg" alt="User Avatar">
                            </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">Sarah</strong>
                                    <small class="pull-right text-muted"><i class="fa fa-clock-o"></i> 13 mins
                                        ago</small>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales at.
                                </p>
                            </div>
                        </li>
                        <li class="right clearfix">
                            <span class="chat-img pull-right">
                                <img src="https://bootdey.com/img/Content/user_1.jpg" alt="User Avatar">
                            </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">Sarah</strong>
                                    <small class="pull-right text-muted"><i class="fa fa-clock-o"></i> 13 mins
                                        ago</small>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales at.
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
             
      </div>
    </div>
  </div>
</div>