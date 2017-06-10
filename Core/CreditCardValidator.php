<?php
class CreditCardValidator
{
	public $result = [
		'cardType' 			=> 'unknown',
		'validationMessage' => 'No data'
	];

	private $codeMatchPatterns = [
		'American Express' 			  => '/^34|37/',
		'Diners Club - Carte Blanche' => '/^300|301|302|303|304|305/',
		'Diners Club - International' => '/^36/',
		'Diners Club - USA & Canada'  => '/^54/',
		'Discover' 					  => '/^6011|(622126-622925)|644|645|646|647|648|649|65/',
		'InstaPayment' 				  => '/^637|638|639/',
		'JCB' 						  => '/^(3528-3589)/',
		'Maestro' 					  => '/^(5018|5020|5038|5893|6304|6759|6761|6762|6763)/',
		'MasterCard' 				  => '/^51|52|53|54|55|(222100-272099)/',
		'Visa Electron' 			  => '/^4026|417500|4508|4844|4913|4917/',
		'Visa' 						  => '/^4/'
	];

	public function __construct()
	{
	}

	public function validate($number)
	{
		if (!is_numeric($number)) {
			$this->result['validationMessage'] = 'Your card number should consist of integers';
		}

		foreach ($this->codeMatchPatterns as $cardType => $pattern) {
			if (preg_match($pattern, $number)) {
				$this->result['cardType'] = $cardType;
				break;
			}
		}

		$inputArray = str_split($number);
	}
}