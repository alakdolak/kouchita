
var currIdx, newElement, thisVal, imgPath = ["1.jpg", "2.jpg", "3.jpg", "4.jpg"],
    titles = ["گیلان", "بندر ترکمن", "قشم", "گردنه حیران"],
    photoGraphers = [" ", "عکس از علی مهدی حقدوست", "عکس از منصور وحدانی", "عکس از مصطفی قوینامین"], options = {
        slider_Wrap: "#pbSlider0",
        slider_Threshold: 10,
        slider_Speed: 600,
        slider_Ease: "ease-out",
        slider_Drag: !0,
        slider_Arrows: {enabled: !0},
        slider_Dots: {class: ".o-slider-pagination", enabled: !0, preview: !0},
        slider_Breakpoints: {
            default: {height: 500},
            tablet: {height: 350, media: 1024},
            smartphone: {height: 250, media: 768}
        }
    }, slider_Opts = $.extend({
        slider_Wrap: "pbSlider0",
        slider_Item: ".o-slider--item",
        slider_Drag: !0,
        slider_Dots: {class: ".o-slider-pagination", enabled: !0, preview: !0},
        slider_Arrows: {class: ".o-slider-arrows", enabled: !0},
        slider_Threshold: 25,
        slider_Speed: 1e3,
        slider_Ease: "cubic-bezier(0.5, 0, 0.5, 1)",
        slider_Breakpoints: {
            default: {height: 500},
            tablet: {height: 400, media: 1024},
            smartphone: {height: 300, media: 768}
        }
    }, options), pbSlider = {};

function changeSlider(e) {
    $(".o-slider--item").removeClass("isActive"), $("#sliderItem_" + e).addClass("isActive")
}

pbSlider.slider_Wrap = slider_Opts.slider_Wrap, pbSlider.slider_Item = slider_Opts.slider_Item, pbSlider.slider_Dots = slider_Opts.slider_Dots, pbSlider.slider_Threshold = slider_Opts.slider_Threshold, pbSlider.slider_Active = 0, pbSlider.slider_Count = 0, pbSlider.slider_NavWrap = '<div class="o-slider-controls"></div>', pbSlider.slider_NavPagination = '<ul class="o-slider-pagination"></ul>', pbSlider.slider_NavArrows = '<ul class="o-slider-arrows"><li class="o-slider-prev"><span class="icon-left-open-big"></span></li><li class="o-slider-next"><span class="icon-right-open-big"></span></li></ul>';
var loaderHtml = '<div class="loaderWrap"><div class="ball-scale-multiple"><div></div><div></div><div></div><div></div></div></div>';

