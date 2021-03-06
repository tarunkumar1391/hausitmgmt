/**
 * Created by Haus-IT on 12/8/2016.
 */
/**
 * Created by Haus-IT on 7/6/2016.
 */
var inventoryApp = angular.module('inventoryApp',['ui.bootstrap','ngAnimate','angular.filter']);

//Hardware list
inventoryApp.controller('hardwareListController',function ($scope,$http,$uibModal, $log) {
//also for assigning hardware as well

    $http.get('../server/inventory/hardwarelist.php').then(function (response) {
        $scope.entries = response.data.records;

        // $scope.animationsEnabled = true;
        // $scope.open = function(size){
        //
        //     $scope.items = this.entry;
        //     console.log($scope.items);
        //
        //
        //     var modalInstance = $uibModal.open({
        //         animation: $scope.animationsEnabled,
        //         templateUrl: '../views/inventory/html/assignhardware.html',
        //         controller: 'assignHardController',
        //         size: size,
        //         resolve: {
        //             items: function () {
        //                 return $scope.items;
        //             }
        //         }
        //     });
        //
        //     modalInstance.result.then(function (selectedItem) {
        //         $scope.selected = selectedItem;
        //     }, function () {
        //         $log.info('Modal dismissed at: ' + new Date());
        //     });
        // };
        //
        // $scope.toggleAnimation = function () {
        //     $scope.animationsEnabled = !$scope.animationsEnabled;
        // };

        $scope.exportData = function () {
            var blob = new Blob([document.getElementById('exportable').innerHTML], {
                type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=utf-8"
            });
            saveAs(blob, "Inventarlist.xls");
        };
    })

});





// fetching routers and switches

inventoryApp.controller('addinventoryController',function ($scope,$http, $uibModal, $log) {

    $scope.category = [
        {"id":1,"Category":"Input device"},
        {"id":2,"Category":"Output device"},
        {"id":3,"Category":"Power"},
        {"id":4,"Category":"Cables"},
        {"id":5,"Category":"Networking"},
        {"id":6,"Category":"Storage"},
        {"id":7,"Category":"Multimedia"}

    ];
    $scope.device = [
        {"id":1,"Category":"Input device","dev":"Keyboard-USB"},
        {"id":2,"Category":"Input device","dev":"Keyboard-PS2"},
        {"id":3,"Category":"Input device","dev":"Mouse-PS2"},
        {"id":4,"Category":"Input device","dev":"Mouse-USB"},
        {"id":5,"Category":"Input device","dev":"Barcode readers"},
        {"id":6,"Category":"Input device","dev":"Scanners"},
        {"id":7,"Category":"Input device","dev":"Others"},
        {"id":8,"Category":"Output device","dev":"Monitor-LED"},
        {"id":9,"Category":"Output device","dev":"Monitor-LCD"},
        {"id":10,"Category":"Output device","dev":"Monitor-VGA/CRT"},
        {"id":11,"Category":"Output device","dev":"Projectors"},
        {"id":12,"Category":"Output device","dev":"Printers"},
        {"id":13,"Category":"Output device","dev":"Others"},
        {"id":14,"Category":"Power","dev":"UPS"},
        {"id":15,"Category":"Power","dev":"Battery"},
        {"id":16,"Category":"Power","dev":"Battery for Laptops"},
        {"id":17,"Category":"Power","dev":"Spike guard"},
        {"id":18,"Category":"Power","dev":"Others"},
        {"id":19,"Category":"Cables","dev":"VGA"},
        {"id":20,"Category":"Cables","dev":"HDMI"},
        {"id":21,"Category":"Cables","dev":"DVI"},
        {"id":22,"Category":"Cables","dev":"CAT 5"},
        {"id":23,"Category":"Cables","dev":"CAT 5e"},
        {"id":24,"Category":"Cables","dev":"CAT 6"},
        {"id":25,"Category":"Cables","dev":"CAT 6a"},
        {"id":26,"Category":"Cables","dev":"Connectors/Converters"},
        {"id":27,"Category":"Cables","dev":"Power cable-PC"},
        {"id":28,"Category":"Cables","dev":"Power cable-Monitor"},
        {"id":29,"Category":"Cables","dev":"Fiber"},
        {"id":30,"Category":"Cables","dev":"Infiniband"},
        {"id":31,"Category":"Cables","dev":"Others"},
        {"id":32,"Category":"Networking","dev":"Router"},
        {"id":33,"Category":"Networking","dev":"Router-SOHO"},
        {"id":34,"Category":"Networking","dev":"Switch"},
        {"id":35,"Category":"Networking","dev":"Switch-SOHO"},
        {"id":36,"Category":"Networking","dev":"Wifi router"},
        {"id":37,"Category":"Networking","dev":"PCI/PCIe- Network card"},
        {"id":38,"Category":"Networking","dev":"Others"},
        {"id":39,"Category":"Storage","dev":"HDD"},
        {"id":40,"Category":"Storage","dev":"SSD"},
        {"id":41,"Category":"Storage","dev":"DVD"},
        {"id":42,"Category":"Storage","dev":"CD"},
        {"id":43,"Category":"Storage","dev":"Floppy"},
        {"id":44,"Category":"Storage","dev":"Flash drive/USB storage"},
        {"id":45,"Category":"Storage","dev":"External-HDD"},
        {"id":46,"Category":"Storage","dev":"Others"},
        {"id":47,"Category":"Multimedia","dev":"Graphic Cards"},
        {"id":48,"Category":"Multimedia","dev":"Speakers"},
        {"id":49,"Category":"Multimedia","dev":"Mic"},
        {"id":50,"Category":"Multimedia","dev":"Others"}
    ];

});

