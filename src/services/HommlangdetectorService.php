<?php
/**
 * hommlangdetector plugin for Craft CMS 3.x
 *
 * Detect brwoser lang and show corresponding site

 *
 * @link      http://www.homm.ch
 * @copyright Copyright (c) 2019 Domenik Hofer
 */

namespace homm\hommlangdetector\services;

use homm\hommlangdetector\Hommlangdetector;

use Craft;
use craft\base\Component;

/**
 * HommlangdetectorService Service
 *
 * All of your plugin’s business logic should go in services, including saving data,
 * retrieving data, etc. They provide APIs that your controllers, template variables,
 * and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 *
 * @author    Domenik Hofer
 * @package   Hommlangdetector
 * @since     1.0.0
 */
class HommlangdetectorService extends Component 
{
    // Public Methods
    // =========================================================================

    /**
     * This function can literally be anything you want, and you can have as many service
     * functions as you want
     *
     * From any other plugin file, call it like this:
     *
     *     Hommlangdetector::$plugin->hommlangdetectorService->exampleService()
     *
     * @return mixed
     */
    public function exampleService()
    {
        $result = 'something';
        // Check our Plugin's settings for `someAttribute`
        if (Hommlangdetector::$plugin->getSettings()->someAttribute) {
        }

        return $result;
    }
	
	 public function getAllSites()
    {
	
	$sites = Craft::$app->sites->getAllSites();
	return $sites;
	
	}
	
	
	
	 public function getBrowserLang()
    {
	   
		$lang = $this->multiexplode(array("-",",",";"),$_SERVER['HTTP_ACCEPT_LANGUAGE']);
		$sites = $this->getAllSites();
		
		$handle = '';
		
		foreach($sites as $key=>$value){
			if (strpos($value['language'], $lang[0]) !== false) {
			$handle = $value['handle'];
			}
			}
			
			if($handle == ''){
				$handle = 'default';
				}
		
        return $handle;  
    }
	
	private function multiexplode ($delimiters,$string) {

    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}
	
}
