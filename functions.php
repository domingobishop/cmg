<?php

// Enqueue styles and scripts
function bc_styles() {
    wp_register_style( 'bc-styles', get_template_directory_uri() . '/style.css', array(), 1.0, 'all' );
    wp_register_style( 'google-fonts',
        'https://fonts.googleapis.com/css?family=Waiting+for+the+Sunrise|Open+Sans:400,700,400italic', array(), 1.0, 'all' );
    wp_enqueue_style( 'bc-styles' );
    wp_enqueue_style( 'google-fonts' );
}
add_action( 'wp_enqueue_scripts', 'bc_styles' );

add_action( 'after_setup_theme', 'register_my_menu' );
function register_my_menu() {
    register_nav_menu( 'primary', __( 'Navigation Menu', 'blankcanvas' ) );
}

add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );

// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
    global $post;
    return '<br><a class="btn btn-default btn-xs" role="button" href="'. get_permalink($post->ID) . '">Read more &raquo;</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

function bc_wp_title( $title, $sep ) {
    global $paged, $page;

    if ( is_feed() )
        return $title;

    // Add the site name.
    $title .= get_bloginfo( 'name', 'display' );

    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $sep $site_description";

    // Add a page number if necessary.
    if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
        $title = "$title $sep " . sprintf( __( 'Page %s', 'twentythirteen' ), max( $paged, $page ) );

    return $title;
}
add_filter( 'wp_title', 'bc_wp_title', 10, 2 );

function add_image_responsive_class($content) {
    global $post;
    $pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";
    $replacement = '<img$1class="$2 img-responsive"$3>';
    $content = preg_replace($pattern, $replacement, $content);
    return $content;
}
add_filter('the_content', 'add_image_responsive_class');

function countdown(){
    $date = strtotime("March 24, 2017 9:00 AM");
    $remaining = $date - time();
    $days_remaining = floor($remaining / 86400);
    $hours_remaining = floor(($remaining % 86400) / 3600);
    $minutes_remaining = floor((($remaining % 86400) % 3600) / 60);
    $seconds_remaining = floor(((($remaining % 86400) % 3600) % 60) / 1);
    echo $days_remaining . 'days';
    echo $hours_remaining . 'hours';
    echo $minutes_remaining . 'minutes';
    echo $seconds_remaining . 'seconds';
}

// Register footer widgets
add_action( 'widgets_init', 'bc_footer_widgets_init' );
function bc_footer_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Footer widget area', 'bc_footer_widgets' ),
        'id' => 'footer-widget-area',
        'description' => __( 'Widgets in this area will be shown in the footer.', 'bc_footer_widgets' ),
        'before_widget' => '<div class="col-md-4"><div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}

function meta_boxes() {
    $meta_boxes = array(
        // Level 1 page options
        array(
            'id' => 'page_options',
            'title' => 'Sports page options',
            'pages' => 'page',
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'name' => 'Map',
                    'desc' => 'Add your Google map embed code here',
                    'id' => 'google-map',
                    'type' => 'textarea',
                    'std' => ''
                ),
                array(
                    'name' => 'Fee',
                    'desc' => '',
                    'id' => 'fee',
                    'type' => 'text',
                    'std' => ''
                ),
                array(
                    'name' => 'Contact',
                    'desc' => '',
                    'id' => 'contact-details',
                    'type' => 'textarea',
                    'std' => ''
                )
            )
        )
    );
    foreach ( $meta_boxes as $meta_box ) {
        $home_box = new create_meta_box( $meta_box );
    }
}
add_action( 'init', 'meta_boxes' );

// Creates meta boxes from $meta_boxes[] = array()
// See http://www.deluxeblogtips.com/2010/05/howto-meta-box-wordpress.html for more info
class create_meta_box {
    protected $_meta_box;
    // create meta box based on given data
    function __construct($meta_box) {
        $this->_meta_box = $meta_box;
        add_action('admin_menu', array(&$this, 'add'));
        add_action('save_post', array(&$this, 'save'));
    }
    /// Add meta box
    function add() {
        add_meta_box($this->_meta_box['id'], $this->_meta_box['title'], array(&$this, 'show'), 'page', $this->_meta_box['context'], $this->_meta_box['priority']);
    }
    // Callback function to show fields in meta box
    function show() {
        global $post;
        // Use nonce for verification
        echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
        echo '<table class="form-table">';
        foreach ($this->_meta_box['fields'] as $field) {
            // get current post meta data
            $meta = get_post_meta($post->ID, $field['id'], true);
            echo '<tr>',
            '<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
            '<td>';
            switch ($field['type']) {
                case 'text':
                    echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />',
                    '<br />', $field['desc'];
                    break;
                case 'textarea':
                    $field_value = get_post_meta( $post->ID, $field['id'], false );
                    $args = array (
                        'media_buttons' => false,
                        'textarea_rows' => 4,
                        'tinymce' => false,
                        'quicktags' => array( 'buttons' => 'strong,em,ul,ol,li,link' ),
                        'wpautop' => false
                    );
                    wp_editor( $field_value[0], $field['id'], $args );
                    // echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>',
                    echo '<br />', $field['desc'];
                    break;
                case 'select':
                    echo '<select name="', $field['id'], '" id="', $field['id'], '">';
                    foreach ($field['options'] as $option) {
                        echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                    }
                    echo '</select>';
                    echo ' ', $field['desc'];
                    break;
                case 'radio':
                    foreach ($field['options'] as $option) {
                        echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
                    }
                    break;
                case 'checkbox':
                    echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
                    break;
            }
            echo     '<td>',
            '</tr>';
        }
        echo '</table>';
    }
    // Save data from meta box
    function save($post_id) {
        // verify nonce
        if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], basename(__FILE__))) {
            return $post_id;
        }
        // check autosave
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post_id;
        }
        // check permissions
        if ('page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id)) {
                return $post_id;
            }
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
        }
        foreach ($this->_meta_box['fields'] as $field) {
            $old = get_post_meta($post_id, $field['id'], true);
            $new = $_POST[$field['id']];
            if ($new && $new != $old) {
                update_post_meta($post_id, $field['id'], $new);
            } elseif ('' == $new && $old) {
                delete_post_meta($post_id, $field['id'], $old);
            }
        }
    }
}
