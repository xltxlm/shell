<?php
namespace xltxlm\shell\Exec;

/**
 * 执行系统命令,错误会抛出异常;
*/
abstract class Exec_implements
{



    /* @var string  要执行的命令 */
        protected $Cmd = '';
    


    /**
     * @return string;
     */
    public function getCmd():string    {
        return $this->Cmd;
    }






    /**
     * @param string $Cmd;
     * @return $this
     */
    public function setCmd(string $Cmd)
    {
        $this->Cmd = $Cmd;
        return $this;
    }

    /* @var bool  是否在php错误文件输出执行的命令 */
        protected $Debug = true;
    


    /**
     * @return bool;
     */
    public function getDebug():bool    {
        return $this->Debug;
    }


    public function isDebug():bool    {
            return $this->getDebug();
    }
    



    /**
     * @param bool $Debug;
     * @return $this
     */
    public function setDebug(bool $Debug)
    {
        $this->Debug = $Debug;
        return $this;
    }

    /* @var bool  错误的时候抛出异常信息 */
        protected $Exception_on_Fail = true;
    


    /**
     * @return bool;
     */
    public function getException_on_Fail():bool    {
        return $this->Exception_on_Fail;
    }


    public function isException_on_Fail():bool    {
            return $this->getException_on_Fail();
    }
    



    /**
     * @param bool $Exception_on_Fail;
     * @return $this
     */
    public function setException_on_Fail(bool $Exception_on_Fail)
    {
        $this->Exception_on_Fail = $Exception_on_Fail;
        return $this;
    }

    /**
     *   返回命令的内容;
     *   @return :string;
    */
    abstract public function __invoke():string;

}