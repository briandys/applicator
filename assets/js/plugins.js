// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());





// https://stackoverflow.com/a/7392655
( function( $ ) {
    var uniqueCntr = 0;
    $.fn.scrolled = function ( waitTime, fn ) {
        if ( typeof waitTime === "function" ) {
            fn = waitTime;
            waitTime = 300;
        }
        var tag = "scrollTimer" + uniqueCntr++;
        this.scroll( function () {
            var self = $( this );
            var timer = self.data( tag );
            if ( timer ) {
                clearTimeout( timer );
            }
            timer = setTimeout(function () {
                self.removeData( tag );
                fn.call( self[0] );
            }, waitTime);
            self.data( tag, timer );
        });
    }
} )( jQuery );





/*
 * jQuery Easing v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/
 *
 * Uses the built in easing capabilities added In jQuery 1.1
 * to offer multiple easing options
 *
 * TERMS OF USE - jQuery Easing
 * 
 * Open source under the BSD License. 
 * 
 * Copyright Â© 2008 George McGinley Smith
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list 
 * of conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * 
 * Neither the name of the author nor the names of contributors may be used to endorse 
 * or promote products derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED 
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 * OF THE POSSIBILITY OF SUCH DAMAGE. 
 *
*/

/*
 *
 * TERMS OF USE - EASING EQUATIONS
 * 
 * Open source under the BSD License. 
 * 
 * Copyright Â© 2001 Robert Penner
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list 
 * of conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * 
 * Neither the name of the author nor the names of contributors may be used to endorse 
 * or promote products derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED 
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 * OF THE POSSIBILITY OF SUCH DAMAGE. 
 *
 */

jQuery.easing.jswing=jQuery.easing.swing,jQuery.extend(jQuery.easing,{def:"easeOutQuad",swing:function(n,e,t,u,a){return jQuery.easing[jQuery.easing.def](n,e,t,u,a)},easeInQuad:function(n,e,t,u,a){return u*(e/=a)*e+t},easeOutQuad:function(n,e,t,u,a){return-u*(e/=a)*(e-2)+t},easeInOutQuad:function(n,e,t,u,a){return(e/=a/2)<1?u/2*e*e+t:-u/2*(--e*(e-2)-1)+t},easeInCubic:function(n,e,t,u,a){return u*(e/=a)*e*e+t},easeOutCubic:function(n,e,t,u,a){return u*((e=e/a-1)*e*e+1)+t},easeInOutCubic:function(n,e,t,u,a){return(e/=a/2)<1?u/2*e*e*e+t:u/2*((e-=2)*e*e+2)+t},easeInQuart:function(n,e,t,u,a){return u*(e/=a)*e*e*e+t},easeOutQuart:function(n,e,t,u,a){return-u*((e=e/a-1)*e*e*e-1)+t},easeInOutQuart:function(n,e,t,u,a){return(e/=a/2)<1?u/2*e*e*e*e+t:-u/2*((e-=2)*e*e*e-2)+t},easeInQuint:function(n,e,t,u,a){return u*(e/=a)*e*e*e*e+t},easeOutQuint:function(n,e,t,u,a){return u*((e=e/a-1)*e*e*e*e+1)+t},easeInOutQuint:function(n,e,t,u,a){return(e/=a/2)<1?u/2*e*e*e*e*e+t:u/2*((e-=2)*e*e*e*e+2)+t},easeInSine:function(n,e,t,u,a){return-u*Math.cos(e/a*(Math.PI/2))+u+t},easeOutSine:function(n,e,t,u,a){return u*Math.sin(e/a*(Math.PI/2))+t},easeInOutSine:function(n,e,t,u,a){return-u/2*(Math.cos(Math.PI*e/a)-1)+t},easeInExpo:function(n,e,t,u,a){return 0==e?t:u*Math.pow(2,10*(e/a-1))+t},easeOutExpo:function(n,e,t,u,a){return e==a?t+u:u*(-Math.pow(2,-10*e/a)+1)+t},easeInOutExpo:function(n,e,t,u,a){return 0==e?t:e==a?t+u:(e/=a/2)<1?u/2*Math.pow(2,10*(e-1))+t:u/2*(-Math.pow(2,-10*--e)+2)+t},easeInCirc:function(n,e,t,u,a){return-u*(Math.sqrt(1-(e/=a)*e)-1)+t},easeOutCirc:function(n,e,t,u,a){return u*Math.sqrt(1-(e=e/a-1)*e)+t},easeInOutCirc:function(n,e,t,u,a){return(e/=a/2)<1?-u/2*(Math.sqrt(1-e*e)-1)+t:u/2*(Math.sqrt(1-(e-=2)*e)+1)+t},easeInElastic:function(n,e,t,u,a){var r=1.70158,i=0,s=u;if(0==e)return t;if(1==(e/=a))return t+u;if(i||(i=.3*a),s<Math.abs(u)){s=u;var r=i/4}else var r=i/(2*Math.PI)*Math.asin(u/s);return-(s*Math.pow(2,10*(e-=1))*Math.sin((e*a-r)*(2*Math.PI)/i))+t},easeOutElastic:function(n,e,t,u,a){var r=1.70158,i=0,s=u;if(0==e)return t;if(1==(e/=a))return t+u;if(i||(i=.3*a),s<Math.abs(u)){s=u;var r=i/4}else var r=i/(2*Math.PI)*Math.asin(u/s);return s*Math.pow(2,-10*e)*Math.sin((e*a-r)*(2*Math.PI)/i)+u+t},easeInOutElastic:function(n,e,t,u,a){var r=1.70158,i=0,s=u;if(0==e)return t;if(2==(e/=a/2))return t+u;if(i||(i=a*(.3*1.5)),s<Math.abs(u)){s=u;var r=i/4}else var r=i/(2*Math.PI)*Math.asin(u/s);return 1>e?-.5*(s*Math.pow(2,10*(e-=1))*Math.sin((e*a-r)*(2*Math.PI)/i))+t:s*Math.pow(2,-10*(e-=1))*Math.sin((e*a-r)*(2*Math.PI)/i)*.5+u+t},easeInBack:function(n,e,t,u,a,r){return void 0==r&&(r=1.70158),u*(e/=a)*e*((r+1)*e-r)+t},easeOutBack:function(n,e,t,u,a,r){return void 0==r&&(r=1.70158),u*((e=e/a-1)*e*((r+1)*e+r)+1)+t},easeInOutBack:function(n,e,t,u,a,r){return void 0==r&&(r=1.70158),(e/=a/2)<1?u/2*(e*e*(((r*=1.525)+1)*e-r))+t:u/2*((e-=2)*e*(((r*=1.525)+1)*e+r)+2)+t},easeInBounce:function(n,e,t,u,a){return u-jQuery.easing.easeOutBounce(n,a-e,0,u,a)+t},easeOutBounce:function(n,e,t,u,a){return(e/=a)<1/2.75?u*(7.5625*e*e)+t:2/2.75>e?u*(7.5625*(e-=1.5/2.75)*e+.75)+t:2.5/2.75>e?u*(7.5625*(e-=2.25/2.75)*e+.9375)+t:u*(7.5625*(e-=2.625/2.75)*e+.984375)+t},easeInOutBounce:function(n,e,t,u,a){return a/2>e?.5*jQuery.easing.easeInBounce(n,2*e,0,u,a)+t:.5*jQuery.easing.easeOutBounce(n,2*e-a,0,u,a)+.5*u+t}});





