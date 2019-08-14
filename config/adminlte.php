<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */

    'title' => 'Do System',

    'title_prefix' => '',

    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so
    |
    */

    'logo' => '<b>Do</b>System',

    'logo_mini' => '<b>Do</b>',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | ligth variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'blue',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => 'fixed',

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option
    |
    */

    'collapse_sidebar' => false,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | You can set the request to a GET or POST with logout_method.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => 'admin',

    'logout_url' => 'logout',

    'logout_method' => null,

    'login_url' => 'login',

    'register_url' => 'register',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and and a URL. You can also specify an icon from
    | Font Awesome. A string instead of an array represents a header in sidebar
    | layout. The 'can' is a filter on Laravel's built in Gate functionality.
    |
    */

    'menu' => [
        '管理情報',
        [
            'text' => '出店リスト',
            'url'  => 'admin/kitchencars',
            'icon' => 'truck',
        ],
        [
            'text' => '出店者情報',
            'icon' => 'database',
            'submenu' => [
                [
                    'text' => '事業者一覧',
                    'url'  => 'admin/vendors',
                    'icon' => 'users',
                ],
                [
                    'text' => '車両一覧',
                    'url'  => 'admin/cars',
                    'icon' => 'car',
                ],
                [
                    'text' => '営業許可一覧',
                    'url'  => 'admin/business-permits',
                    'icon' => 'file-text',
                ],
                [
                    'text' => 'ブランド一覧',
                    'url'  => 'admin/brands',
                    'icon' => 'coffee',
                ],
                [
                    'text' => '商品一覧',
                    'url'  => 'admin/items',
                    'icon' => 'cutlery',
                ],
                [
                    'text' => '新規事業者追加',
                    'url'  => 'admin/vendors/create',
                    'icon' => 'plus',
                ],
            ],
        ],
        [
            'text' => '行政情報',
            'icon' => 'institution',
            'submenu' => [
                [
                    'text' => '営業区域一覧',
                    'url'  => 'admin/business-areas',
                    'icon' => 'object-group',
                ],
                [
                    'text' => '保健所一覧',
                    'url'  => 'admin/health-centers',
                    'icon' => 'heart',
                ],
                [
                    'text' => '地方公共団体一覧',
                    'url'  => 'admin/municipalities',
                    'icon' => 'map',
                ],
            ],
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Choose which JavaScript plugins should be included. At this moment,
    | only DataTables is supported as a plugin. Set the value to true
    | to include the JavaScript file from a CDN via a script tag.
    |
    */

    'plugins' => [
        'datatables' => true,
        'select2'    => true,
        'chartjs'    => true,
    ],
];
