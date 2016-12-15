var challengeApp = angular.module('challengeApp', [])

.controller('mainCtrl', function mainCtrl($scope, $http) {
  $("#fileUploader").on('change', function (e){
    var csvFile = e.target.files;
    if(csvFile.length > 0){
      $http({
        method: 'POST',
        url: '../ajax/index.php',
        data: {
          file: csvFile
        }
      }).then(function successCallback(response) {
          console.dir('the response worked');
          console.dir(response);
        }, function errorCallback(response) {
          console.dir(response);
      });
    }
  });

});