/**
 * Copyright Marc J. Schmidt. See the LICENSE file at the top-level
 * directory of this distribution and at
 * https://github.com/marcj/css-element-queries/blob/master/LICENSE.
 */

/*
Resize Sensor

Copyright (c) 2013 Marc J. Schmidt

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/

!function(e,t){"function"==typeof define&&define.amd?define(t):"object"==typeof exports?module.exports=t():e.ResizeSensor=t()}("undefined"!=typeof window?window:this,function(){function e(e,t){var i=Object.prototype.toString.call(e),n="[object Array]"===i||"[object NodeList]"===i||"[object HTMLCollection]"===i||"[object Object]"===i||"undefined"!=typeof jQuery&&e instanceof jQuery||"undefined"!=typeof Elements&&e instanceof Elements,o=0,s=e.length;if(n)for(;s>o;o++)t(e[o]);else t(e)}if("undefined"==typeof window)return null;var t=window.requestAnimationFrame||window.mozRequestAnimationFrame||window.webkitRequestAnimationFrame||function(e){return window.setTimeout(e,20)},i=function(n,o){function s(){var e=[];this.add=function(t){e.push(t)};var t,i;this.call=function(){for(t=0,i=e.length;i>t;t++)e[t].call()},this.remove=function(n){var o=[];for(t=0,i=e.length;i>t;t++)e[t]!==n&&o.push(e[t]);e=o},this.length=function(){return e.length}}function r(e,i){if(e){if(e.resizedAttached)return void e.resizedAttached.add(i);e.resizedAttached=new s,e.resizedAttached.add(i),e.resizeSensor=document.createElement("div"),e.resizeSensor.className="resize-sensor";var n="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;",o="position: absolute; left: 0; top: 0; transition: 0s;";e.resizeSensor.style.cssText=n,e.resizeSensor.innerHTML='<div class="resize-sensor-expand" style="'+n+'"><div style="'+o+'"></div></div><div class="resize-sensor-shrink" style="'+n+'"><div style="'+o+' width: 200%; height: 200%"></div></div>',e.appendChild(e.resizeSensor),e.resizeSensor.offsetParent!==e&&(e.style.position="relative");var r,d,c,l,f=e.resizeSensor.childNodes[0],a=f.childNodes[0],h=e.resizeSensor.childNodes[1],u=e.offsetWidth,z=e.offsetHeight,v=function(){a.style.width="100000px",a.style.height="100000px",f.scrollLeft=1e5,f.scrollTop=1e5,h.scrollLeft=1e5,h.scrollTop=1e5};v();var p=function(){d=0,r&&(u=c,z=l,e.resizedAttached&&e.resizedAttached.call())},y=function(){c=e.offsetWidth,l=e.offsetHeight,r=c!=u||l!=z,r&&!d&&(d=t(p)),v()},m=function(e,t,i){e.attachEvent?e.attachEvent("on"+t,i):e.addEventListener(t,i)};m(f,"scroll",y),m(h,"scroll",y)}}e(n,function(e){r(e,o)}),this.detach=function(e){i.detach(n,e)}};return i.detach=function(t,i){e(t,function(e){e&&(e.resizedAttached&&"function"==typeof i&&(e.resizedAttached.remove(i),e.resizedAttached.length())||e.resizeSensor&&(e.contains(e.resizeSensor)&&e.removeChild(e.resizeSensor),delete e.resizeSensor,delete e.resizedAttached))})},i});





/**
 * Copyright Marc J. Schmidt. See the LICENSE file at the top-level
 * directory of this distribution and at
 * https://github.com/marcj/css-element-queries/blob/master/LICENSE.
 */

