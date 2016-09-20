<html>
<head>
<title>SQLfront</title>
</head>
<body>
<div id="main_form" style="position: absolute; left: 100px; right: 100px; top: 10px; bottom: 10px; background: red; ">
  <div style="position: absolute; left: 100px; right: 100px; top: 10px; bottom: 10px;">
    <br>
    <div id="terminal" style="position: absolute; left: 0px; right: 0px; top: 0px; bottom: 60px; background: #dddddd; overflow: auto">
      Welcome to sqlfront<br><br>
    </div>
    <br>
    <input class="cmd_input" id="input" type="text"  onkeydown="cmd_keyhandler(event)" style="position: absolute; bottom: 10px; left: 0px; right: 0px; width: 100%">
  </div>
  <br>
</div>
</body>
</html>

<script language="javascript" src="jquery.min.js"></script>
<script language="javascript" src="gethttp.js"></script>
<script language="javascript">
var main_form=document.getElementById("main_form");
var terminal=document.getElementById("terminal");
var input=document.getElementById("input");
var username_input=document.getElementById("username_input");
var password_input=document.getElementById("password_input");
var cmd_history = new Array();
var cmd_current = 0;

jQuery(document).ready(function() {
  jQuery(".cmd_input").focus();
});


function login_keyhandler(e) 
{
  if(e.which==13) {
    login();
  }
}

function cmd_keyhandler(e)
{
  if(e.which==13)
  {
    query=input.value;
    input.value="";
    terminal.innerHTML+="<br><b>"+query+"</b>";
    terminal.scrollTop=terminal.scrollHeight; //Improves the feeling of speed
    do_query(query);
    terminal.scrollTop=terminal.scrollHeight;
    cmd_history.push(query);
    cmd_current=(cmd_history.length-1)+1; //Last element + 1
    for(var i=0;i<cmd_history.length;i++) {
      //alert(cmd_history[i]);
    }
  }
  if(e.which==38) { //Arrow up
    if(cmd_current > 0) {
      cmd_current--;
    }
    if(cmd_current <= cmd_history.length-1) {
      input.value=cmd_history[cmd_current];
    } else {
      input.value="";
    }
  }
  if(e.which==40) { //Arrow down
    if(cmd_current <= cmd_history.length-1) {
      cmd_current++;
    }
    if(cmd_current <= cmd_history.length-1) {
      input.value=cmd_history[cmd_current];
    } else {
      input.value="";
    }
  }
  return(true);
}


function do_query(query) {
  terminal.innerHTML+=syncHTTP("query.php?query="+query);
}



</script>