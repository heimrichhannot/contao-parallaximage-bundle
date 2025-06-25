import '../../assets/scss/contao-parallaximage-bundle.scss';

let Rellax = require('rellax');

class ContaoParallaxBundle
{
    static init()
    {


        document.querySelectorAll('.parallax-background').forEach(function(element) {
            let rellax = new Rellax('.parallax-image img', {
                wrapper: element,
                relativeToWrapper: true
            });
        });
    }
}

document.addEventListener('DOMContentLoaded', ContaoParallaxBundle.init);