function pbTouchSlider() {
    for (newElement = "<div class='o-sliderContainer' id='pbSliderWrap0' style='margin-top: 0'>", newElement += "<div class='o-slider' style='display: block !important;' id='pbSlider0'></div></div", $("#sliderBarDIV").append(newElement), pbSlider.pbInit = function (e) {
        pbSlider.slider_Draggable = e, pbSlider.slider_Count = $(pbSlider.slider_Wrap).find(pbSlider.slider_Item).length, $("#pbSliderWrap0").css("width", 100 * pbSlider.slider_Count + "%");
        for (var i = 0; i < pbSlider.slider_Count; i++) $("#sliderItem_" + i).css({width: 100 / pbSlider.slider_Count + "%"});
        var r = 0;
        if ($(pbSlider.slider_Wrap).find(pbSlider.slider_Item).each(function () {
            $(this).attr("data-id", "slide-" + r++)
        }), !0 !== slider_Opts.slider_Arrows.enabled && !0 !== slider_Opts.slider_Dots.enabled || $(pbSlider.slider_Wrap).append(pbSlider.slider_NavWrap), !0 === slider_Opts.slider_Arrows.enabled && $(pbSlider.slider_Wrap).append(pbSlider.slider_NavArrows), !0 === slider_Opts.slider_Dots.enabled) {
            var l = 0;
            for ($(pbSlider.slider_Wrap).append(pbSlider.slider_NavPagination); l < pbSlider.slider_Count; l++) {
                var d = l === pbSlider.slider_Active ? ' class="isActive"' : "", s = 'data-increase="' + [l] + '"',
                    a = $(pbSlider.slider_Wrap).find("[data-id='slide-" + l + "']").attr("data-image");
                !0 === slider_Opts.slider_Dots.preview ? $(pbSlider.slider_Wrap).find(pbSlider.slider_Dots.class).append("<li " + d + " " + s + '><span class="o-slider--preview" style="background-image:url(' + a + ')"></span></li>') : $(pbSlider.slider_Wrap).find(pbSlider.slider_Dots.class).append("<li " + d + " " + s + "></li>")
            }
        }
        setTimeout(function () {
            $(pbSlider.slider_Item + "[data-id=slide-" + pbSlider.slider_Active + "]").addClass("isActive")
        }, 400), $(pbSlider.slider_Wrap + " .o-slider-pagination li").on("click", function () {
            var e = $(this).attr("data-increase");
            $(this).hasClass("isActive") || pbSlider.pbGoslide(e)
        }), $(pbSlider.slider_Wrap + " .o-slider-prev").addClass("isDisabled"), $(pbSlider.slider_Wrap + " .o-slider-arrows li").on("click", function () {
            $(this).hasClass("o-slider-next") ? pbSlider.pbGoslide(pbSlider.slider_Active + 1) : pbSlider.pbGoslide(pbSlider.slider_Active - 1)
        })
    }, pbSlider.pbGoslide = function (e) {
        if ($(pbSlider.slider_Wrap + " .o-slider-arrows li").removeClass("isDisabled"), e < 0 ? pbSlider.slider_Active = 0 : e > pbSlider.slider_Count - 1 ? pbSlider.slider_Active = pbSlider.slider_Count - 1 : pbSlider.slider_Active = e, pbSlider.slider_Active >= pbSlider.slider_Count - 1) {
            $(pbSlider.slider_Wrap).find(pbSlider.slider_Item).first();
            $(pbSlider.slider_Wrap + " .o-slider-next").addClass("isDisabled")
        } else pbSlider.slider_Active <= 0 ? $(pbSlider.slider_Wrap + " .o-slider-prev").addClass("isDisabled") : $(pbSlider.slider_Wrap + " .o-slider-arrows li").removeClass("isDisabled");
        pbSlider.slider_Active != pbSlider.slider_Count - 1 && 0 != pbSlider.slider_Active && $(pbSlider.slider_Wrap).find(pbSlider.slider_Item).addClass("isMoving"), $(pbSlider.slider_Item).css("transform", ""), pbSlider.slider_Draggable = "#sliderItem_" + e, $(pbSlider.slider_Draggable).addClass("isAnimate");
        var i = -100 * pbSlider.slider_Active;
        if ($(pbSlider.slider_Draggable).css({
            perspective: "1000px",
            "backface-visibility": "hidden",
            transform: "translateX( " + i + "% )"
        }), clearTimeout(pbSlider.timer), pbSlider.timer = setTimeout(function () {
            $(pbSlider.slider_Wrap).find(pbSlider.slider_Draggable).removeClass("isAnimate"), $(pbSlider.slider_Wrap).find(pbSlider.slider_Item).removeClass("isActive").removeClass("isMoving"), $(pbSlider.slider_Wrap).find(pbSlider.slider_Item + "[data-id=slide-" + pbSlider.slider_Active + "]").addClass("isActive"), $(pbSlider.slider_Wrap + " .o-slider--item img").css("transform", "translateX(0px )")
        }, slider_Opts.slider_Speed), !0 === slider_Opts.slider_Dots.enabled) {
            for (var r = $(pbSlider.slider_Wrap).find(pbSlider.slider_Dots.class + " > *"), l = 0; l < r.length; l++) {
                var d = l == pbSlider.slider_Active ? "isActive" : "";
                $(pbSlider.slider_Wrap).find(r[l]).removeClass("isActive").addClass(d), $(pbSlider.slider_Wrap).find(r[l]).children().removeClass("isActive").addClass(d)
            }
            setTimeout(function () {
                $(pbSlider.slider_Wrap).find(r).children().removeClass("isActive")
            }, 500)
        }
        pbSlider.slider_Active = Number(pbSlider.slider_Active)
    }, pbSlider.auto = function () {
        pbSlider.autoTimer = setInterval(function () {
            pbSlider.slider_Active >= pbSlider.slider_Count - 1 ? pbSlider.pbGoslide(0) : $(pbSlider.slider_Wrap + " .o-slider-next").trigger("click")
        }, 3e3)
    }, currIdx = 0; currIdx < 4; currIdx++) {
        thisVal = "#sliderItem_" + currIdx, newElement = "<div class='o-slider--item' id='sliderItem_" + currIdx + "' data-image='" + imageBasePath +  "/" + imgPath[currIdx] + "' style='background-image: url(\"" + imageBasePath + "/" + imgPath[currIdx] + "\");'>", newElement += "<div class='o-slider-textWrap'>", newElement += "<span class='a-divider'></span>", newElement += "<h2 class='o-slider-subTitle'>" + titles[currIdx] + "</h2>", newElement += "<span class='a-divider'></span>", newElement += "<p class='o-slider-paragraph'>" + photoGraphers[currIdx] + "</p>", newElement += "</div></div>", $("#pbSlider0").append(newElement), 0 == currIdx && $("head").append("<style>" + pbSlider.slider_Wrap + " .o-slider.isAnimate{-webkit-transition: all " + slider_Opts.slider_Speed + "ms " + slider_Opts.slider_Ease + ";transition: all " + slider_Opts.slider_Speed + "ms " + slider_Opts.slider_Ease + ";</style>"), setTimeout(function () {
            var e = $(slider_Opts.slider_Wrap + " .loaderWrap");
            $(e).hide()
        }, 200), $(pbSlider.slider_Wrap + " .o-slider-controls").addClass("isVisible"), $(pbSlider.slider_Draggable).addClass("isVisible");
        var e = document.documentElement.clientWidth;
        e >= slider_Opts.slider_Breakpoints.tablet.media ? $(pbSlider.slider_Wrap + ".o-sliderContainer," + pbSlider.slider_Wrap + " " + pbSlider.slider_Item).css({height: slider_Opts.slider_Breakpoints.default.height}) : e >= slider_Opts.slider_Breakpoints.smartphone.media ? $(pbSlider.slider_Wrap + ".o-sliderContainer," + pbSlider.slider_Wrap + " " + pbSlider.slider_Item).css({height: slider_Opts.slider_Breakpoints.tablet.height}) : $(pbSlider.slider_Wrap + ".o-sliderContainer," + pbSlider.slider_Wrap + " " + pbSlider.slider_Item).css({height: slider_Opts.slider_Breakpoints.smartphone.height}), 3 == currIdx && pbSlider.pbInit(thisVal)
    }
}

