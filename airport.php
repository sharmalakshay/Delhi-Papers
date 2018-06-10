<script type="text/javascript">
// <![CDATA[
var text=new Array(); //more text separated by commas included in dquotes
var size=60; // how tall in pixels
var speed=125; // lower is faster
var link="";

function addLoadEvent(funky) {
  var oldonload=window.onload;
  if (typeof(oldonload)!='function') window.onload=funky;
  else window.onload=function() {
    if (oldonload) oldonload();
    funky();
  }
}

addLoadEvent(boarding);

var divvy, ditsy, crount;
var maxilength=0;
var taunty=0;
var stext=new Array();
function boarding() {
  var i, j, w;
  divvy=document.getElementById("board");
  divvy.style.fontSize=(size-4)+"px";
  divvy.style.position="relative";
  if (divvy.firstChild.nodeValue) {
    text.unshift(divvy.firstChild.nodeValue.toString());
	divvy.firstChild.nodeValue=String.fromCharCode(160);
  }
  else divvy.appendChild(document.createTextNode(String.fromCharCode(160)));
  stext['text']=new Array();
  for (i=0; i<text.length; i++) if (text[i].length>maxilength) maxilength=text[i].length;
  w=Math.floor((size-4)/1.414);
  for (i=0; i<4; i++) {
    stext[i]=new Array();
    for (j=0; j<maxilength; j++) {
      stext[i][j]=document.createElement('div');
      stext[i][j].appendChild(document.createTextNode(String.fromCharCode(160)));
      stext[i][j].style.position="absolute";
      stext[i][j].style.top="0px";
      stext[i][j].style.backgroundColor="transparent";
      stext[i][j].style.textAlign="center";
      stext[i][j].style.left=Math.floor(w*j)+"px";
      stext[i][j].style.width=w+"px";
      if (i<2) stext[i][j].style.clip="rect(0px, "+w+"px, "+Math.floor((size/2)-3)+"px, 0px)";
      else stext[i][j].style.clip="rect("+Math.floor((size/2)-2)+"px, "+w+"px, "+size+"px, 0px)";
      if (link) stext[i][j].onclick=function(){window.location.href=link};
      divvy.appendChild(stext[i][j]);
    }
  }
  take_off();
}

function take_off() {
  var j;
  crount=0;
  for (j=0; j<text[taunty].length; j++) stext['text'][j]=text[taunty].charCodeAt(j)-32;
  for (; j<maxilength; j++) stext['text'][j]=0;
  taunty=++taunty%text.length;
  ditzy=setInterval(flicker, speed);
}

function flicker() {
  var j, geendetet;
  geendetet=maxilength;
  for (j=0; j<maxilength; j++) {
    if (stext['text'][j] && stext['text'][j]>=crount-j && j-crount<32) swap_a_doodle (crount%2, j, String.fromCharCode(32+(crount-j)%95));
    else if (stext['text'][j] && Math.random()<0.002 && stext['text'][j]<161 && crount<3*text.length) stext['text'][j]=stext['text'][j]+95;
    else geendetet--;
  }
  if (!geendetet) {
    clearInterval(ditzy);
    setTimeout('ditzy=setInterval("landing()", speed*.7)', speed*50);
  }
  crount++;
}

function landing() {
  var j, geendetet;
  geendetet=maxilength;
  for (j=0; j<maxilength; j++) {
    if (stext['text'][j]%95) swap_a_doodle (crount%2, j, String.fromCharCode(++stext['text'][j]%95+32));
    else geendetet--;
  }
  if (!geendetet) {
    clearInterval(ditzy);
    take_off();
  }
  crount++;
}

function swap_a_doodle(i, j, l) {
  stext[i][j].firstChild.nodeValue=l;
  stext[i][j].style.visibility="visible";
  stext[i+2][j].firstChild.nodeValue=l;
  setTimeout ('stext['+(i+2)+']['+j+'].style.visibility="visible"', speed*.2);
  setTimeout ('stext['+(1-i)+']['+j+'].style.visibility="hidden"', speed*.3)
  setTimeout ('stext['+(3-i)+']['+j+'].style.visibility="hidden"', speed*.5);
}
// ]]>
</script>