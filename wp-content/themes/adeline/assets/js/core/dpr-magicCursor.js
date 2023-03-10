!function(e){"function"==typeof define&&define.amd?define([],e):"undefined"!=typeof module&&null!==module&&module.exports?module.exports=e:e()}(function(){var i=Object.assign||window.jQuery&&jQuery.extend,u=8,a=window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.oRequestAnimationFrame||window.msRequestAnimationFrame||function(e,t){return window.setTimeout(function(){e()},25)};!function(){if("function"==typeof window.CustomEvent)return;function e(e,t){t=t||{bubbles:!1,cancelable:!1,detail:void 0};var n=document.createEvent("CustomEvent");return n.initCustomEvent(e,t.bubbles,t.cancelable,t.detail),n}e.prototype=window.Event.prototype,window.CustomEvent=e}();var o={textarea:!0,input:!0,select:!0,button:!0},c={move:"mousemove",cancel:"mouseup dragstart",end:"mouseup"},r={move:"touchmove",cancel:"touchend",end:"touchend"},d=/\s+/,m={bubbles:!0,cancelable:!0},t="function"==typeof Symbol?Symbol("events"):{};function f(e){return e[t]||(e[t]={})}function v(e,t,n,o){t=t.split(d);var i,a=f(e),u=t.length;function c(e){n(e,o)}for(;u--;)(a[i=t[u]]||(a[i]=[])).push([n,c]),e.addEventListener(i,c)}function s(e,t,n){t=t.split(d);var o,i,a,u=f(e),c=t.length;if(u)for(;c--;)if(i=u[o=t[c]])for(a=i.length;a--;)i[a][0]===n&&(e.removeEventListener(o,i[a][1]),i.splice(a,1))}function l(e,t,n){var o=function(e){return new CustomEvent(e,m)}(t);n&&i(o,n),e.dispatchEvent(o)}function p(e){var n=e,o=!1,i=!1;function t(e){o?(n(),a(t),o=!(i=!0)):i=!1}this.kick=function(e){o=!0,i||t()},this.end=function(e){var t=n;e&&(i?(n=o?function(){t(),e()}:e,o=!0):e())}}function g(){}function h(e){e.preventDefault()}function X(e,t){var n,o;if(e.identifiedTouch)return e.identifiedTouch(t);for(n=-1,o=e.length;++n<o;)if(e[n].identifier===t)return e[n]}function Y(e,t){var n=X(e.changedTouches,t.identifier);if(n&&(n.pageX!==t.pageX||n.pageY!==t.pageY))return n}function n(e,t){T(e,t,e,w)}function y(e,t){w()}function w(){s(document,c.move,n),s(document,c.cancel,y)}function b(e){s(document,r.move,e.touchmove),s(document,r.cancel,e.touchend)}function T(e,t,n,o){var i=n.pageX-t.pageX,a=n.pageY-t.pageY;i*i+a*a<u*u||function(e,t,n,o,i,a){var u=e.targetTouches,c=e.timeStamp-t.timeStamp,r={altKey:e.altKey,ctrlKey:e.ctrlKey,shiftKey:e.shiftKey,startX:t.pageX,startY:t.pageY,distX:o,distY:i,deltaX:o,deltaY:i,pageX:n.pageX,pageY:n.pageY,velocityX:o/c,velocityY:i/c,identifier:t.identifier,targetTouches:u,finger:u?u.length:1,enableMove:function(){this.moveEnabled=!0,this.enableMove=g,e.preventDefault()}};l(t.target,"movestart",r),a(t)}(e,t,n,i,a,o)}function E(e,t){var n=t.timer;t.touch=e,t.timeStamp=e.timeStamp,n.kick()}function S(e,t){var n=t.target,o=t.event,i=t.timer;s(document,c.move,E),s(document,c.end,S),K(n,o,i,function(){setTimeout(function(){s(n,"click",h)},0)})}function k(e,t){var n=t.target,o=t.event,i=t.timer;X(e.changedTouches,o.identifier)&&(function(e){s(document,r.move,e.activeTouchmove),s(document,r.end,e.activeTouchend)}(t),K(n,o,i))}function K(e,t,n,o){n.end(function(){return l(e,"moveend",t),o&&o()})}if(v(document,"mousedown",function(e){!function(e){return 1===e.which&&!e.ctrlKey&&!e.altKey}(e)||function(e){return!!o[e.target.tagName.toLowerCase()]}(e)||(v(document,c.move,n,e),v(document,c.cancel,y,e))}),v(document,"touchstart",function(e){if(!o[e.target.tagName.toLowerCase()]){var t=e.changedTouches[0],n={target:t.target,pageX:t.pageX,pageY:t.pageY,identifier:t.identifier,touchmove:function(e,t){!function(e,t){var n=Y(e,t);if(!n)return;T(e,t,n,b)}(e,t)},touchend:function(e,t){!function(e,t){if(!X(e.changedTouches,t.identifier))return;b(t)}(e,t)}};v(document,r.move,n.touchmove,n),v(document,r.cancel,n.touchend,n)}}),v(document,"movestart",function(e){if(!e.defaultPrevented&&e.moveEnabled){var t={startX:e.startX,startY:e.startY,pageX:e.pageX,pageY:e.pageY,distX:e.distX,distY:e.distY,deltaX:e.deltaX,deltaY:e.deltaY,velocityX:e.velocityX,velocityY:e.velocityY,identifier:e.identifier,targetTouches:e.targetTouches,finger:e.finger},n={target:e.target,event:t,timer:new p(function(e){(function(e,t,n){var o=n-e.timeStamp;e.distX=t.pageX-e.startX,e.distY=t.pageY-e.startY,e.deltaX=t.pageX-e.pageX,e.deltaY=t.pageY-e.pageY,e.velocityX=.3*e.velocityX+.7*e.deltaX/o,e.velocityY=.3*e.velocityY+.7*e.deltaY/o,e.pageX=t.pageX,e.pageY=t.pageY})(t,n.touch,n.timeStamp),l(n.target,"move",t)}),touch:void 0,timeStamp:e.timeStamp};void 0===e.identifier?(v(e.target,"click",h),v(document,c.move,E,n),v(document,c.end,S,n)):(n.activeTouchmove=function(e,t){!function(e,t){var n=t.event,o=t.timer,i=Y(e,n);i&&(e.preventDefault(),n.targetTouches=e.targetTouches,t.touch=i,t.timeStamp=e.timeStamp,o.kick())}(e,t)},n.activeTouchend=function(e,t){k(e,t)},v(document,r.move,n.activeTouchmove,n),v(document,r.end,n.activeTouchend,n))}}),window.jQuery){var j="startX startY pageX pageY distX distY deltaX deltaY velocityX velocityY".split(" ");jQuery.event.special.movestart={setup:function(){return v(this,"movestart",e),!1},teardown:function(){return s(this,"movestart",e),!1},add:q},jQuery.event.special.move={setup:function(){return v(this,"movestart",C),!1},teardown:function(){return s(this,"movestart",C),!1},add:q},jQuery.event.special.moveend={setup:function(){return v(this,"movestart",Q),!1},teardown:function(){return s(this,"movestart",Q),!1},add:q}}function e(e){e.enableMove()}function C(e){e.enableMove()}function Q(e){e.enableMove()}function q(e){var o=e.handler;e.handler=function(e){for(var t,n=j.length;n--;)e[t=j[n]]=e.originalEvent[t];o.apply(this,arguments)}}});
var $j 		= jQuery.noConflict(),

	$window = $j( window );



