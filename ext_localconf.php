<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

class Foobar {
    public function initializeFormElement($el)
    {
        // \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($el);
        // $validators = $el->getValidators();

        // $el->setProperty('fluidAdditionalAttributes', ['data-foo' => 'foo']);
    }
    public function beforeRendering($formRuntime)
    {
        // \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($formRuntime);
    }
}

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/form']['initializeFormElement'][] = 'Foobar';
// $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/form']['beforeRendering'][] = 'Foobar';