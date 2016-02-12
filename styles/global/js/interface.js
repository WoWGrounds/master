function formatText(el,tag){
var selectedText = document.selection?document.selection.createRange().text:el.value.substring(el.selectionStart,el.selectionEnd);
if(selectedText!=''){
var newText='['+tag+']'+selectedText+'[/'+tag+']';
el.value=el.value.replace(selectedText,newText)
}
}


function insertSmiley(smiley) 
    { 
        var currentText = document.getElementById("form");  
        currentText.value += smiley;
        currentText.focus(); 
    }