"use strict";
var $ = function (elm, bool) {
    var query = function (elm) { return document.querySelector(elm); };
    var querys = function (elm) { return document.querySelectorAll(elm); };
    var event = function (value, listener, options) {
        if (typeof elm != "string")
            document.addEventListener(value, listener, options);
        else
            query(elm).addEventListener(value, listener, options);
    };
    var attr = function (qualifiedName) {
        if (typeof elm == "string")
            return query(elm).getAttribute(qualifiedName);
        if (elm instanceof Element)
            return elm.getAttribute(qualifiedName);
    };
    var each = function (callbackfn) {
        if (bool && typeof elm == "string")
            querys(elm).forEach(callbackfn);
    };
    var css = function (style) {
        for (var key in style) {
            var value = style[key];
            if (typeof elm == "string")
                query(elm).style.setProperty(key, value);
        }
    };
    return { event: event, attr: attr, each: each, css: css, query: query, querys: querys };
};
var layers = $(".overlay__layer", true);
var bg = $(".background-sign__parallax");
layers.each(function (elm) {
    var attr = $(elm).attr("data-speed");
    console.log(attr);
});
