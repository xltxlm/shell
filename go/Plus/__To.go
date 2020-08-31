package Plus

type __To struct {
    /* 要执行的命令 */
    Cmd string

}

func New__To(Cmd string) *__To{
    var this = new(__To)
    this.SetCmd(Cmd);
    return this
}

func (this *__To)GetCmd() string{
    return this.Cmd;
}

func (this *__To)SetCmd(Cmd string) *__To{
    this.Cmd = Cmd;
    return this
}

/**
    返回命令的内容*/
func (this *__To)__invoke(){

}

