$(document).ready(function($){
    var container = $('#projects-grid');

    container.imagesLoaded( function() {
        // init Isotope after all images have loaded
        container.isotope( { 
            itemSelector : '.portfolio-box-1', 
            layoutMode : 'masonry', 
            resizable : true 
        } );
    });

    $(window).on('debouncedresize', function () { 
        reArrangeProjects();
    } );

    $('#portfolio-filter #filter a').click(function () { 
        var selector = $(this).attr('data-filter');
        
        $(this).parent().parent().find('a').removeClass('current');
        $(this).addClass('current');
        
        container.isotope( { 
            filter : selector 
        });
        
        setTimeout(function () { 
            reArrangeProjects();
        }, 300);
        
        return false;
    });
    
    function setFilter(){
        var filterUrl = getUrlParameter('cat');
    };

    function getNumbColumns() { 
        var winWidth = $(window).width(), 
            columnNumb = 1;
        
        if (winWidth > 1500) {
            columnNumb = 4;
        } else if (winWidth > 1200) {
            columnNumb = 3;
        } else if (winWidth > 900) {
            columnNumb = 2;
        } else if (winWidth > 600) {
            columnNumb = 2;
        } else if (winWidth > 300) {
            columnNumb = 1;
        }
        
        return columnNumb;
    };
    
    function setColumnWidth() { 
        var winWidth = $(window).width(), 
            columnNumb = getNumbColumns(), 
            postWidth = Math.floor(winWidth / columnNumb);
    };
    
    function reArrangeProjects() { 
        setColumnWidth();
        container.isotope('layout');
    }; 

    function getUrlParameter(sParam) {
        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : sParameterName[1];
            }
        }
    };
    
    (function($) { 
        var $event = $.event, 
            $special, 
            resizeTimeout;
        
        $special = $event.special.debouncedresize = { 
            setup : function () { 
                $(this).on('resize', $special.handler);
            }, 
            teardown : function () { 
                $(this).off('resize', $special.handler);
            }, 
            handler : function (event, execAsap) { 
                var context = this, 
                    args = arguments, 
                    dispatch = function () { 
                        event.type = 'debouncedresize';
                        
                        $event.dispatch.apply(context, args);
                    };
                if (resizeTimeout) {
                    clearTimeout(resizeTimeout);
                }
                execAsap ? dispatch() : resizeTimeout = setTimeout(dispatch, $special.threshold);
            }, 
            threshold : 150 
        };
    })(jQuery);
});
