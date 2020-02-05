
var data = $.param({});

(function () {

    var app = angular.module("mainApp", ['infinite-scroll'], function ($interpolateProvider) {
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]')
    });

    app.config(['$qProvider', function ($qProvider) {
        $qProvider.errorOnUnhandledRejections(!1)
    }]);

    app.controller("recentlyShowController", function ($scope, $http) {
        $http.post(recentlyUrl, {}).then(function(response) {
            $scope.records1 = response.data;
        });
    });

    app.controller('getMainPageSuggestion', function ($scope, $http) {
        $scope.show = !1;
        $scope.disable = !1;

        $scope.myPagingFunction = function () {
            if ($scope.disable)
                return;

            var top = $("#newKoochita").position().top;
            var scroll = $(window).scrollTop() + window.innerHeight;

            if (scroll < top || (scroll - top) / window.innerHeight < 0.6)
                return;

            $('.loader').removeClass('hidden');

            $scope.disable = !0;
            $http.post(getMainPageSuggestion, data, config).then(function (response) {
                // console.log(response.data)
                if (response.data[0] != null && response.data[0].length > 0)
                    $scope.show = !0;

                $scope.records = response.data[0];

                var section2 = response.data[1];
                var food = [];
                var tarikhi = [];
                var tabiat = [];
                var restaurant = [];
                var kharid = [];
                var article = [];

                for(var i = 0; i < section2.length; i++){

                    if(section2[i]['section'] == 'محبوب‌ترین غذا‌ها')
                        food[food.length] = section2[i];
                    else if(section2[i]['section'] == 'سفر طبیعت‌گردی')
                        tabiat[tabiat.length] = section2[i];
                    else if(section2[i]['section'] == 'محبوب‌ترین رستوران‌ها')
                        restaurant[restaurant.length] = section2[i];
                    else if(section2[i]['section'] == 'سفر تاریخی-فرهنگی')
                        tarikhi[tarikhi.length] = section2[i];
                    else if(section2[i]['section'] == 'مراکز خرید')
                        kharid[kharid.length] = section2[i];
                    else if(section2[i]['section'] == 'مقالات')
                        article[article.length] = section2[i];
                }

                console.log(article)
                console.log(kharid)

                if(food.length != 0) {
                    document.getElementById('foodSuggestion').style.display = 'block';
                    $scope.foodRecords = food;
                }
                if(tabiat.length != 0) {
                    document.getElementById('tabiatSuggestion').style.display = 'block';
                    $scope.tabiatRecords = tabiat;
                }
                if(kharid.length != 0) {
                    document.getElementById('kharidSuggestion').style.display = 'block';
                    $scope.kharidRecords = kharid;
                }
                if(tarikhi.length != 0) {
                    document.getElementById('tarikhiSuggestion').style.display = 'block';
                    $scope.tarikhiRecords = tarikhi;
                }
                if(restaurant.length != 0) {
                    document.getElementById('restaurantSuggestion').style.display = 'block';
                    $scope.restaurantRecords = restaurant;
                }
                if(article.length != 0) {
                    document.getElementById('articleSuggestion').style.display = 'block';
                    $scope.articleRecords = article;
                }

                $('.loader').addClass('hidden');

                setTimeout(function (){
                    var swiper = new Swiper('.mainSuggestion', {
                        slidesPerGroup: 1,
                        loop: true,
                        loopFillGroupWithBlank: true,
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                        breakpoints: {
                            450: {
                                slidesPerView: 1,
                                spaceBetween: 0,
                            },
                            520: {
                                slidesPerView: 2,
                                spaceBetween: 20,
                            },
                            768: {
                                slidesPerView: 2,
                                spaceBetween: 20,
                            },
                            992: {
                                slidesPerView: 3,
                                spaceBetween: 20,
                            },
                            10000: {
                                slidesPerView: 4,
                                spaceBetween: 20,
                            }
                        }
                    });
                }, 200)
            }).catch(function (err) {
                console.log(err)
            })
        }
    });



    // app.controller('RecentlyController', function ($scope, $http) {
    //     $scope.show = !1;
    //     $scope.disable = !1;
    //     $scope.firstTime = true;
    //
    //     $scope.myPagingFunction = function () {
    //         if ($scope.disable)
    //             return;
    //         var top = $("#RecentlyControllerId").position().top;
    //         var scroll = $(window).scrollTop() + window.innerHeight;
    //
    //         if($scope.firstTime) {
    //             $scope.firstTime = false;
    //             if(top > scroll)
    //                 return;
    //         }
    //         else {
    //             if (scroll < top || (scroll - top) / window.innerHeight < 0.4)
    //                 return;
    //         }
    //         $scope.disable = !0;
    //         $http.post(getLastRecentlyMainPath, {}).then(function (response) {
    //             if (response.data != null && response.data.length > 0)
    //                 $scope.show = !0;
    //             for (i = 0; i < response.data.length; i++) {
    //                 response.data[i].classRate = (response.data[i].rate == 0) ? 'ui_bubble_rating bubble_00' : (response.data[i].rate == 1) ? 'ui_bubble_rating bubble_10' : (response.data[i].rate == 2) ? 'ui_bubble_rating bubble_20' : (response.data[i].rate == 3) ? 'ui_bubble_rating bubble_30' : (response.data[i].rate == 4) ? 'ui_bubble_rating bubble_40' : 'ui_bubble_rating bubble_50'
    //             }
    //             $scope.data = response.data
    //         }).catch(function (err) {
    //             console.log(err)
    //         })
    //     }
    // });
    //
    // app.controller('AdviceController', function ($scope, $http) {
    //     $scope.show = !1;
    //     $scope.disable = !1;
    //     $scope.myPagingFunction = function () {
    //
    //         if ($scope.disable)
    //             return;
    //
    //         var top = $("#AdviceControllerId").position().top;
    //         var scroll = $(window).scrollTop() + window.innerHeight;
    //
    //         if (scroll < top || (scroll - top) / window.innerHeight < 0.6)
    //             return;
    //
    //         $('.loader').removeClass('hidden');
    //
    //         $scope.disable = !0;
    //         $http.post(getAdviceMainPath, data, config).then(function (response) {
    //
    //             if (response.data != null && response.data.length > 0)
    //                 $scope.show = !0;
    //             for (i = 0; i < response.data.length; i++) {
    //                 response.data[i].classRate = (response.data[i].rate == 0) ? 'ui_bubble_rating bubble_00' : (response.data[i].rate == 1) ? 'ui_bubble_rating bubble_10' : (response.data[i].rate == 2) ? 'ui_bubble_rating bubble_20' : (response.data[i].rate == 3) ? 'ui_bubble_rating bubble_30' : (response.data[i].rate == 4) ? 'ui_bubble_rating bubble_40' : 'ui_bubble_rating bubble_50'
    //             }
    //             $scope.data = response.data;
    //
    //             $('.loader').addClass('hidden');
    //         }).catch(function (err) {
    //             console.log(err)
    //         })
    //     }
    // });
    //
    // app.controller('HotelController', function ($scope, $http) {
    //     $scope.show = !1;
    //     $scope.disable = !1;
    //     $scope.firstTime = true;
    //
    //     $scope.myPagingFunction = function () {
    //         if ($scope.disable)
    //             return;
    //         var top = $("#HotelControllerId").position().top;
    //         var scroll = $(window).scrollTop() + window.innerHeight;
    //
    //         if($scope.firstTime) {
    //             $scope.firstTime = false;
    //             if(top > scroll)
    //                 return;
    //         }
    //         else {
    //             if (scroll < top || (scroll - top) / window.innerHeight < 0.6)
    //                 return;
    //         }
    //
    //         $scope.disable = !0;
    //         $http.post(getHotelsMainPath, data, config).then(function (response) {
    //             if (response.data != null && response.data.length > 0)
    //                 $scope.show = !0;
    //             for (i = 0; i < response.data.length; i++) {
    //                 response.data[i].classRate = (response.data[i].rate == 0) ? 'ui_bubble_rating bubble_00' : (response.data[i].rate == 1) ? 'ui_bubble_rating bubble_10' : (response.data[i].rate == 2) ? 'ui_bubble_rating bubble_20' : (response.data[i].rate == 3) ? 'ui_bubble_rating bubble_30' : (response.data[i].rate == 4) ? 'ui_bubble_rating bubble_40' : 'ui_bubble_rating bubble_50'
    //             }
    //             $scope.data = response.data
    //         }).catch(function (err) {
    //             console.log(err)
    //         })
    //     }
    // });
    //
    // app.controller('AmakenController', function ($scope, $http) {
    //     $scope.show = !1;
    //     $scope.disable = !1;
    //     $scope.firstTime = true;
    //
    //     $scope.myPagingFunction = function () {
    //         if ($scope.disable)
    //             return;
    //         var top = $("#AmakenControllerId").position().top;
    //         var scroll = $(window).scrollTop() + window.innerHeight;
    //
    //         if($scope.firstTime) {
    //             $scope.firstTime = false;
    //             if(top > scroll)
    //                 return;
    //         }
    //         else {
    //             if (scroll < top || (scroll - top) / window.innerHeight < 0.6)
    //                 return;
    //         }
    //         $scope.disable = !0;
    //         $http.post(getAmakensMainPath, data, config).then(function (response) {
    //
    //             if (response.data != null && response.data.length > 0)
    //                 $scope.show = !0;
    //             for (i = 0; i < response.data.length; i++) {
    //                 response.data[i].classRate = (response.data[i].rate == 0) ? 'ui_bubble_rating bubble_00' : (response.data[i].rate == 1) ? 'ui_bubble_rating bubble_10' : (response.data[i].rate == 2) ? 'ui_bubble_rating bubble_20' : (response.data[i].rate == 3) ? 'ui_bubble_rating bubble_30' : (response.data[i].rate == 4) ? 'ui_bubble_rating bubble_40' : 'ui_bubble_rating bubble_50'
    //             }
    //             $scope.data = response.data
    //         }).catch(function (err) {
    //             console.log(err)
    //         })
    //     }
    // });
    //
    // app.controller('RestaurantController', function ($scope, $http) {
    //     $scope.show = !1;
    //     $scope.disable = !1;
    //     $scope.firstTime = true;
    //
    //     $scope.myPagingFunction = function () {
    //         if ($scope.disable)
    //             return;
    //         var top = $("#RestaurantControllerId").position().top;
    //         var scroll = $(window).scrollTop() + window.innerHeight;
    //         if($scope.firstTime) {
    //             $scope.firstTime = false;
    //             if(top > scroll)
    //                 return;
    //         }
    //         else {
    //             if (scroll < top || (scroll - top) / window.innerHeight < 0.6)
    //                 return;
    //         }
    //         $scope.disable = !0;
    //         $http.post(getRestaurantsMainPath, data, config).then(function (response) {
    //             if (response.data != null && response.data.length > 0)
    //                 $scope.show = !0;
    //             for (i = 0; i < response.data.length; i++) {
    //                 response.data[i].classRate = (response.data[i].rate == 0) ? 'ui_bubble_rating bubble_00' : (response.data[i].rate == 1) ? 'ui_bubble_rating bubble_10' : (response.data[i].rate == 2) ? 'ui_bubble_rating bubble_20' : (response.data[i].rate == 3) ? 'ui_bubble_rating bubble_30' : (response.data[i].rate == 4) ? 'ui_bubble_rating bubble_40' : 'ui_bubble_rating bubble_50'
    //             }
    //             $scope.data = response.data
    //         }).catch(function (err) {
    //             console.log(err)
    //         })
    //     }
    // });
    //
    // app.controller('FoodController', function ($scope, $http) {
    //     $scope.show = !1;
    //     $scope.disable = !1;
    //     $scope.myPagingFunction = function () {
    //         if ($scope.disable)
    //             return;
    //         var top = $("#FoodControllerId").position().top;
    //         var scroll = $(window).scrollTop() + window.innerHeight;
    //
    //         if($scope.firstTime) {
    //             $scope.firstTime = false;
    //             if(top > scroll)
    //                 return;
    //         }
    //         else {
    //             if (scroll < top || (scroll - top) / window.innerHeight < 0.2)
    //                 return;
    //         }
    //         $scope.disable = !0;
    //         $http.post(getFoodsMainPath, data, config).then(function (response) {
    //             if (response.data != null && response.data.length > 0)
    //                 $scope.show = !0;
    //             for (i = 0; i < response.data.length; i++) {
    //                 response.data[i].classRate = (response.data[i].rate == 0) ? 'ui_bubble_rating bubble_00' : (response.data[i].rate == 1) ? 'ui_bubble_rating bubble_10' : (response.data[i].rate == 2) ? 'ui_bubble_rating bubble_20' : (response.data[i].rate == 3) ? 'ui_bubble_rating bubble_30' : (response.data[i].rate == 4) ? 'ui_bubble_rating bubble_40' : 'ui_bubble_rating bubble_50'
    //             }
    //             $scope.data = response.data
    //         }).catch(function (err) {
    //             console.log(err)
    //         })
    //     }
    // })
})();