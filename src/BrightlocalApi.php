<?php
/**
 * BrightLocal API plugin for Craft CMS 3.x
 *
 * Get reviews, ratings, and other local business data from BrightLocal
 *
 * @link      http://bluefoot.com
 * @copyright Copyright (c) 2019 Bluefoot
 */

namespace bluefootweb\brightlocalapi;

use bluefootweb\brightlocalapi\services\BrightlocalApiService as BrightlocalApiServiceService;
use bluefootweb\brightlocalapi\variables\BrightlocalApiVariable;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\web\twig\variables\CraftVariable;

use yii\base\Event;

/**
 * Craft plugins are very much like little applications in and of themselves. We’ve made
 * it as simple as we can, but the training wheels are off. A little prior knowledge is
 * going to be required to write a plugin.
 *
 * For the purposes of the plugin docs, we’re going to assume that you know PHP and SQL,
 * as well as some semi-advanced concepts like object-oriented programming and PHP namespaces.
 *
 * https://craftcms.com/docs/plugins/introduction
 *
 * @author    Bluefoot
 * @package   BrightlocalApi
 * @since     1.0.0
 *
 * @property  BrightlocalApiServiceService $brightlocalApiService
 */
class BrightlocalApi extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * Static property that is an instance of this plugin class so that it can be accessed via
     * BrightlocalApi::$plugin
     *
     * @var BrightlocalApi
     */
    public $hasCpSettings = true;
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * To execute your plugin’s migrations, you’ll need to increase its schema version.
     *
     * @var string
     */
    public $schemaVersion = '1.0.0';

    

    public function init()
    {
        parent::init();
        self::$plugin = $this;

        $this->setComponents([
            'brightlocalApi' => BrightlocalApiService::class,
        ]);

        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $event) {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                $variable->set('brightlocal', BrightlocalApiVariable::class);
            }
        );

        Craft::info(
            Craft::t(
                'brightlocal',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    protected function createSettingsModel()
    {
        return new \bluefootweb\brightlocalApi\models\Settings();
    }

    protected function settingsHtml()
    {
        return Craft::$app->getView()->renderTemplate('brightlocalApi/settings', [
            'settings' => $this->getSettings()
        ]);
    }

}
