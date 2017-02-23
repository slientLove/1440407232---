var fm = document.getElementsByTagName('form')[0];
fm.onsubmit = function()
{	
	if(!fm.stuID.value&&!fm.teacher.value)
	{
		alert('学号或指导教师不能为空!');
		return false;
	}
	else if(!fm.stuName.value){
		alert('姓名不能为空！');
		return false;
	}
	return true;
};
