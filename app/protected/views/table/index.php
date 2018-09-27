<table border="1" align="center" width="600">
  <tr>
    <td>编号</td>
    <td>分类名称</td>
    <td>标题</td>
    <td>时间</td>
  </tr>
<?php 
	foreach ($newsInfo as $v)
	{
		echo "<tr>";
		echo "  <td>{$v["articleId"]}</td>";
		echo "  <td>{$v["typeName"]}</td>";
		echo "  <td>{$v["title"]}</td>";
		echo "  <td>{$v["dateandtime"]}</td>";
		echo "</tr>";
	}
?>
</table>









