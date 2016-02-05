$(document).ready(function(){
	$(function() {
        $('#slides').superslides({
            play: 5000,
            pagination: false
        });
    });

    window.addEventListener('scroll', function(e){
        var distanceY = window.pageYOffset || document.documentElement.scrollTop,
            shrinkOn = window.innerHeight,
            header = document.querySelector("nav.home");
            console.log(shrinkOn);
        if (distanceY > shrinkOn) {
            classie.add(header,"fixed");
        } else {
            if (classie.has(header,"fixed")) {
                classie.remove(header,"fixed");
            }
        }
    });
})