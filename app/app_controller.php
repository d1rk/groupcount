<?php
/**
 * AppController
 * 
 * Handles everything that needs to be done, everywhere.
 *
 * @package groupcount
 * @author Dirk Brünsicke
 * @copyright bruensicke.com GmbH
 **/

App::import('Core', 'Sanitize');
class AppController extends Controller
{
	public $helpers = array(
		'Html',
		'Form',
		'Session',
		'Number',
	);

	public $components = array(
		'Cookie',
		'Session',
		'Flour.Flash',
	);
	
}