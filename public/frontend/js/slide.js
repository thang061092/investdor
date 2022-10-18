var SLIDER = (function () {
    var _initSlide = function () {
        const swiperBanner = new Swiper(".banners .swiper", {
            slidesPerView: 1,
            loop: false,
            speed: 600,
            autoHeight: true,
            autoplay: true,
            speed: 1000,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
        });
    };
    var _initSlideRatting = function () {
        const swiperRattings = new Swiper(".swiper-rattings", {
            slidesPerView: 1,
            loop: false,
            speed: 600,
            autoHeight: true,
            autoplay: true,
            speed: 1000,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
        });
    };
    var _initSlideKnowledge = function () {
        const swiperKnowledges = new Swiper(".swiper-knowledge", {
            slidesPerView: 1,
            loop: false,
            speed: 600,
            autoHeight: true,
            autoplay: true,
            speed: 1000,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            pagination: {
                el: ".knowledge-infomation .swiper-pagi",
                clickable: true,
            },
        });
    };
    var _initSlideProject = function () {
        const swiperProject = new Swiper(".swiper_project", {
            slidesPerView: 5,
            loop: false,
            speed: 800,
            autoHeight: false,
            autoplay: true,
            speed: 1000,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            navigation: {
                nextEl: ".recent_project .swiper-prev",
                prevEl: ".recent_project .swiper-next",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                576: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 15,
                },
                1200: {
                    slidesPerView: 4,
                    spaceBetween: 12,
                },
                1651: {
                    slidesPerView: 5,
                    spaceBetween: 15,
                },
                1919: {
                    spaceBetween: 24,
                },
            },
        });
    };
    var _initSlideFeels = function () {
        const swiperFeel = new Swiper(".swiper-feels", {
            slidesPerView: 5,
            loop: false,
            speed: 800,
            autoHeight: true,
            autoplay: true,
            speed: 1000,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            breakpoints: {
                320: {
                    slidesPerView: 1.1,
                    spaceBetween: 10,
                },
                576: {
                    slidesPerView: 1.4,
                    spaceBetween: 12,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 12,
                },
                1200: {
                    slidesPerView: 4,
                    spaceBetween: 12,
                },
                1600: {
                    slidesPerView: 4,
                    spaceBetween: 15,
                },
                1919: {
                    slidesPerView: 4,
                    spaceBetween: 24,
                },
            },
        });
    };
    var _initSlideImages = function () {
        const swiperImages = new Swiper(".swiper-images", {
            slidesPerView: 3.5,
            loop: false,
            speed: 800,
            autoHeight: true,
            autoplay: true,
            speed: 1000,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            breakpoints: {
                320: {
                    slidesPerView: 1.3,
                    spaceBetween: 10,
                },
                576: {
                    slidesPerView: 1.4,
                    spaceBetween: 12,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 12,
                },
                1200: {
                    slidesPerView: 3.5,
                    spaceBetween: 12,
                },
                1600: {
                    slidesPerView: 3.5,
                    spaceBetween: 15,
                },
                1919: {
                    slidesPerView: 3.5,
                    spaceBetween: 24,
                },
            },
        });
    };
    var _initSlideTeam = function () {
        const swiperTeam = new Swiper(".swiper-teams", {
            slidesPerView: 3.5,
            loop: false,
            speed: 800,
            autoHeight: true,
            autoplay: true,
            speed: 1000,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            breakpoints: {
                320: {
                    slidesPerView: 1.3,
                    spaceBetween: 10,
                },
                576: {
                    slidesPerView: 1.4,
                    spaceBetween: 12,
                },
                768: {
                    slidesPerView: 2.5,
                    spaceBetween: 12,
                },
                1200: {
                    slidesPerView: 2.5,
                    spaceBetween: 12,
                },
                1600: {
                    slidesPerView: 2.5,
                    spaceBetween: 15,
                },
                1919: {
                    slidesPerView: 3,
                    spaceBetween: 24,
                },
            },
        });
    };
    return {
        _: function () {
            _initSlide();
            _initSlideProject();
            _initSlideFeels();
            _initSlideImages();
            _initSlideTeam();
            _initSlideRatting();
            _initSlideKnowledge();
        },
    };
})();

window.addEventListener("DOMContentLoaded", function () {
    SLIDER._();
});
