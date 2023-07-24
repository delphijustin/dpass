 function generatePassword(x,y){
        var passchars = prompt("Enter letters,numbers and symbols to use","0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ~!@#$%^*()_-+={[}]\|:;>./?<");
     if(passchars.indexOf(",")>-1||passchars.indexOf("&")>-1||passchars.indexOf('"')>-1){
         alert('Cannot use , & or " in passwords');
               return;
     }
     var s="";
               var nPasswd = Number(prompt("How long should the password be?","8"));
               for(var i=0;i<nPasswd;i++){
             s += passchars.charAt(Math.floor(Math.random()*passchars.length));
         }
               if(x==-2){
             document.getElementById("new"+y).value=s;
             return;
         }
        document.getElementById("ta"+x+"_"+y).value=s;
 }
    function togglePW(x,y){
        var pwinp;
        switch(x){
            case -1:  pwinp=document.getElementById("mp");break;
            case -2: pwinp=document.getElementById("new"+y);break;
            default:pwinp=document.getElementById("ta"+x+"_"+y);
        }
        if(pwinp.type=="password"){
            pwinp.type="text";
        } else {
            pwinp.type="password";
        }
    }
    function copyToClipboard(x,y){
 var copyText;
 switch(x){
     case -2: copyText = document.getElementById("new"+y);break;
     default: copyText = document.getElementById("ta"+x+"_"+y);
 }
   copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices
   // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);
 }
