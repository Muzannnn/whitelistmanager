# bcrypt
========

[![Build Status](https://travis-ci.org/Polarising/bcrypt.svg?branch=master)](https://travis-ci.org/Polarising/bcrypt)
[![Latest Stable Version](https://poser.pugx.org/polarising/bcrypt/v/stable)](https://packagist.org/packages/polarising/bcrypt)
[![Total Downloads](https://poser.pugx.org/polarising/bcrypt/downloads)](https://packagist.org/packages/polarising/bcrypt)
[![Latest Unstable Version](https://poser.pugx.org/polarising/bcrypt/v/unstable)](https://packagist.org/packages/polarising/bcrypt)
[![License](https://poser.pugx.org/polarising/bcrypt/license)](https://packagist.org/packages/polarising/bcrypt)
[![composer.lock](https://poser.pugx.org/polarising/bcrypt/composerlock)](https://packagist.org/packages/polarising/bcrypt)

Instead of using PHP hash password API, encrypt plain text by using Bcrypt algorithm, and make sure it's compatible with Bcrypt in other programming languages, like Java, python.

## Installing Bcrypt

The recommended way to install Bcrypt is through
[Composer](http://getcomposer.org).

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php
```

Next, run the Composer command to install the latest stable version of Bcrypt:

```bash
php composer.phar require polarising/bcrypt
```

After installing, you need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

You can then later update Bcrypt using composer:

 ```bash
composer.phar update
 ```

## Quick Examples

# Encrypt Plaintext, Verify Plaintext and Ciphertext 

```php
<?php
// Require the Composer autoloader.
require 'vendor/autoload.php';

use Bcrypt\Bcrypt;

// Instantiate an Bcrypt instance.
$bcrypt = new Bcrypt();

//Encrypt the plaintext
$plaintext = 'password';

//Set the Bcrypt Version, default is '2y'
$bcrypt_version = '2a';

$ciphertext = $bcrypt->encrypt($plaintext,$bcrypt_version);
print_r("\n Plaintext:".$plaintext);
print_r("\n Ciphertext:".$ciphertext);

//Verify the plaintext and ciphertext
if($bcrypt->verify($plaintext, $ciphertext)){
	print_r("\n Password verified!");
}else{
	print_r("\n Password not match!");
}
```
