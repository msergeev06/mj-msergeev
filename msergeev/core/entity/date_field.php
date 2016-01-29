<?php

namespace MSergeev\Core\Entity;

class DateField extends ScalarField {

	public function __construct($name, $parameters = array())
	{
		parent::__construct($name, $parameters);

		$this->dataType = $this->fieldType = 'date';


		//$this->addFetchDataModifier(array($this, 'assureValueObject'));
	}

	public function saveDataModification ($value)
	{
		$value = parent::saveDataModification($value);


		return $value;
	}

	public function fetchDataModification ($value)
	{
		$value = parent::fetchDataModification ($value);


		return $value;
	}


	/*
	public function getValidators()
	{
		$validators = parent::getValidators();

		if ($this->validation === null)
		{
			$validators[] = new Validator\Date;
		}

		return $validators;
	}

	public function assureValueObject($value)
	{
		if ($value instanceof Type\DateTime)
		{
			// oracle sql helper returns datetime instead of date - it doesn't see the difference
			$value = new Type\Date(
				$value->format(Main\UserFieldTable::MULTIPLE_DATE_FORMAT),
				Main\UserFieldTable::MULTIPLE_DATE_FORMAT
			);
		}

		return $value;
	}
	*/

}