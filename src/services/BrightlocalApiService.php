<?php
/**
 * BrightLocal API plugin for Craft CMS 3.x
 *
 * Get reviews, ratings, and other local business data from BrightLocal
 *
 * @link      http://bluefoot.com
 * @copyright Copyright (c) 2019 Bluefoot
 */

namespace bluefootweb\brightlocalapi\services;

use bluefootweb\brightlocalapi\BrightlocalApi;

use Craft;
use craft\base\Component;

/**
 * BrightlocalApiService Service
 *
 * All of your plugin’s business logic should go in services, including saving data,
 * retrieving data, etc. They provide APIs that your controllers, template variables,
 * and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 *
 * @author    Bluefoot
 * @package   BrightlocalApi
 * @since     1.0.0
 */
class BrightlocalApiService extends Component
{
    // Public Methods
    // =========================================================================
    /*
     * @return mixed
     */
    public function getData(int $businessId)
    {
        $settings = Darksky::$plugin->getSettings();
        $api_key = '';
        $apiUrl = 'https://tools.brightlocal.com/seo-tools/api/v4/ld/fetch-reviews';
        $client = new \GuzzleHttp\Client();
        $data = array();

        try {
            $api_key = (string)$settings->apiKey;
            $apiUrl .= '?api-key=' . $api_key;
            $apiUrl .= '&businessId=' . $businessId;
            $response = $client->request('POST', $apiUrl);

            // echo $response->getStatusCode(); # 200
            // echo $response->getHeaderLine('content-type'); # 'application/json; charset=utf8'
            // echo $response->getBody(); # '{"id": 1420053, "name": "guzzle", ...}'

            $data = json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            return [
                'success' => false,
                'reason' => ''
            ];
        }

        return $data;
    }
}
