(function ($) {

    $.fn.imageInput = function (options) {

        if (!this.is('input')) {
            console.error('The element must be an input');
            return false;
        }

        if (!this.attr('type') === 'file') {
            console.error('The element must be a "file" type');
            return false;
        }

        var settings = $.extend({
            type: 'none',
            label: null,
        }, options);
        var nodeBeforeInput = this.prev();
        var mainNode = $('<label class="image-input"></label>');
        var labelNode;

        if(this.data('current')){
            loadPreview(this.data('current'), mainNode);
        }

        if (settings.type === 'avatar') {
            mainNode.addClass('avatar-input');
        } else if (settings.type === 'banner') {
            mainNode.addClass('banner-input');
        } else if (settings.type === 'none') {
            mainNode.addClass('responsive');
        } else if (typeof settings.type !== 'string') {
            console.error('Image input option "type" "' + settings.type + '" not accepted. Your options are "avatar", "banner" or "none".');
            return false
        }

        if (settings.label) {
            labelNode = $('<span class="label">' + settings.label + '</span>');
            labelNode.insertBefore(this);
        }

        if (this.attr('id') || this.attr('name')) {
            mainNode.attr('for', this.attr('id') ? this.attr('id') : this.attr('name'));
        } else {
            console.error('Your element must have an "id" or a "name" attribute.');
            return false
        }

        $(this).change('change', function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function () {
                    loadPreview(reader.result, mainNode)
                }
                reader.readAsDataURL(this.files[0]);
            }
        });

        this.addClass('d-none');
        mainNode.append(this);
        mainNode.insertAfter(nodeBeforeInput);
        return mainNode;
    }

    function loadPreview(image, target) {
        target.css('background-image', 'url(' + image + ')');
    }

}(jQuery));
