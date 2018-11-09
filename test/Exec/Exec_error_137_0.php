<?php

namespace xltxlm\shell\test\Exec;

use xltxlm\shell\Exec;

/**
 *
 */
class Exec_error_137_0
{

    public function __invoke()
    {
        (new Exec("abcc"))
            ->__invoke();
    }

}

