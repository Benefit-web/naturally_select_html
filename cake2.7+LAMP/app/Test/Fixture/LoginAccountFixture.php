<?php
/**
 * LoginAccount Fixture
 */
class LoginAccountFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'login_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'login_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 64, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'login_auth' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'create_date' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'update_date' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'login_id' => 1,
			'login_name' => 'Lorem ipsum dolor sit amet',
			'login_auth' => 1,
			'create_date' => '2015-10-04 18:07:37',
			'update_date' => '2015-10-04 18:07:37'
		),
	);

}
