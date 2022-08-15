<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Character;
use App\Faction;

class CharacterTest extends TestCase {

	/** @test */
	public function test_characters_start_1000_points_health()
	{
		// Given
		$goku = new Character;
		// When
		$result = $goku->getHealth();
		// Then
		$this->assertEquals(1000,$result);

	}
	

}


