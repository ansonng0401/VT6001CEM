<!-- <link href="./assets/CSS/bootstrap.min.css" rel="stylesheet"> -->
<?php


include 'header.php';
include('./action/conn.php');
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!-- Custom CSS -->
<link href="./assets/CSS/matchstyle.css" rel="stylesheet">


<!-- Custom CSS -->

</head>

<body>
    <!-- Page Content -->
    <br>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="matchingmainpage">Matching Home Page</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fa">&#xf002;</i> Search & Filter</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-3">

                <br>


                <div>


                    <div>

                        <div>


                            <div class="card">

                                <div class="card">
                                    <article class="filter-group">
                                        <header class="card-header">
                                            <h6>Filter <a href="#" data-toggle="collapse" data-target=".multi-collapse"
                                                    aria-expanded="false" aria-controls=""> <i
                                                        class="icon-control fa fa-chevron-down"></i>
                                                </a></h6>

                                    </article>







                                    <article class="filter-group">
                                        <header class="card-header">

                                            <a data-toggle="collapse" href="#multiCollapseExample1"
                                                aria-expanded="false" aria-controls="multiCollapseExample1">
                                                <h6 class="title">Age <i class="icon-control fa fa-chevron-down"></i>
                                                </h6>
                                            </a>
                                        </header>
                                        <div class="collapse multi-collapse" id="multiCollapseExample1">
                                            <div class="card-body">
                                                <input type="hidden" id="hidden_minimum_age" value="0" />
                                                <input type="hidden" id="hidden_maximum_age" value="120" />
                                                <p id="age_show">0 - 120</p>
                                                <div id="age_range"></div>

                                            </div>
                                        </div>
                                    </article>
                                    <article class="filter-group">
                                        <header class="card-header">
                                            <a data-toggle="collapse" href="#multiCollapseExample2"
                                                aria-expanded="false" aria-controls="multiCollapseExample2">
                                                <h6 class="title">Gender <i class="icon-control fa fa-chevron-down"></i>
                                                </h6>
                                            </a>
                                        </header>
                                        <div class="collapse multi-collapse" id="multiCollapseExample2">
                                            <div class="card-body">
                                                <div class="list-group">


                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            class="form-check-input common_selector gender"
                                                            value="Male">
                                                        <label class="form-check-label" for="flexCheckChecked">
                                                            Male
                                                        </label>
                                                        <br>
                                                        <input type="checkbox"
                                                            class="form-check-input common_selector gender"
                                                            value="Female">
                                                        <label class="form-check-label" for="flexCheckChecked">
                                                            Female
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                    </article>
                                    <article class="filter-group">
                                        <header class="card-header">
                                            <a data-toggle="collapse" href="#multiCollapseExample3"
                                                aria-expanded="false" aria-controls="multiCollapseExample3">
                                                <h6 class="title">Big Five Personality <i
                                                        class="icon-control fa fa-chevron-down"></i></h6>
                                            </a>
                                        </header>
                                        <div class="collapse multi-collapse" id="multiCollapseExample3">
                                            <div class="card-body">
                                                <div class="list-group">
                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            class="form-check-input common_selector personality"
                                                            value="Openness to experience">
                                                        <label class="form-check-label" for="flexCheckChecked">
                                                            Openness to experience
                                                        </label>
                                                        <br>

                                                        <input type="checkbox"
                                                            class="form-check-input common_selector personality"
                                                            value="Conscientiousness">
                                                        <label class="form-check-label" for="flexCheckChecked">
                                                            Conscientiousness
                                                        </label>
                                                        <br>
                                                        <input type="checkbox"
                                                            class="form-check-input common_selector personality"
                                                            value="Extroversion">
                                                        <label class="form-check-label" for="flexCheckChecked">
                                                            Extroversion
                                                        </label>
                                                        <br>
                                                        <input type="checkbox"
                                                            class="form-check-input common_selector personality"
                                                            value="Agreeableness">
                                                        <label class="form-check-label" for="flexCheckChecked">
                                                            Agreeableness
                                                        </label>
                                                        <br>
                                                        <input type="checkbox"
                                                            class="form-check-input common_selector personality"
                                                            value="Neuroticism">
                                                        <label class="form-check-label" for="flexCheckChecked">
                                                            Neuroticism
                                                        </label>
                                                    </div> <!-- card-body.// -->
                                                </div>
                                            </div>
                                    </article>

                                    <article class="filter-group">
                                        <header class="card-header">
                                            <a data-toggle="collapse" href="#multiCollapseExample4"
                                                aria-expanded="false" aria-controls="multiCollapseExample4">
                                                <h6 class="title">Interest <i
                                                        class="icon-control fa fa-chevron-down"></i></h6>
                                            </a>
                                        </header>
                                        <div class="collapse multi-collapse" id="multiCollapseExample4">
                                            <div class="card-body">
                                                <div class="list-group">

                                                    <div class="form-check">
                                                        <div>
                                                            <input type="checkbox"
                                                                class="form-check-input common_selector inter"
                                                                value="Read">Read<br>
                                                            <input type="checkbox"
                                                                class="form-check-input common_selector inter"
                                                                value="Sports">Sports<br>
                                                            <input type="checkbox"
                                                                class="form-check-input common_selector inter"
                                                                value="Cooking">Cooking<br>
                                                            <input type="checkbox"
                                                                class="form-check-input common_selector inter"
                                                                value="Food & Drink">Food & Drink<br>
                                                            <input type="checkbox"
                                                                class="form-check-input common_selector inter"
                                                                value="Travel">Travel<br>
                                                            <input type="checkbox"
                                                                class="form-check-input common_selector inter"
                                                                value="Music">Music<br>
                                                            <input type="checkbox"
                                                                class="form-check-input common_selector inter"
                                                                value="Clothing">Clothing<br>
                                                            <input type="checkbox"
                                                                class="form-check-input common_selector inter"
                                                                value="Pets">Pets
                                                        </div>
                                                    </div>
                                                </div>
                                    </article>
                                    <article class="filter-group">
                                        <header class="card-header">
                                            <a data-toggle="collapse" href="#multiCollapseExample5"
                                                aria-expanded="false" aria-controls="multiCollapseExample5">

                                                <h6 class="title">Occupation <i
                                                        class="icon-control fa fa-chevron-down"></i></h6>
                                            </a>
                                        </header>
                                        <div class="collapse multi-collapse" id="multiCollapseExample5">
                                            <div class="card-body">
                                                <div class="list-group">
                                                    <div class="list-group">

                                                        <div class="form-check">
                                                            <div>
                                                                <?php
                                                                $query = "SELECT DISTINCT(occupation) FROM userinfo ORDER BY occupation DESC";
                                                                $statement = $connect->prepare($query);
                                                                $statement->execute();
                                                                $result = $statement->fetchAll();
                                                                foreach ($result as $row) {
                                                                ?>

                                                                <input type="checkbox"
                                                                    class="form-check-input common_selector occ"
                                                                    value="<?php echo $row['occupation']; ?>">
                                                                <?php echo $row['occupation']; ?><Br>

                                                                <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                    </article>
                                </div>

                            </div>

                        </div>
                    </div>

                </div> <!-- card.// -->


            </div>

            <div class="col-md-9">
                <br />
                <div class="row filter_data">

                </div>
            </div>
        </div>
        <br><br>
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
            $('.filter_data').html('<center><div id="loading" style="" ></div></center>');
            var action = 'fetch_data';
            var minimum_age = $('#hidden_minimum_age').val();
            var maximum_age = $('#hidden_maximum_age').val();
            var inter = get_filter('inter');
            var occ = get_filter('occ');
            var gender = get_filter('gender');
            var personality = get_filter('personality');
            $.ajax({
                url: "fetch_data",
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