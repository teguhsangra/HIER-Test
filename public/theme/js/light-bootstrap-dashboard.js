/*!

 =========================================================
 * Light Bootstrap Dashboard - v2.0.1
 =========================================================

 * Product Page: http://www.creative-tim.com/product/light-bootstrap-dashboard
 * Copyright 2017 Creative Tim (http://www.creative-tim.com)
 * License (https://www.creative-tim.com/license)

 =========================================================

 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

 */

var searchVisible = 0;
var transparent = true;

var transparentDemo = true;
var fixedTop = false;

var navbar_initialized = false;
var mobile_menu_visible = 0,
    mobile_menu_initialized = false,
    toggle_initialized = false,
    bootstrap_nav_initialized = false,
    $sidebar,
    isWindows;

$(document).ready(function() {
    window_width = $(window).width();

    // check if there is an image set for the sidebar's background
    lbd.checkSidebarImage();

    // Init navigation toggle for small screens
    if (window_width <= 991) {
        lbd.initRightMenu();
    }

    lbd.initMinimizeSidebar();

    // Init Collapse Areas
    lbd.initCollapseArea();

    //  Activate the tooltips
    $('[rel="tooltip"]').tooltip();

    // Init Tags Input
    // if($(".tagsinput").length != 0){
    //     $(".tagsinput").tagsInput();
    // }

    //  Activate regular switches
    if ($("[data-toggle='switch']").length != 0) {
        $("[data-toggle='switch']").bootstrapSwitch();
    }

    $('.form-control').on("focus", function() {
        $(this).parent('.input-group').addClass("input-group-focus");
    }).on("blur", function() {
        $(this).parent(".input-group").removeClass("input-group-focus");
    });

    // Share buttons
    if ($('.twitter-sharrre').length != 0) {
        $('.twitter-sharrre').sharrre({
            share: {
                twitter: true
            },
            enableHover: false,
            enabletracking: false,
            enableCounter: false,
            buttons: {
                twitter: {
                    via: 'CreativeTim'
                }
            },
            click: function(api, options) {
                api.simulateClick();
                api.openPopup('twitter');
            },
            template: '<i class="fa fa-twitter"></i>',
            url: 'http://demos.creative-tim.com/light-bootstrap-dashboard-pro/examples/dashboard.html'
        });
    }

    if ($('.twitter-sharrre-nav').length != 0) {
        $('.twitter-sharrre-nav').sharrre({
            share: {
                twitter: true
            },
            enableHover: false,
            enabletracking: false,
            enableCounter: false,
            buttons: {
                twitter: {
                    via: 'CreativeTim'
                }
            },
            click: function(api, options) {
                api.simulateClick();
                api.openPopup('twitter');
            },
            template: '<i class="fa fa-twitter"></i><p class="hidden-lg-up">Twitter</p>',
            url: 'http://demos.creative-tim.com/light-bootstrap-dashboard-pro/examples/dashboard.html'
        });
    }

    if ($('.facebook-sharrre').length != 0) {
        $('.facebook-sharrre').sharrre({
            share: {
                facebook: true
            },
            enableHover: false,
            enabletracking: false,
            enableCounter: false,
            click: function(api, options) {
                api.simulateClick();
                api.openPopup('facebook');
            },
            template: '<i class="fa fa-facebook-square"></i>',
            url: 'http://demos.creative-tim.com/light-bootstrap-dashboard-pro/examples/dashboard.html'
        });
    }

    if ($('.facebook-sharrre-nav').length != 0) {
        $('.facebook-sharrre-nav').sharrre({
            share: {
                facebook: true
            },
            enableHover: false,
            enabletracking: false,
            enableCounter: false,
            click: function(api, options) {
                api.simulateClick();
                api.openPopup('facebook');
            },
            template: '<i class="fa fa-facebook-square"></i><p class="hidden-lg-up">Facebook</p>',
            url: 'http://demos.creative-tim.com/light-bootstrap-dashboard-pro/examples/dashboard.html'
        });
    }

    if ($('.linkedin-sharrre').length != 0) {
        $('.linkedin-sharrre').sharrre({
            share: {
                linkedin: true
            },
            enableCounter: false,
            enableHover: false,
            enabletracking: false,
            click: function(api, options) {
                api.simulateClick();
                api.openPopup('linkedin');
            },
            template: '<i class="fa fa-linkedin"></i>',
            url: 'http://demos.creative-tim.com/light-bootstrap-dashboard-pro/examples/dashboard.html'
        });
    }

    if ($('.linkedin-sharrre-nav').length != 0) {
        $('.linkedin-sharrre-nav').sharrre({
            share: {
                linkedin: true
            },
            enableCounter: false,
            enableHover: false,
            enabletracking: false,
            click: function(api, options) {
                api.simulateClick();
                api.openPopup('linkedin');
            },
            template: '<i class="fa fa-linkedin"></i><p class="hidden-lg-up">LinkedIn</p>',
            url: 'http://demos.creative-tim.com/light-bootstrap-dashboard-pro/examples/dashboard.html'
        });
    }

    // Fixes sub-nav not working as expected on IOS
    $('body').on('touchstart.dropdown', '.dropdown-menu', function(e) {
        e.stopPropagation();
    });
});

