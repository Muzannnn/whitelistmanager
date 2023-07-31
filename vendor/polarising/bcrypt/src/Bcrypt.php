<?php 
namespace Bcrypt;

class Bcrypt
{
	const VERSION = '1.0.0';

	public static function encrypt($plaintext, $bcrypt_version="2y", $cost=10)
	{
		//make sure adding the cost in two digits
		$cost = sprintf('%02d', $cost);

		/* To generate the salt, first generate enough random bytes. Because
         * base64 returns one character for each 6 bits, the we should generate
         * at least 22*6/8=16.5 bytes, so we generate 17. Then we get the first
         * 22 base64 characters
         */
		$salt=substr(base64_encode(openssl_random_pseudo_bytes(17)),0,22);

		/* As blowfish takes a salt with the alphabet ./A-Za-z0-9 we have to
         * replace any '+' in the base64 string with '.'. We don't have to do
         * anything about the '=', as this only occurs when the b64 string is
         * padded, which is always after the first 22 characters.
         */
        $salt=str_replace("+",".",$salt);

        /* Create a string that will be passed to crypt, containing all
         * of the settings, separated by dollar signs
         */
        $salt='$'.implode('$',[$bcrypt_version, $cost, $salt]);

        $ciphertext = crypt($plaintext, $salt);

        return $ciphertext;
	}

	public static function verify($plaintext, $ciphertext)
	{
		if(version_compare(PHP_VERSION, '5.6.0', '>=')){
			return hash_equals($ciphertext, crypt($plaintext, $ciphertext));
		}
		return crypt($plaintext, $ciphertext) == $ciphertext;
	}
}