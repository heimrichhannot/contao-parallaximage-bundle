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
        let config = {
            scale: 1.3,
            overflow: true,
        };
        config = ContaoParallaxBundle.polyfillIE(config);
        let parallax = new simpleParallax(image, config);
        parallax.elements.forEach((element) => {
            let transform3dValues = element.style.transform.split(/\w+\(|\);?/)[1].split(/,\s?/g);
            element.style.marginTop = '-' + (transform3dValues[1]);

            // console.log(transform3dValues);
        })
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
        return parallaxConfig;
    }
}

document.addEventListener('DOMContentLoaded', ContaoParallaxBundle.init);