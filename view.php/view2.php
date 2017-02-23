<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>柱状图</title>
	<style type="text/css">
		 form{ width: 200px; float: right;position: relative; top: -250px; right: 20px;}
    	 form select{ width: 100px; height: 20px; }
    	 h4{display: block; width: 300px; margin: 20px auto; font-weight: bold;}
    	 span{ display: block;width: 100px;margin: 0 230px; font-weight: none;}
		#g2{
			margin:20px auto;
		}
		#g3{ margin: 20px; }
		h5{ width:210px;display:block;margin:10px auto; }
		.p3{ display: block;width: 400px;}
	</style>
	<script type="text/javascript" src="js/index.js"></script>
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
</head>
<body>
	<h5>各位老师历年所指导学生人数详情</h5>
	<div id="g2"></div>
	<?php
		include 'view2Ok.php';
	?>
	<script>

		 var Stat = G2.Stat;				//一个类，先进行初始化
        var data = <?php echo $strJson;?>;
		var chart = new G2.Chart({
				id:'g2',
				width:800,
				height:300
			});
	 var def = {
            'rs':{
            alias: '人数'
             }, 
             'teacher':{
            alias: '老师'
                  }
        };        
		 chart.source(data,def);
		//}
        chart.intervalStack().position(Stat.summary.mean('teacher*rs')).color('GraduationYear').size(10);
        chart.render();
	</script>
	<hr/>
<!-- *****************************************************************************************-->
	<h4>各个年份年毕业设计成绩情况的统计人数</h4>
   <div id = "g3" ></div>    <!--   onmouseover="create.createDiv(this.id,'this is a new chart')"  -->
    <?php
          if(isset($_GET["aa"])){
          $value = $_GET["aa"];
        }else{
          $value = 2008;
        }
  ?>
        <script type="text/javascript">
          var years = <?php echo $value;?>;
            $.ajax({
                   type: "post",
                   url: "view4OK.php",
                   data: {year:years},
                   dataType: "json",//------  "T"大写
                   success: function(data)
                   {
                        var chart = new G2.Chart({
                            id: 'g3',
                            width:500,
                            height: 300
                        }); 
                        var def = {
                          'count':{
                              alias: '人数'
                          }, 
                          'Score':{
                              alias: '成绩'
                          }
                     };                        
                        chart.source(data,def);
                        chart.interval().position('Score*count').color('Score');
                        chart.render();
                   }
               });  
        </script>  
      <form method="get" action="">
          <select name="aa" >
              <option value="2008">2008</option>
              <option value="2009">2009</option>
              <option value="2010">2010</option>
              <option value="2011">2011</option>
              <option value="2012">2012</option>
              <option value="2013">2013</option>
              <option value="2014">2014</option>
              <option value="2015">2015</option>
              <option value="2016">2016</option>
          </select>
              <input type="submit" name="submit" value="查询">
      </form>
           
    <span><?php echo $value;?>年</span>
    <script type="text/javascript">
         var oSelect=document.getElementsByTagName("select")[0];
         var aOptions=oSelect.getElementsByTagName('option'); 
         for(i=0;i<aOptions.length;i++){
           if(aOptions[i].value=='<?php echo $value;?>'){   //此处的打印值为字符串
            aOptions[i].selected=true;
           }
         }
    </script>
	<hr/>
    <span class="p3">2008年至2016年各专业毕业生总人数占比情况</span>
		<?php
			include 'view6OK.php';
		?>
		<div id="g6"></div>
	<script type="text/javascript">
		var Stat = G2.Stat;
      var chart = new G2.Chart({
        id: 'g6',
        width: 800,
        height: 300
      });
      var data = <?php echo $strJson;?>;
      chart.source(data);
      // 重要：绘制饼图时，必须声明 theta 坐标系
      chart.coord('theta', {
        radius: 0.6 // 设置饼图的大小
      });
      chart.legend('bottom');
      chart.intervalStack()
        .position(Stat.summary.percent('rs')).color('Major')
        .label('Major*..percent',function(name, percent){
        percent = (percent * 100).toFixed(2) + '%';
        return name + ' ' + percent;
      });
      chart.render();
      // 设置默认选中
      var geom = chart.getGeoms()[0]; // 获取所有的图形
      var items = geom.getData(); // 获取图形对应的数据
      geom.setSelected(items[2]); 
	</script>
</body>
</html>