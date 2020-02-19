
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
        $http.post(recentlyUrl, data, config).then(function(response) {
            $scope.records1 = response.data;
        });
    });

    app.controller('getMainPageSuggestion', function ($scope, $http) {
        $scope.show = !1;
        $scope.disable = !1;

        // $scope.myPagingFunction = function () {
        angular.element(document).ready(function () {
            if ($scope.disable)
                return;

            // var top = $("#newKoochita").position().top;
            // var scroll = $(window).scrollTop() + window.innerHeight;
            //
            // if (scroll < top || (scroll - top) / window.innerHeight < 0.6)
            //     return;

            $('.loader').removeClass('hidden');

            $scope.disable = !0;
            $http.post(getMainPageSuggestion, data, config).then(function (response) {
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
        })

        // }
    });

})();