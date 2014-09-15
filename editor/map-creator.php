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
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo site_url(); ?>/wp-content/plugins/mapmarker/css/editor.css" />
        <script type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
        <base target="_self" />
        <?php wp_print_scripts(); ?>
    </head>

    <body id="link">
        <div id="container">
            <div id="panel">
                <form>
                    <label for="location">Location </label>
                    <input id="location" name="location" type="text">

                    <label for="width">Width </label>
                    <input id="width" name="width" type="number">

                    <label for="height">Height </label>
                    <input id="height" name="height" type="number">
                    
                    <h3>Markers</h3>
                    <button name="add_mark">Add Mark!</button>
                </form>
      </div>
      <div id="map">
      </div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script src="<?php  echo plugin_dir_url( __FILE__ ). '../js/map.js'; ?>"></script>
    </body>
</html>

