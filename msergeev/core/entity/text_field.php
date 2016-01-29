<?php

namespace MSergeev\Core\Entity;

class TextField extends StringField
{
	function __construct($name, $parameters = array())
	{
		parent::__construct($name, $parameters);

		$this->dataType = $this->fieldType = 'text';

	}
}