<script type="text/javascript">
  function delBbs(bbsId)
  {
	  if(confirm("是否删除该记录？"))
	  {
		  window.location = "index.php?r=sql/delete/bbsId/"+bbsId;
	  }
  }
</script>
<table border="1" align="center" width="600">
  <tr>
    <td>编号</td>
    <td>标题</td>
    <td>点击次数</td>
    <td>时间</td>
    <td>操作</td>
  </tr>
<?php 
	foreach ($bbsInfo as $v)
	{
		echo "<tr>";
		echo "  <td>{$v["bbsId"]}</td>";
		echo "  <td>{$v["title"]}</td>";
		echo "  <td>{$v["clickTimes"]}</td>";
		echo "  <td>{$v["bbsTime"]}</td>";
		echo "  <td>";
		echo "    <a href='javascript:delBbs({$v["bbsId"]})'>删除</a>";
		echo "  </td>";
		echo "</tr>";
	}
?>
</table>









