<?php
/**
 * Created by PhpStorm.
 * User: Lukas
 * Date: 10.09.2018
 * Time: 00:01
 */

namespace App;

use Symfony\Component\HttpFoundation\Response;

class JSONResponse extends Response
{
    public function __construct(iterable $content = [], int $status = 200, array $headers = array())
    {
        $content = json_encode($content);
        parent::__construct($content, $status, $headers);
    }
}