/*
Element Queries

Copyright (c) 2013 Marc J. Schmidt

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/

!function(e,t){"function"==typeof define&&define.amd?define(["./ResizeSensor.js"],t):"object"==typeof exports?module.exports=t(require("./ResizeSensor.js")):(e.ElementQueries=t(e.ResizeSensor),e.ElementQueries.listen())}("undefined"!=typeof window?window:this,function(e){var t=function(){function n(e){e||(e=document.documentElement);var t=window.getComputedStyle(e,null).fontSize;return parseFloat(t)||16}function i(e,t){var i=t.split(/\d/),r=i[i.length-1];switch(t=parseFloat(t),r){case"px":return t;case"em":return t*n(e);case"rem":return t*n();case"vw":return t*document.documentElement.clientWidth/100;case"vh":return t*document.documentElement.clientHeight/100;case"vmin":case"vmax":var o=document.documentElement.clientWidth/100,s=document.documentElement.clientHeight/100,a=Math["vmin"===r?"min":"max"];return t*a(o,s);default:return t}}function r(e){this.element=e,this.options={};var t,n,r,o,s,a,d,u=0,l=0;this.addOption=function(e){var t=[e.mode,e.property,e.value].join(",");this.options[t]=e};var c=["min-width","min-height","max-width","max-height"];this.call=function(){u=this.element.offsetWidth,l=this.element.offsetHeight,s={};for(t in this.options)this.options.hasOwnProperty(t)&&(n=this.options[t],r=i(this.element,n.value),o="width"==n.property?u:l,d=n.mode+"-"+n.property,a="","min"==n.mode&&o>=r&&(a+=n.value),"max"==n.mode&&r>=o&&(a+=n.value),s[d]||(s[d]=""),a&&-1===(" "+s[d]+" ").indexOf(" "+a+" ")&&(s[d]+=" "+a));for(var e in c)c.hasOwnProperty(e)&&(s[c[e]]?this.element.setAttribute(c[e],s[c[e]].substr(1)):this.element.removeAttribute(c[e]))}}function o(t,n){t.elementQueriesSetupInformation?t.elementQueriesSetupInformation.addOption(n):(t.elementQueriesSetupInformation=new r(t),t.elementQueriesSetupInformation.addOption(n),t.elementQueriesSensor=new e(t,function(){t.elementQueriesSetupInformation.call()})),t.elementQueriesSetupInformation.call(),h&&f.indexOf(t)<0&&f.push(t)}function s(e,t,n,i){"undefined"==typeof p[t]&&(p[t]={}),"undefined"==typeof p[t][n]&&(p[t][n]={}),"undefined"==typeof p[t][n][i]?p[t][n][i]=e:p[t][n][i]+=","+e}function a(){var e;if(document.querySelectorAll&&(e=document.querySelectorAll.bind(document)),e||"undefined"==typeof $$||(e=$$),e||"undefined"==typeof jQuery||(e=jQuery),!e)throw"No document.querySelectorAll, jQuery or Mootools's $$ found.";return e}function d(){var e=a();for(var t in p)if(p.hasOwnProperty(t))for(var n in p[t])if(p[t].hasOwnProperty(n))for(var i in p[t][n])if(p[t][n].hasOwnProperty(i))for(var r=e(p[t][n][i]),s=0,d=r.length;d>s;s++)o(r[s],{mode:t,property:n,value:i})}function u(t){function n(){var e,n=!1;for(e in i)i.hasOwnProperty(e)&&r[e].minWidth&&t.offsetWidth>r[e].minWidth&&(n=e);if(n||(n=s),a!=n)if(d[n])i[a].style.display="none",i[n].style.display="block",a=n;else{var u=new Image;u.onload=function(){i[n].src=o[n],i[a].style.display="none",i[n].style.display="block",d[n]=!0,a=n},u.src=o[n]}else i[n].src=o[n]}var i=[],r=[],o=[],s=0,a=-1,d=[];for(var u in t.children)if(t.children.hasOwnProperty(u)&&t.children[u].tagName&&"img"===t.children[u].tagName.toLowerCase()){i.push(t.children[u]);var l=t.children[u].getAttribute("min-width")||t.children[u].getAttribute("data-min-width"),c=t.children[u].getAttribute("data-src")||t.children[u].getAttribute("url");o.push(c);var m={minWidth:l};r.push(m),l?t.children[u].style.display="none":(s=i.length-1,t.children[u].style.display="block")}a=s,t.resizeSensor=new e(t,n),n(),h&&f.push(t)}function l(){for(var e=a(),t=e("[data-responsive-image],[responsive-image]"),n=0,i=t.length;i>n;n++)u(t[n])}function c(e){var t,n,i,r;for(e=e.replace(/'/g,'"');null!==(t=y.exec(e));)for(n=t[1]+t[3],i=t[2];null!==(r=v.exec(i));)s(n,r[1],r[2],r[3])}function m(e){var t="";if(e)if("string"==typeof e)e=e.toLowerCase(),(-1!==e.indexOf("min-width")||-1!==e.indexOf("max-width"))&&c(e);else for(var n=0,i=e.length;i>n;n++)1===e[n].type?(t=e[n].selectorText||e[n].cssText,-1!==t.indexOf("min-height")||-1!==t.indexOf("max-height")?c(t):(-1!==t.indexOf("min-width")||-1!==t.indexOf("max-width"))&&c(t)):4===e[n].type?m(e[n].cssRules||e[n].rules):3===e[n].type&&m(e[n].styleSheet.cssRules)}var h=!1,f=[],p={},y=/,?[\s\t]*([^,\n]*?)((?:\[[\s\t]*?(?:min|max)-(?:width|height)[\s\t]*?[~$\^]?=[\s\t]*?"[^"]*?"[\s\t]*?])+)([^,\n\s\{]*)/gim,v=/\[[\s\t]*?(min|max)-(width|height)[\s\t]*?[~$\^]?=[\s\t]*?"([^"]*?)"[\s\t]*?]/gim,g=!1;this.init=function(e){h="undefined"==typeof e?!1:e;for(var t=0,n=document.styleSheets.length;n>t;t++)try{m(document.styleSheets[t].cssRules||document.styleSheets[t].rules||document.styleSheets[t].cssText)}catch(i){if("SecurityError"!==i.name)throw i}if(!g){var r=document.createElement("style");r.type="text/css",r.innerHTML="[responsive-image] > img, [data-responsive-image] {overflow: hidden; padding: 0; } [responsive-image] > img, [data-responsive-image] > img { width: 100%;}",document.getElementsByTagName("head")[0].appendChild(r),g=!0}d(),l()},this.update=function(e){this.init(e)},this.detach=function(){if(!h)throw"withTracking is not enabled. We can not detach elements since we don not store it.Use ElementQueries.withTracking = true; before domready or call ElementQueryes.update(true).";for(var e;e=f.pop();)t.detach(e);f=[]}};t.update=function(e){t.instance.update(e)},t.detach=function(e){e.elementQueriesSetupInformation?(e.elementQueriesSensor.detach(),delete e.elementQueriesSetupInformation,delete e.elementQueriesSensor):e.resizeSensor&&(e.resizeSensor.detach(),delete e.resizeSensor)},t.withTracking=!1,t.init=function(){t.instance||(t.instance=new t),t.instance.init(t.withTracking)};var n=function(e){if(document.addEventListener)document.addEventListener("DOMContentLoaded",e,!1);else if(/KHTML|WebKit|iCab/i.test(navigator.userAgent))var t=setInterval(function(){/loaded|complete/i.test(document.readyState)&&(e(),clearInterval(t))},10);else window.onload=e};return t.listen=function(){n(t.init)},t});