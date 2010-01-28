<?php

/**
* Google Translator
*
* Copyright (c) 2009, 2010 Roman Novák
*
* This source file is subject to the New-BSD licence.
*
* For more information please see http://nettephp.com
*
* @copyright Copyright (c) 2009, 2010 Roman Novák
* @license   New-BSD
* @link      http://nettephp.com/cs/extras/googletranslator
* @version   0.1
*/

require_once dirname(__FILE__) . '/loader.php';
require_once dirname(__FILE__) . '/GoogleTranslator.php';

Environment::setVariable('appDir', dirname(__FILE__));
Environment::setVariable('tmpDir', dirname(__FILE__) . '/temp');

Debug::enable();
Debug::enableProfiler();

if(!is_writable(Environment::getVariable('tmpDir'))) {
	throw new InvalidStateException('Make temp directory "' . Environment::getVariable('tmpDir')  . '" writable');
}

$time = microtime(true);
$translator = new GoogleTranslator(GT::ENGLISH, GT::SLOVAK);
echo 'Ahoj = ' . $translator->translate('Ahoj') . (!$translator->fromCache ? ' (no cache)' : ' (from cache)');
echo ' - ' . (microtime(true) - $time) . 's';
echo "<br />\n";
$translator->disableCache = true;
$time = microtime(true);
echo 'Ahoj svet! = ' . $translator->translate('Ahoj svet!') . (!$translator->fromCache ? ' (no cache)' : ' (from cache)');
echo ' - ' . (microtime(true) - $time) . 's';
