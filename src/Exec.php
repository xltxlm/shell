<?php

namespace xltxlm\shell;

use xltxlm\shell\Exception\Exception_Exec;


/**
 * 执行系统命令,错误会抛出异常;
 */
class Exec extends Exec\Exec_implements
{

    /**
     * Exec constructor.
     */
    public function __construct(string $cmd = '')
    {
        if ($cmd) {
            $this->setCmd($cmd);
        }
    }

    public function __invoke(): string
    {
        $start = microtime(true);
        exec($this->getCmd(), $out, $return);
        $time = sprintf('%.4f', microtime(true) - $start);
        if ($this->isDebug()) {
            p(["cmd" => $this->getCmd(), "time" => $time, 'return' => $return]);
        }
        if ($this->isException_on_Fail() && $return) {
            throw new Exception_Exec("执行命令[{$this->getCmd()}]错误:" . join($out) . ",错误值:$return");
        }
        return join("\n", $out);
    }


}