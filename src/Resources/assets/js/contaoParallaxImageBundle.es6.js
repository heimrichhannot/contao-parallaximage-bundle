require('../../assets/scss/contaoParallaxImageBundle.scss');

let Rellax = require('rellax');

(function($) {
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.parallax-background').forEach(function(element) {
            if (element.querySelectorAll('.parallax-image img').length > 0) {
                new Rellax('.parallax-image img', {
                    wrapper: element,
                    relativeToWrapper: true
                });
            }
        });
    }, true);
})();