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
        <link rel="stylesheet" type="text/css" media="all" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo site_url(); ?>/wp-content/plugins/mapmarker/css/editor.css" />
        <script type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
        <base target="_self" />
        <?php wp_print_scripts(); ?>
    </head>

    <body id="link">
    <div class="container">
        <div class="row">

            <div class="col-xs-3">
                <form role="form">
                    <div class="form-group">
                        <label for="location">Location </label>
                        <input id="location" name="location" type="text" class="form-control" placeholder="Enter a city">
                    </div>


                    <div class="form-group">
                        <label for="width">Width </label>
                        <div class="input-group">
                            <input id="width" name="width" type="number" class="form-control" placeholder="500">
                            <span class="input-group-addon">px</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="height">Height </label>
                        <div class="input-group">
                            <input id="height" name="height" type="number" class="form-control" placeholder="400">
                            <span class="input-group-addon">px</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="type">Terrain: </label>
                        <select class="form-control terrain-control">
                            <option value="roadmap">Road Map</option>
                            <option value="satellite">Satellite</option>
                            <option value="hybrid">Hybrid</option>
                            <option value="terrain">Terrain</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="type">Align: </label>
                        <select class="form-control align-control">
                            <option value="left">Left</option>
                            <option value="center">Center</option>
                            <option value="right">Right</option>
                        </select>
                    </div>

                    <button name="add_mark" id="remove-markers" class="btn btn-danger btn-lg btn-block">Remove markers!</button>
                    <button type="button" class="btn btn-success btn-lg btn-block">Done & Save</button>
                </form>
            </div>

          <div id="map" class="col-xs-9">
          </div>
        </div>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="<?php  echo plugin_dir_url( __FILE__ ). '../js/map.js'; ?>"></script>
    <script src="<?php  echo plugin_dir_url( __FILE__ ). '../js/editor.js'; ?>"></script>
    </body>
</html>
