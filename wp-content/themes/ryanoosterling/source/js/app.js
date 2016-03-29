$(document).ready(function(){
    function init() {
        window.addEventListener('scroll', function(e){
            var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                shrinkOn = 80,
                header = document.querySelector("nav.page");
            if (header) {
                if (distanceY > shrinkOn) {
                    classie.add(header,"smaller");
                } else {
                    if (classie.has(header,"smaller")) {
                        classie.remove(header,"smaller");
                    }
                }
            }
        });
    }
    init();
    $('.ninja-forms-form').find('.ninja-forms-all-fields-wrap').addClass('');
    $('.ninja-forms-form').find('input.small').parent().addClass('col-md-6');
    $('.ninja-forms-form').find('.full').parent().addClass('col-md-12');
    $('.ninja-forms-form').find('input[type=submit]').parent().addClass('col-md-12');
});