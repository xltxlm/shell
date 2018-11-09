<?php

namespace xltxlm\shell\test\Exec;

use xltxlm\shell\Exec;

/**
 *
 */
class exec_ok_138_0
{

    public function __invoke()
    {
        $d = (new Exec('ls -al'))
            ->setDebug(false)
            ->__invoke();
        p($d);
    }

}

