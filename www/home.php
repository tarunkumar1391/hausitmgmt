<?php
session_start();
?>
<?php
if(!isset($_SESSION['name']))
{
    header("location: index.php");
}
$name=$_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Haus IT Management</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <script src="../scripts/angular.min.js"></script>
        <script src="../scripts/ui-bootstrap-tpls-2.0.0.min.js"></script>
        <script src="../scripts/angular-animate.min.js"></script>
        <script src="../scripts/angular-filter.min.js"></script>
        <script src="../scripts/control.js"></script>
        <script src="../scripts/inventoryControl.js"></script>
        <script src="../scripts/softlicenseControl.js"></script>
        <script src="../scripts/switchpatchControl.js"></script>
        <script src="../scripts/jquery-3.1.1.min.js"></script>
        <script src="../scripts/tether.min.js"></script>
        <script src="../scripts/bootstrap.min.js"></script>
<!--        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>



    </head>
    <body ng-app="hausIt">
        <div class="container-fluid">
            <div class="row">
                <nav class="navbar navbar-inverse navbar-fixed-top ">
                    <div class="container-fluid ">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">Haus-It Management</a>
                        </div>
                        <div class="collapse navbar-collapse" id="myNavbar">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="home.php">Home</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo "$name";?></a></li>
                                <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="row tabpad">
                <div class="col-md-12 col-lg-12">
                    <ul class="nav nav-tabs ">
                        <li class="active"><a data-toggle="tab" href="#userMgmt">User Management</a></li>
                        <li><a data-toggle="tab" href="#softLicensemgmt">Software License Mangement</a></li>
                        <li><a data-toggle="tab" href="#invMgmt">Inventory Management</a></li>
                        <li><a data-toggle="tab" href="#swtPatchMgmt">Switching & Patching</a></li>
                    </ul>

                    <div class="tab-content">
                        <!-- Start of User management section -->
                        <div id="userMgmt" class="tab-pane fade in active">
                            <div class="col-md-2 col-lg-2" >
                                <ul class="nav nav-pills nav-stacked sidenavpad">
                                    <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                                    <li><a data-toggle="tab" href="#test2">Menu 1</a></li>
                                    <li><a data-toggle="tab" href="#test3">Menu 2</a></li>
                                    <li><a data-toggle="tab" href="#test4">Menu 3</a></li>
                                </ul>
                            </div>
                            <div class="col-md-10 col-lg-10">
                                <div class="tab-content contentpad">
                                    <div id="home" class="tab-pane fade"><h3>Home</h3></div>
                                    <div id="test2" class="tab-pane fade"><h3>Test 1</h3></div>
                                    <div id="test3" class="tab-pane fade"><h3>Test 2</h3></div>
                                    <div id="test4" class="tab-pane fade"><h3>Test 3</h3></div>
                                </div>
                            </div>

                        </div>
                        <!-- End of User management section -->
                        <!-- Start of software license management system -->
                        <div id="softLicensemgmt" class="tab-pane fade" ng-app="softlicense">
                            <?php include '../views/softlicense/html/index.html';?>
                        </div>
                        <!-- End of software license management system -->
                        <div id="invMgmt" class="tab-pane fade" ng-app="inventoryApp">
                            <script>
                                function entry() {
                                    var entryType = document.getElementById("entType");
                                    var devQuantity = document.getElementById("devQuant");
                                    if (entryType.value != "Single"){
                                        devQuantity.value = "";
                                        devQuantity.disabled = "";

                                    }else {
                                        devQuantity.value = 1;
                                        devQuantity.disabled = "true";
                                    }
                                }
                                function assign(){
                                    var availStock = document.getElementById("avaStock");
                                    var hardQty = document.getElementById("hrdQty");

                                    if(availStock.value != 1){
                                        hardQty.disabled = "";
                                    }else{
                                        hardQty.disabled = "true";
                                        hardQty.value = 1;
                                    }
                                }
                            </script>
                            <?php include '../views/inventory/html/index.html';?>
                        </div>
                        <div id="swtPatchMgmt" class="tab-pane fade" ng-app="switchpatch">
                            <?php include '../views/switchpatch/html/index.html';?>
                        </div>
                    </div>

            </div>
        </div>


    </body>
</html>