<?php

namespace Test\Bee4\UserAgent\Classifier\Bots;

use Bee4\UserAgent\Classifier\Bots\DiscoBot;

/**
 * Class DiscobotTest
 * @package Test\Bee4\UserAgent\Classifier\Bots
 */
class DiscoBotTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testInvalidUA()
	{
		new DiscoBot('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.71 Safari/537.36');
	}

	public function testDetection()
	{
		$bot = new DiscoBot('Mozilla/5.0 (compatible; discobot-news; +http://discoveryengine.com/discobot.html)');
		$this->assertEquals('discobot-news', $bot->getName());
		$this->assertEquals(['search','news'], $bot->getTags());

		$bot = new DiscoBot('Mozilla/5.0 (compatible; discobot/2.0; +http://discoveryengine.com/discobot.html)');
		$this->assertEquals('discobot-bot', $bot->getName());
		$this->assertEquals(['search'], $bot->getTags());
	}
}
