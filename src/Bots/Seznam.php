<?php
/**
 * This file is part of the beebot package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Bee4 2013
 * @author    Stephane HULARD <s.hulard@chstudio.fr>
 * @package   Bee4\UserAgent\Classifier\Bots
 */

namespace Bee4\UserAgent\Classifier\Bots;

use InvalidArgumentException;

/**
 * Class Seznam
 * Detect if a visit is a Seznam one
 * @package Bee4\UserAgent\Classifier\Bots
 */
class Seznam extends AbstractBot
{
    /**
     * Seznam bot constructor
     * @param string $useragent The useragent used for detection
     * @throws InvalidArgumentException
     */
    public function __construct($useragent)
    {
        //Seznam bot (search bot): http://www.botopedia.org/user-agent-list/search-bots/seznam-bot.html
        /**
         * SeznamBot/3.0 (+http://fulltext.sblog.cz/)
         */
        if (strpos($useragent, 'SeznamBot') !== false) {
            $this->setName('seznam-bot');
            $this->addTags(['search']);
        } else {
            throw new InvalidArgumentException('UserAgent given is not a valid Seznam one: ' . $useragent);
        }
    }
}
