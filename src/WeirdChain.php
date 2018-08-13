<?php

namespace WeirdChain;

class WeirdChain
{
	/** @var object */
	private $obj;

	/** @var mixed */
	private $lastReturn;
	
	/**
	 * @param object $obj
	 */
	function __construct(object $obj)
	{
		$this->obj = $obj;
	}

	/**
	 * @param  string $methodName
	 * @param  array  $arguments
	 * @return Chain
	 */
	function __call(string $methodName, array $arguments): self
	{
		if(\method_exists($this->obj, $methodName)){
			$this->lastReturn = $this->obj->$methodName(...$arguments);
		}

		return $this;
	}

	/**
	 * @return mixed
	 */
	function __invoke()
	{
		return $this->lastReturn;
	}
}