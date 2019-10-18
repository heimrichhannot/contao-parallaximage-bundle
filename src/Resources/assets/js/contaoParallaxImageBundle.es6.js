require('../../assets/scss/contaoParallaxImageBundle.scss');

let Rellax = require('rellax');

(function($) {
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.parallax-background').forEach(function(element) {
            let rellax = new Rellax('.parallax-image img', {
                wrapper: element,
                relativeToWrapper: true
            });
        });
    }, true);
})();