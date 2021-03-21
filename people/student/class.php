<?php
include("../pack/include/data.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Narbon - Class</title>
    <link href="../pack/css/bootstrap.min.css" rel="stylesheet">
    <link href="../pack/css/font-awesome.min.css" rel="stylesheet">
    <link href="../pack/css/datepicker3.css" rel="stylesheet">
    <link href="../pack/css/styles.css" rel="stylesheet">

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php
include("panels/sidebar.php");
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="../student">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Class</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Class</h1>
        </div>
    </div><!--/.row-->

    <div class="panel panel-container">
        <?php
        include("panels/bar.php");
        ?>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    My Class
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span>
                </div>
                <div class="panel-body">
                    <h1 class="text-warning">Class Information</h1>
                    <hr>
                    <h4 class="text-primary">Teacher's name</h4>
                    <p class="text-success"><b><i class="fa fa-user"></i> <?php echo $teacher; ?></b></p>
                    <br>
                    <h4 class="text-primary"><i class="fa fa-link"></i> Class links</h4>
                    <p class="text-danger"><b>
                            <b class="text-primary"><i class="fa fa-skype"></i> Skype</b> | <b class="text-success"><i
                                        class="fa fa-whatsapp"></i> WhatsApp</b>
                    </p>
                    <br>
                    <h4 class="text-primary"><i class="fa fa-clock-o"></i> Class period</h4>
                    <p class="text-muted"><b class="text-danger"><?php echo $start; ?></b> until <b
                                class="text-success"><?php echo $end; ?></b></p>
                </div>
            </div>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Homework
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span>
                </div>
                <div class="panel-body">
                    <h1 class="text-warning">Session <?php echo $homeworksession; ?></h1>
                    <hr>
                    <h3 class="text-primary"><?php echo $homeworktitle; ?></h3>
                    <p class="text-success"><?php echo $homeworktext; ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    My Status
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span>
                </div>
                <div class="panel-body">
                    <h1 class="text-warning">Present or not !?</h1>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Session</th>
                                <th scope="col">Present</th>
                                <th scope="col">Absent</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        for ($i = 1 ; $i <= 16 ; $i++) {
                                            $session = "S".$i;
                                            if ($row[$session] == "p") {
                                                ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $i; ?></th>
                                                        <td><i class="fa fa-check text-success"></i></td>
                                                        <td></td>
                                                    </tr>
                                                <?php
                                                }
                                            elseif ($row[$session] == "a") {
                                                ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $i; ?></th>
                                                        <td></td>
                                                        <td><i class="fa fa-times text-danger"></i></td>
                                                    </tr>
                                                <?php
                                            }
                                            else {
                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $i; ?></th>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include("panels/footer.php");
    ?>
</div>    <!--/.main-->

<script src="../pack/js/jquery-1.11.1.min.js"></script>
<script src="../pack/js/bootstrap.min.js"></script>
<script src="../pack/js/chart.min.js"></script>
<script src="../pack/js/chart-data.js"></script>
<script src="../pack/js/easypiechart.js"></script>
<script src="../pack/js/easypiechart-data.js"></script>
<script src="../pack/js/bootstrap-datepicker.js"></script>
<script src="../pack/js/custom.js"></script>
<script>
    window.onload = function () {
        var chart1 = document.getElementById("line-chart").getContext("2d");
        window.myLine = new Chart(chart1).Line(lineChartData, {
            responsive: true,
            scaleLineColor: "rgba(0,0,0,.2)",
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleFontColor: "#c5c7cc"
        });
    };
</script>

</body>
</html>