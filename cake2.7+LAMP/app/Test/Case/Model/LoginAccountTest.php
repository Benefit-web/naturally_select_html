<?php
App::uses('LoginAccount', 'Model');

/**
 * LoginAccount Test Case
 */
class LoginAccountTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.login_account'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->LoginAccount = ClassRegistry::init('LoginAccount');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LoginAccount);

		parent::tearDown();
	}

}
