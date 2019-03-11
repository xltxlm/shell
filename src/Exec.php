<?php

namespace xltxlm\shell;

use xltxlm\logger\thelostlog_exec\thelostlog_exec;
use xltxlm\shell\Exception\Exception_Exec;
use xltxlm\shell\Exec\Exec_implements;


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

    /**
     * @param \Redis $RedisObject ;
     * @return $this
     */
    public static function setRedisObject(\Redis $RedisObject)
    {
        Exec::$RedisObject = $RedisObject;
        if (is_object(Exec::$RedisObject) && $_SERVER['logid']) {
            Exec::$RedisObject->zAdd($_SERVER['logid'], Exec::getcounti(),'Begin');
            //保存10分钟
            Exec::$RedisObject->expire($_SERVER['logid'], 60 * 10);
        }
    }

    /**
     * @return int;
     */
    public static function getcounti(): int
    {
        Exec::$counti++;
        return Exec::$counti;
    }


    public function __invoke(): string
    {
        //如果声明了Redis存储,那么每一个命令都会给存储,保存10分钟
        if (is_object(Exec::$RedisObject) && $_SERVER['logid']) {
            Exec::$RedisObject->zAdd($_SERVER['logid'], Exec::getcounti(),$this->getCmd());
        }
        $thelostlog_exec = (new thelostlog_exec())
            ->setcommand($this->getCmd());
        $start = microtime(true);
        exec($this->getCmd(), $out, $return);
        $time = sprintf('%.4f', microtime(true) - $start);
        $ressult = join("\n", $out);
        if ($this->isDebug()) {
            p(["cmd" => $this->getCmd(), "time" => $time, 'ressult' => $ressult, 'return' => $return]);
        }
        if (is_object(Exec::$RedisObject) && $_SERVER['logid']) {
            Exec::$RedisObject->zAdd($_SERVER['logid'], Exec::getcounti(),"return code:$return");
        }
        $thelostlog_exec->setresult($ressult);
        if ($this->isException_on_Fail() && $return) {
            $thelostlog_exec->seterror($return);
            throw new Exception_Exec("执行命令[{$this->getCmd()}]错误:" . join($out) . ",错误值:$return");
        }
        return $ressult;
    }


}