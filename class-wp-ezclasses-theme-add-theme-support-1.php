<?php
/** 
 * WordPress add_theme_support() an ez makeover.
 *
 * Instead of manually coding line after line of add_theme_support()s , now you simply configure an array and pass that to this class / methods.
 *
 * PHP version 5.3
 *
 * LICENSE: TODO
 *
 * @package WPezClasses
 * @author Mark Simchock <mark.simchock@alchemyunited.com>
 * @since 0.5.0
 * @license TODO
 */
 
/**
 * == Change Log == 
 *
 * -- 13 November 2014 
 *     -- Ready!
 */
 
/**
 * - TODO -
 *
 * -- deeper validation
 */
 
// No WP? Die! Now!!
if (!defined('ABSPATH')) {
	header( 'HTTP/1.0 403 Forbidden' );
    die();
}

if ( ! class_exists('Class_WP_ezClasses_Theme_Add_Theme_Support_1') ) {
  class Class_WP_ezClasses_Theme_Add_Theme_Support_1 extends Class_WP_ezClasses_Master_Singleton{
  
    private $_version;
	private $_url;
	private	$_path;
	private $_path_parent;
	private $_basename;
	private $_file;
  
    protected $_arr_init;
		
	public function __construct() {
	  parent::__construct();
	}
	
	public function ez__construct($arr_args = ''){
	  $this->setup();
	}
	
	
	protected function setup(){
	
	  $this->_version = '0.5.0';
	  $this->_url = plugin_dir_url( __FILE__ );
	  $this->_path = plugin_dir_path( __FILE__ );
	  $this->_path_parent = dirname($this->_path);
	  $this->_basename = plugin_basename( __FILE__ );
	  $this->_file = __FILE__ ;	
	
	}
	
	/**
	 *
	 */
	public function ez_ats($arr_args = ''){
	
	  if (WPezHelpers::ez_array_pass($arr_args) ){
	  
	    foreach ( $arr_args as $str_key => $arr_value ){
	
		  if ( $arr_value['active'] === true && isset($arr_value['feature']) ) {
		
		    if ( isset($arr_value['args_type']) && $arr_value['args_type'] != 'none' ) {
		    
		      if ( isset($arr_value['args_type']) && $arr_value['args_type'] == 'active_bool' ){
		        $arr_args_true = array();
		        foreach ($arr_value['args'] as $str_arg_key => $bool_value ){
			      if ( $bool_value === true ){
			        $arr_args_true[] = $str_arg_key;
			      }
			    }
			    add_theme_support($arr_value['feature'], $arr_args_true );
		 
			  } elseif ( isset($arr_value['args']) && is_array($arr_value['args']) ){
			
			    add_theme_support($arr_value['feature'], $arr_value['args'] );
			 
			  }
		    } else {
		  
		      add_theme_support($arr_value['feature'] );
		    }
		  }	
	    }
	  }
	}
	
  }	
}