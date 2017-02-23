<html>
<head>
     <meta charset="utf-8">
     <style type="text/css">
    form{ width: 200px; float: right;position: relative; top: -250px; right: 20px;}
    form select{ width: 100px; height: 20px; }
    h4{display: block; width: 300px; margin: 10px auto; font-weight: bold;}
    span{ display: block;width: 100px;margin: 0 230px; font-weight: none;}
  </style>
     <script type="text/javascript" src="js/index.js"></script>
     <script type="text/javascript" src="js/create.js"></script>
     <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
   </head>
   <body>
    <a href="view6.php">下一页</a>
    <a href="view2.php">上一页</a>
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
</body>
</html>