// activate collapse right menu when the windows is resized
$(window).resize(function() {
    if ($(window).width() <= 991) {
        lbd.initRightMenu();
    }
});

lbd = {
    misc: {
        navbar_menu_visible: 0
    },
    checkSidebarImage: function() {
        $sidebar = $('.sidebar');
        image_src = $sidebar.data('image');

        if (image_src !== undefined) {
            sidebar_container = '<div class="sidebar-background" style="background-image: url(' + image_src + ') "/>'
            $sidebar.append(sidebar_container);
        } else if (mobile_menu_initialized == true) {
            // reset all the additions that we made for the sidebar wrapper only if the screen is bigger than 991px
            $sidebar_wrapper.find('.navbar-form').remove();
            $sidebar_wrapper.find('.nav-mobile-menu').remove();

            mobile_menu_initialized = false;
        }
    },

    initRightMenu: function() {
        $sidebar_wrapper = $('.sidebar-wrapper');

        //console.log('aici se face meniu in dreapta');

        if (!mobile_menu_initialized) {

            $navbar = $('nav').find('.navbar-collapse').first().clone(true);

            nav_content = '';
            mobile_menu_content = '';

            //add the content from the regular header to the mobile menu
            //pas = 1;
            $navbar.children('ul').each(function() {

                content_buff = $(this).html();
                nav_content = nav_content + content_buff;
                //console.log('pas:' + pas);

                //pas = pas+1;
            });

            nav_content = '<ul class="nav nav-mobile-menu">' + nav_content + '</ul>';

            $sidebar_nav = $sidebar_wrapper.find(' > .nav');

            // insert the navbar form before the sidebar list
            $nav_content = $(nav_content);
            $nav_content.insertBefore($sidebar_nav);

            $(".sidebar-wrapper .dropdown .dropdown-menu > li > a").click(function(event) {
                event.stopPropagation();

            });

            mobile_menu_initialized = true;
        } else {
            console.log('window with:' + $(window).width());
            if ($(window).width() > 991) {
                // reset all the additions that we made for the sidebar wrapper only if the screen is bigger than 991px
                $sidebar_wrapper.find('.navbar-form').remove();
                $sidebar_wrapper.find('.nav-mobile-menu').remove();

                mobile_menu_initialized = false;
            }
        }

        if (!toggle_initialized) {
            $toggle = $('.navbar-toggler');

            $toggle.click(function() {

                if (mobile_menu_visible == 1) {
                    $('html').removeClass('nav-open');

                    $('.close-layer').remove();
                    setTimeout(function() {
                        $toggle.removeClass('toggled');
                    }, 400);

                    mobile_menu_visible = 0;
                } else {
                    setTimeout(function() {
                        $toggle.addClass('toggled');
                    }, 430);


                    main_panel_height = $('.main-panel')[0].scrollHeight;
                    $layer = $('<div class="close-layer"></div>');
                    $layer.css('height', main_panel_height + 'px');
                    $layer.appendTo(".main-panel");

                    setTimeout(function() {
                        $layer.addClass('visible');
                    }, 100);

                    $layer.click(function() {
                        $('html').removeClass('nav-open');
                        mobile_menu_visible = 0;

                        $layer.removeClass('visible');

                        setTimeout(function() {
                            $layer.remove();
                            $toggle.removeClass('toggled');

                        }, 400);
                    });

                    $('html').addClass('nav-open');
                    mobile_menu_visible = 1;

                }
            });

            toggle_initialized = true;
        }
    },

    initMinimizeSidebar: function() {

        // when we are on a Desktop Screen and the collapse is triggered we check if the sidebar mini is active or not. If it is active then we don't let the collapse to show the elements because the elements from the collapse are showing on the hover state over the icons in sidebar mini, not on the click.
        $('.sidebar .collapse').on('in.bs.collapse', function() {
            if ($(window).width() > 991) {
                if (lbd.misc.sidebar_mini_active == true) {
                    return false;
                } else {
                    return true;
                }
            }
        });

        $('#minimizeSidebar').click(function() {
            var $btn = $(this);

            if (lbd.misc.sidebar_mini_active == true) {
                $('body').removeClass('sidebar-mini');
                lbd.misc.sidebar_mini_active = false;

                if (isWindows) {
                    $('.sidebar .sidebar-wrapper').perfectScrollbar();
                }

            } else {

                $('.sidebar .collapse').collapse('hide').on('hidden.bs.collapse', function() {
                    $(this).css('height', 'auto');
                });

                if (isWindows) {
                    $('.sidebar .sidebar-wrapper').perfectScrollbar('destroy');
                }

                setTimeout(function() {
                    $('body').addClass('sidebar-mini');

                    $('.sidebar .collapse').css('height', 'auto');
                    lbd.misc.sidebar_mini_active = true;
                }, 300);
            }

            // we simulate the window Resize so the charts will get updated in realtime.
            var simulateWindowResize = setInterval(function() {
                window.dispatchEvent(new Event('resize'));
            }, 180);

            // we stop the simulation of Window Resize after the animations are completed
            setTimeout(function() {
                clearInterval(simulateWindowResize);
            }, 1000);
        });
    },

    initCollapseArea: function() {
        $('[data-toggle]').each(function() {
            var thisdiv = $(this).hasClass('card-collapse');
            $(thisdiv).addClass('collapse-preview');
        });

        $('[data-toggle="collapse-hover"]').hover(function() {
                var thisdiv = $(this).attr("data-target");
                if (!$(this).hasClass('state-open')) {
                    $(this).addClass('state-hover');
                    $(thisdiv).css({
                        'height': '30px',
                        'display': 'block',
                        'overflow': 'hidden'
                    });
                }

            },
            function() {
                var thisdiv = $(this).attr("data-target");
                $(this).removeClass('state-hover');

                if (!$(this).hasClass('state-open')) {
                    $(thisdiv).css({
                        'height': '0px'
                    });
                }
            }).click(function(event) {
            event.preventDefault();

            var thisdiv = $(this).attr("data-target");
            var height = $(thisdiv).children('.card-body').height();

            if ($(this).hasClass('state-open')) {
                $(thisdiv).css({
                    'height': '0px',

                });
                $(this).removeClass('state-open');
            } else {
                $(thisdiv).css({
                    'height': height + 30,
                });
                $(this).addClass('state-open');
            }
        });
    }
}



