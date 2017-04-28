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



            var modalInstance = $uibModal.open({
                animation: $scope.animationsEnabled,
                templateUrl: '../views/users/html/userupdate.html',
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
usersManage.controller('ModalInstanceCtrl', function ($scope, $uibModalInstance, items) {

    $scope.items = items;


    $scope.ok = function () {
        $uibModalInstance.close($scope.selected.item);
    };

    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };
});