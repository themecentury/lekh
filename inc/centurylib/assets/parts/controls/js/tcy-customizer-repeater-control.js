/**
 * tcy-customizer-repeater-control.js
 *
 * @package ThemeCentury
 * @subpackage CenturyLib
 * @version 1.0.0
 * @since 1.0.0
 *
 * Contains handlers to make Theme Customizer repeater
 */

 ( function( $, customize ) {
 	'use strict';
 	var tcy_document = $(document);
 	var tcy_window = $(window);
 	var customizer_repeater = {
 		Snipits: {

 			CustomizerIcons: function(){
 				var single_icon = $(this);
 				var tcy_custoimzer_icons = single_icon.closest( '.tcy-customize-icons' );
 				var icon_display_value = single_icon.children('i').attr('class');
 				var icon_split_value = icon_display_value.split(' ');
 				var icon_value = icon_split_value[1];

 				single_icon.siblings().removeClass('selected');
 				single_icon.addClass('selected');
 				tcy_custoimzer_icons.find('.te-icon-value').val( icon_value );
 				tcy_custoimzer_icons.find('.icon-preview').html('<i class="' + icon_display_value + '"></i>');
 				tcy_custoimzer_icons.find('.te-icon-value').trigger('change');
 			},

 			IconsToggle: function(){
 				var icon_toggle = $(this);
 				var tcy_custoimzer_icons = icon_toggle.closest( '.tcy-customize-icons' );
 				var icons_list_wrapper = tcy_custoimzer_icons.find( '.icons-list-wrapper' );
 				var dashicons = tcy_custoimzer_icons.find( '.dashicons' );
 				if( icons_list_wrapper.is(':hidden') ){
 					icons_list_wrapper.slideDown();
 					dashicons.removeClass('dashicons-arrow-down');
 					dashicons.addClass('dashicons-arrow-up');
 				}else{
 					icons_list_wrapper.slideUp();
 					dashicons.addClass('dashicons-arrow-down');
 					dashicons.removeClass('dashicons-arrow-up');
 				}
 			}, 

 			IconsSearch: function(){
 				var text = $(this),
 				value = this.value,
 				tcy_custoimzer_icons = text.closest( '.tcy-customize-icons' ),
 				icons_list_wrapper = tcy_custoimzer_icons.find( '.icons-list-wrapper' );

 				icons_list_wrapper.find('i').each(function () {
 					if ($(this).attr('class').search(value) > -1) {
 						$(this).parent('.single-icon').show();
 					} else {
 						$(this).parent('.single-icon').hide();

 					}
 				});
 			},

 			RepeaterToggle: function(){
 				$(this).next().slideToggle();
 				$(this).closest('.tcy-repeater-field-control').toggleClass('expanded');
 			},

 			RepeaterClose: function(){
 				$(this).closest('.repeater-fields').slideUp();
 				$(this).closest('.tcy-repeater-field-control').toggleClass('expanded');
 			},

 			RemoveRepeaterField: function(evt){
 				var snipits = customizer_repeater.Snipits;
 				if( typeof	$(this).parent() != 'undefined'){
 					$(this).closest('.tcy-repeater-field-control').slideUp('normal', function(){
 						$(this).remove();
 						snipits.RefreshRepeaterValues();
 					});
 				}
 				return false;
 			},

 			RefreshRepeaterValues: function(){

 				$(".tcy-repeater-field-wrap-control").each(function(){
 					var values = [];
 					var $this = $(this);
 					$this.find(".tcy-repeater-field-control").each(function(){
 						var valueToPush = {};
 						var dataValue;
 						$(this).find('[data-name]').each(function(){
 							if( $(this).attr('type') === 'checkbox'){
 								if($(this).is(':checked')){
 									dataValue = 1;
 								}
 								else {
 									dataValue = '';
 								}
 							}
 							else{
 								dataValue = $(this).val();
 							}
 							var dataName = $(this).attr('data-name');
 							valueToPush[dataName] = dataValue;
 						});
 						values.push(valueToPush);
 					});
 					$this.next('.tcy-repeater-collection').val(JSON.stringify(values)).trigger('change');
 				});
 			},

 			RepeaterControl: function(){
 				
 				var $this = $(this).parent();
 				var snipits = customizer_repeater.Snipits;

 				if(typeof $this !== 'undefined') {
 					var field = $this.find(".tcy-repeater-field-generator").html();
 					field = $($.parseHTML(field));
 					if(typeof field !== 'undefined'){
 						field.find("input[type='text'][data-name]").each(function(){
 							var defaultValue = $(this).attr('data-default');
 							$(this).val(defaultValue);
 						});
 						field.find("textarea[data-name]").each(function(){
 							var defaultValue = $(this).attr('data-default');
 							$(this).val(defaultValue);
 						});
 						field.find("select[data-name]").each(function(){
 							var defaultValue = $(this).attr('data-default');
 							$(this).val(defaultValue);
 						});

 						field.find('.single-field').show();

 						$this.find('.tcy-repeater-field-wrap-control').append(field);

 						field.addClass('expanded').find('.repeater-fields').show();
 						$('.accordion-section-content').animate({ scrollTop: $this.height() }, 1000);
 						snipits.RefreshRepeaterValues();
 					}

 				}

 				return false;
 			},
 			SearchOnSelect: function(){
 				/*$('select').select2({
 					allowClear: false
 				});*/
 			}
 		},

 		Click: function(){

 			var __this = customizer_repeater;
 			var snipits = __this.Snipits;

 			var repeatertoggle = snipits.RepeaterToggle;
 			tcy_document.on('click','.repeater-field-title', repeatertoggle);

 			var repeaterclose = snipits.RepeaterClose;
 			tcy_document.on('click','.repeater-field-close', repeaterclose);

 			var repeatercontrol = snipits.RepeaterControl;
 			tcy_document.on('click','.tcy-repeater-add-control-field', repeatercontrol);

 			var removerepeaterfield = snipits.RemoveRepeaterField;
 			tcy_document.on("click", ".repeater-field-remove", removerepeaterfield);

 			tcy_document.on('keyup change', '[data-name]', function(){
 				snipits.RefreshRepeaterValues();
 				return false;
 			});
 			$(".tcy-repeater-field-wrap-control").sortable({
 				orientation: "vertical",
 				update: function( event, ui ) {
 					snipits.RefreshRepeaterValues();
 				}
 			});

 			var customizericons = snipits.CustomizerIcons;
 			tcy_document.on('click', '.tcy-customize-icons .single-icon', customizericons);

 			var iconstoggle = snipits.IconsToggle;
 			tcy_document.on('click', '.tcy-customize-icons .icon-toggle, .tcy-customize-icons .icon-preview', iconstoggle);

 			var iconssearch = snipits.IconsSearch;
 			tcy_document.on('keyup', '.tcy-customize-icons .icon-search', iconssearch);

 		},

 		Ready: function(){
 			var __this = customizer_repeater;
 			var snipits = __this.Snipits;
 			__this.Click();
 			snipits.SearchOnSelect();
 			snipits.RepeaterToggle();
 		},

 		Load: function(){
 		},

 		Resize: function(){
 		},

 		Scroll: function(){
 		},

 		Init: function(){

 			var __this = customizer_repeater;
 			var load, ready, resize, scroll;

 			ready = __this.Ready;
 			load = __this.Load;
 			resize = __this.Resize;
 			scroll = __this.Scroll;
 			
 			tcy_document.ready(ready);
 			tcy_window.load(load);
 			tcy_window.resize(resize);
 			tcy_window.scroll(scroll);
 		},

 	};
 	customizer_repeater.Init();

 } )( jQuery, wp.customize );