// JavaScript Document
jQuery(function () {
jQuery(".img-crop").responsiveImageCropper();
});

!function (e) {
var t = function () {};
t.prototype = {targetElements: void 0, options: void 0, run: function (e) {
var t = this;
this.targetElements = new Array, e.each(function (e) {
var i = jQuery(this);
i.css({display: "none"});
var a = new Image;
a.onload = function () {
i.css({position: "absolute"}), t.targetElements.push(i), t.croppingImageElement(i), i.css({display: "block"})
}, a.src = i.attr("src")
}), jQuery(window).resize(function (e) {
t.onResizeCallback()
})
}, onResizeCallback: function () {
var t = this;
e.each(this.targetElements, function (e) {
var i = this;
t.croppingImageElement(i)
})
}, croppingImageElement: function (t) {
var i, a;
t.data("crop-image-wrapped") ? (a = t.data("crop-image-outer"), i = t.data("crop-image-inner")) : (a = e("<div>"), i = e("<div>"), a.css({overflow: "hidden", margin: t.css("margin"), padding: t.css("padding")}), t.css({margin: 0, padding: 0}), i.css({position: "relative", overflow: "hidden"}), t.after(a), a.append(i), i.append(t), t.data("crop-image-outer", a), t.data("crop-image-inner", i), t.data("crop-image-wrapped", !0)), this.desideImageSizes(t)
}, desideImageSizes: function (e) {
var t = e.data("crop-image-outer"), i = e.data("crop-image-inner"), a = e.data("crop-image-ratio");
a || (a = 1);
var n = t.width() * a;
i.height(n), e.width(t.width()), e.height("auto"), e.css({position: "absolute", left: 0, top: -(e.height() - t.height()) / 2}), n > e.height() && (e.width("auto"), e.height(n), e.css({position: "absolute", left: -(e.width() - t.width()) / 2, top: 0}))
}, setOptions: function (e) {
this.options = e
}}, e.fn.responsiveImageCropper = function (i) {
var i = e.extend(e.fn.responsiveImageCropper.defaults, i), a = e(this);
return cropper = new t, cropper.setOptions(i), cropper.run(a), this
}, e.fn.responsiveImageCropper.defaults = {}
}(jQuery);