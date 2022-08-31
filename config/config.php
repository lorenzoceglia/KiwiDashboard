<?php
    $config['default']['third_level'] = explode('.', str_replace('www.', '', $_SERVER['SERVER_NAME']))[0];
    $config['default']['app_name'] = 'Kiwi Default App Name';
    $config['default']['app_version'] = '1.0';
    $config['default']['title'] = 'Kiwi';
    $config['default']['client_name'] = 'Kiwi Dashboard Admin Panel';
    $config['default']['year'] = Date('Y');
    $config['default']['dashboard'] = '/';

    //skeleton config variables
    $config['default']['dropdowns'] = false;
    $config['default']['searchbar'] = false;

    $config['default']['app_root'] = '/';

return $config;
