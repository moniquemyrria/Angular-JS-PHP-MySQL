//Define an angular module for our app
var app = angular.module('atividadeApp', []);

app.controller('atividadeController', function($scope, $http) {
	
  getAtividade(); // Load all available items 
  function getAtividade(){  
  $http.post("ajax/getAtividade.php").success(function(data){
        $scope.atividades = data;
       });
  };
  
  $scope.addAtividade = function (atividade) {
    $http.post("ajax/addAtividade.php?descricao="+atividade).success(function(data){
        getAtividade();
        $scope.descricaoInput = "";
      });
  };
  
  $scope.deleteAtividade = function (atividade) {
    if(confirm("Você tem certeza que deseja deletar esta atividade?")){
    $http.post("ajax/deleteAtividade.php?atividadeID="+atividade).success(function(data){
        getAtividade();
      });
    }
  };

  $scope.clearAtividade = function () {
    if(confirm("Deseja limpar todas as Atividades concluídas da lista?")){
    $http.post("ajax/clearAtividade.php").success(function(data){
        getAtividade();
      });
    }
  };  

  $scope.changeStatus = function(atividade, status, task) {
    if(status=='2'){status='0';}else{status='2';}
      $http.post("ajax/updateAtividade.php?atividadeID="+atividade+"&status="+status).success(function(data){
        getAtividade();
      });
  };

});
