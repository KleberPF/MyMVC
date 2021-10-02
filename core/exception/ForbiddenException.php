<?php

namespace app\core\exception;

class ForbiddenException extends \Exception
{
    protected $message = "Access forbidden";
    protected $code = "403";
}
