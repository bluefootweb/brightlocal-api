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
class BrightlocalApiModel extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * Some model attribute
     *
     * @var string
     */
    public $someAttribute = 'Some Default';

    // Public Methods
    // =========================================================================

    /**
     * Returns the validation rules for attributes.
     *
     * Validation rules are used by [[validate()]] to check if attribute values are valid.
     * Child classes may override this method to declare different validation rules.
     *
     * More info: http://www.yiiframework.com/doc-2.0/guide-input-validation.html
     *
     * @return array
     */
    public function rules()
    {
        return [
            ['someAttribute', 'string'],
            ['someAttribute', 'default', 'value' => 'Some Default'],
        ];
    }
}
