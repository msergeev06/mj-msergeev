<?php

namespace MSergeev\Core\Entity;

class DatetimeField extends DateField {
	public function __construct($name, $parameters = array())
	{
		ScalarField::__construct($name, $parameters);

		$this->dataType = $this->fieldType = 'datetime';
	}
}