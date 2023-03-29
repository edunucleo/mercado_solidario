/* 
 *  Shortcode Builder JS File
 *  v1.0.0
 */

(function ($) {
    'use strict';

    $(document).ready(function ()
    {
        console.log(catrgory_array);
        tinymce.PluginManager.add('sts_shortcode_mce_button', function (editor, url) {
            editor.addButton('sts_shortcode_mce_button', {
                title: 'Simple Testimonials Showcase',
                icon: 'icon sts-icon',
                onclick: function ()
                {
                    editor.windowManager.open({
                        title: 'Insert Simple Testimonials Shortcode',
                        body: [
                            // Show Enables Autoplay
                            {
                                type: 'listbox',
                                name: 'adaptiveheight',
                                label: 'Enables adaptive height for single slide horizontal carousels.',
                                values: [
                                    {text: 'True', value: 'true'},
                                    {text: 'False', value: 'false'},
                                ]
                            },

                            // Show Enables Autoplay
                            {
                                type: 'listbox',
                                name: 'autoplay',
                                label: 'Enables Autoplay',
                                values: [
                                    {text: 'False', value: 'false'},
                                    {text: 'True', value: 'true'},
                                ]
                            },

                            // Show Prev/Next Arrows
                            {
                                type:  'listbox',
                                name:  'arrows',
                                label: 'Prev/Next Arrows',
                                values: [   
                                    {text: 'False', value: 'false'},
                                    {text: 'True', value: 'true'},
                                ]
                            },

                            // Show Dots
                            {
                                type:  'listbox',
                                name:  'dots',
                                label: 'Show dot indicators',
                                values: [   
                                    {text: 'True', value: 'true'},
                                    {text: 'False', value: 'false'},
                                ]
                            },

                            // Enable fade
                            {
                                type:  'listbox',
                                name:  'fade',
                                label: 'Enable fade',
                                values: [   
                                    {text: 'True', value: 'true'},
                                    {text: 'False', value: 'false'},
                                ]
                            },

                            // Infinite loop sliding
                            {
                                type:  'listbox',
                                name:  'infinite',
                                label: 'Infinite loop sliding',
                                values: [   
                                    {text: 'True', value: 'true'},
                                    {text: 'False', value: 'false'},
                                ]
                            },

                            // Number of Slides
                            {
                                type: 'textbox',
                                subtype: 'number',
                                name: 'slidestoshow',
                                label: '# of slides to show',
                                value: 1,
                            },

                            // Number of Post
                            {
                                type: 'textbox',
                                subtype: 'number',
                                name: 'total_post',
                                label: 'Total Post',
                                value: 6,
                            },

                            // Testimonilas Layout
                            {
                                type: 'listbox',
                                name: 'layout',
                                label: 'Layout',
                                values: [
                                    {text: 'Quote', value: 'quote'},
                                    {text: 'Grid', value: 'grid'},
                                ]
                            },

                            // Category
                            {
                                type:  'listbox',
                                name:  'category',
                                label: 'Category',
                                values: catrgory_array,
                            },
                            
                            // Speed of the Slide
                            {
                                type: 'textbox',
                                //subtype: 'number',
                                name: 'speed',
                                label: 'Slide Speed (in milliseconds)',
                                value: 300,
                            },
                            
                            // Autoplay Speed of the Slide
                            {
                                type: 'textbox',
                                //subtype: 'number',
                                name: 'autoplaySpeed',
                                label: 'Autoplay Speed (in milliseconds)',
                                value: 3000,
                            },
                        ],
                        onsubmit: function (e) {

                            // If user enter number less than 1
                            if (e.data.total_post < 1 )
                            {
                                // Change value with 1
                                e.data.total_post = 1;
                            }  
                            editor.insertContent('[simple_testimonials adaptiveheight="' + e.data.adaptiveheight + '" arrows="' + e.data.arrows + '" dots="' + e.data.dots + '" fade="' + e.data.fade + '" infinite="' + e.data.infinite + '" slidestoshow="' + e.data.slidestoshow + '" total_post="' + e.data.total_post + '" layout="' + e.data.layout + '" speed="' + e.data.speed + '" autoplayspeed="' + e.data.autoplaySpeed + '"]');
                        }
                    });
                }
            });
        });
    });
})(jQuery);