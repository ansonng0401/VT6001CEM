<!DOCTYPE html>
<?php 
include 'header.php';
?>

</head>
<link href="./assets/CSS/testpg.css" rel="stylesheet">

<body>
    <div class="size">
</body>


<div class="mx-0 mx-sm-auto">
    <div class="card">
        <div class="card-body">
            <div class="text-center">
                <i class="far fa-file-alt fa-4x mb-3 text-primary"></i>
                <p>
                    <strong>Personality Test</strong>
                </p>
                <p>
                    1. I Am the life of the party.
                </p>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                </div>
            </div>
            <hr />
  
            <?php 

if (isset($_SESSION['Q1'])) {
    echo"
    <form action=\"p2.php\" method=\"POST\">";
    if ($_SESSION['Q1']==0){
    echo"
    <div class=\"form-check mb-2\">
        <input class=\"form-check-input\" value=\"0\" type=\"radio\" name=\"Q1\" id=\"radio2Example1\" required=\"required\" checked/>
        <label class=\"form-check-label\" for=\"radio2Example1\">
            Not at all
        </label>
    </div>
";}else{
    echo"
    <div class=\"form-check mb-2\">
    <input class=\"form-check-input\" value=\"0\" type=\"radio\" name=\"Q1\" id=\"radio2Example1\" required=\"required\" />
    <label class=\"form-check-label\" for=\"radio2Example1\">
        Not at all
    </label>
</div>

    ";
};
if ($_SESSION['Q1']==1){
    echo"
    <div class=\"form-check mb-2\">
        <input class=\"form-check-input\" value=\"1\" type=\"radio\" name=\"Q1\" id=\"radio2Example2\" required=\"required\" checked/>
        <label class=\"form-check-label\" for=\"radio2Example2\">
            Slightly disagree
        </label>
    </div>
    </label>
    ";}else{
echo"
        <div class=\"form-check mb-2\">
        <input class=\"form-check-input\" value=\"1\" type=\"radio\" name=\"Q1\" id=\"radio2Example2\" required=\"required\" />
        <label class=\"form-check-label\" for=\"radio2Example2\">
            Slightly disagree
            </label>
            </div>
            </label>
        ";       
    };
    if  ($_SESSION['Q1']==2){
        echo"
    <div class=\"form-check mb-2\">
        <input class=\"form-check-input\" value=\"2\" type=\"radio\" name=\"Q1\" id=\"radio2Example3\" / required=\"required\" checked>
        <label class=\"form-check-label\" for=\"radio2Example3\">
            Neutral
        </label>
    </div>  ";}else{ echo"
        <div class=\"form-check mb-2\">
        <input class=\"form-check-input\" value=\"2\" type=\"radio\" name=\"Q1\" id=\"radio2Example3\" required=\"required\" />
        <label class=\"form-check-label\" for=\"radio2Example3\">
            Neutral
        </label>
    </div>  ";       
}; if  ($_SESSION['Q1']==3){
echo"
    <div class=\"form-check mb-2\">
        <input class=\"form-check-input\" value=\"3\" type=\"radio\" name=\"Q1\" id=\"radio2Example4\" / required=\"required\" checked>
        <label class=\"form-check-label\" for=\"radio2Example4\">
            Slightly
        </label>
    </div>
";}else{ echo"
    <div class=\"form-check mb-2\">
        <input class=\"form-check-input\" value=\"3\" type=\"radio\" name=\"Q1\" id=\"radio2Example4\" required=\"required\" />
        <label class=\"form-check-label\" for=\"radio2Example4\">
            Slightly
        </label>
    </div>       
    "; 
}; 
if ($_SESSION['Q1']==4){
    echo"
    <div class=\"form-check mb-2\">
        <input class=\"form-check-input\" value=\"4\" type=\"radio\" name=\"Q1\" id=\"radio2Example5\" required=\"required\" / checked>
        <label class=\"form-check-label\" for=\"radio2Example5\">
            Agree
        </label>
    </div>
</div>
";}else{ echo" 
    <div class=\"form-check mb-2\">
        <input class=\"form-check-input\" value=\"4\" type=\"radio\" name=\"Q1\" id=\"radio2Example5\"required=\"required\" />
        <label class=\"form-check-label\" for=\"radio2Example5\">
            Agree
        </label>
    </div>
</div>

    "; 
}; 
echo"
<div class=\"card-footer text-end\">
<input type=\"submit\"  class=\"btn btn-primary\" value=\"Next\"  />
</div>
</form>
</div>
";


} else {
    echo"
    <form  action=\"p2.php\" method=\"POST\">

    <div class=\"form-check mb-2\">
        <input class=\"form-check-input\" value=\"0\" type=\"radio\" name=\"Q1\" id=\"radio2Example1\" required=\"required\" />
        <label class=\"form-check-label\" for=\"radio2Example1\">
            Not at all
        </label>
    </div>
    <div class=\"form-check mb-2\">
        <input class=\"form-check-input\" value=\"1\" type=\"radio\" name=\"Q1\" id=\"radio2Example2\" required=\"required\" />
        <label class=\"form-check-label\" for=\"radio2Example2\">
            Slightly disagree
        </label>
    </div>
    </label>
    <div class=\"form-check mb-2\">
        <input class=\"form-check-input\" value=\"2\" type=\"radio\" name=\"Q1\" id=\"radio2Example2\" required=\"required\" />
        <label class=\"form-check-label\" for=\"radio2Example2\">
            Neutral
        </label>
    </div>
    <div class=\"form-check mb-2\">
        <input class=\"form-check-input\" value=\"3\" type=\"radio\" name=\"Q1\" id=\"radio2Example3\" required=\"required\" />
        <label class=\"form-check-label\" for=\"radio2Example3\">
            Slightly
        </label>
    </div>

    <div class=\"form-check mb-2\">
        <input class=\"form-check-input\" value=\"4\" type=\"radio\" name=\"Q1\" id=\"radio2Example4\" required=\"required\" />
        <label class=\"form-check-label\" for=\"radio2Example4\">
            Agree
        </label>
    </div>
</div>
<div class=\"card-footer text-end\">
<input type=\"submit\"  class=\"btn btn-primary\" value=\"Next\"  />
</div>
</form>
</div>

";
}
?>




        </div>
    </div>

    </html>