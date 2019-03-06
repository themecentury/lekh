jQuery(document).ready(function ($) {
    "use strict";

    $('.lekh-color-picker').wpColorPicker();
    /**
     * Function for repeater field
     */
    function lekh_refresh_repeater_values() {
        $(".lekh-repeater-field-control-wrap").each(function () {

            var values = [];
            var $this = $(this);

            $this.find(".lekh-repeater-field-control").each(function () {
                var valueToPush = {};

                $(this).find('[data-name]').each(function () {
                    var dataName = $(this).attr('data-name');
                    var dataValue = $(this).val();
                    valueToPush[dataName] = dataValue;
                });

                values.push(valueToPush);
            });

            $this.next('.lekh-repeater-collector').val(JSON.stringify(values)).trigger('change');
        });
    }

    $('#customize-theme-controls').on('click', '.lekh-repeater-field-title', function () {
        $(this).next().slideToggle();
        $(this).closest('.lekh-repeater-field-control').toggleClass('expanded');
    });

    $('#customize-theme-controls').on('click', '.lekh-repeater-field-close', function () {
        $(this).closest('.lekh-repeater-fields').slideUp();
        ;
        $(this).closest('.lekh-repeater-field-control').toggleClass('expanded');
    });


    $("body").on("click", '.lekh-repeater-add-control-field', function () {

        var $this = $(this).parent();
        if (typeof $this != 'undefined') {

            var field = $this.find(".lekh-repeater-field-control:first").clone();
            if (typeof field != 'undefined') {

                field.find("input[type='text'][data-name]").each(function () {
                    var defaultValue = $(this).attr('data-default');
                    $(this).val(defaultValue);
                });

                field.find(".lekh-repeater-icon-list").each(function () {
                    var defaultValue = $(this).next('input[data-name]').attr('data-default');
                    $(this).next('input[data-name]').val(defaultValue);
                    $(this).prev('.lekh-repeater-selected-icon').children('i').attr('class', '').addClass(defaultValue);

                    $(this).find('li').each(function () {
                        var icon_class = $(this).find('i').attr('class');
                        if (defaultValue == icon_class) {
                            $(this).addClass('icon-active');
                        } else {
                            $(this).removeClass('icon-active');
                        }
                    });
                });

                field.find('.lekh-repeater-fields').show();

                $this.find('.lekh-repeater-field-control-wrap').append(field);

                field.addClass('expanded').find('.lekh-repeater-fields').show();

                var cloneColorPicker = field.find('.lekh-color-picker').clone();
                field.find('.wp-picker-container').after(cloneColorPicker);
                field.find('.wp-picker-container').remove();
                field.find('.lekh-color-picker').wpColorPicker();

                $('.accordion-section-content').animate({scrollTop: $this.height()}, 1000);
                lekh_refresh_repeater_values();
            }

        }
        return false;
    });

    $("#customize-theme-controls").on("click", ".lekh-repeater-field-remove", function () {
        if (typeof $(this).parent() != 'undefined') {
            $(this).closest('.lekh-repeater-field-control').slideUp('normal', function () {
                $(this).remove();
                lekh_refresh_repeater_values();
            });
        }
        return false;
    });

    $("#customize-theme-controls").on('keyup change', '[data-name]', function () {
        lekh_refresh_repeater_values();
        return false;
    });

    /*Drag and drop to change order*/
    $(".lekh-repeater-field-control-wrap").sortable({
        orientation: "vertical",
        update: function (event, ui) {
            lekh_refresh_repeater_values();
        }
    });

    $('body').on('click', '.lekh-repeater-icon-list li', function () {
        var icon_class = $(this).find('i').attr('class');
        $(this).addClass('icon-active').siblings().removeClass('icon-active');
        $(this).parent('.lekh-repeater-icon-list').prev('.lekh-repeater-selected-icon').children('i').attr('class', '').addClass(icon_class);
        $(this).parent('.lekh-repeater-icon-list').next('input').val(icon_class).trigger('change');
        lekh_refresh_repeater_values();
    });

    $('body').on('click', '.lekh-repeater-selected-icon', function () {
        $(this).next().slideToggle();
    });

});
