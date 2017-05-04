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
        <?php include 'include.php';?>
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
                                <li><a href="home.php">Home</a></li>
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
                        <li ><a data-toggle="tab" href="#userMgmt">User Management</a></li>
                        <li><a data-toggle="tab" href="#softLicensemgmt">Software License Mangement</a></li>
                        <li><a data-toggle="tab" href="#invMgmt">Inventory Management</a></li>
                        <li><a data-toggle="tab" href="#swtPatchMgmt">Switching & Patching</a></li>
                        <li><a data-toggle="tab" href="#logMgmt">Logs</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="welcome tab-pane fade in active"><h3>Welcome to the IKP Management console!!!</h3></div>
                        <!-- Start of User management section -->
                        <div id="userMgmt" class="tab-pane fade" ng-app="usersManage">
                            <div class="col-md-2 col-lg-2" >
                                <ul class="nav nav-pills nav-stacked sidenavpad">
                                    <li><a data-toggle="tab" href="#addUser">Register</a></li>
                                    <li><a data-toggle="tab" href="#updateUser">View</a></li>
                                </ul>
                            </div>
                            <div class="col-md-10 col-lg-10">
                                <div class="tab-content contentpad">
                                    <div class="welcome tab-pane fade in active"><h3>Welcome to Haus IT User Management</h3></div>
                                    <div id="addUser" class="tab-pane fade">
                                        <?php include '../views/users/html/index.html';?>
                                    </div>
                                    <div id="updateUser" class="tab-pane fade">
                                        <?php include '../views/users/html/update.html';?>
                                    </div>

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
                        <!-- End of Switch patching management system -->
                        <div id="logMgmt" class="tab-pane fade" ng-app="logging">
                            <?php include '../views/logs/html/index.html';?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        var dofalloc = document.getElementById("dalloc1");
        var dofallocfinal = document.getElementById("dalloc");
        var licenseExpiry = document.getElementById("lexpiry1");
        var licenseExpiryfinal = document.getElementById("lexpiry");
        var dateofPurch = document.getElementById("dop1");
        var dateofPurchfinal = document.getElementById("dop");
        function dateofalloc() {

            dofallocfinal.value = dofalloc.value;
        }
        function licenseexpr(){
            licenseExpiryfinal.value = licenseExpiry.value ;
        }
        function dateofpurchase() {
            dateofPurchfinal.value = dateofPurch.value;
        }
    </script>
</html>