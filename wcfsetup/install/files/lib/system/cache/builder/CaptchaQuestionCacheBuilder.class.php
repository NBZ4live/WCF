<?php
namespace wcf\system\cache\builder;
use wcf\data\captcha\question\CaptchaQuestionList;

/**
 * Caches the enabled captcha questions.
 * 
 * @author	Matthias Schmidt
 * @copyright	2001-2015 WoltLab GmbH
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 * @package	com.woltlab.wcf
 * @subpackage	system.cache.builder
 * @category	Community Framework
 */
class CaptchaQuestionCacheBuilder extends AbstractCacheBuilder {
	/**
	 * @see	\wcf\system\cache\builder\AbstractCacheBuilder::rebuild()
	 */
	public function rebuild(array $parameters) {
		$questionList = new CaptchaQuestionList();
		$questionList->getConditionBuilder()->add('isDisabled = ?', array(0));
		$questionList->readObjects();
		
		return $questionList->getObjects();
	}
}
