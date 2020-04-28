<?php

namespace xltxlm\shell;


/**
 * 辅助输出高亮文字的bash;
 */
Trait BashEcho
{
    use BashEcho\BashEcho_implements;

    /**
     * BashEcho constructor.
     */
    public function __construct()
    {
        //公共shell函数;
        echo 'function error(){ echo  -e "\033[41;36m[`date \'+%Y-%m-%d %H:%M:%S\'`] $*\033[0m";}' . PHP_EOL;
        echo 'function ok(){ echo  -e "\033[42;30m[`date \'+%Y-%m-%d %H:%M:%S\'`] $*\033[0m";}' . PHP_EOL;
    }


    /**
     *  error;
     *
     * @return :string;
     */
    public function echoerror(string $cmd = null)
    {
        echo "error $cmd" . PHP_EOL;
    }


    /**
     *  ok;
     *
     * @return ;
     */
    public function echook(string $cmd = null)
    {
        echo "ok $cmd" . PHP_EOL;
    }

    /**
     *  输出命令，给到bash执行;
     *
     * @return ;
     */
    public function runbash(string $cmd = null)
    {
        echo "ok 准备执行命令 $cmd" . PHP_EOL;
        echo $cmd . PHP_EOL;
        echo "if [ \$? -ne 0 ]; then error 错误！; exit; fi; " . PHP_EOL;
        echo "ok 【完成】执行命令 $cmd" . PHP_EOL;
    }


}