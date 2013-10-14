var check = {};

check.pos_int = function(testValue, showAlets){
    if ( testValue == ""){
        showAlets ? alert("Le champ "+inputFieldName+" est vide.") : undefined;
        return false;
    }
    else if (isNaN(testValue)){
        showAlets ? alert("Le champ "+inputFieldName+" doit contenir un nombre.") : undefined;
        return false;
    }
    else if (testValue < 0){
        showAlets ? alert("Le champ "+inputFieldName+" doit contenir un nombre positif.") : undefined;
        return false;
    }
    else
        return true;
}

check.string = function(testValue, showAlets){
    if ( testValue == ""){
        showAlets ? alert("Le champ "+inputFieldName+" est vide.") : undefined;
        return false;
    }
    else
        return true;
}

function bindActionBySelector(action, selector){
    elements = document.querySelectorAll(selector);
    for (var i = elements.length - 1; i >= 0; i--) {
        elements[i].onclick = action;
    };
}

function showEditForm(){
    restoreLine();

    var lineId = this.getAttribute("id");
    var line = document.querySelector("tr#"+lineId);
    var cells = document.querySelectorAll("tr#"+lineId+" td");
    var form = document.querySelector("tr#edit");
    
    var formFields = document.querySelectorAll("tr#edit input");

    var i;

    for (i = 0 ; i < formFields.length -1; i++) {
        formFields[i].value = cells[i].innerHTML ;
    };

    var selectFields = document.querySelectorAll("tr#edit select");

    var optionFields = document.querySelectorAll("tr#edit select option[selected='selected']");
    for (var k = optionFields.length - 1; k >= 0; k--) {
        optionFields[k].removeAttribute("selected");
    };
    
    for (var j = 0 ; j < selectFields.length ; j++) {
        var selectDefaultValue = cells[i].getAttribute("value");
        
        document.querySelector("tr#edit select option[value='"+selectDefaultValue+"']").setAttribute("selected","selected" );
        i++;
    };

    line.parentNode.insertBefore(form,line);

    form.style.display = "table-row";
    line.style.display = "none";
    document.lastLine = line;
};

function restoreLine(){
    if(typeof(document.lastLine) === "undefined"){
        return undefined;
    };
    document.lastLine.style.display = "table-row";
}