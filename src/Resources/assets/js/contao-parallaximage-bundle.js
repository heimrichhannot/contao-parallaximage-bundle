require('../../assets/scss/contao-parallaximage-bundle.scss');

import 'intersection-observer'
import simpleParallax from 'simple-parallax-js';

class ContaoParallaxBundle
{
    static init()
    {
        let image = document.querySelectorAll('.parallax-background .parallax-image img');
        if (image.count < 1) {
            return;
        }
        let config = {};
        config = ContaoParallaxBundle.polyfillIE(config);
        new simpleParallax(image, config);
    }

    static polyfillIE(parallaxConfig)
    {
        var isIE = !Element.prototype.closest;
        if (isIE) {
            parallaxConfig.transition = 'transform 10ms linear';
        }

        // Element.closest polyfill begin
        if (!Element.prototype.matches) {
            Element.prototype.matches = Element.prototype.msMatchesSelector ||
                Element.prototype.webkitMatchesSelector;
        }

        if (!Element.prototype.closest) {
            Element.prototype.closest = function(s) {
                var el = this;

                do
                {
                    if (el.matches(s))
                    {
                        return el;
                    }
                    el = el.parentElement || el.parentNode;
                } while (el !== null && el.nodeType === 1);
                return null;
            };
        }
    }
}

document.addEventListener('DOMContentLoaded', ContaoParallaxBundle.init);