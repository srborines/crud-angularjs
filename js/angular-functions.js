//<![CDATA[
var app = angular.module("app", ["xeditable"]);

app.run(function(editableOptions) {
  editableOptions.theme = 'bs3';
});

app.controller('Ctrl', function($scope, $filter, $http) {
  //Get items of database
   $http.get("scripts/get_items.php").then(function (response) {$scope.items = response.data;});

  //Save item edited
  $scope.saveItem = function(data, item) {
    data.id = item.id;
    return $http.post("scripts/save_item.php",data).then(function (response) {console.log(response); if(item.id=='?') item.id = response.data.id;});
  };

  // remove item
  $scope.removeItem = function(index, item) {
    if(confirm('Do you want delete item #'+item.id+'?')){
      $http.post("scripts/delete_item.php",item)
      .then(function (response) {
        console.log(response);
        if(response.error == null){
          $scope.items.splice(index, 1);
        }
      })
    }
  };

  //Cancel new item
  $scope.cancelItem = function(index, item) {
    if(item.id == '?'){
      $scope.items.splice(index, 1);
    }
  };

  // add item
  $scope.addItem = function() {
    $scope.inserted = {
      id: '?',
      var1: '',
      var2: '',
      var3: '' 
    };
    $scope.items.push($scope.inserted);
  };
});
//]]> 