// Returns a function, that, as long as it continues to be invoked, will not
// be triggered. The function will be called after it stops being called for
// N milliseconds. If `immediate` is passed, trigger the function on the
// leading edge, instead of the trailing.

function debounce(func, wait, immediate) {
    var timeout;
    return function() {
        var context = this,
            args = arguments;
        clearTimeout(timeout);
        timeout = setTimeout(function() {
            timeout = null;
            if (!immediate) func.apply(context, args);
        }, wait);
        if (immediate && !timeout) func.apply(context, args);
    };
};


// analytics

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-46172202-1']);
_gaq.push(['_trackPageview']);

(function() {
    var ga = document.createElement('script');
    ga.type = 'text/javascript';
    ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(ga, s);
})();

$().ready(function() {
    $sidebar = $('.sidebar');
    $sidebar_img_container = $sidebar.find('.sidebar-background');

    $full_page = $('.full-page');

    $sidebar_responsive = $('body > .navbar-collapse');

    window_width = $(window).width();

    fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

    if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
        if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('show');
        }

    }

    $('.fixed-plugin a').click(function(event) {
        // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
        if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
                event.stopPropagation();
            } else if (window.event) {
                window.event.cancelBubble = true;
            }
        }
    });

    $('.fixed-plugin .background-color span').click(function() {
        $(this).siblings().removeClass('active');
        $(this).addClass('active');

        var new_color = $(this).data('color');

        if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
        }

        if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
        }

        if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
        }
    });

    $('.fixed-plugin .img-holder').click(function() {
        $full_page_background = $('.full-page-background');

        $(this).parent('li').siblings().removeClass('active');
        $(this).parent('li').addClass('active');


        var new_image = $(this).find("img").attr('src');

        if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
                $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                $sidebar_img_container.fadeIn('fast');
            });
        }

        if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
                $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                $full_page_background.fadeIn('fast');
            });
        }

        if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
        }

        if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
        }
    });

    $('.switch input').on("switchChange.bootstrapSwitch", function() {

        $full_page_background = $('.full-page-background');

        $input = $(this);

        if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
                $sidebar_img_container.fadeIn('fast');
                $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
                $full_page_background.fadeIn('fast');
                $full_page.attr('data-image', '#');
            }

            background_image = true;
        } else {
            if ($sidebar_img_container.length != 0) {
                $sidebar.removeAttr('data-image');
                $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
                $full_page.removeAttr('data-image', '#');
                $full_page_background.fadeOut('fast');
            }

            background_image = false;
        }
    });
});

