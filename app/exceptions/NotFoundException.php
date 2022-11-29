<?php


namespace jsnuty\app\exceptions;


class NotFoundException extends \Exception
{
    protected $message = 'Page not found';
    protected $code = 404;
}