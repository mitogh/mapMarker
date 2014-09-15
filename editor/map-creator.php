<?php
wp_enqueue_script('jquery-ui-core');
wp_enqueue_script('jquery-ui-widget');
wp_enqueue_script('jquery-ui-position');
wp_enqueue_script('jquery');
global $wp_scripts;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Map Marker Creator</title>
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
        <script language="javascript" type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
        <base target="_self" />
        <?php wp_print_scripts(); ?>
    </head>

    <body id="link">
        Map Creator content here!
    </body>
</html>

