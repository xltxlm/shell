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
    public function bashheader()
    {
        //公共shell函数;
        echo 'function error(){ echo  -e "\033[01;35m[`date \'+%Y-%m-%d %H:%M:%S\'`] $*\033[0m";}' . PHP_EOL;
        echo 'function ok(){ echo  -e "\033[01;32m[`date \'+%Y-%m-%d %H:%M:%S\'`] $*\033[0m";}' . PHP_EOL;
    }

    public function echo(string $cmd = null)
    {
        echo "echo $cmd" . PHP_EOL;
    }

    //输出比较结果
    public function diffstring(string $var1 = null, string $var2 = null, $onerror_message = null)
    {
        echo "if [ \"$var1\" = \"$var2\" ]; then ok \"'$var1' == '$var2'\"; else error \"不一致：'$var1' != '$var2'\"; echo $onerror_message; fi" . PHP_EOL;
    }

    //输出比较结果-安静版本
    public function diffstring_quiet(string $var1 = null, string $var2 = null, $onerror_message = null)
    {
        echo "if [ \"$var1\" != \"$var2\" ]; then error \"不一致：'$var1' != '$var2'\"; echo $onerror_message; fi" . PHP_EOL;
    }


    /**
     *  error;
     *
     * @return :string;
     */
    public function echoerror(string $cmd = null)
    {
        echo "error '$cmd'" . PHP_EOL;
    }


    /**
     *  ok;
     *
     * @return ;
     */
    public function echook(string $cmd = null)
    {
        echo "ok '$cmd'" . PHP_EOL;
    }

    /**
     *  输出命令，给到bash执行;
     *
     * @return ;
     */
    public function runbash(string $cmd = null, bool $notice = true)
    {
        if ($notice) {
            echo "ok 准备执行命令 '$cmd'" . PHP_EOL;
        }
        echo $cmd . PHP_EOL;
        //echo "echo -e '\\n';";
        echo "if [ \$? -ne 0 ]; then error '错误！'  ; exit; fi; " . PHP_EOL;
        if ($notice) {
            echo "ok 【完成】执行命令 '$cmd'" . PHP_EOL;
        }
    }


}