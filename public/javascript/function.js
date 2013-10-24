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

function getUrlVars(){
    var couples = document.URL.split(/[?&\/]/);
    var vars = {};
    for (var i = couples.length - 1; i >= 0; i--) {
        if(couples[i].contains("=")){
            var namedata = couples[i].split("=");
            vars[namedata[0]] = namedata[1];
        }
    };
    return vars;
}

function underlineCurrent(){
    var p = getUrlVars().p;
    (p.contains("lst")) ? p = "manifestations" : undefined;
    (p.contains("profil")) ? p = "etudiants" : undefined;
    
    if(typeof(p) !== "undefined"){
        document.querySelector("nav li a[href='?p="+p+"']").setAttribute("class", "active");
    } else {
        document.querySelector("nav li a[href='index.php']").setAttribute("class", "active");
    }
}

function bindActionBySelector(action, selector){
    elements = document.querySelectorAll(selector);
    for (var i = elements.length - 1; i >= 0; i--) {
        elements[i].onclick = action;
    };
}

function restoreLine(){
    if(typeof(document.lastLine) !== "undefined"){
        document.lastLine.style.display = "table-row";
    };
}

function resetOptions(){
    var optionFields = document.querySelectorAll("tr#edit option[selected='selected']");
    for (var k = optionFields.length - 1; k >= 0; k--) {
        optionFields[k].removeAttribute("selected");
    };
}

function convertDate(jjmmaaaa){
    var tmp = jjmmaaaa.split("/");
    return tmp[2]+"-"+tmp[1]+"-"+tmp[0];
}

function showEditForm(){
    restoreLine();
    resetOptions();

    var lineId = this.getAttribute("id");
    var line = document.querySelector("tr#"+lineId);
    var cells = document.querySelectorAll("tr#"+lineId+" td");
    var form = document.querySelector("tr#edit");
    
    var formFields = document.querySelectorAll("tr#edit td input, tr#edit td select");
    var selectFields = document.querySelectorAll("tr#edit td select");

    var currentSelect = 0;

    for (var i = 0 ; i < formFields.length -1; i++) {
        if ( formFields[i].tagName === "INPUT") {
            if (formFields[i].getAttribute("type") === "date") {
                formFields[i].value = convertDate(cells[i].innerHTML) ;
            } else if(formFields[i].getAttribute("class") === "withSuffix") {
                formFields[i].value = cells[i].innerHTML.split(" ")[0];
            } else {
                formFields[i].value = cells[i].innerHTML;
            }
        
        } else {
            var selectDefaultValue = cells[i].getAttribute("value");
            var defaultOption = selectFields[currentSelect].querySelector("option[value='"+selectDefaultValue+"']");
            defaultOption.setAttribute("selected","selected" );
            currentSelect ++;
        }
    };

    line.parentNode.insertBefore(form,line);

    form.style.display = "table-row";
    line.style.display = "none";
    document.lastLine = line;
};