$(slider_Opts.slider_Wrap).each(function () {
    $("#pbSlider0").append(loaderHtml)
}), pbTouchSlider();
var mod;
mod = angular.module("infinite-scroll", []), mod.directive("infiniteScroll", ["$rootScope", "$window", "$timeout", function (i, n, e) {
    return {
        link: function (t, l, o) {
            var r, c, f, a;
            return n = angular.element(n), f = 0, null != o.infiniteScrollDistance && t.$watch(o.infiniteScrollDistance, function (i) {
                return f = parseInt(i, 10)
            }), a = !0, r = !1, null != o.infiniteScrollDisabled && t.$watch(o.infiniteScrollDisabled, function (i) {
                return a = !i, a && r ? (r = !1, c()) : void 0
            }), c = function () {
                var e, c, u, d;
                return d = n.height() + n.scrollTop(), e = l.offset().top + l.height(), c = e - d, u = n.height() * f >= c, u && a ? i.$$phase ? t.$eval(o.infiniteScroll) : t.$apply(o.infiniteScroll) : u ? r = !0 : void 0
            }, n.on("scroll", c), t.$on("$destroy", function () {
                return n.off("scroll", c)
            }), e(function () {
                return o.infiniteScrollImmediateCheck ? t.$eval(o.infiniteScrollImmediateCheck) ? c() : void 0 : c()
            }, 0)
        }
    }
}]);