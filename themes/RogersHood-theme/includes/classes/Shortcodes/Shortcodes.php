<?php

namespace TenUpTheme\Shortcodes;

class Shortcodes {
	/**
	 * @var RegisterPage
	 */
	private $register_page;
	/**
	 * @var LoginPage
	 */
	private $login_page;

	public function __construct() {
		$this->register_page = new RegisterPage();
		$this->login_page = new LoginPage();
	}

	public function init_hooks() {
		$this->register_page->init_hooks();
		$this->login_page->init_hooks();
	}
}
