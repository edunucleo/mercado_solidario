<?php
namespace MetForm\Base;

defined('ABSPATH') || exit;

abstract class Common {

	public function get_name() {
		return null;
	}


	public function get_title() {
		return $this->get_name();
	}


	public function get_dir() {
		return dirname(__FILE__);
	}


	public function get_base() {
		return str_replace(\MetForm\Plugin::instance()->plugin_dir(), '', $this->get_dir());

		return $this->get_dir();
	}


	public function get_url() {
		return \MetForm\Plugin::instance()->plugin_url() . $this->get_base();
	}


	public abstract function init();

}