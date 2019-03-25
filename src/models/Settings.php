<?php
/**
 * BrightLocal API plugin for Craft CMS 3.x
 *
 * Get reviews, ratings, and other local business data from BrightLocal
 *
 * @link      http://bluefoot.com
 * @copyright Copyright (c) 2019 Bluefoot
 */

namespace bluefoot\brightlocalapi\models;

use bluefoot\brightlocalapi\BrightlocalApi;

use Craft;
use craft\base\Model;

/**
 * BrightlocalApiModel Model
 *
 * Models are containers for data. Just about every time information is passed
 * between services, controllers, and templates in Craft, it’s passed via a model.
 *
 * https://craftcms.com/docs/plugins/models
 *
 * @author    Bluefoot
 * @package   BrightlocalApi
 * @since     1.0.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $apiKey = null;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['apiKey'], 'string'],
            [['apiKey'], 'required']
        ];
    }
}
