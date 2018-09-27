<script type="text/javascript">
  function checkAdd()
  {
	  if(document.frm.title.value == "")
	  {
		  alert("请输入标题！");
		  document.frm.title.focus();
		  return false;
	  }
	  else if(document.frm.clickTimes.value == "")
	  {
		  alert("请输入点击次数！");
		  document.frm.clickTimes.focus();
		  return false;
	  }
  }
</script>
<form name="frm" method="post" action="index.php?r=add/add" onsubmit="return checkAdd()">
<table border="1" align="center">
  <tr>
    <td>标题：</td>
    <td><input type="text" name="title" size="20" /></td>
  </tr>
  <tr>
    <td>点击次数：</td>
    <td><input type="text" name="clickTimes" size="20" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <input type="submit" value="添加" />
      &nbsp;&nbsp;&nbsp;
      <input type="reset" value="重置" />
    </td>
  </tr>
</table>
</form>