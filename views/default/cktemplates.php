/*
 Copyright (c) 2003-2009, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.html or http://ckeditor.com/license
 */

// Register a templates definition set named "default".

var loremIpsum = 'Ex feugait processus Est veniam sit, Qui ut typi con. Sequat nobis elit. Liber facer elit delenit nunc consequat. Parum augue in minim vero amet. Te qui ut per molestie notare.';
var loremImage = '<a href="http://placehold.it/1200x900.jpg"><img src="http://placehold.it/400x300.jpg" alt=""></a>';

CKEDITOR.addTemplates('default',
    {
        // The name of sub folder which hold the shortcut preview images of the
        // templates.
        // imagesPath:CKEDITOR.getUrl(CKEDITOR.plugins.getPath('templates') + 'templates/images/'),

        // The templates definitions.
        templates: <?php echo $templatesJson ?>
    });
