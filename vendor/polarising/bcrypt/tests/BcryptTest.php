<?php
namespace Bcrypt\Test;

use Bcrypt\Bcrypt;

class BcryptTest extends \PHPUnit_Framework_TestCase
{
	public function testCanEncrypt()
	{
		$bcrypt = new Bcrypt();
		$plaintext = '123456';
		$ciphertext = $bcrypt->encrypt($plaintext);
		$this->assertNotEquals('*0', $ciphertext);
	}

	public function testCanVerify()
	{
		$bcrypt = new Bcrypt();
		$plaintext = '123456';
		$ciphertext = $bcrypt->encrypt($plaintext);
		$this->assertTrue($bcrypt->verify($plaintext, $ciphertext));
	}

	public function testCanEncryptInJavaVersion()
	{
		$bcrypt = new Bcrypt();
		$plaintext = '123456';
		$bcrypt_version = '2a';
		$ciphertext = $bcrypt->encrypt($plaintext,$bcrypt_version);
		$this->assertNotEquals('*0', $ciphertext);
	}

	public function testCanVerifyInJavaVersion()
	{
		$bcrypt = new Bcrypt();
		$plaintext = '123456';
		$bcrypt_version = '2a';
		$ciphertext = $bcrypt->encrypt($plaintext,$bcrypt_version);
		$this->assertTrue($bcrypt->verify($plaintext, $ciphertext));
	}
}