// name our angular app
angular.module('mainApp', [
  'ui.router',
  'app.routes',
  'authService',
  'mainCtrl',
  'userService'
  ])

.config(function($httpProvider){
  $httpProvider.interceptors.push('AuthInterceptor');
})

//ship controller
.controller('shipController', function(){
  var vm = this;

  vm.message = 'ship';

})

//shop controller
.controller('shopController', function(){
  var vm = this;

  vm.message = 'shop';

})

//collection controller
.controller('collectionController', function(){
  var vm = this;

  vm.message = 'collection';

})

//login controller
.controller('newUserController', function(userFactory){
  var vm = this;

  vm.saveUser = function(){
    vm.processing = true;
    vm.message = ' ';

    userFactory.create(vm.userData)

    .success(function(data){

      vm.processing = false;

      vm.userData = {};
      vm.message = data.message;
      console.log('post user worked');
    });

  }
});