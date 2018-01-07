<?php
/**
 * Inspector plugin for Craft CMS 3.x
 *
 * amacneil/craft-inspector ported to Craft 3
 *
 * @link      https://musingmonkeys.com/
 * @copyright Copyright (c) 2018 Robert Antoine
 */

namespace rjantoine\inspector;

use rjantoine\inspector\twigextensions\InspectorTwigExtension;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;

use yii\base\Event;

/**
 * Class Inspector
 *
 * @author    Robert Antoine
 * @package   Inspector
 * @since     1.0.0
 *
 */
class Inspector extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var Inspector
     */
    public static $plugin;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Craft::$app->view->registerTwigExtension(new InspectorTwigExtension());

        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                if ($event->plugin === $this) {
                }
            }
        );

        Craft::info(
            Craft::t(
                'inspector',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

}