inventoryApp.controller('viewInventoryController',function ($scope,$http,$uibModal, $log) {
//also for assigning hardware as well

    $http.get('../server/inventory/viewinventory.php').then(function (response) {
        $scope.entries = response.data.records;

        $scope.animationsEnabled = true;
        $scope.open = function(size){

            $scope.items = this.entry;
            console.log($scope.items);


            var modalInstance = $uibModal.open({
                animation: $scope.animationsEnabled,
                templateUrl: '../views/inventory/html/assignhardware.html',
                controller: 'assignHardController',
                size: size,
                resolve: {
                    items: function () {
                        return $scope.items;
                    }
                }
            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };

        $scope.toggleAnimation = function () {
            $scope.animationsEnabled = !$scope.animationsEnabled;
        };
    })

});
inventoryApp.controller('assignHardController', function ($scope, $uibModalInstance, items) {

    $scope.items = items;


    $scope.ok = function () {
        $uibModalInstance.close($scope.selected.item);
    };

    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };
});

inventoryApp.controller('updateInventoryController',function ($scope,$http,$uibModal, $log) {


    $scope.category = [
        {"id":1,"Category":"Input device"},
        {"id":2,"Category":"Output device"},
        {"id":3,"Category":"Power"},
        {"id":4,"Category":"Cables"},
        {"id":5,"Category":"Networking"},
        {"id":6,"Category":"Storage"},
        {"id":7,"Category":"Multimedia"}

    ];
    $scope.device = [
        {"id":1,"Category":"Input device","dev":"Keyboard-USB"},
        {"id":2,"Category":"Input device","dev":"Keyboard-PS2"},
        {"id":3,"Category":"Input device","dev":"Mouse-PS2"},
        {"id":4,"Category":"Input device","dev":"Mouse-USB"},
        {"id":5,"Category":"Input device","dev":"Barcode readers"},
        {"id":6,"Category":"Input device","dev":"Scanners"},
        {"id":7,"Category":"Input device","dev":"Others"},
        {"id":8,"Category":"Output device","dev":"Monitor-LED"},
        {"id":9,"Category":"Output device","dev":"Monitor-LCD"},
        {"id":10,"Category":"Output device","dev":"Monitor-VGA/CRT"},
        {"id":11,"Category":"Output device","dev":"Projectors"},
        {"id":12,"Category":"Output device","dev":"Printers"},
        {"id":13,"Category":"Output device","dev":"Others"},
        {"id":14,"Category":"Power","dev":"UPS"},
        {"id":15,"Category":"Power","dev":"Battery"},
        {"id":16,"Category":"Power","dev":"Battery for Laptops"},
        {"id":17,"Category":"Power","dev":"Spike guard"},
        {"id":18,"Category":"Power","dev":"Others"},
        {"id":19,"Category":"Cables","dev":"VGA"},
        {"id":20,"Category":"Cables","dev":"HDMI"},
        {"id":21,"Category":"Cables","dev":"DVI"},
        {"id":22,"Category":"Cables","dev":"CAT 5"},
        {"id":23,"Category":"Cables","dev":"CAT 5e"},
        {"id":24,"Category":"Cables","dev":"CAT 6"},
        {"id":25,"Category":"Cables","dev":"CAT 6a"},
        {"id":26,"Category":"Cables","dev":"Connectors/Converters"},
        {"id":27,"Category":"Cables","dev":"Power cable-PC"},
        {"id":28,"Category":"Cables","dev":"Power cable-Monitor"},
        {"id":29,"Category":"Cables","dev":"Fiber"},
        {"id":30,"Category":"Cables","dev":"Infiniband"},
        {"id":31,"Category":"Cables","dev":"Others"},
        {"id":32,"Category":"Networking","dev":"Router"},
        {"id":33,"Category":"Networking","dev":"Router-SOHO"},
        {"id":34,"Category":"Networking","dev":"Switch"},
        {"id":35,"Category":"Networking","dev":"Switch-SOHO"},
        {"id":36,"Category":"Networking","dev":"Wifi router"},
        {"id":37,"Category":"Networking","dev":"PCI/PCIe- Network card"},
        {"id":38,"Category":"Networking","dev":"Others"},
        {"id":39,"Category":"Storage","dev":"HDD"},
        {"id":40,"Category":"Storage","dev":"SSD"},
        {"id":41,"Category":"Storage","dev":"DVD"},
        {"id":42,"Category":"Storage","dev":"CD"},
        {"id":43,"Category":"Storage","dev":"Floppy"},
        {"id":44,"Category":"Storage","dev":"Flash drive/USB storage"},
        {"id":45,"Category":"Storage","dev":"External-HDD"},
        {"id":46,"Category":"Storage","dev":"Others"},
        {"id":47,"Category":"Multimedia","dev":"Graphic Cards"},
        {"id":48,"Category":"Multimedia","dev":"Speakers"},
        {"id":49,"Category":"Multimedia","dev":"Mic"},
        {"id":50,"Category":"Multimedia","dev":"Others"}
    ];
    $http.get('../server/inventory/viewinventory.php').then(function (response) {
        $scope.entries = response.data.records;

        $scope.animationsEnabled = true;
        $scope.open = function(size){

            $scope.items = this.entry;
            console.log($scope.items);


            var modalInstance = $uibModal.open({
                animation: $scope.animationsEnabled,
                templateUrl: '../views/inventory/html/updatemodal.html',
                controller: 'ModalInstanceCtrl',
                size: size,
                resolve: {
                    items: function () {
                        return $scope.items;
                    }
                }
            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };

        $scope.toggleAnimation = function () {
            $scope.animationsEnabled = !$scope.animationsEnabled;
        };


    })

});
inventoryApp.controller('ModalInstanceCtrl', function ($scope, $uibModalInstance, items) {

    $scope.items = items;


    $scope.ok = function () {
        $uibModalInstance.close($scope.selected.item);
    };

    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };
});
inventoryApp.controller('viewAssignmentsController',function ($scope,$http,$uibModal, $log) {

    $http.get('../server/inventory/viewassignments.php').then(function (response) {
        $scope.entries = response.data.records;

        $scope.animationsEnabled = true;
        $scope.open = function(size){

            $scope.items = this.entry;
            console.log($scope.items);


            var modalInstance = $uibModal.open({
                animation: $scope.animationsEnabled,
                templateUrl: '../views/inventory/html/viewassignments.html',
                controller: 'viewAssignmentsInstanceCtrl',
                size: size,
                resolve: {
                    items: function () {
                        return $scope.items;
                    }
                }
            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };

        $scope.toggleAnimation = function () {
            $scope.animationsEnabled = !$scope.animationsEnabled;
        };



    })

});
inventoryApp.controller('viewAssignmentsInstanceCtrl', function ($scope, $uibModalInstance, items) {

    $scope.items = items;


    $scope.ok = function () {
        $uibModalInstance.close($scope.selected.item);
    };

    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };
});

inventoryApp.controller('updateAssignmentsController',function ($scope,$http,$uibModal, $log) {
//also for assigning hardware as well

    $http.get('../server/inventory/viewassignments.php').then(function (response) {
        $scope.entries = response.data.records;

        $scope.animationsEnabled = true;
        $scope.open = function(size){

            $scope.items = this.entry;
            


            var modalInstance = $uibModal.open({
                animation: $scope.animationsEnabled,
                templateUrl: '../views/inventory/html/updateassignments.html',
                controller: 'updateAssignmentsInstance',
                size: size,
                resolve: {
                    items: function () {
                        return $scope.items;
                    }
                }
            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };

        $scope.toggleAnimation = function () {
            $scope.animationsEnabled = !$scope.animationsEnabled;
        };
    })

});
inventoryApp.controller('updateAssignmentsInstance', function ($scope, $uibModalInstance, items) {

    $scope.items = items;


    $scope.ok = function () {
        $uibModalInstance.close($scope.selected.item);
    };

    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };
});

