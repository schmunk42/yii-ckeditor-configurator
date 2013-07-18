/*
Copyright (c) 2003-2009, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/
CKEDITOR.addStylesSet( 'my_styles',
    [
    /* Block Styles */
    // These styles are already available in the "Format" combo, so they are
    // not needed here by default. You may enable them to avoid placing the
    // "Format" combo in the toolbar, maintaining the same features.

    /* Inline Styles */
    // These are core styles available as toolbar buttons. You may opt enabling
    // some of them in the Styles combo, removing them from the toolbar.
    
    <?php echo $stylesJson ?>
 
    ]);
