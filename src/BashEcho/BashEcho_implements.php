<?php
namespace xltxlm\shell\BashEcho;

/**
 * :Trait;
 * 辅助输出高亮文字的bash;
*/
Trait BashEcho_implements
{


/**
*  高亮成红色，错误提示;
*  @return ;
*/
abstract public function echoerror(string $cmd = null);
/**
*  高亮成绿色，成功提示;
*  @return ;
*/
abstract public function echook(string $cmd = null);
/**
*  普通文字输出。;
*  @return ;
*/
abstract public function echo(string $cmd = null);
/**
*  运行脚本，如果错误了，那么就没法继续了;
*  @return ;
*/
abstract public function runbash(string $cmd = null,bool $notice = true);
/**
*  构造函数，输出bash头;
*  @return ;
*/
abstract public function bashheader();
/**
*  对比2个字符串。不一样的时候，输出红色提醒;
*  @return ;
*/
abstract public function diffstring(string $var1 = null,string $var2 = null, $onerror_message = null);
}