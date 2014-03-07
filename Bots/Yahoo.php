<?php
/**
 * This file is part of the beebot package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Bee4 2013
 * @author    Stephane HULARD <s.hulard@chstudio.fr>
 * @package   BeeBot\Tools\Robot\Bots
 */

namespace BeeBot\Tools\Robot\Bots;

use BeeBot\Exception\Native\InvalidArgumentException;

/**
 * Class Yahoo
 * Detect if a visit is a yahoo one
 * @package BeeBot\Tools\Robot\Bots
 */
class Yahoo extends AbstractBot
{
	/**
	 * Yahoo bot constructor
	 *
	 * @param String $useragent The useragent used for detection
	 */
	public function __construct($useragent)
	{
		parent::__construct();

		//Yahoo Slurp (search bot): http://www.botopedia.org/user-agent-list/search-bots/yahoo-slurp.html
		//Yahoo Pipes (feed fetcher): http://www.botopedia.org/user-agent-list/feed-fetchers/item/342.html
		//Yahoo messenger: http://developer.yahoo.com/messenger/guide/ch02.html
		/**
		Mozilla/5.0 (compatible; Yahoo!-AdCrawler; http://help.yahoo.com/yahoo_adcrawler)
		Mozilla/5.0 (compatible; Yahoo! Slurp/3.0; http://help.yahoo.com/help/us/ysearch/slurp)
		Mozilla/5.0 (compatible; Yahoo! Slurp; http://help.yahoo.com/help/us/ysearch/slurp)

		Mozilla/5.0 (compatible; Yahoo Pipes 2.0; +http://developer.yahoo.com/yql/provider) Gecko/20090729 Firefox/3.5.2

		Mozilla/5.0 (YahooYSMcm/3.0.0; http://help.yahoo.com)

		DoCoMo/2.0 SH902i (compatible; Y!J-SRD/1.0; http://help.yahoo.co.jp/help/jp/search/indexing/indexing-27.html)
		DoCoMo/2.0/SO502i (compatible; Y!J-SRD/1.0; http://help.yahoo.co.jp/help/jp/search/indexing/indexing-27.html)
		Mozilla/4.0 (compatible; Yahoo Japan; for robot study; kasugiya)
		Mozilla/4.0 (compatible; Y!J; for robot study; keyoshid)
		Y!J/1.0 (http://help.yahoo.co.jp/help/jp/search/indexing/indexing-15.html)

		Yahoo:LinkExpander:Slingstone
		YahooCacheSystem
		YahooExternalCache

		YahooMessenger/1.0 ( < Application Name>; <Application Version> )
		YahooMobileMessenger/1.0 (xyz-mobile messenger; 1.0.0.0) (1234; Apple; iPhone; iPhone OS/3.0)
		*/
		if (strpos($useragent, 'Yahoo!-AdCrawler') !== false)
			$this->setName('yahoo-ads');
		elseif (strpos($useragent, 'YahooYSMcm') !== false)
			$this->setName('yahoo-search-marketing');
		elseif (strpos($useragent, 'Yahoo! Slurp') !== false)
			$this->setName('yahoo-slurp');
		elseif (strpos($useragent, 'Yahoo Pipes') !== false)
			$this->setName('yahoo-pipes');
		elseif (strpos($useragent, 'Y!J') !== false || $useragent == 'Mozilla/4.0 (compatible; Yahoo Japan; for robot study; kasugiya)')
			$this->setName('yahoo-japan');
		elseif ( $useragent == 'YahooCacheSystem' || $useragent == 'YahooExternalCache' )
			$this->setName('yahoo-cache');
		elseif ( substr($useragent, 0, 14) == 'YahooMessenger' || substr($useragent, 0, 20) == 'YahooMobileMessenger' )
			$this->setName('yahoo-messenger');
		elseif ( $useragent == 'Yahoo:LinkExpander:Slingstone' )
			$this->setName('yahoo-tools');
		else
			throw new InvalidArgumentException('UserAgent given is not a valid Yahoo one: ' . $useragent);
	}
}