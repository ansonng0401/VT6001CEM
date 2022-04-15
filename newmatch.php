<!-- <link href="./assets/CSS/bootstrap.min.css" rel="stylesheet"> -->
<?php


include 'header.php';
include('./action/conn.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Product filter in php</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <!-- Custom CSS -->
    <link href="./assets/CSS/matchstyle.css" rel="stylesheet">


    <!-- Custom CSS -->
   
</head>

<body>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <br />
           
            <br />
            <div class="col-md-3">
                <div class="list-group">
                    <h3>Age</h3>
                    <input type="hidden" id="hidden_minimum_age" value="0" />
                    <input type="hidden" id="hidden_maximum_age" value="120" />
                    <p id="age_show">0 - 120</p>
                    <div id="age_range"></div>
                </div>

                <div class="list-group">
                    <h3>Gender</h3>
                    <div>
                        <div class="list-group-item checkbox">
                            <label><input type="checkbox" class="common_selector gender" value="Male">Male</label>
                        </div>
                        <div class="list-group-item checkbox">
                            <label><input type="checkbox" class="common_selector gender" value="Female">Female</label>
                        </div>


                    </div>
                </div>


                <div class="list-group">
                    <h3>Interest</h3>
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                        <?php

                        $query = "SELECT DISTINCT(interests) FROM userinfo ORDER BY userid DESC";
                        $statement = $connect->prepare($query);
                        $statement->execute();
                        $result = $statement->fetchAll();
                        foreach ($result as $row) {
                        ?>
                        <div class="list-group-item checkbox">
                            <label><input type="checkbox" class="common_selector inter"
                                    value="<?php echo $row['interests']; ?>"> <?php echo $row['interests']; ?></label>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>

                <div class="list-group">
                    <h3>Occupation</h3>
                    <?php
                    $query = "SELECT DISTINCT(occupation) FROM userinfo ORDER BY occupation DESC";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach ($result as $row) {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector occ"
                                value="<?php echo $row['occupation']; ?>">
                            <?php echo $row['occupation']; ?></label>
                    </div>
                    <?php
                    }
                    ?>
                </div>

                <div class="list-group">
                    <h3>Big Five Personality</h3>
                    <?php
                    $query = "SELECT DISTINCT(personality) FROM userinfo ORDER BY personality ASC";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach ($result as $row) {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector personality"
                                value="<?php echo $row['personality']; ?>"> <?php echo $row['personality']; ?></label>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <div class="col-md-9">
                <br />
                <div class="row filter_data">

                </div>
            </div>
        </div>

    </div>
    <style>
    #loading {
        text-align: center;
        background: url('./assets/image/loader.gif') no-repeat center;
        height: 150px;
    }
    </style>

    <script>
    $(document).ready(function() {

        filter_data();

        function filter_data() {
            $('.filter_data').html('<div id="loading" style="" ></div>');
            var action = 'fetch_data';
            var minimum_age = $('#hidden_minimum_age').val();
            var maximum_age = $('#hidden_maximum_age').val();
            var inter = get_filter('inter');
            var occ = get_filter('occ');
            var gender = get_filter('gender');
            var personality = get_filter('personality');
            $.ajax({
                url: "fetch_data.php",
                method: "POST",
                data: {
                    action: action,
                    minimum_age: minimum_age,
                    maximum_age: maximum_age,
                    inter: inter,
                    occ: occ,
                    gender: gender,
                    personality: personality
                },
                success: function(data) {
                    $('.filter_data').html(data);
                }
            });
        }

        function get_filter(class_name) {
            var filter = [];
            $('.' + class_name + ':checked').each(function() {
                filter.push($(this).val());
            });
            return filter;
        }

        $('.common_selector').click(function() {
            filter_data();
        });

        $('#age_range').slider({
            range: true,
            min: 0,
            max: 120,
            values: [0, 120],
            step: 5,
            stop: function(event, ui) {
                $('#age_show').html(ui.values[0] + ' - ' + ui.values[1]);
                $('#hidden_minimum_age').val(ui.values[0]);
                $('#hidden_maximum_age').val(ui.values[1]);
                filter_data();
            }
        });

    });
    </script>

</body>

</html>