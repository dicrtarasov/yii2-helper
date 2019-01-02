<?php 
namespace dicr\tests;

use PHPUnit\Framework\TestCase;
use dicr\helper\ArrayHelper;

/**
 * Test
 * 
 * @author Igor (Dicr) Tarasov <develop@dicr.org>
 * @version 2019
 */
class ArrayHelperTest extends TestCase {

	/**
	 * Тест remove
	 */
	public function testRemove() {
		
		$arr = [
			'a' => 1,
			'b' => [
				'c' => 2,
				'd' => 3,
				'e' => 4
			]
		];
		
		$res = ArrayHelper::remove($arr, ['b', 'd']);
		self::assertSame(3, $res);
		self::assertSame([
			'a' => 1,
			'b' => [
				'c' => 2,
				'e' => 4
			]
		], $arr);
		
		$res = ArrayHelper::remove($arr, 'b.e');
		self::assertSame(4, $res);
		self::assertSame([
			'a' => 1,
			'b' => [
				'c' => 2
			]
		], $arr);
		
		$res = ArrayHelper::remove($arr, 'b');
		self::assertSame(['c' => 2], $res);
		self::assertSame(['a' => 1], $arr);
		
		$res = ArrayHelper::remove($arr, 'b', 123);
		self::assertSame(123, $res);
		self::assertSame(['a' => 1], $arr);
	}
}
