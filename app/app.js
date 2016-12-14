var challengeApp = angular.module('challengeApp', [])

.controller('mainCtrl', function mainCtrl($scope) {
  $scope.name = "Celine";
  $("#fileUploader").on('change', function (changeEvent){
      	console.log('hello, is it me youre looking for?');
        var files = changeEvent.target.files;
        console.dir(files);
        if (files.length > 0) {
        	console.log('I know this will work');
          var r = new FileReader();
          console.dir(r);
          r.onload = function(e) {
          	console.log('we are in here right');
              var contents = e.target.result;
               var res = $scope.split(",");
                console.dir(res);
          };
        }
  });

})

.directive('fileParser', function(){
	return{
    scope: "=",
    link: (function(scope, element){
    	$(element).on('change', function(changeEvent){
      	console.log('hello, is it me youre looking for?');
        var files = changeEvent.target.files;
        if (files.length) {
          var r = new FileReader();
          r.onload = function(e) {
              var contents = e.target.result;
              scope.$apply(function () {
                scope.fileReader = contents;
              });
              var newArr = contents.split(',');
              console.dir(newArr);
          };

          r.readAsText(files[0]);

        }
      })
    })
  }
});
