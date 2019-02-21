<?php

namespace Importer;

use Cake\Core\BasePlugin;

/**
 * Plugin for Importer
 */
class Plugin extends BasePlugin
{


    public function routes($routes)
    {
        // Add routes.
        // By default will load `config/routes.php` in the plugin.
        parent::routes($routes);
    }
}
