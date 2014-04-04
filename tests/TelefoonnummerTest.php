<?php
require dirname(__FILE__) . '/../vendor/autoload.php';

class TelefoonnummerTest extends PHPUnit_Framework_TestCase
{
	public function testRandomNetnummerShouldFormatCorrect()
	{
		$this->assertEquals("0200000000", Telefoonnummer::format("020-00 00 00 0"));
		$this->assertEquals("0200000000", Telefoonnummer::format("020-00 00000"));
		$this->assertEquals("0200000000", Telefoonnummer::format("020-0000000"));
		$this->assertEquals("0200000000", Telefoonnummer::format("0200000000"));
	}

	public function testRandomNetnummerShouldBeautifyCorrect()
	{
		$this->assertEquals("020 0000000", Telefoonnummer::beautify("020-00 00 00 0"));
		$this->assertEquals("020 0000000", Telefoonnummer::beautify("020-00 00000"));
		$this->assertEquals("020 0000000", Telefoonnummer::beautify("020-0000000"));
		$this->assertEquals("020 0000000", Telefoonnummer::beautify("0200000000"));
	}

	public function testRandomNetnummerShouldBeautifyCorrectUsingAnotherSeparator()
	{
		$this->assertEquals("020-0000000", Telefoonnummer::beautify("020-00 00 00 0", "-"));
		$this->assertEquals("020-0000000", Telefoonnummer::beautify("020-00 00000", "-"));
		$this->assertEquals("020-0000000", Telefoonnummer::beautify("020-0000000", "-"));
		$this->assertEquals("020-0000000", Telefoonnummer::beautify("0200000000", "-"));
	}

	public function testRandomNetnummerShouldBeautifyCorrectUsingAnotherNetnummer()
	{
		$this->assertEquals("0599-000000", Telefoonnummer::beautify("0599-0 00 00 0", "-"));
		$this->assertEquals("0599-000000", Telefoonnummer::beautify("0599-0 00000", "-"));
		$this->assertEquals("0599-000000", Telefoonnummer::beautify("0599-000000", "-"));
		$this->assertEquals("0599-000000", Telefoonnummer::beautify("0599000000", "-"));
	}

	public function testRandomTelephoneNumbers()
	{
		$this->assertEquals("088 0030000", Telefoonnummer::beautify("088 003 0000"));
		$this->assertEquals("088-0030000", Telefoonnummer::beautify("088 003 0000", "-"));

		$this->assertEquals("061-2345678", Telefoonnummer::beautify("061 234 5678", "-"));

		$this->assertEquals("030 - 1234567", Telefoonnummer::beautify("030-1234567", " - "));
	}
}