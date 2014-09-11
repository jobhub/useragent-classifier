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
 * Class Facebook
 * Detect if a visit is a facebook one
 * @package BeeBot\Tools\Robot\Bots
 */
class Facebook extends AbstractBot
{
	/**
	 * Facebook bot constructor
	 *
	 * @param String $useragent The useragent used for detection
	 */
	public function __construct($useragent)
	{
		parent::__construct();

		//Facebook External Hit (Social media agent): http://www.botopedia.org/user-agent-list/social-media-agents/facebook-external-hit
		/**
		facebookexternalhit/1.0 (+http://www.facebook.com/externalhit_uatext.php)
		facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)
		 */
		if (strpos($useragent, 'facebookexternalhit') !== false)
			$this->setName('facebook-externalhit');
		else
			throw new InvalidArgumentException('UserAgent given is not a valid Facebook one: ' . $useragent);
	}
}