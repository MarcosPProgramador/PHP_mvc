"use strict";
var $ = function (elm, bool) {
    var query = function (elm) { return document.querySelector(elm); };
    var querys = function (elm) { return document.querySelectorAll(elm); };
    var event = function (value, listener, options) {
        if (typeof elm != 'string')
            document.addEventListener(value, listener, options);
        else
            query(elm).addEventListener(value, listener, options);
    };
    var attr = function (qualifiedName) {
        if (typeof elm == 'string')
            return query(elm).getAttribute(qualifiedName);
        if (elm instanceof Element)
            return elm.getAttribute(qualifiedName);
    };
    var add = function (cls) {
        if (typeof elm == 'string')
            query(elm).classList.add(cls);
    };
    var remove = function (cls) {
        if (typeof elm == 'string')
            query(elm).classList.remove(cls);
    };
    var toggle = function (cls) {
        if (typeof elm == 'string')
            return query(elm).classList.toggle(cls);
        if (elm instanceof HTMLElement)
            return elm.classList.toggle(cls);
    };
    var each = function (callbackfn) {
        if (bool && typeof elm == 'string')
            querys(elm).forEach(callbackfn);
    };
    var css = function (style) {
        for (var key in style) {
            var value = style[key];
            var nKey = key.replace(/([A-Z])/, '-$1').toLowerCase();
            if (typeof elm == 'string')
                query(elm).style.setProperty(nKey, value);
            if (elm instanceof HTMLElement)
                elm.style.setProperty(nKey, value);
        }
    };
    return { event: event, attr: attr, each: each, css: css, query: query, querys: querys, add: add, remove: remove, toggle: toggle };
};
var layers = $('.overlay__layer', true);
var animateWidthAndHeight = $('.overlay__animate');
setTimeout(function () {
    animateWidthAndHeight.add('full');
}, 700);
$(document).event('mousemove', (function (e) {
    layers.each(function (elm) {
        var speedImage = $(elm).attr('data-speed');
        var x = (window.innerWidth - e.pageX * Number(speedImage)) / 100;
        var y = (window.innerHeight - e.pageY * Number(speedImage)) / 100;
        $(elm).css({ transform: "translate(" + x + "px, " + y + "px)" });
    });
}));
$('#btn-nav').event('click', (function (event) {
    var buttonNavbar = event.target;
    var is = $(buttonNavbar).toggle('active');
    if (is)
        $('main').css({ overflow: 'hidden' });
    else
        $('main').css({ overflowY: 'auto' });
    $('#navbar').toggle('active');
}));
