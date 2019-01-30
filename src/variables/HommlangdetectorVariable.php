<?php
/**
 * hommlangdetector plugin for Craft CMS 3.x
 *
 * Detect brwoser lang and show corresponding site

 *
 * @link      http://www.homm.ch
 * @copyright Copyright (c) 2019 Domenik Hofer
 */

namespace homm\hommlangdetector\variables;

use homm\hommlangdetector\Hommlangdetector;

use Craft; 

/**
 * hommlangdetector Variable
 *
 * Craft allows plugins to provide their own template variables, accessible from
 * the {{ craft }} global variable (e.g. {{ craft.hommlangdetector }}).
 *
 * https://craftcms.com/docs/plugins/variables
 *
 * @author    Domenik Hofer
 * @package   Hommlangdetector
 * @since     1.0.0
 */
class HommlangdetectorVariable
{
    // Public Methods
    // =========================================================================

    /**
     * Whatever you want to output to a Twig template can go into a Variable method.
     * You can have as many variable functions as you want.  From any Twig template,
     * call it like this:
     *
     *     {{ craft.hommlangdetector.exampleVariable }}
     *
     * Or, if your variable requires parameters from Twig:
     *
     *     {{ craft.hommlangdetector.exampleVariable(twigValue) }}
     *
     * @param null $optional
     * @return string
     */
    public function getlangSiteHandle()
    {
       $lang = \homm\hommlangdetector\Hommlangdetector::getInstance()->services->getBrowserLang();
			
			
			return $lang;
    }
	
	 public function getAllSites()
    {
       $sites = \homm\hommlangdetector\Hommlangdetector::getInstance()->services->getAllSites();
			
			
			return $sites;
    }
}
