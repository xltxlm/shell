<?php

namespace xltxlm\shell;


/**
 * 实时运行脚本,实时输出结果;
 */
class Exec_RealTime_Log extends Exec_RealTime_Log\Exec_RealTime_Log_implements
{
    public function __invoke()
    {
        $proc = popen($this->getCmd(), 'r');
        echo '<pre>';
        while (!feof($proc)) {
            echo fread($proc, 4096);
            flush();
        }
    }


}