type = ['primary', 'info', 'success', 'warning', 'danger'];

light = {
    initPickColor: function() {
        $('.pick-class-label').click(function() {
            var new_class = $(this).attr('new-class');
            var old_class = $('#display-buttons').attr('data-class');
            var display_div = $('#display-buttons');
            if (display_div.length) {
                var display_buttons = display_div.find('.btn');
                display_buttons.removeClass(old_class);
                display_buttons.addClass(new_class);
                display_div.attr('data-class', new_class);
            }
        });
    },

    initDocumentationCharts: function() {
        /* ----------==========     Daily Sales Chart initialization For Documentation    ==========---------- */

        dataDailySalesChart = {
            labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
            series: [
                [12, 17, 7, 17, 23, 18, 38]
            ]
        };

        optionsDailySalesChart = {
            lineSmooth: Chartist.Interpolation.cardinal({
                tension: 0
            }),
            low: 0,
            high: 50, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
            chartPadding: {
                top: 0,
                right: 0,
                bottom: 0,
                left: 0
            },
        }

        var dailySalesChart = new Chartist.Line('#dailySalesChart', dataDailySalesChart, optionsDailySalesChart);

        // lbd.startAnimationForLineChart(dailySalesChart);
    },

    initDashboardPageCharts: function() {

        var dataPreferences = {
            series: [
                [25, 30, 20, 25]
            ]
        };

        var optionsPreferences = {
            donut: true,
            donutWidth: 40,
            startAngle: 0,
            total: 100,
            showLabel: false,
            axisX: {
                showGrid: false
            }
        };

        Chartist.Pie('#chartPreferences', dataPreferences, optionsPreferences);

        Chartist.Pie('#chartPreferences', {
            labels: ['53%', '36%', '11%'],
            series: [53, 36, 11]
        });


        var dataSales = {
            labels: ['9:00AM', '12:00AM', '3:00PM', '6:00PM', '9:00PM', '12:00PM', '3:00AM', '6:00AM'],
            series: [
                [287, 385, 490, 492, 554, 586, 698, 695, 752, 788, 846, 944],
                [67, 152, 143, 240, 287, 335, 435, 437, 539, 542, 544, 647],
                [23, 113, 67, 108, 190, 239, 307, 308, 439, 410, 410, 509]
            ]
        };

        // var optionsSales = {
        //   lineSmooth: false,
        //   low: 0,
        //   high: 800,
        //    chartPadding: 0,
        //   showArea: true,
        //   height: "245px",
        //   axisX: {
        //     showGrid: false,
        //   },
        //   axisY: {
        //     showGrid: false,
        //   },
        //   lineSmooth: Chartist.Interpolation.simple({
        //     divisor: 6
        //   }),
        //   showLine: false,
        //   showPoint: true,
        //   fullWidth: true
        // };
        var optionsSales = {
            lineSmooth: false,
            low: 0,
            high: 800,
            showArea: true,
            height: "245px",
            axisX: {
                showGrid: false,
            },
            lineSmooth: Chartist.Interpolation.simple({
                divisor: 3
            }),
            showLine: false,
            showPoint: false,
            fullWidth: false
        };

        var responsiveSales = [
            ['screen and (max-width: 640px)', {
                axisX: {
                    labelInterpolationFnc: function(value) {
                        return value[0];
                    }
                }
            }]
        ];

        var chartHours = Chartist.Line('#chartHours', dataSales, optionsSales, responsiveSales);

        // lbd.startAnimationForLineChart(chartHours);

        var data = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            series: [
                [542, 443, 320, 780, 553, 453, 326, 434, 568, 610, 756, 895],
                [412, 243, 280, 580, 453, 353, 300, 364, 368, 410, 636, 695]
            ]
        };

        var options = {
            seriesBarDistance: 10,
            axisX: {
                showGrid: false
            },
            height: "245px"
        };

        var responsiveOptions = [
            ['screen and (max-width: 640px)', {
                seriesBarDistance: 5,
                axisX: {
                    labelInterpolationFnc: function(value) {
                        return value[0];
                    }
                }
            }]
        ];

        var chartActivity = Chartist.Bar('#chartActivity', data, options, responsiveOptions);

        // lbd.startAnimationForBarChart(chartActivity);

        // /* ----------==========     Daily Sales Chart initialization    ==========---------- */
        //
        // dataDailySalesChart = {
        //     labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
        //     series: [
        //         [12, 17, 7, 17, 23, 18, 38]
        //     ]
        // };
        //
        // optionsDailySalesChart = {
        //     lineSmooth: Chartist.Interpolation.cardinal({
        //         tension: 0
        //     }),
        //     low: 0,
        //     high: 50, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
        //     chartPadding: { top: 0, right: 0, bottom: 0, left: 0},
        // }
        //
        // var dailySalesChart = Chartist.Line('#dailySalesChart', dataDailySalesChart, optionsDailySalesChart);

        // lbd.startAnimationForLineChart(dailySalesChart);

        //
        //
        // /* ----------==========     Completed Tasks Chart initialization    ==========---------- */
        //
        // dataCompletedTasksChart = {
        //     labels: ['12am', '3pm', '6pm', '9pm', '12pm', '3am', '6am', '9am'],
        //     series: [
        //         [230, 750, 450, 300, 280, 240, 200, 190]
        //     ]
        // };
        //
        // optionsCompletedTasksChart = {
        //     lineSmooth: Chartist.Interpolation.cardinal({
        //         tension: 0
        //     }),
        //     low: 0,
        //     high: 1000, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
        //     chartPadding: { top: 0, right: 0, bottom: 0, left: 0}
        // }
        //
        // var completedTasksChart = new Chartist.Line('#completedTasksChart', dataCompletedTasksChart, optionsCompletedTasksChart);
        //
        // // start animation for the Completed Tasks Chart - Line Chart
        // lbd.startAnimationForLineChart(completedTasksChart);
        //
        //
        // /* ----------==========     Emails Subscription Chart initialization    ==========---------- */
        //
        // var dataEmailsSubscriptionChart = {
        //   labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        //   series: [
        //     [542, 443, 320, 780, 553, 453, 326, 434, 568, 610, 756, 895]
        //
        //   ]
        // };
        // var optionsEmailsSubscriptionChart = {
        //     axisX: {
        //         showGrid: false
        //     },
        //     low: 0,
        //     high: 1000,
        //     chartPadding: { top: 0, right: 5, bottom: 0, left: 0}
        // };
        // var responsiveOptions = [
        //   ['screen and (max-width: 640px)', {
        //     seriesBarDistance: 5,
        //     axisX: {
        //       labelInterpolationFnc: function (value) {
        //         return value[0];
        //       }
        //     }
        //   }]
        // ];
        // var emailsSubscriptionChart = Chartist.Bar('#emailsSubscriptionChart', dataEmailsSubscriptionChart, optionsEmailsSubscriptionChart, responsiveOptions);
        //
        // //start animation for the Emails Subscription Chart
        // lbd.startAnimationForBarChart(emailsSubscriptionChart);

    },

    initGoogleMaps: function() {
        var myLatlng = new google.maps.LatLng(40.748817, -73.985428);
        var mapOptions = {
            zoom: 13,
            center: myLatlng,
            scrollwheel: false, //we disable de scroll over the map, it is a really annoing when you scroll through page
            styles: [{
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#e9e9e9"
                }, {
                    "lightness": 17
                }]
            }, {
                "featureType": "landscape",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#f5f5f5"
                }, {
                    "lightness": 20
                }]
            }, {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#ffffff"
                }, {
                    "lightness": 17
                }]
            }, {
                "featureType": "road.highway",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "color": "#ffffff"
                }, {
                    "lightness": 29
                }, {
                    "weight": 0.2
                }]
            }, {
                "featureType": "road.arterial",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#ffffff"
                }, {
                    "lightness": 18
                }]
            }, {
                "featureType": "road.local",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#ffffff"
                }, {
                    "lightness": 16
                }]
            }, {
                "featureType": "poi",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#f5f5f5"
                }, {
                    "lightness": 21
                }]
            }, {
                "featureType": "poi.park",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#dedede"
                }, {
                    "lightness": 21
                }]
            }, {
                "elementType": "labels.text.stroke",
                "stylers": [{
                    "visibility": "on"
                }, {
                    "color": "#ffffff"
                }, {
                    "lightness": 16
                }]
            }, {
                "elementType": "labels.text.fill",
                "stylers": [{
                    "saturation": 36
                }, {
                    "color": "#333333"
                }, {
                    "lightness": 40
                }]
            }, {
                "elementType": "labels.icon",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "transit",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#f2f2f2"
                }, {
                    "lightness": 19
                }]
            }, {
                "featureType": "administrative",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#fefefe"
                }, {
                    "lightness": 20
                }]
            }, {
                "featureType": "administrative",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "color": "#fefefe"
                }, {
                    "lightness": 17
                }, {
                    "weight": 1.2
                }]
            }]
        };

        var map = new google.maps.Map(document.getElementById("map"), mapOptions);

        var marker = new google.maps.Marker({
            position: myLatlng,
            title: "Hello World!"
        });

        // To add the marker to the map, call setMap();
        marker.setMap(map);
    },

    showNotification: function(from, align) {
        color = Math.floor((Math.random() * 4) + 1);

        $.notify({
            icon: "nc-icon nc-app",
            message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

        }, {
            type: type[color],
            timer: 8000,
            placement: {
                from: from,
                align: align
            }
        });
    }



}