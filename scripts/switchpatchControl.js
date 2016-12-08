/**
 * Created by Haus-IT on 12/8/2016.
 */

var switchPatchapp = angular.module('switchpatch',['ui.bootstrap','ngAnimate','angular.filter']);

// fetching routers and switches

switchPatchapp.controller('routerController',function ($scope,$http, $uibModal, $log) {

    $http.get('../server/switchpatch/fetchrouters.php').then(function (response) {
        $scope.entries = response.data.records;
        $scope.animationsEnabled = true;
        $scope.open = function(size){

            $scope.items = this.entry;



            var modalInstance = $uibModal.open({
                animation: $scope.animationsEnabled,
                templateUrl: '../views/switchpatch/html/routerupdate.html',
                controller: 'routerModalInstanceCtrl',
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
switchPatchapp.controller('routerModalInstanceCtrl', function ($scope, $uibModalInstance, items) {

    $scope.items = items;


    $scope.ok = function () {
        $uibModalInstance.close($scope.selected.item);
    };

    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };
});

switchPatchapp.controller('switchController',function ($scope,$http,  $uibModal, $log) {

    $http.get('../server/switchpatch/fetchswitches.php').then(function (response) {
        $scope.entries = response.data.records;
        $scope.animationsEnabled = true;
        $scope.open = function(size){

            $scope.items = this.entry;



            var modalInstance = $uibModal.open({
                animation: $scope.animationsEnabled,
                templateUrl: '../views/switchpatch/html/switchesupdate.html',
                controller: 'switchModalInstanceCtrl',
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
switchPatchapp.controller('switchModalInstanceCtrl', function ($scope, $uibModalInstance, items) {

    $scope.items = items;


    $scope.ok = function () {
        $uibModalInstance.close($scope.selected.item);
    };

    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };
});

//Patching :- New, View and update

switchPatchapp.controller('switchpatchingController',function ($scope,$http, $uibModal, $log) {

    $http.get('../server/switchpatch/patchbasic.php').then(function (response) {
        $scope.floors = response.data.floors;

    })

    $http.get('../server/switchpatch/patchbasic2.php').then(function (response) {
        $scope.room = response.data.room;
    })
    $http.get('../server/switchpatch/patchbasic3.php').then(function (response) {
        $scope.switch = response.data.switch;

    })



    $http.get('../server/switchpatch/fetchpatch.php').then(function (response) {
        $scope.entries = response.data.records;

        $scope.animationsEnabled = true;
        $scope.open = function(size){

            $scope.items = this.entry;



            var modalInstance = $uibModal.open({
                animation: $scope.animationsEnabled,
                templateUrl: '../views/switchpatch/html/pubmodmodal.html',
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
switchPatchapp.controller('ModalInstanceCtrl', function ($scope, $uibModalInstance, items) {

    $scope.items = items;


    $scope.ok = function () {
        $uibModalInstance.close($scope.selected.item);
    };

    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };
});
// data for patching new page - for the dropdowns
switchPatchapp.controller('patchingbasicController',function ($scope,$http) {

    $http.get('../server/switchpatch/patchbasic.php').then(function (response) {
        $scope.floors = response.data.floors;

    })
    $http.get('../server/switchpatch/patchbasic2.php').then(function (response) {
        $scope.room = response.data.room;
    })
    $http.get('../server/switchpatch/patchbasic3.php').then(function (response) {
        $scope.switch = response.data.switch;

    })
});


