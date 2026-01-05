<?php
    namespace Escuadra;

    require get_template_directory() . '/vendor/autoload.php';

    class Theme {
        public $theme, $version, $assets, $modals, $keys, $variables;

        function __construct() {
            $this->theme = wp_get_theme('escuadra-real-estate');
            $this->version = $this->theme->get('Version');
            $this->assets = get_template_directory_uri() . "/assets";
            $this->build = get_template_directory_uri() . "/build";
            $this->modals = [];
            $this->keys = [];
            $this->php_listing_per_page = 3;
            $this->php_listing_limit = 4;

            $this->variables = [
                'ajax_url' => admin_url('admin-ajax.php'),
                'rest_url' => get_rest_url(),
                'rest_namespace' => 'escuadra',
                'assets_url' => $this->assets,
                'build_url' => $this->build
            ];
        }

        function get_partial($partial_location, $args = []) {
            $slug = "partials/{$partial_location}.php";
            $dir = get_template_directory();
            $file = "{$dir}/{$slug}";

            ob_start();
            $args = wp_parse_args($args);
            $slug = $dir = null;
            require($file);
            echo ob_get_clean();
        }

        function get_icon($partial_location, $class = '') {
            $slug = "build/svgs/{$partial_location}.svg";
            $dir = get_template_directory();
            $file = "{$dir}/{$slug}";

            ob_start();
            $slug = $dir = null;
            require($file);
            echo ob_get_clean();
        }

        function get_page($page_id) {
            $pages = get_field('pages', 'options');

            foreach($pages as $page) {
                if($page['id'] == $page_id) {
                    $obj = new \stdClass();

                    $obj->id = $page['page'];
                    $obj->permalink = get_permalink($obj->id);
                    $obj->title = get_the_title($obj->id);

                    return $obj;
                }
            }

            return null;
        }

        function get_page_id($page_id) {
            $page = $this->get_page($page_id);

            if(!empty($page)) {
                return $page->id;
            }

            return null;
        }

        function register_modal($modal_title) {
            if(!in_array($modal_title, $this->modals)) {
                $this->modals[] = $modal_title;
            }
        }

        function register_block($args = []) {
            if(function_exists('acf_register_block_type')) {
                add_action('init', function() use($args) {
                    $assets = $args['assets'] ?? [];

                    acf_register_block_type([
                        'name'              => 'custom-blocks_' . $args['name'],
                        'title'             => $args['title'],
                        'description'       => $args['description'],
                        'render_template'   => 'partials/blocks/admin-blocker.php',
                        'category'          => 'custom-blocks',
                        'icon'              => $args['icon'],
                        'mode'              => 'auto',
                        'editable'          => $args['editable'] ?? true,
                        'enqueue_assets' => function () use($assets) {
                            foreach($assets as $asset) {
                                if(isset($asset['script'])) {
                                    if(strpos($asset['script'], 'http') !== false) {
                                        $url = $asset['script'];
                                    } else {
                                        $url = $this->assets . '/scripts/blocks/' . $asset['script'] . '.js';
                                    }

                                    wp_enqueue_script($asset['script'], $url, $asset['dependencies'] ?? null, $asset['version'] ?? $this->version, true);
                                } else if(isset($asset['style'])) {
                                    if(strpos($asset['style'], 'http') !== false) {
                                        $url = $asset['style'];
                                    } else {
                                        $url = $this->assets . '/styles/blocks/' . $asset['style'] . '.css';
                                    }
                                    
                                    wp_enqueue_style($asset['style'], $url, $asset['dependencies'] ?? null, $asset['version'] ?? $this->version);
                                }
                            }
                        }
                    ]);
                });
            }
        }

        function register_rest_route($args = []) {
            add_action('rest_api_init', function() use($args) {
                $param_string = "";

                if($args['public'] == true) {
                    $permission_callback = function() {
                        return true;
                    };
                } else {
                    $permission_callback = $args['permissions'];
                }

                foreach($args['params'] as $param_key => $param_specs) {
                    $param_string .= '/(?P<' . $param_key . '>' . $param_specs . '+)';
                }

                register_rest_route($this->variables['rest_namespace'], '/' . $args['route'] . $param_string, [
                    'methods' => $args['methods'],
                    'callback' => $args['callback'],
                    'permission_callback' => $permission_callback
                ]);
            });
        }
    }
