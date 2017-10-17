$(document).on("click",".cmd",function(){

	var wshShell = new ActiveXObject("WScript.Shell");
	wshShell.Run("C:/Users/alvin/Desktop/ab.bat");

});