
function getByClass(classname){
	var elements=document.getElementsByTagName("*");
	var result=[];
	for(var i=0;i<elements.length;i++){
		if(elements[i].className==classname){
			result.push(elements[i]);
		}
	}
	return result;
}
var create=new Object();
create.createDiv=function(id,txt){
	var oEle=document.getElementById(id);
	var oParent=oEle.parentNode;
	var oDiv=document.createElement('div');
	var top=oEle.offsetTop+oEle.offsetHeight/2;
	var left=oEle.offsetLeft;
	//设置新元素的css属性
	oDiv.setAttribute("style","border:1px solid blue;border-radius:5px;position:absolute;width:100px;height:50px;background:transparent;");
	oDiv.style.left=left+"px";
	oDiv.style.top=top+"px";
	oDiv.className="create";
	oDiv.innerHTML=txt;
	//setAttribute会对前面的setAttribute产生影响
	oParent.appendChild(oDiv);

	//对匿名函数进行编写
	oEle.onmouseout=function(){
		if(this.onmouseover){
			var oNew=getByClass('create')[0];
			var oParentThis=oNew.parentNode;
			oParentThis.removeChild(oNew);
		}
	}
}
