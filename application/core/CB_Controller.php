<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * A base controller for CodeIgniter with view autoloading, layout support,
 * model loading, helper loading, asides/partials and per-controller 404
 *
 * @link http://github.com/jamierumbelow/codeigniter-base-controller
 * @copyright Copyright (c) 2012, Jamie Rumbelow <http://jamierumbelow.net>
 */
#[\AllowDynamicProperties]
class CB_Controller extends CI_Controller
{

	/* --------------------------------------------------------------
	 * VARIABLES
	 * ------------------------------------------------------------ */
    /** @var CI_Benchmark */
    public $benchmark;

    /** @var CI_Loader */
    public $load;

    /** @var CI_Config */
    public $config;

    /** @var CI_Input */
    public $input;

    /** @var CI_Output */
    public $output;

    /** @var CI_Security */
    public $security;

    /** @var CI_Lang */
    public $lang;

    /** @var CI_Uri */
    public $uri;

    /** @var CI_Router */
    public $router;

    /** @var CI_Hooks */
    public $hooks;

    /** @var CI_Session|null */
    public $session;

    /** @var CI_DB_query_builder|CI_DB_driver|null */
    public $db;

	public $log;
	public $utf8;
	public $managelayout;
	public $Member_model;
	public $member;
	public $cbconfig;
	public $board;
	public $agent;
	public $events;

	public $site;
	public $Board_model;
	public $file;
	public $cache;
	public $querystring;
	public $pagination;
	public $Config_model;
	public $mobile_detect;
	public $Member_extra_vars_model;

	public $Member_meta_model;
	public $Social_meta_model;
	public $Currentvisitor_model;
	public $Notification_model;
	public $Menu_model;
	public $popuplib;
	public $Popup_model;


	/**
	 * The current request's view. Automatically guessed
	 * from the name of the controller and action
	 */
	protected $view;

	/**
	 * An array of variables to be passed through to the
	 * view, layout and any asides
	 */
	protected $data = array();

	/**
	 * The name of the layout to wrap around the view.
	 */
	protected $layout;

	/**
	 * An arbitrary list of asides/partials to be loaded into
	 * the layout. The key is the declared name, the value the file
	 */
	protected $asides = array();

	/**
	 * A list of models to be autoloaded
	 */
	protected $models = array();

	/**
	 * A formatting string for the model autoloading feature.
	 * The percent symbol (%) will be replaced with the model name.
	 */
	protected $model_string = '%_model';

	/**
	 * A list of helpers to be autoloaded
	 */
	protected $helpers = array();

	/* --------------------------------------------------------------
	 * GENERIC METHODS
	 * ------------------------------------------------------------ */

	/**
	 * Initialise the controller, tie into the CodeIgniter superobject
	 * and try to autoload the models and helpers
	 */
	public function __construct()
	{
		parent::__construct();

		if (config_item('chk_installed')) {
			$database = $this->load->database('', true);
			if (empty($database->conn_id)) {
				redirect('install');
			}
			$connected = $database->initialize();
			if ($connected) {
				$this->load->database();
				if ($this->db->table_exists('config') === false) {
					redirect('install');
				}
			} else {
				redirect('install');
			}
		} else {
			$this->load->database();
		}
		$this->_load_models();
		$this->_load_helpers();

		// Place the driver calling code here
		$this->load->driver('cache', config_item('cache_method'));
		if (config_item('enable_profiler') === true) {
			$this->output->enable_profiler(TRUE);
		}
	}

	/* --------------------------------------------------------------
	 * VIEW RENDERING
	 * ------------------------------------------------------------ */

	/**
	 * Override CodeIgniter's despatch mechanism and route the request
	 * through to the appropriate action. Support custom 404 methods and
	 * autoload the view into the layout.
	 */
	public function _remap($method)
	{
		if (method_exists($this, $method)) {
			call_user_func_array(array($this, $method), array_slice($this->uri->rsegments, 2));
		} else {
			if (method_exists($this, '_404')) {
				call_user_func_array(array($this, '_404'), array($method));
			} else {
				show_404(strtolower(get_class($this)) . '/' . $method);
			}
		}

		$this->_load_view();
	}

	/**
	 * Automatically load the view, allowing the developer to override if
	 * he or she wishes, otherwise being conventional.
	 */
	protected function _load_view()
	{
		if ( ! isset($this->view)) {
			$this->view = false;
		}

		// If $this->view === false, we don't want to load anything
		if ($this->view !== false) {

			// Load the view into $yield
			if (is_array($this->view)) {
				$data['yield'] = '';
				foreach ($this->view as $val) {
					$data['yield'] .= $this->load->view($val, $this->data, true);
				}
			} else {
				$data['yield'] = $this->load->view($this->view, $this->data, true);
			}

			// Do we have any asides? Load them.
			if ( ! empty($this->asides)) {
				foreach ($this->asides as $name => $file) {
					$data['yield_' . $name] = $this->load->view($file, $this->data, true);
				}
			}

			// Load in our existing data with the asides and view
			$data = array_merge($this->data, $data);
			$layout = false;

			// If we didn't specify the layout, try to guess it
			if ( ! isset($this->layout)) {
				$this->layout = false;
			} elseif ($this->layout !== false) {
				// If we did, use it
				$layout = $this->layout;
			}

			// If $layout is false, we're not interested in loading a layout, so output the view directly
			if ($layout === false) {
				$this->output->set_output($data['yield']);
			} else {
				// Otherwise? Load away :)
				$this->load->view($layout, $data);
			}
		}
	}

	/* --------------------------------------------------------------
	 * MODEL LOADING
	 * ------------------------------------------------------------ */

	/**
	 * Load models based on the $this->models array
	 */
	private function _load_models()
	{
		foreach ($this->models as $model) {
			$this->load->model($this->_model_name($model));
		}
	}

	/**
	 * Returns the loadable model name based on
	 * the model formatting string
	 */
	protected function _model_name($model)
	{
		return str_replace('%', $model, $this->model_string);
	}

	/* --------------------------------------------------------------
	 * HELPER LOADING
	 * ------------------------------------------------------------ */

	/**
	 * Load helpers based on the $this->helpers array
	 */
	private function _load_helpers()
	{
		foreach ($this->helpers as $helper) {
			$this->load->helper($helper);
		}
	}
}
