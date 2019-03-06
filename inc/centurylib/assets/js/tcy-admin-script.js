/*!
 * Admin script of centurylib
 * @package ThemeCentury
 * @subpackage centurylib
 */
 (function($){
    'use strict';
    var winWidth, winHeight, TCYAdmin;
    var tcy_document = $(document);
    TCYAdmin = {
        // Repeater Library
        Repeater: function(){

            /*sortable*/
            var TCY_REFRESH_VALUE = function (wrapObject) {
                wrapObject.find('[name]').each(function(){
                    $(this).trigger('change');
                });
            };

            var TCY_SORTABLE = function () {
                var repeaters = $('.tcy-repeater');
                repeaters.sortable({
                    orientation: "vertical",
                    items: '> .tcy-widget-repeater-table',
                    placeholder: 'te-sortable-placeholder',
                    update: function( event, ui ) {
                        TCY_REFRESH_VALUE(ui.item);
                    }
                });
                repeaters.trigger("sortupdate");
                repeaters.sortable("refresh");
            };

            /*replace*/
            var TCY_REPLACE = function( str, replaceWhat, replaceTo ){
                var re = new RegExp(replaceWhat, 'g');
                return str.replace(re,replaceTo);
            };

            var TCY_REPEATER =  function (){
                tcy_document.on('click','.tcy-add-repeater',function (e) {
                    e.preventDefault();
                    var add_repeater = $(this),
                        repeater_wrap = add_repeater.closest('.tcy-repeater'),
                        code_for_repeater = repeater_wrap.find('.tcy-code-for-repeater'),
                        total_repeater = repeater_wrap.find('.tcy-total-repeater-counter'),
                        total_repeater_value = parseInt( total_repeater.val() ),
                        repeater_html = code_for_repeater.html();

                    total_repeater.val( total_repeater_value +1 );
                    var final_repeater_html = TCY_REPLACE( repeater_html, add_repeater.attr('id'),total_repeater_value );
                    add_repeater.before($('<div class="tcy-widget-repeater-table"></div>').append( final_repeater_html ));
                    var new_html_object = add_repeater.prev('.tcy-widget-repeater-table');
                    var repeater_inside = new_html_object.find('.tcy-repeater-inside');
                    repeater_inside.slideDown( 'fast',function () {
                        new_html_object.addClass( 'open' );
                        TCY_REFRESH_VALUE(new_html_object);
                    } );
                });
                tcy_document.on('click', '.tcy-repeater-top, .tcy-repeater-close', function (e) {
                    e.preventDefault();
                    var accordion_toggle = $(this),
                        repeater_field = accordion_toggle.closest('.tcy-widget-repeater-table'),
                        repeater_inside = repeater_field.find('.tcy-repeater-inside');

                    if ( repeater_inside.is( ':hidden' ) ) {
                        repeater_inside.slideDown( 'fast',function () {
                            repeater_field.addClass( 'open' );
                        } );
                    }
                    else {
                        repeater_inside.slideUp( 'fast', function() {
                            repeater_field.removeClass( 'open' );
                        });
                    }
                });
                tcy_document.on('click', '.tcy-repeater-remove', function (e) {
                    e.preventDefault();
                    var repeater_remove = $(this),
                        repeater_field = repeater_remove.closest('.tcy-widget-repeater-table'),
                        repeater_wrap = repeater_remove.closest('.tcy-repeater');

                    repeater_field.remove();
                    repeater_wrap.closest('form').trigger('change');
                    TCY_REFRESH_VALUE(repeater_wrap);
                });

                tcy_document.on('change', '.te-select', function (e) {
                    e.preventDefault();
                    var select = $(this),
                        repeater_inside = select.closest('.tcy-repeater-inside'),
                        postid = repeater_inside.find('.te-postid'),
                        repeater_control_actions = repeater_inside.find('.tcy-repeater-control-actions'),
                        optionSelected = select.find("option:selected"),
                        valueSelected = optionSelected.val();

                    if( valueSelected == 0 ){
                        postid.remove();
                    }
                    else{
                        postid.remove();
                        $.ajax({
                            type      : "GET",
                            data      : {
                                action: 'teg_get_edit_post_link',
                                id: valueSelected
                            },
                            url       : ajaxurl,
                            beforeSend: function ( data, settings ) {
                                postid.remove();

                            },
                            success   : function (data) {
                                if( 0 != data ){
                                    repeater_control_actions.append( data );
                                }
                            },
                            error     : function (jqXHR, textStatus, errorThrown) {
                                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                            }
                        });
                    }
                });
            };

            tcy_document.on('widget-added widget-updated panelsopen', function( event, widgetContainer ) {
                TCY_SORTABLE();
            });

            /*
             * Manually trigger widget-added events for media widgets on the admin
             * screen once they are expanded. The widget-added event is not triggered
             * for each pre-existing widget on the widgets admin screen like it is
             * on the customizer. Likewise, the customizer only triggers widget-added
             * when the widget is expanded to just-in-time construct the widget form
             * when it is actually going to be displayed. So the following implements
             * the same for the widgets admin screen, to invoke the widget-added
             * handler when a pre-existing media widget is expanded.
             */
            $( function initializeExistingWidgetContainers() {
                var widgetContainers;
                if ( 'widgets' !== window.pagenow ) {
                    return;
                }
                widgetContainers = $( '.widgets-holder-wrap:not(#available-widgets)' ).find( 'div.widget' );
                widgetContainers.one( 'click.toggle-widget-expanded', function toggleWidgetExpanded() {
                    TCY_SORTABLE();
                });
            });
            TCY_REPEATER();

        },
        //Custom Snipits goes here
        Snipits: {
            Variables: function(){
                winWidth = $(window).width();
                winHeight = $(window).height();
            },
            Append_HTML: function(){
                if(typeof teg_theme_info_object != 'undefined'){
                    /* If there are required actions, add an icon with the number of required actions in the About lekh-info page -> Actions recommended tab */
                    var count_actions_recommended = teg_theme_info_object.count_actions_recommended;
                    if ( (typeof count_actions_recommended !== 'undefined') && (count_actions_recommended != '0') ) {
                        $('li.lekh-info-w-red-tab a').append('<span class="lekh-info-actions-count">' + count_actions_recommended + '</span>');
                    }
                }
            },

            Color_Picker: function(selector){
                var color_picker_option = {
                    change: function(event, ui){
                        selector.closest('form').trigger('change');
                    },
                };
                selector.wpColorPicker(color_picker_option);
            },

            ImageUpload: function(evt){
                // Prevents the default action from occuring.
                evt.preventDefault();
                var media_title = $(this).data('title');
                var media_button = $(this).data('button');
                var media_input_val = $(this).prev();
                var media_image_url_value = $(this).prev().prev().children('img');
                var media_image_url = $(this).siblings('.img-preview-wrap');

                var meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
                    title: media_title,
                    button: { text:  media_button },
                    library: { type: 'image' }
                });

                // Opens the media library frame.
                meta_image_frame.open();

                // Runs when an image is selected.
                meta_image_frame.on('select', function(){

                    // Grabs the attachment selection and creates a JSON representation of the model.
                    var media_attachment = meta_image_frame.state().get('selection').first().toJSON();

                    // Sends the attachment URL to our custom image input field.
                    media_input_val.val(media_attachment.url);
                    if( media_image_url_value != null ){
                        media_image_url_value.attr( 'src', media_attachment.url );
                        media_image_url.show();
                    }
                    media_input_val.trigger('change');
                });
            },

            WidgetTab: function(evt){
                if (!$(this).hasClass('nav-tab-active')) {
                    var tab_wraper, tab_id;
                    tab_id = $(this).data('id');
                    tab_wraper = $(this).closest('.tcy-widget-field-tab-wraper');
                    $(this).addClass('nav-tab-active').siblings('.nav-tab').removeClass('nav-tab-active');
                    tab_wraper.find('.tcy-tab-contents').removeClass('tcy-tab-active');
                    tab_wraper.find(tab_id).addClass('tcy-tab-active');
                }
            },

            Widget_Accordion: function(){
                var accordion_title = $(this).closest('.tcy-accordion-title');
                var is_checked = $(this).prop('checked');
                if(is_checked){
                    accordion_title.siblings('.teg-accordion-content').slideDown().removeClass('open close');
                    accordion_title.find('.teg-accordion-arrow').addClass('fa-angle-up').removeClass('fa-angle-down');
                }else{
                    accordion_title.siblings('.teg-accordion-content').slideUp().removeClass('open close');
                    accordion_title.find('.teg-accordion-arrow').addClass('fa-angle-down').removeClass('fa-angle-up');
                }
            },

            Widget_Relation_Action: function(relation_field, relation, relations_key){
                var current_value = relation_field.val();
                // Only we need to change for checkbox by using 
                if(relation_field.prop('tagName')=='CHECKBOX'){
                    current_value = (relation_field.is(':checkbox') && relation_field.is(':checked')) ? current_value : '';
                }
                for(var relation_key in relation){
                    if(relations_key=="empty" || relations_key=="exist"){
                        current_value = relations_key;
                    }else if(relations_key=="values"){
                        if(relation_key!=current_value){
                            continue;
                        }
                    }
                    var relation_details = relation[relation_key];                    
                    for(var action_key in relation_details){
                        var action_detils = relation_details[action_key];
                        var action_detail_class = action_detils.join(", .");
                        var action_class = '.'+action_detail_class;
                        switch(action_key){
                            case 'show_fields':
                                relation_field.closest('.widget-content').find(action_class).removeClass('tcy-hidden-field');
                                break;
                            case 'hide_fields':
                                relation_field.closest('.widget-content').find(action_class).addClass('tcy-hidden-field');
                                break;
                            default:
                                console.warn('Action ' + relation_key + ' case is not defined');
                            break;
                        }
                    }
                }
            },

            Widget_Relation: function(evt) {
                var relation_field = $(this);
                var current_value = relation_field.val();
                // Only we need to change for checkbox by using 
                if(relation_field.prop('tagName')=='CHECKBOX'){
                    current_value = (relation_field.is(':checkbox') && relation_field.is(':checked')) ? current_value : '';
                }
                var relations = $(this).data('relations');
                if(!relations){
                    return;
                }
                var __this = TCYAdmin;
                var snipits = __this.Snipits;
                var relation_action = snipits.Widget_Relation_Action;
                for(var relations_key in relations){
                    var relation = relations[relations_key];
                    if(!relation){
                        continue;
                    }
                    switch(relations_key){
                        case 'exist':
                            if( current_value ){
                                relation_action(relation_field, {'exist':relation}, relations_key);    
                            }
                            break;
                        case 'empty':
                            if( !current_value ){
                                relation_action(relation_field, {'empty':relation}, relations_key);    
                            }
                            break;
                        case 'values':
                            if( relation ){
                                relation_action(relation_field, relation, relations_key);    
                            }
                            break;
                        default: 
                            console.warn('Relation key ' + relations_key + 'is not found.');
                            break;
                    }
                }
            },

            CustomizerIcons: function(){
                var single_icon = $(this),
                    teg_customize_icons = single_icon.closest( '.tcy-icons-wrapper' ),
                    icon_display_value = single_icon.children('i').attr('class'),
                    icon_split_value = icon_display_value.split(' '),
                    icon_value = icon_split_value[1];

                single_icon.siblings().removeClass('selected');
                single_icon.addClass('selected');
                teg_customize_icons.find('.tcy-icon-value').val( icon_value );
                teg_customize_icons.find('.icon-preview').html('<i class="' + icon_display_value + '"></i>');
                teg_customize_icons.find('.tcy-icon-value').trigger('change');
            },

            IconToggle: function(){
                var icon_toggle = $(this),
                    teg_customize_icons = icon_toggle.closest( '.tcy-icons-wrapper' ),
                    icons_list_wrapper = teg_customize_icons.find( '.icons-list-wrapper' ),
                    dashicons = teg_customize_icons.find( '.dashicons' );

                if ( icons_list_wrapper.is(':hidden') ) {
                    icons_list_wrapper.slideDown();
                    dashicons.removeClass('dashicons-arrow-down');
                    dashicons.addClass('dashicons-arrow-up');
                } else {
                    icons_list_wrapper.slideUp();
                    dashicons.addClass('dashicons-arrow-down');
                    dashicons.removeClass('dashicons-arrow-up');
                }
            },

            IconSearch: function(){
                var text = $(this),
                value = this.value,
                teg_customize_icons = text.closest( '.tcy-icons-wrapper' ),
                icons_list_wrapper = teg_customize_icons.find( '.icons-list-wrapper' );
                icons_list_wrapper.find('i').each(function () {
                    if ($(this).attr('class').search(value) > -1) {
                        $(this).parent('.single-icon').show();
                    } else {
                        $(this).parent('.single-icon').hide();

                    }
                });
            },
            DismissRequiredActions: function(){
                var id = $(this).attr('id'),
                    action = $(this).attr('data-action');

                $.ajax({
                    type      : "GET",
                    data      : {
                        action: 'teg_theme_info_update_recommended_action',
                        id: id,
                        todo: action
                    },
                    dataType  : "html",
                    url       : teg_theme_info_object.ajaxurl,
                    beforeSend: function (data, settings) {
                        $('.lekh-info-tab-pane#actions_required h1').append('<div id="temp_load" style="text-align:center"><img src="' + teg_theme_info_object.template_directory + '/inc/lekh-info/images/ajax-loader.gif" /></div>');
                    },
                    success   : function (data) {
                        location.reload();
                        $("#temp_load").remove();
                        /* Remove loading gif */
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                    }
                });
            },
            Widget_Change: function(evt, widget){
                var __this = TCYAdmin;
                var snipits = __this.Snipits;
                var this_widget = $(widget);
                this_widget.find('.tcy_widget_field_relation').trigger('change');
                snipits.Color_Picker(this_widget.find('.tcy-color-picker'));
                if(this_widget.hasClass('widget-dirty')){
                    this_widget.removeClass('widget-dirty');
                    this_widget.find('input[type="submit"]').attr('disabled','disabled');    
                }
            },
        },     

        Click: function(){

            var __this = TCYAdmin;
            var snipits = __this.Snipits;

            var image_upload = snipits.ImageUpload;
            tcy_document.on('click', '.media-image-upload', image_upload);

            var widget_tab = snipits.WidgetTab;
            tcy_document.on('click', '.tcy-widget-tab-list .nav-tab', widget_tab);

            var widget_relations = snipits.Widget_Relation;
            $(document).on('change', '.tcy_widget_field_relation', widget_relations);
            
            //for default load
            $('.tcy_widget_field_relation').trigger('change');

            // Runs when the image button is clicked.
            tcy_document.on('click','.media-image-remove', function(e){
                $(this).siblings('.img-preview-wrap').hide();
                $(this).prev().prev().val('');
            });

             /**
             * Script for Customizer icons
             */
            var customizer_icons = snipits.CustomizerIcons;
            tcy_document.on('click', '.tcy-icons-wrapper .single-icon', customizer_icons);

            var icon_toggle = snipits.IconToggle;
            tcy_document.on('click', '.tcy-icons-wrapper .icon-toggle ,.tcy-icons-wrapper .icon-preview', icon_toggle);

            var icon_search = snipits.IconSearch;
            tcy_document.on('keyup', '.tcy-icons-wrapper .icon-search', icon_search);

            /* Dismiss required actions */
            var dismiss_actions = snipits.DismissRequiredActions;
            $(".lekh-info-recommended-action-button,.reset-all").click(dismiss_actions);

            var widget_accordion = snipits.Widget_Accordion;
            tcy_document.on('change', '.tcy-accordion-title input', widget_accordion);

            var widget_change = snipits.Widget_Change;
            tcy_document.on('widget-added widget-updated panelsopen', widget_change);

        },

        Ready: function(){
            var __this = TCYAdmin;
            var snipits = __this.Snipits;

            //Library
            __this.Repeater();

            //This is lekh functions
            snipits.Variables();
            snipits.Append_HTML();
            snipits.Color_Picker($('.tcy-color-picker'));
            __this.Click();

        },

        Load: function(){

        },

        Resize: function(){

        },

        Scroll: function(){

        },

        Init: function(){
            var __this = TCYAdmin;
            var docready = __this.Ready;
            var winload = __this.Load;
            var winresize = __this.Resize;
            var winscroll = __this.Scroll;
            $(document).ready(docready);
            $(window).load(winload);
            $(window).scroll(winscroll);
            $(window).resize(winresize);
        },

     };
     
     TCYAdmin.Init();

})(jQuery);