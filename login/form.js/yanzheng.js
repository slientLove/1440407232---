
var fm = document.getElementsByTagName('form')[0];
fm.onsubmit = function()
{	
	if(!fm.username.value)
	{
		alert('用户名不能为空！');
		return false;
	}
	if(fm.password.value.length<6)
	{
		alert('密码至少六位！');
		return false;
	}
	if(fm.password.value!=fm.notpassword.value)
	{	
		alert('两次密码不一致!');
		return false;
	}
	return true;

};

