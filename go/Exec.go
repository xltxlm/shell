package 

type Exec struct {
    /* 要执行的命令 */
    Cmd string

    /* 是否在php错误文件输出执行的命令 */
    Debug bool

    /* 错误的时候抛出异常信息 */
    Exception_on_Fail bool

    /* 存储全部执行过程命令的Redis服务器 */
    RedisObject 

    /* 记录的顺序 */
    counti int

}

func NewExec(Cmd string,Debug bool,Exception_on_Fail bool,RedisObject ) *Exec{
    var this = new(Exec)
    this.SetCmd(Cmd);
    this.SetDebug(Debug);
    this.SetException_on_Fail(Exception_on_Fail);
    this.SetRedisObject(RedisObject);
    return this
}

func (this *Exec)GetCmd() string{
    return this.Cmd;
}

func (this *Exec)SetCmd(Cmd string) *Exec{
    this.Cmd = Cmd;
    return this
}
func (this *Exec)GetDebug() bool{
    return this.Debug;
}

func (this *Exec)SetDebug(Debug bool) *Exec{
    this.Debug = Debug;
    return this
}
func (this *Exec)GetException_on_Fail() bool{
    return this.Exception_on_Fail;
}

func (this *Exec)SetException_on_Fail(Exception_on_Fail bool) *Exec{
    this.Exception_on_Fail = Exception_on_Fail;
    return this
}
func (this *Exec)GetRedisObject() {
    return this.RedisObject;
}

func (this *Exec)SetRedisObject(RedisObject ) *Exec{
    this.RedisObject = RedisObject;
    return this
}

/**
    返回命令的内容*/
func (this *Exec)__invoke()string{

}

