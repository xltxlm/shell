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
abstract public function echoerror();
/**
*  高亮成绿色，成功提示;
*  @return ;
*/
abstract public function echook();
/**
*  普通文字输出。;
*  @return ;
*/
abstract public function echo();
/**
*  运行脚本，如果错误了，那么就没法继续了;
*  @return ;
*/
abstract public function runbash();
/**
*  构造函数，输出bash头;
*  @return ;
*/
abstract public function __construct();
}