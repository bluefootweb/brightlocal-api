<?php
/**
 * BrightLocal API plugin for Craft CMS 3.x
 *
 * Get reviews, ratings, and other local business data from BrightLocal
 *
 * @link      http://bluefoot.com
 * @copyright Copyright (c) 2019 Bluefoot
 */

namespace bluefoot\brightlocalapi\variables;

use bluefoot\brightlocalapi\BrightlocalApi;

use Craft;

/**
 * BrightLocal API Variable
 *
 * Craft allows plugins to provide their own template variables, accessible from
 * the {{ craft }} global variable (e.g. {{ craft.brightlocalApi }}).
 *
 * https://craftcms.com/docs/plugins/variables
 *
 * @author    Bluefoot
 * @package   BrightlocalApi
 * @since     1.0.0
 */
class BrightlocalApiVariable
{
    // Public Methods
    // =========================================================================

    /**
     * Whatever you want to output to a Twig template can go into a Variable method.
     * You can have as many variable functions as you want.  From any Twig template,
     * call it like this:
     *
     *     {{ craft.brightlocalApi.exampleVariable }}
     *
     * Or, if your variable requires parameters from Twig:
     *
     *     {{ craft.brightlocalApi.exampleVariable(twigValue) }}
     *
     * @param null $optional
     * @return string
     */
    // Public Methods
    // =========================================================================
    public function brightLocal(int $businessId)
    {
        return BrightlocalApi::getInstance()->brightlocalApi->getData($businessId);
    }
}
