<?php

namespace xltxlm\shell\Plus;


/**
 * 公用的基础引入;
 */
Trait __To
{
    use __To\__To_implements;


    /**
     * Exec constructor.
     */
    public function __construct(string $cmd = '')
    {
        if ($cmd) {
            $this->setCmd($cmd);
        }
    }

}