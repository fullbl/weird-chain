<?php

namespace WeirdChain\Tests;

use PHPUnit\Framework\TestCase;
use WeirdChain\WeirdChain;

class IntChainTest extends TestCase
{
	/**
	 * @param  array  $operations [description]
	 * @param  int    $expected   [description]
	 * @return void
	 *
	 * @dataProvider operationsDataProvider
	 */
	public function testException(array $operations, int $expected): void
	{
		$chain = new WeirdChain(new Math(current($operations)));

		$varFromChain = $chain
			->sum(next($operations))
			->sub(next($operations))
			->multiply(next($operations))
			->divide(next($operations));

		$this->assertEquals($chain, $varFromChain);
		$this->assertEquals($expected, $varFromChain());
	}

	public function operationsDataProvider(): array
	{
		return [
			[[10,1,1,1,1], 10],
			[[1,1,1,1,1], 1],
			[[10,2,3,3,3], 9]
		];
	}
}

class Math
{
	/** @var int */
	private $n;

	public function __construct(int $n)
	{
		$this->n = $n;
	}

	public function sum(int $y): int
	{
		return $this->n += $y;
	}

	public function sub(int $y): int
	{
		return $this->n -= $y;
	}

	public function multiply(int $y): int
	{
		return $this->n *= $y;
	}

	public function divide(int $y): int
	{
		return $this->n /= $y;
	}
}