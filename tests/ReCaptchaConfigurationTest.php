<?php
/**
 * Copyright (c) 2017 - present
 * LaravelGoogleRecaptcha - ReCaptchaConfigurationTest.php
 * author: Roberto Belotti - roby.belotti@gmail.com
 * web : robertobelotti.com, github.com/biscolab
 * Initial version created on: 13/2/2019
 * MIT license: https://github.com/biscolab/laravel-recaptcha/blob/master/LICENSE
 */

namespace Biscolab\ReCaptcha\Tests;

use Biscolab\ReCaptcha\Controllers\ReCaptchaController;
use Biscolab\ReCaptcha\ReCaptchaBuilder;
use Biscolab\ReCaptcha\ReCaptchaBuilderV2;
use Biscolab\ReCaptcha\ReCaptchaBuilderV3;
use Illuminate\Support\Facades\App;

/**
 * Class ReCaptchaConfigurationTest
 * @package Biscolab\ReCaptcha\Tests
 */
class ReCaptchaConfigurationTest extends TestCase {

	/**
	 * @var ReCaptchaBuilder
	 */
	protected $recaptcha;

	/**
	 * @test
	 */
	public function testSkipIpWhiteListIsArray() {

		$ip_whitelist = $this->recaptcha->getIpWhitelist();
		$this->assertTrue(is_array($ip_whitelist));
		$this->assertCount(2, $ip_whitelist);
	}

	/**
	 * @test
	 */
	public function testCurlTimeoutIsSet() {
		$this->assertEquals(3, $this->recaptcha->getCurlTimeout());
	}

	/**
	 * Define environment setup.
	 *
	 * @param  \Illuminate\Foundation\Application $app
	 *
	 * @return void
	 */
	protected function getEnvironmentSetUp($app) {

		$app['config']->set('recaptcha.skip_ip', '10.0.0.1,10.0.0.2');
		$app['config']->set('recaptcha.curl_timeout', 3);
	}

	/**
	 * Setup the test environment.
	 */
	protected function setUp(): void {

		parent::setUp(); // TODO: Change the autogenerated stub

		$this->recaptcha = new ReCaptchaBuilderV2('api_site_key', 'api_secret_key');
	}
}