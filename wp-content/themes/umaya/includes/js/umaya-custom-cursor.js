jQuery(function() {
    "use strict";
/* 1. Custom mouse cursor */
/*
Copyright (c) 2020 by UXBox (https://codepen.io/uxbox/pen/RwPwemz)
Fork of an original work Hover slider (https://codepen.io/ig_design/pen/ZVQLmR

Permission is hereby granted, free of charge, to any person obtaining a copy of 
this software and associated documentation files (the "Software"), to deal in 
the Software without restriction, including without limitation the rights to 
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies 
of the Software, and to permit persons to whom the Software is furnished to do 
so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all 
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR 
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, 
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE 
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER 
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, 
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE 
SOFTWARE.
*/
	document.getElementsByTagName("body")[0].addEventListener("mousemove", function(n) {
		e.style.left = n.clientX + "px",
		e.style.top = n.clientY + "px"
	});
	var
		e = document.getElementById("js-pointer");

	jQuery(document).mousemove(function(e) {

		jQuery(".js-pointer-black")
		.on("mouseenter", function() {
			jQuery('.js-pointer').addClass("js-black")
		})
		.on("mouseleave", function() {
			jQuery('.js-pointer').removeClass("js-black")
		})

		jQuery(".js-pointer-large, .swiper-button-next, .swiper-button-prev, .mfp-arrow-left, .mfp-arrow-right")
		.on("mouseenter", function() {
			jQuery('.js-pointer').addClass("js-large")
		})
		.on("mouseleave", function() {
			jQuery('.js-pointer').removeClass("js-large")
		})

		jQuery(".js-pointer-small, .swiper-pagination-bullet")
		.on("mouseenter", function() {
			jQuery('.js-pointer').addClass("js-small")
		})
		.on("mouseleave", function() {
			jQuery('.js-pointer').removeClass("js-small")
		})

		jQuery(".js-pointer-right, .mfp-img")
		.on("mouseenter", function() {
			jQuery('.js-pointer').addClass("js-right")
		})
		.on("mouseleave", function() {
			jQuery('.js-pointer').removeClass("js-right")
		})

		jQuery(".js-pointer-zoom")
		.on("mouseenter", function() {
			jQuery('.js-pointer').addClass("js-zoom")
		})
		.on("mouseleave", function() {
			jQuery('.js-pointer').removeClass("js-zoom")
		})

		jQuery(".js-pointer-open")
		.on("mouseenter", function() {
			jQuery('.js-pointer').addClass("js-open")
		})
		.on("mouseleave", function() {
			jQuery('.js-pointer').removeClass("js-open")
		})

		jQuery(".js-pointer-none")
		.on("mouseenter", function() {
			jQuery('.js-pointer').addClass("js-none")
		})
		.on("mouseleave", function() {
			jQuery('.js-pointer').removeClass("js-none")
		})

	});
});