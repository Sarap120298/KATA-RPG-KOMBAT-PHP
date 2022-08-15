<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Character;
use App\Faction;
use LDAP\Result;

use function PHPUnit\Framework\assertEquals;

class CharacterTest extends TestCase {

	/** @test */
	public function test_character_health_starting_at_1000_points()
	{
		//Given-Dado-Escenario
		$goku = new Character;

		//When-cuándo-acción
		$gokuHealth = $goku->getHealth();

		//Then - Entonces - Después - Debería dar
		$this->assertEquals(1000, $gokuHealth);
	}

	public function test_character_level_starting_at_1()
	{
		//Given-Dado-Escenario
		$goku = new Character;

		//When-cuándo-acción
		$gokuLevel = $goku->getLevel();

		//Then-Entonces-Después-Debería dar
		$this->assertEquals(1, $gokuLevel);
	}

	public function test_character_alive_or_dead_starting_alive()
	{
		//Given-Dado-Escenario
		$goku = new Character;

		//When-Cuándo-Acción
		$gokuAlive = $goku->getAlive() ;

		//Then-Entonces-Después-Debería dar
		$this->assertEquals(true, $gokuAlive);
	}

	public function test_character_takes_damage()
	{
		//Given
		$freezer = new Character;
		$vegeta = new Character;

		//When
		$freezer->attack($vegeta);
		$result = $vegeta->getHealth();

		//Then-Debería dar
		$this->assertEquals(900, $result);
	}
	public function test_when_character_health_equals_0_he_died()
	{
		//Given
		$freezer = new Character;
		$vegeta = new Character;

		//When
		for ( $i = 1; $i <= 10; $i = $i + 1 ){
		$freezer->attack($vegeta);
		}
		$result = $vegeta->getHealth();
		$liveVegeta = $vegeta->getAlive();
		//Then-Debería dar
		$this->assertEquals(0, $result);
		$this->assertEquals(false, $liveVegeta);

	}
	public function test_a_character_can_Heal_a_Character()
	{
		//Given
		$goku = new Character;
		$vegeta = new Character;

		//When
		$goku->heal($vegeta);
		$healVegeta = $vegeta->getHealth();

		//Then
		$this->assertEquals(1000, $healVegeta);
	}

	public function test_target_is_5_or_more_Levels_above_the_attacker()
	{
		//Given
		$freezer = new Character;
		$vegeta = new Character;

		//When
		$getLevel = $freezer->getLevel();
		$freezer->setLevel($getLevel - 5);
		$freezer->damage_based_on_level_difference($vegeta);
		$result = $vegeta->getHealth();

		//Then
		$this->assertEquals(950, $result);
	}

	public function test_target_is_5_or_more_Levels_below_the_attacker()
	{
		//Given
		$freezer = new Character;
		$vegeta = new Character;

		//When
		$getLevel = $freezer->getLevel();
		$freezer->setLevel($getLevel + 5);
		$freezer->damage_based_on_level_difference($vegeta);
		$result = $vegeta->getHealth();

		//Then
		$this->assertEquals(850, $result);
	}

	public function test_range_of_2_meters()
	{
		//given
		$freezer = new Character;
		$vegeta = new Character;

		//When
		if($freezer->distance == 2)
		{
			$freezer->attack($vegeta);
		}
		$result = $vegeta->getHealth();

		//Then
		$this->assertEquals(900, $result);
	}
	 public function test_range_of_20_meters()
	 {
		//Given
		$freezer = new Character;
		$vegeta = new Character;

		//When
		$freezer->distance = 20;
		$freezer->attack($vegeta);
		$result = $vegeta->getHealth();

		//Then
		$this->assertEquals(900, $result);


	 }
	

}