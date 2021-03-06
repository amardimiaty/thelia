<?php
/*************************************************************************************/
/*      This file is part of the Thelia package.                                     */
/*                                                                                   */
/*      Copyright (c) OpenStudio                                                     */
/*      email : dev@thelia.net                                                       */
/*      web : http://www.thelia.net                                                  */
/*                                                                                   */
/*      For the full copyright and license information, please view the LICENSE.txt  */
/*      file that was distributed with this source code.                             */
/*************************************************************************************/

namespace Thelia\Core\HttpFoundation;

use Symfony\Component\HttpFoundation\Response as BaseResponse;
use Thelia\Log\Tlog;
use Thelia\Model\ConfigQuery;


/**
 * extends Thelia\Core\HttpFoundation\Response for adding some helpers
 *
 * Class Response
 * @package Thelia\Core\HttpFoundation
 * @author Franck Allimant <franck@cqfdev.fr>
 */
class Response extends BaseResponse
{
    /**
     * Allow Tlog to write log stuff in the fina content.
     *
     * @see \Thelia\Core\HttpFoundation\Response::sendContent()
     */
    public function sendContent()
    {
	//ConfigQuery can be not already generated in cache so we must check it
        if (class_exists('ConfigQuery')) {
            Tlog::getInstance()->write($this->content);
        }

        parent::sendContent();
    }
}
