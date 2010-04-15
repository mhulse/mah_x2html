<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$plugin_info = array(
	'pi_name' => 'X2html',
	'pi_version' => '2.0',
	'pi_author' => 'Micky Hulse',
	'pi_author_url' => 'http://hulse.me/',
	'pi_description' => 'Converts XHTML to HTML.',
	'pi_usage' => Mah_x2html::usage()
);

/**
 * Mah_x2html Class
 * 
 * @package			ExpressionEngine
 * @category		Plugin
 * @author			Micky Hulse
 * @copyright		Copyright (c) 2010, Micky Hulse
 * @link			http://hulse.me/
 */
 
class Mah_x2html
{
	
	var $return_data = '';
	
	/**
	 * Constructor
	 * 
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	
	function Mah_x2html($str = '')
	{
		
		// ----------------------------------
		// Call super object:
		// ----------------------------------
		
		$this->EE =& get_instance();
		
		if ($str == '') {
			
			// ----------------------------------
			// Use tagdata:
			// ----------------------------------
			
			$str = $this->EE->TMPL->tagdata;
			
		} else {
			
			// ----------------------------------
			// Passing data directly:
			// ----------------------------------
			
			$this->EE->load->library('typography');
			$str = $this->EE->typography->auto_typography($str); // Format as $str as XHTML.
			
		}
		
		$this->return_data = preg_replace('/(\s+)?\/>/', '>', $str);
	
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Usage
	 * 
	 * Plugin Usage.
	 * 
	 * @access	public
	 * @return	string
	 */
	
	function usage()
	{
		
		ob_start();
		
		?>
		
		Usage:
		
		----------
			
			{exp:mah_x2html}
				{exp:search:simple_form weblog="my_weblog"}
					<div><input type="text" name="keywords" id="keywords"></div>
				{/exp:search:simple_form}
			{/exp:mah_x2html}
			
		----------
		
		Please see forum thread for more information:
		
			http://expressionengine.com/forums/viewthread/124352/
		
		Version 1.0
		******************
		- Initial public release.
		
		Version 2.0
		******************
		- Updated plugin to be 2.0 compatible
		
		<?php
		
		$buffer = ob_get_contents();
		
		ob_end_clean(); 
		
		return $buffer;
		
	}
	
	// --------------------------------------------------------------------
	
}

/* End of file pi.mah_x2html.php */
/* Location: ./system/expressionengine/mah_x2html/pi.mah_x2html.php */