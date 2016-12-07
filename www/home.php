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
        <title>Bootstrap Case</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
        <script>

        </script>


    </head>
    <body>
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
                        <div id="softLicensemgmt" class="tab-pane fade">
                            <div class="col-md-2 col-lg-2 ">
                                <ul class="nav nav-pills nav-stacked sidenavpad">
                                    <li class="active"><a data-toggle="tab" href="#viewEntries">Dasboard</a></li>
                                    <li><a data-toggle="tab" href="#newEntry">Register a software</a></li>
                                    <li><a data-toggle="tab" href="#allocateLicense">Allocate license</a></li>
                                    <li><a data-toggle="tab" href="#purchasehistory">Purchase history</a></li>

                                </ul>
                            </div>
                            <div class="col-md-10 col-lg-10">
                                <div class="tab-content contentpad">
                                    <div id="newEntry" class="tab-pane fade">
                                        <div class="container">
                                            <form role="form" class="form-horizontal" action="../server/main.php" method="post">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2" >Name of the software:</label>
                                                    <div class="col-lg-8 col-md-8">
                                                        <input type="text" class="form-control" name="sname" placeholder="Enter name of the software" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2" >Date of purchase:</label>
                                                    <div class="col-lg-8 col-md-8">
                                                        <input type="date" class="form-control" name="dop" placeholder="Choose the date of purchase" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Type of license:</label>
                                                    <div class="col-lg-8 col-md-8">
                                                        <select class="form-control" name="tol" placeholder="Choose the type of license" required>
                                                            <option>Choose an option...</option>
                                                            <option value="Multi user">Multi-User</option>
                                                            <option value="Single user">Single-User</option>
                                                            <option value="Volume">Volume</option>
                                                            <option value="Free">Free</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2" >Price:</label>
                                                    <div class="col-lg-8 col-md-8">
                                                        <input type="text" class="form-control" name="price" placeholder="Enter price of the product" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2" >Vendor name:</label>
                                                    <div class="col-lg-8 col-md-8">
                                                        <input type="text" class="form-control" name="vname" placeholder="Enter name of the vendor" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2" >No. of keys/licenses:</label>
                                                    <div class="col-lg-8 col-md-8">
                                                        <input type="number" class="form-control" name="nok" placeholder="Enter only no. of licenses/keys" min="1" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2" >Order No:</label>
                                                    <div class="col-lg-8 col-md-8">
                                                        <input type="text" class="form-control" name="ordernum" placeholder="Enter the order number" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2" >Kostenstelle:</label>
                                                    <div class="col-lg-8 col-md-8">
                                                        <input type="text" class="form-control" name="kostenstelle" placeholder="Kostenstelle number" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2" >Description:</label>
                                                    <div class="col-lg-8 col-md-8">
                                                        <textarea class="form-control" name="desc" placeholder="Additional comments"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                        <button type="reset" class="btn btn-default">Cancel</button>
                                                    </div>
                                                </div>



                                            </form>
                                        </div>

                                    </div>
                                    <!--view Dashboard-->
                                    <div id="viewEntries" class="tab-pane fade in active" ng-controller="allotedController">
                                        <form class="form" role="form"> <!-- search field(incomplete) size="78"-->

                                            <div class="form-group ">
                                                <input type="text" class="form-control"  type="text"  placeholder="Search... " ng-model="allotSearch">
                                            </div>

                                        </form>
                                        <div class="table-responsive">
                                            <table class="table table-hover" >
                                                <thead>
                                                <tr>
                                                    <th>Sno</th>
                                                    <th>Software</th>
                                                    <th>No. of keys alloted</th>
                                                    <th>Alloted to</th>
                                                    <th>Email</th>
                                                    <th>MAC</th>
                                                    <th>Room No</th>
                                                    <th>Group</th>
                                                    <th>Date of allocation</th>
                                                    <th>Date of Expiry</th>
                                                    <th>Comments</th>
                                                </tr>
                                                </thead>
                                                <tbody >
                                                <tr ng-repeat="entry in entries | filter: allotSearch | orderBy:'-'">
                                                    <td>{{entry.Sno}}</td>
                                                    <td>{{entry.selectedSoft}}</td>
                                                    <td>{{entry.nokl}}</td>
                                                    <td>{{entry.nameofRequester}}</td>
                                                    <td>{{entry.email}}</td>
                                                    <td>{{entry.mac_device}}</td>
                                                    <td>{{entry.requester_roomNo}}</td>
                                                    <td>{{entry.requester_groupName}}</td>
                                                    <td>{{entry.dateofAlloc}}</td>
                                                    <td>{{entry.licenseExpiry}}</td>
                                                    <td>{{entry.Comments}}</td>

                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!--Allocating license-->
                                    <div id="allocateLicense" class="tab-pane fade">
                                        <div class="container">
                                            <form role="form" class="form-horizontal" action="../server/softallocation.php" method="post" ng-controller="allocController">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2" >Select a software:</label>
                                                    <div class="col-lg-8 col-md-8">
                                                        <select class="form-control" name="sas" required ng-model="p" ng-options="c.Sname for c in softlist track by c.Sno"></select>
                                                        <input type="hidden" name="sas" ng-model="p.Sname" value="{{p.Sname}}">
                                                        <input type="hidden" name="softid" ng-model="p.Sno" value="{{p.Sno}}">
                                                        <input type="hidden" name="origkeys" ng-model="p.Nok" value="{{p.Nok}}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2" >No. of keys/license:</label>
                                                    <div class="col-lg-8 col-md-8">
                                                        <input type="number" class="form-control" name="nokl" placeholder="Enter only the no. of licenses/keys required" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Software requester:</label>
                                                    <div class="col-lg-8 col-md-8">
                                                        <input type="text" class="form-control" name="softreq" placeholder="Enter the name of the requester" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Email:</label>
                                                    <div class="col-lg-8 col-md-8">
                                                        <input type="email" class="form-control" name="requester_email" placeholder="Enter email address. Prefferably ikp email" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">MAC of PC/Laptop:</label>
                                                    <div class="col-lg-8 col-md-8">
                                                        <input type="text" class="form-control" name="mac_device" placeholder="Enter the MAC of the device" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Room no:</label>
                                                    <div class="col-lg-8 col-md-8">
                                                        <input type="text" class="form-control" name="requester_roomNo" placeholder="Enter the room no" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Group name:</label>
                                                    <div class="col-lg-8 col-md-8">
                                                        <input type="text" class="form-control" name="requester_groupName" placeholder="Enter the group name" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2" >Date of allocation:</label>
                                                    <div class="col-lg-8 col-md-8">
                                                        <input type="date" class="form-control" name="dalloc" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2" >License expires on:</label>
                                                    <div class="col-lg-8 col-md-8">
                                                        <input type="date" class="form-control" name="lexpiry" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2" >Comments:</label>
                                                    <div class="col-lg-8 col-md-8">
                                                        <textarea class="form-control" name="comm" placeholder="Additional comments"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                        <button type="reset" class="btn btn-default">Cancel</button>
                                                    </div>
                                                </div>



                                            </form>
                                        </div>

                                    </div>
                                    <!--purchase history-->
                                    <div id="purchasehistory" class="tab-pane fade">
                                        <form class="form" role="form"> <!-- search field(incomplete) size="78"-->

                                            <div class="form-group ">
                                                <input type="text" class="form-control"  type="text"  placeholder="Search... " ng-model="softSearch">
                                            </div>

                                        </form>
                                        <div class="table-responsive">
                                            <table class="table table-hover" ng-controller = "regsoftController">
                                                <thead>
                                                <tr>
                                                    <th>Sno</th>
                                                    <th>Software</th>
                                                    <th>Date of Purchase</th>
                                                    <th>Type of License</th>
                                                    <th>No. of keys/licenses left</th>
                                                    <th>Kostenstelle</th>
                                                    <th>Description</th>
                                                </tr>
                                                </thead>
                                                <tbody >
                                                <tr ng-repeat="entry in entries | filter: softSearch | orderBy:'-'">
                                                    <td>{{entry.Sno}}</td>
                                                    <td>{{entry.Sname}}</td>
                                                    <td>{{entry.Dop}}</td>
                                                    <td>{{entry.Tol}}</td>
                                                    <td>{{entry.Nok}}</td>
                                                    <td>{{entry.kostenstelle}}</td>
                                                    <td>{{entry.Description}}</td>

                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of software license management system -->
                        <div id="invMgmt" class="tab-pane fade">
                            <div class="col-md-2 col-lg-2 ">
                                <ul class="nav nav-pills nav-stacked sidenavpad">
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Inventory<span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a data-toggle="tab" href="#addtoInvetory">Add</a></li>
                                            <li><a data-toggle="tab" href="#viewInventory">View</a></li>
                                            <li><a data-toggle="tab" href="#UpdateInventory">Update</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Assignments<span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a data-toggle="tab" href="#viewAssignments">View</a></li>
                                            <li><a data-toggle="tab" href="#updateAssignments">Update</a></li>
                                        </ul>
                                    </li>

                                </ul>
                            </div>
                            <div class="col-md-10 col-lg-10">
                                <div class="tab-content contentpad">
                                    <div class="welcome tab-pane fade in active"><h3>Welcome to the IKP Inventory!!!</h3></div>
                                    <div id="addtoInvetory" class="tab-pane fade ">
                                        <!--Device registration-->
                                        <div class="container">
                                            <form role="form" class="form-horizontal" action="../server/addinventory.php" method="post" ng-controller="addinventoryController" >
                                                <h3>Add to Inventory</h3>
                                                <div class="divider"></div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-2 col-lg-2" >Device category:</label>
                                                    <div class="col-lg-6 col-md-6">
                                                        <select class="form-control" name="devCategory" placeholder="Choose a catergory" ng-model="devCat">
                                                            <option  ng-selected="true" value="">Choose a catergory...</option>
                                                            <option ng-repeat="cat in category | unique:'Category'">{{cat.Category}}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-2 col-lg-2" >Choose device :</label>
                                                    <div class="col-lg-6 col-md-6">
                                                        <select class="form-control" name="deviceType" placeholder="Choose an option that perfectly matches the device or choose the closest one " ng-model="devNg" required>
                                                            <option ng-disabled="true" ng-selected="true" value="">Choose a Device...</option>
                                                            <option ng-repeat="dev in device | unique:'dev' | filter:{Category:devCat}">{{dev.dev}}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-2 col-lg-2">Brand name :</label>
                                                    <div class="col-lg-6 col-md-6">
                                                        <input type="text" class="form-control" name="brandName" placeholder="Enter Brand Name" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-2 col-lg-2">Quantity:</label>
                                                    <div class="col-lg-6 col-md-6">
                                                        <input type="number" class="form-control" id="devQuant" name="devQuantity" min="1" placeholder="Enter quantity" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-2 col-lg-2">Condition :</label>
                                                    <div class="col-lg-6 col-md-6">
                                                        <select class="form-control" name="deviceCondition" placeholder="Choose whether the device is new/old/refurbished" required>
                                                            <option ng-disabled="true" ng-selected="true" value="">choose a device condition</option>
                                                            <option value="Old">Old</option>
                                                            <option value="New">New</option>
                                                            <option value="Refurbished">Refurbished</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-2 col-lg-2" >Description:</label>
                                                    <div class="col-lg-6 col-md-6">
                                                        <textarea  class="form-control" name="deviceDesc" placeholder="Provide device description or any information pertaining to the device..." required></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-offset-2 col-md-10 col-lg-offset-2 col-lg-10">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                        <button type="reset" class="btn btn-default">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div id="viewInventory" class="tab-pane fade">
                                        <div class="container">
                                            <form class="form" role="form"> <!-- search field(incomplete) size="78"-->
                                                <div class="form-group ">
                                                    <input type="text" class="form-control"  type="text"  placeholder="Search... " ng-model="inventSearch">
                                                </div>

                                            </form>
                                            <div class="table-responsive">
                                                <table class="table table-hover" ng-controller = "viewInventoryController">
                                                    <thead>
                                                    <tr>
                                                        <th>Sno</th>
                                                        <th>Category</th>
                                                        <th>Device</th>
                                                        <th>Brand</th>
                                                        <th>Stock</th>
                                                        <th>Currently Available</th>
                                                        <th>Condition</th>
                                                        <th>Description</th>
                                                        <th>QR Data</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody >
                                                    <tr ng-repeat="entry in entries | filter: inventSearch" ng-click = "open('lg');">
                                                        <td>{{entry.Sno}}</td>
                                                        <td>{{entry.devCategory}}</td>
                                                        <td>{{entry.devName}}</td>
                                                        <td>{{entry.brandName}}</td>
                                                        <td>{{entry.originalStock}}</td>
                                                        <td>{{entry.devQuantity}}</td>
                                                        <td>{{entry.devCondition}}</td>
                                                        <td>{{entry.Description}}</td>
                                                        <td>{{entry.qrData}}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="UpdateInventory" class="tab-pane fade" ng-controller = "updateInventoryController">
                                        <div class="container">
                                            <form role="form" class="form-inline"  method="post"  >
                                                <h4>Filter By</h4>
                                                <div class="form-group">
                                                    <label>Category:</label>
                                                    <select class="form-control" name="devCategory" placeholder="Choose a catergory" ng-model="filterByCategory">
                                                        <option  ng-selected="true" value="">Choose a catergory...</option>
                                                        <option ng-repeat="cat in category | unique:'Category'">{{cat.Category}}</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Device:</label>
                                                    <select class="form-control" name="deviceType" ng-model="filterByDevice" required>
                                                        <option  ng-selected="true" value="">Choose a Device...</option>
                                                        <option ng-repeat="dev in device | unique:'dev' | filter:{Category:filterByCategory}">{{dev.dev}}</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Condition:</label>
                                                    <select class="form-control" name="devCondition"  ng-model="filterByCondition">
                                                        <option  ng-selected="true" value="">choose a device condition</option>
                                                        <option value="Old">Old</option>
                                                        <option value="New">New</option>
                                                        <option value="Refurbished">Refurbished</option>
                                                    </select>
                                                </div>
                                            </form>
                                            <div class="container custSearch">
                                                <form class="form-horizontal">
                                                    <div class="form-group ">
                                                        <input type="text" class="form-control col-lg-4 col-md-4"  type="text"  placeholder="Search... " ng-model="devTextSearch">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>Sno</th>
                                                        <th>Category</th>
                                                        <th>Device</th>
                                                        <th>Brand</th>
                                                        <th>Quantity</th>
                                                        <th>Condition</th>
                                                        <th>Description</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody >
                                                    <tr ng-repeat="entry in entries | filter: devTextSearch |filter: filterByCategory | filter: filterByDevice | filter: filterByCondition " ng-click = "open('lg');">
                                                        <td>{{entry.Sno}}</td>
                                                        <td>{{entry.devCategory}}</td>
                                                        <td>{{entry.devName}}</td>
                                                        <td>{{entry.brandName}}</td>
                                                        <td>{{entry.devQuantity}}</td>
                                                        <td>{{entry.devCondition}}</td>
                                                        <td>{{entry.Description}}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="viewAssignments" class="tab-pane fade " ng-controller="viewAssignmentsController">
                                        <div class="container">
                                            <form class="form" role="form"> <!-- search field(incomplete) size="78"-->
                                                <div class="form-group ">
                                                    <input type="text" class="form-control"  type="text"  placeholder="Search... " ng-model="allotSearch">
                                                </div>
                                            </form>
                                            <div class="table-responsive">
                                                <table class="table table-hover" >
                                                    <thead>
                                                    <tr>
                                                        <th>Sno</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Room No.</th>
                                                        <th>Device</th>
                                                        <th>Condition</th>
                                                        <th>Quantity Allotted</th>
                                                        <th>Comments</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody >
                                                    <tr ng-repeat="entry in entries | filter: allotSearch" ng-click = "open('lg');">
                                                        <td>{{entry.Sno}}</td>
                                                        <td>{{entry.Name}}</td>
                                                        <td>{{entry.Email}}</td>
                                                        <td>{{entry.Room}}</td>
                                                        <td>{{entry.Device}}</td>
                                                        <td>{{entry.Condition}}</td>
                                                        <td>{{entry.Quantity}}</td>
                                                        <td>{{entry.Comments}}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="updateAssignments" class="tab-pane fade " ng-controller="updateAssignmentsController">
                                        <div class="container">
                                            <form class="form" role="form"> <!-- search field(incomplete) size="78"-->
                                                <div class="form-group ">
                                                    <input type="text" class="form-control"  type="text"  placeholder="Search... " ng-model="allotSearch">
                                                </div>
                                            </form>
                                            <div class="table-responsive">
                                                <table class="table table-hover" >
                                                    <thead>
                                                    <tr>
                                                        <th>Sno</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Room No.</th>
                                                        <th>Device</th>
                                                        <th>Condition</th>
                                                        <th>Quantity Allotted</th>
                                                        <th>Comments</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody >
                                                    <tr ng-repeat="entry in entries | filter: allotSearch" ng-click = "open('lg');">
                                                        <td>{{entry.Sno}}</td>
                                                        <td>{{entry.Name}}</td>
                                                        <td>{{entry.Email}}</td>
                                                        <td>{{entry.Room}}</td>
                                                        <td>{{entry.Device}}</td>
                                                        <td>{{entry.Condition}}</td>
                                                        <td>{{entry.Quantity}}</td>
                                                        <td>{{entry.Comments}}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="swtPatchMgmt" class="tab-pane fade">
                            <h3>Menu 3</h3>
                            <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                        </div>
                    </div>

            </div>
        </div>


    </body>
</html>