// inject ngRoute for all our routing needs
angular.module('app.routes', ['ngRoute'])

// configure our routes
.config(function($routeProvider, $locationProvider) {

    $locationProvider.html5Mode(true);
    
    $routeProvider

        // route for the home page
        .when('/ship', {
            templateUrl: '../views/ship.html',
            controller: 'shipController',
            controllerAs: 'ship'
        })

        .when('/shop', {
            templateUrl: '../views/shop.html',
            controller: 'shopController',
            controllerAs: 'shop'
        })

        .when('/collection', {
            templateUrl: '../views/collection.html',
            controller: 'collectionController',
            controllerAs: 'collection'
        })

        .when('/newUser', {
            templateUrl: '../views/newUser.html',
            controller: 'newUserController',
            controllerAs: 'newUser'
        })

        .when('/login', {
            templateUrl: '../views/login.html',
            controller : 'mainController',
            controllerAs : 'login'
        })

        .otherwise({
            redirectTo: "/"
        });


    
});