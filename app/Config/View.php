<?php

namespace Config;

use CodeIgniter\Config\View as BaseView;
use CodeIgniter\View\ViewDecoratorInterface;

class View extends BaseView
{
    /**
     * When false, the view method will clear the data between each
     * call. This keeps your data safe and ensures there is no accidental
     * leaking between calls, so you would need to explicitly pass the data
     * to each view. You might prefer to have the data stick around between
     * calls so that it is available to all views. If that is the case,
     * set $saveData to true.
     *
     * @var bool
     */
    public $saveData = true;

    /**
     * Parser Filters map a filter name with any PHP callable. When the
     * Parser prepares a variable for display, it will chain it
     * through the filters in the order defined, inserting any parameters.
     * To prevent potential abuse, all filters MUST be defined here
     * in order for them to be available for use within the Parser.
     *
     * Examples:
     *  { title|esc(js) }
     *  { created_on|date(Y-m-d)|esc(attr) }
     *
     * @var array
     */
    public $filters = [];

    /**
     * Parser Plugins provide a way to extend the functionality provided
     * by the core Parser by creating aliases that will be replaced with
     * any callable. Can be single or tag pair.
     *
     * @var array
     */
    public $plugins = [];

    /**
     * View Decorators are class methods that will be run in sequence to
     * have a chance to alter the generated output just prior to caching
     * the results.
     *
     * All classes must implement CodeIgniter\View\ViewDecoratorInterface
     *
     * @var class-string<ViewDecoratorInterface>[]
     */
    public array $decorators = [];

    /*
    * The following settings will be used to configure the hunabku library and the 
    * options are as follows:
    * For more details :  https://github.com/junglaCODE/hunabku
    */ 
    /*Object main for instances*/ 
    public $name_object = 'Hunabku';
    /*sitemaps for make menu*/
    public $sitemaps = '../app/Config/Sitemaps.xml' ;
    /**
	 * Configuration of cache for view_cell and view. used constants
	 * section : Timing Constants, for time duration
	 * in the cache is in seconds
	*/
	public $cache = 60;
    /**
	 * this directory is used to store everything related to
	 *  templates and widgets of this library
	 **/
	public $widgets = 'templates/widgets/';
	/**
	 * Configuration of the repository of assets, what works for
	 * render used template.
	 */
	public $repository = array(
			'framework'	=>	'_thirdparty/materialize-admin' ,
			'images'	=> 	'_assets/images' ,
			'js'		=> 	'_assets/js' ,
            'css'       =>  '_assets/css',
            'libraries'   => '_thirdparty/materialize-admin/vendors',
		);
}
