/**
 * Created by Haus-IT on 4/26/2017.
 */

var logsapp = angular.module('logging',['ui.bootstrap','ngAnimate']);
// view purchase history
logsapp.controller('logsController',function ($scope,$http) {

    $http.get('../server/logging/getlogs.php').then(function (response) {
        $scope.entries = response.data.records;

    })
});

