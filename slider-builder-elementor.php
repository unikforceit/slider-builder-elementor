<?php
/**
 * Plugin Name: Slider Builder Elementor
 * Description: Slider Builder Elementor is a custom elementor addons build content slider into elementor.
 * Plugin URI:  https://wordpress.org/elementor-post-layout/
 * Version:     1.0.0
 * Author:      UnikForce
 * Author URI:  https://unikforce.com/
 * Text Domain: sliderbuilderelementor
 */

if (!defined('ABSPATH'))
    exit;

if (!class_exists('Slider_Builder_Elementor')) {

    /**
     * Main Slider Builder Elementor Class
     *
     */
    final class Slider_Builder_Elementor
    {


        /**
         * Plugin Version
         *
         * @since 1.0.0
         *
         * @var string The plugin version.
         */
        const VERSION = '1.0.0';

        /**
         * Minimum Elementor Version
         *
         * @since 1.0.0
         *
         * @var string Minimum Elementor version required to run the plugin.
         */
        const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

        /**
         * Minimum PHP Version
         *
         * @since 1.0.0
         *
         * @var string Minimum PHP version required to run the plugin.
         */
        const MINIMUM_PHP_VERSION = '5.6';

        /** Singleton *************************************************************/

        private static $instance;

        /**
         * On Plugins Loaded
         *
         * Checks if Elementor has loaded, and performs some compatibility checks.
         * If All checks pass, inits the plugin.
         *
         * Fired by `plugins_loaded` action hook.
         *
         * @since 1.0.0
         *
         * @access public
         */
        public function on_plugins_loaded()
        {

            if ($this->is_compatible()) {
                add_action('elementor/init', [$this, 'init']);
            }

        }

        /**
         * Compatibility Checks
         *
         * Checks if the installed version of Elementor meets the plugin's minimum requirement.
         * Checks if the installed PHP version meets the plugin's minimum requirement.
         *
         * @since 1.0.0
         *
         * @access public
         */
        public function is_compatible()
        {

            // Check if Elementor installed and activated
            if (!did_action('elementor/loaded')) {
                add_action('admin_notices', [$this, 'admin_notice_missing_main_plugin']);
                return false;
            }

            // Check for required Elementor version
            if (!version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
                add_action('admin_notices', [$this, 'admin_notice_minimum_elementor_version']);
                return false;
            }

            // Check for required PHP version
            if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
                add_action('admin_notices', [$this, 'admin_notice_minimum_php_version']);
                return false;
            }

        }

        /**
         * Admin notice
         *
         * Warning when the site doesn't have compatible installed or activated.
         *
         * @since 1.0.0
         *
         * @access public
         */
        public function admin_notice_missing_main_plugin()
        {
            if (isset($_GET['activate'])) {
                $message = sprintf(
                /* translators: 1: Plugin name 2: Elementor */
                    esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'sliderbuilderelementor'),
                    '<strong>' . esc_html__('Slider Builder Elementor', 'sliderbuilderelementor') . '</strong>',
                    '<strong>' . esc_html__('Elementor', 'sliderbuilderelementor') . '</strong>'
                );
                printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
            }
            unset($_GET['activate']);
        }

        public function admin_notice_minimum_elementor_version()
        {

            if (isset($_GET['activate'])) unset($_GET['activate']);

            $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
                esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'sliderbuilderelementor'),
                '<strong>' . esc_html__('Slider Builder Elementor', 'sliderbuilderelementor') . '</strong>',
                '<strong>' . esc_html__('Elementor', 'sliderbuilderelementor') . '</strong>',
                self::MINIMUM_ELEMENTOR_VERSION
            );

            printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);

        }

        public function admin_notice_minimum_php_version()
        {

            if (isset($_GET['activate'])) unset($_GET['activate']);

            $message = sprintf(
            /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
                esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'sliderbuilderelementor'),
                '<strong>' . esc_html__('Slider Builder Elementor', 'sliderbuilderelementor') . '</strong>',
                '<strong>' . esc_html__('PHP', 'sliderbuilderelementor') . '</strong>',
                self::MINIMUM_PHP_VERSION
            );

            printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);

        }

        /**
         * Main Slider Builder Elementor Instance
         *
         * Insures that only one instance of Slider Builder Elementor exists in memory at any one
         * time. Also prevents needing to define globals all over the place.
         */
        public static function instance()
        {

            if (!isset(self::$instance) && !(self::$instance instanceof Slider_Builder_Elementor)) {

                self::$instance = new Slider_Builder_Elementor;

                self::$instance->setup_constants();

                self::$instance->hooks();

                self::$instance->on_plugins_loaded();

                self::$instance->sliderbuilderelementor_includes();

            }
            return self::$instance;
        }

        /**
         * Throw error on object clone
         *
         * The whole idea of the singleton design pattern is that there is a single
         * object therefore, we don't want the object to be cloned.
         */
        public function __clone()
        {
            // Cloning instances of the class is forbidden
            _doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?', 'sliderbuilderelementor'), '1.0.0');
        }

        /**
         * Disable unserializing of the class
         *
         */
        public function __wakeup()
        {
            // Unserializing instances of the class is forbidden
            _doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?', 'sliderbuilderelementor'), '1.0.0');
        }

        /**
         * Setup plugin constants
         *
         */
        private function setup_constants()
        {

            // Plugin Folder Path
            if (!defined('SLIDERBUILDERELMENETOR_DIR')) {
                define('SLIDERBUILDERELMENETOR_DIR', plugin_dir_path(__FILE__));
            }
            if (!defined('SLIDERBUILDERELMENETOR_DIRNAME')) {
                define('SLIDERBUILDERELMENETOR_DIRNAME', dirname(__FILE__) . '/');
            }
            // Plugin Folder Path
            if (!defined('SLIDERBUILDERELMENETOR_INC_DIR')) {
                define('SLIDERBUILDERELMENETOR_INC_DIR', plugin_dir_path(__FILE__));
            }

            // Plugin Folder URL
            if (!defined('SLIDERBUILDERELMENETOR_URL')) {
                define('SLIDERBUILDERELMENETOR_URL', plugin_dir_url(__FILE__));
            }

            // Plugin Folder URL
            if (!defined('SLIDERBUILDERELMENETOR_ASSETS_URL')) {
                define('SLIDERBUILDERELMENETOR_ASSETS_URL', plugin_dir_url(__FILE__).'assets/');
            }
            if (!defined('SLIDERBUILDERELMENETOR_VERSION')) {
                define('SLIDERBUILDERELMENETOR_VERSION', self::VERSION);            }
            }

        private function sliderbuilderelementor_includes()
        {
            if( ! function_exists( 'cs_framework_init' ) && ! class_exists( 'CSFramework' ) ) {
                require_once SLIDERBUILDERELMENETOR_DIR . 'vendor/framework/codestar-framework.php';
                require_once SLIDERBUILDERELMENETOR_DIR . 'include/admin-options.php';
                require_once SLIDERBUILDERELMENETOR_DIR . 'include/slidermeta.php';
            }
            require_once SLIDERBUILDERELMENETOR_DIR . 'helper/helper-functions.php';
            require_once SLIDERBUILDERELMENETOR_DIR . 'include/cpt.php';
        }

        /**
         * Setup the default hooks and actions
         */
        private function hooks()
        {
            add_action('elementor/widgets/widgets_registered', array(self::$instance, 'sliderbuilderelementor_include_widgets'));
            add_action('elementor/frontend/after_register_scripts', array(self::$instance, 'sliderbuilderelementor_register_frontend_scripts'), 10);
            add_action('elementor/frontend/after_enqueue_styles', array(self::$instance, 'sliderbuilderelementor_register_frontend_styles'), 10);
            add_action('elementor/init', array(self::$instance, 'sliderbuilderelementor_elementor_category'));
            add_action('template_redirect',  array(self::$instance, 'elementorpost_layout_template_block'), 9);
        }

        public function elementorpost_layout_template_block() {
                $instance = \Elementor\Plugin::$instance->templates_manager->get_source('local');
                remove_action('template_redirect', [$instance, 'block_template_frontend']);
        }

        public function sliderbuilderelementor_elementor_category()
        {
            \Elementor\Plugin::instance()->elements_manager->add_category(
                'sliderbuilderelementor',
                array(
                    'title' => __('Slider Builder Elementor', 'sliderbuilderelementor'),
                    'icon' => 'fa fa-plug',
                ),
                1);
        }

        /**
         * Load Frontend Style
         *
         */
        public function  sliderbuilderelementor_register_frontend_styles()
        {
            foreach( glob( SLIDERBUILDERELMENETOR_DIRNAME. 'assets/css/*.css' ) as $file ) {
                $filename = substr($file, strrpos($file, '/') + 1);
                wp_enqueue_style( $filename, SLIDERBUILDERELMENETOR_ASSETS_URL . 'css/'.$filename, array(), SLIDERBUILDERELMENETOR_VERSION, 'all');
            }
            wp_enqueue_style( 'sliderbuilderelementor-scss', SLIDERBUILDERELMENETOR_ASSETS_URL . 'scss/sliderbuilderelementor.css', array(), SLIDERBUILDERELMENETOR_VERSION, 'all');
            wp_enqueue_style( 'sliderbuilderelementor-fa5', 'https://use.fontawesome.com/releases/v5.13.0/css/all.css', array(), '5.13.0', 'all' );
            wp_enqueue_style( 'sliderbuilderelementor-fa5-v4-shims', 'https://use.fontawesome.com/releases/v5.13.0/css/v4-shims.css', array(), '5.13.0', 'all' );
        }

        /**
         * Load Frontend Scripts
         *
         */
        public function  sliderbuilderelementor_register_frontend_scripts()
        {
            foreach( glob( SLIDERBUILDERELMENETOR_DIRNAME. 'assets/js/*.js' ) as $file ) {
                $filename = substr($file, strrpos($file, '/') + 1);
                wp_enqueue_script( $filename, SLIDERBUILDERELMENETOR_ASSETS_URL . 'js/'.$filename, array('jquery'), SLIDERBUILDERELMENETOR_VERSION, true);
            }
        }


        /**
         * Include required files
         *
         */
        public function  sliderbuilderelementor_include_widgets()
        {
            require_once SLIDERBUILDERELMENETOR_DIR . 'widgets/builder/control.php';
        }

    }

} // End if class_exists check

function SLIDERBUILDERELMENETOR_INIT() {
    return Slider_Builder_Elementor::instance();
}

// Get SliderBuilderElementor Running
SLIDERBUILDERELMENETOR_INIT();
