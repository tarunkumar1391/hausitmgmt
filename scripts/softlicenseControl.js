/**
 * Created by Haus-IT on 12/8/2016.
 */
/**
 * Created by Haus-IT on 7/6/2016.
 */
var softLicenseapp = angular.module('softlicense',['ui.bootstrap','ngAnimate']);
// view purchase history
softLicenseapp.controller('regsoftController',function ($scope,$http) {

    $http.get('../server/softlicense/fetch.php').then(function (response) {
        $scope.entries = response.data.records;

    })
});
softLicenseapp.controller('allocController',function ($scope,$http) {

    $http.get('../server/softlicense/fetch.php').then(function (response) {
        $scope.softlist = response.data.records;

    })

});
softLicenseapp.controller('allotedController',function ($scope,$http) {

    $http.get('../server/softlicense/fetchalloted.php').then(function (response) {
        $scope.entries = response.data.records;

    })

});

//optional
softLicenseapp.controller('pubmodController',function ($scope,$http,$uibModal, $log) {
    $http.get('../server/softlicense/fetch.php').then(function (response) {

        $scope.entries = response.data.records;

        $scope.animationsEnabled = true;
        $scope.open = function(size){

            $scope.items = this.entry;
            console.log($scope.items);


            var modalInstance = $uibModal.open({
                animation: $scope.animationsEnabled,
                templateUrl: '../views/softlicense/html/pubmodmodal.html',
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

    });
});
softLicenseapp.controller('ModalInstanceCtrl', function ($scope, $uibModalInstance, items) {

    $scope.items = items;


    $scope.ok = function () {
        $uibModalInstance.close($scope.selected.item);
    };

    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };
});