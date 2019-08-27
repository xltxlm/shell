<?php
namespace xltxlm\shell\Plus\__To;

/**
 * :Trait;
 * 公用的基础引入;
*/
Trait __To_implements
{


/* @var string  要执行的命令 */
    protected $Cmd = '';





    /**
    * @return string;
    */
            public function getCmd():string        {
                return $this->Cmd;
        }

    
    




/**
* @param string $Cmd;
* @return $this
*/
    public function setCmd(string $Cmd  = "")
    {
    $this->Cmd = $Cmd;
    return $this;
    }



/**
*  返回命令的内容;
*  @return ;
*/
abstract public function __invoke();
}