<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 20/12/2019
 * Time: 06:54 ص
 */

namespace System\Mailer;


class phpmailerException extends \Exception
{
    public function errorMessage()
    {
        $errorMsg = '<strong>' . htmlspecialchars($this->getMessage()) . "</strong><br />\n";
        return $errorMsg;
    }
}