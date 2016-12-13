/**
 * Created by Haus-IT on 12/13/2016.
 */
var usersManage = angular.module('usersManage',['ui.bootstrap','ngAnimate','angular.filter']);

usersManage.controller('usersController',function ($scope,$http,$uibModal, $log) {
//also for assigning hardware as well

    $http.get('../server/users/fetchusers.php').then(function (response) {
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