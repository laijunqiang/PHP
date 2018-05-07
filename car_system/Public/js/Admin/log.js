function checkAll()
{
    //取全选按钮的选中状态
    var zt = document.getElementById("qx").checked;

    //让下面所有的checkbox选中状态改变
    var ck = document.getElementsByClassName("ck");

    for(var i=0;i<ck.length;i++)
    {
        if(zt)
        {
            ck[i].setAttribute("checked","checked");
        }
        else
        {
            ck[i].removeAttribute("checked");
        }
    }
}

function deleteAll()
{
    //找所有选中项
    var ck = document.getElementsByClassName("ck");

    var str = "";

    for(var i=0;i<ck.length;i++)
    {
        if(ck[i].checked)
        {
            str += ck[i].value+",";
        }
    }

    return dialog.confirmDeleteLog("确定要删除以下数据么："+str+"");
}