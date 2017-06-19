<?php

namespace R3H6\FormParsley\ViewHelpers;

use TYPO3\CMS\Form\Domain\Model\FormElements\FormElementInterface;
use TYPO3\CMS\Extbase\Validation\Validator\NotEmptyValidator;
use TYPO3\CMS\Extbase\Validation\Validator\EmailAddressValidator;

class ParsleyViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{
    /**
     * Initialize arguments.
     *
     * @internal
     */
    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument('element', FormElementInterface::class, 'Form Element', true);
    }

    public function render()
    {
        /** @var \TYPO3\CMS\Form\Domain\Model\FormElements\FormElementInterface */
        $element = $this->arguments['element'];

        $validation = [];

        foreach ($element->getValidators() as $validator) {
            $this->addParsleyValidation($validator, $validation);
        }

        return $validation;
    }

    protected function addParsleyValidation($validator, &$validation)
    {
        switch (get_class($validator)) {
            case NotEmptyValidator::class:
                break;
            case EmailAddressValidator::class:
                $validation['parsley-type'] = 'email';
                break;
        }
        // \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($validator);
    }
}
