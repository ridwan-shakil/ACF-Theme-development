<?php
function  stack_setup_theme()
{
    load_theme_textdomain('acf-theme', get_template_directory_uri() . '/languages');

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails', array('post', 'page'));

    register_nav_menus(array(
        'main-menu' => __('Main Menu', 'stack'),

    ));
}
add_action('after_setup_theme', 'stack_setup_theme');


function stack_scripts()
{
    // wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');

    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css');

    // wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css');
    // wp_enqueue_style('fonts', get_template_directory_uri() . '/assets/css/font-montserrat.css');
    // wp_enqueue_style('fonts', '//fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap');

    wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.css');
    wp_enqueue_style('carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css');
    wp_enqueue_style('owl-theme', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css');
    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css');
    wp_enqueue_style('flaticon', get_template_directory_uri() . '/assets/css/flaticon.css');
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/style.css');
    wp_enqueue_style('stylesheet', get_stylesheet_uri());

    // wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');



    // js 
    wp_enqueue_script('jquery-min', get_template_directory_uri() . '/assets/js/jquery.min.js', array('jquery'), '', true);
    wp_enqueue_script('jquerymigrate', get_template_directory_uri() . '/assets/js/jquery-migrate-3.0.1.min.js', array('jquery'), '', true);
    wp_enqueue_script('popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), '', true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '', true);
    wp_enqueue_script('jquery-easing', get_template_directory_uri() . '/assets/js/jquery.easing.1.3.js', array('jquery'), '', true);
    wp_enqueue_script('jquery-waypoints', get_template_directory_uri() . '/assets/js/jquery.waypoints.min.js', array('jquery'), '', true);
    wp_enqueue_script('jquery-stellar', get_template_directory_uri() . '/assets/js/jquery.stellar.min.js', array('jquery'), '', true);
    wp_enqueue_script('animateNumber', get_template_directory_uri() . '/assets/js/jquery.animateNumber.min.js', array('jquery'), '', true);
    wp_enqueue_script('carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '', true);
    wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), '', true);
    wp_enqueue_script('scrollax', get_template_directory_uri() . '/assets/js/scrollax.min.js', array('jquery'), '', true);
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '', true);
}
add_action('wp_enqueue_scripts', 'stack_scripts');
// excerpt leangth  
function wp_example_excerpt_length($length)
{
    return 20;
}
add_filter('excerpt_length', 'wp_example_excerpt_length');

// ACF options page creation 
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'     => 'Theme Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-settings',
        'capability'    => 'edit_posts',
        'redirect'        => false
    ));

    acf_add_options_sub_page(array(
        'page_title'     => 'Header',
        'menu_title'    => 'Header',
        'parent_slug'    => 'theme-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title'     => 'Home page',
        'menu_title'    => 'Home page',
        'parent_slug'    => 'theme-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title'     => 'About page',
        'menu_title'    => 'About page',
        'parent_slug'    => 'theme-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title'     => 'Services page',
        'menu_title'    => 'Services page',
        'parent_slug'    => 'theme-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title'     => 'Contact page',
        'menu_title'    => 'Contact page',
        'parent_slug'    => 'theme-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title'     => 'Single blog page',
        'menu_title'    => 'Single Blog page',
        'parent_slug'    => 'theme-settings',
    ));
}

// ======================= Comment form rearrange ====================
function move_comment_field($fields)
{

    $comment_field = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;

    $comment_field = $fields['cookies'];
    unset($fields['cookies']);
    $fields['cookies'] = $comment_field;
    return $fields;
}
add_filter('comment_form_fields', 'move_comment_field');

// remove any feild from comment form 
function unset_url_field($fields)
{
    if (isset($fields['url']))
        unset($fields['url']);
    return $fields;
}
add_filter('comment_form_default_fields', 'unset_url_field');

// ========================================
// Add extra field into user meta 
//  ========================================

function custom_user_profile_fields($profileuser)
{
?>
    <h1>Extra user information</h1>
    <table class="form-table">
        <tr>
            <th>
                <label for="user_location"><?php _e('Location'); ?></label>
            </th>
            <td>
                <input type="text" name="user_location" id="user_location" value="<?php echo esc_attr(get_the_author_meta('user_location', $profileuser->ID)); ?>" class="regular-text" />
                <br><span class="description"><?php _e('Your location.', 'text-domain'); ?></span>
            </td>
        </tr>
        <tr>
            <th>
                <label for="user_facebook"><?php _e('Facebook'); ?></label>
            </th>
            <td>
                <input type="url" name="user_facebook" id="user_facebook" value="<?php echo esc_attr(get_the_author_meta('user_facebook', $profileuser->ID)); ?>" class="regular-text" />
                <br><span class="description"><?php _e('Your Facebook id link ( e.g https://facebook.com/ridwansakil )', 'text-domain'); ?></span>
            </td>
        </tr>
    </table>
<?php
}
add_action('show_user_profile', 'custom_user_profile_fields');
add_action('edit_user_profile', 'custom_user_profile_fields');


//add Shortcode 
function wpdocs_footag_func()
{
    $content = 'this is coming from shortcode';
    return $content;
}
add_shortcode('rsshort', 'wpdocs_footag_func');
