<?php
class CreditCardValidator
{
	public $result = [
		'cardType' 			=> 'unknown',
		'validationMessage' => ''
	];

	public function __construct()
	{
	}

	public function validate($number)
	{
		if (is_numeric($number)) {

		} else {
			$this->result['validationMessage'] = 'Your card number should consist of integers';
		}
	}
}