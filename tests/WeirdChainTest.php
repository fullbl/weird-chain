<?php

namespace WeirdChain\Tests;
		
use PHPUnit\Framework\TestCase;
use WeirdChain\WeirdChain;

class WeirdChainTest extends TestCase
{
	public function testException(): void
	{
		$chain = new WeirdChain(new Useless());

		$this->assertInstanceOf(WeirdChain::class, $chain->doNothing());
			
		$var = 'asd';

		$varFromChain = $chain
			->setA($var)
			->nonExistent()
			->getA($var);

		$this->assertEquals($chain, $varFromChain);
		$this->assertEquals($var, $varFromChain());
	}
}


class Useless
{
	private $a;

	public function doNothing()
	{
	}

	public function setA($a)
	{
		$this->a = $a;
	}

	public function getA()
	{
		return $this->a;
	}
}