$j( document ).on( 'ready', function() {

	"use strict";

	// Magic Cursor

	dpradelineMagicCursor();

} );



/* ==============================================

MAGIC CURSOR

============================================== */

function dpradelineMagicCursor() {

	"use strict"

var magicCursor = {
	$el : $j('.dpr-cursor'),
	targetX: $j(window).width()/2,
	targetY: $j(window).height()/2,
	currentX: $j(window).width()/2,
	currentY: $j(window).height()/2,
	animspeed: 0.25,
	init : function() {
		let $this_el = this.$el;
		// Cursor Move
		$j(window).on('mousemove', function(e) {
			magicCursor.targetX = e.clientX - $this_el.width()/2;
			magicCursor.targetY = e.clientY - $this_el.height()/2;
        });

		if ($this_el.length) {
			magicCursor.animate();
		}

		// Show and Hide Cursor
        $j(window).on('mouseleave', function() {
			magicCursor.$el.addClass('is-inactive');
        }).on('mouseenter', function() {
			magicCursor.$el.removeClass('is-inactive');
        });
		
		// Interractions
		$j(document).on('mouseenter', 'a', function() {
			var isLightbox = false,
				dataRel = $j(this).attr('data-rel');
			if (typeof dataRel !== 'undefined') {
				
	  			if (dataRel.includes('lightcase') || dataRel.includes('portfoliogrid') ) {
	     			isLightbox = true;
				} 
			}
			if ($j(this).hasClass( "zoom-action" )) {
				isLightbox = true;
			}
			if (isLightbox) {
				magicCursor.$el.addClass('cursor-lightbox');
			} else {
				magicCursor.$el.addClass('cursor-link');
			}
			$j(this).on('mouseleave', function() {
				magicCursor.$el.removeClass('cursor-link cursor-lightbox');
			});			
		}).on('mouseenter', 'button', function() {
			magicCursor.$el.addClass('cursor-link');
			$j(this).on('mouseleave', function() {
				magicCursor.$el.removeClass('cursor-link');
			});
		}).on('mouseenter', 'input[type="submit"]', function() {
			magicCursor.$el.addClass('cursor-link');
			$j(this).on('mouseleave', function() {
				magicCursor.$el.removeClass('cursor-link');
			});
		}).on('mouseenter', '.dpr-sp-overlay, #lightcase-overlay ', function() {
			magicCursor.$el.addClass('cursor-close');
			$j(this).on('mouseleave', function() {
				magicCursor.$el.removeClass('cursor-close');
			});
		}).on('mouseenter', '.dpr-carousel .slick-list.draggable', function() {
			magicCursor.$el.addClass('cursor-grab-h');
			$j(this).on('mouseleave', function() {
				magicCursor.$el.removeClass('cursor-grab-h');
			});
		}).on('mouseenter', '.dpr-ishowcase-wrapper:not(.vertical-showcase) .dpr-ishowcase-item-link ', function() {
			magicCursor.$el.addClass('cursor-grab-hi');
			$j(this).on('mouseleave', function() {
				magicCursor.$el.removeClass('cursor-grab-hi');
			});
		}).on('mouseenter', 'iframe', function() {
			magicCursor.$el.addClass('is-inactive');
			$j(this).on('mouseleave', function() {
				magicCursor.$el.removeClass('is-inactive');
			});
		}).on('mouseenter', '.dpr-ishowcase-wrapper.vertical-showcase', function() {
				magicCursor.$el.addClass('cursor-grab-v');
			$j(this).on('mouseleave', function() {
				magicCursor.$el.removeClass('cursor-grab-v');
			});
		});
	},
	animate: function() {
		let $this_el = magicCursor.$el;
		magicCursor.currentX += ((magicCursor.targetX - magicCursor.currentX) * magicCursor.animspeed);
		magicCursor.currentY += ((magicCursor.targetY - magicCursor.currentY) * magicCursor.animspeed);
		$this_el.css('transform', 'translate3d('+ magicCursor.currentX +'px, '+ magicCursor.currentY +'px, 0)');
		requestAnimationFrame( magicCursor.animate );
	}
};
magicCursor.init();






}