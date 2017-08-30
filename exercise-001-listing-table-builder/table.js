var table = row = cell = text = lastNode = message = '';
var value, i, j,myInfo,url;
var key = ["Name", "Degree", "years_of_Experience"];
table = document.createElement("table");
table.setAttribute("id", "tableBuilder");

message= document.createElement('span');
message.setAttribute("id","dispaly");

function getFile() 
{
    var file = document.getElementById('filename').value;
    var filename = file.match("personal information") ? './jsondata.json' : file;
    return filename;
}

function fetchJsonData()
{
    url = getFile();
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (this.readyState === 4) {
            if (this.status === 200) {
                myInfo = JSON.parse(request.responseText);
                console.log(request.responseText);
            }
        } else{
            if (this.status === 404) {
                console.log(this.statusText);
            }
        }
    }
    request.open('POST',url,true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send();
}

/**
* Function to generate JsonRecord
* 
* @return {void}
*/

function generateColumn()
{
    cell = document.createElement('td');
    text = document.createTextNode(value);
    cell.appendChild(text);
    row.appendChild(cell);
}

/**
* Function to generate Table
* 
* @return {void}
*/

function generateTable() 
{
    for (i in myInfo) 
    {
        row = document.createElement('tr');
        for(j in key)
        {
            value = '';
            value = myInfo[i][key[j]];
            generateColumn();
            table.appendChild(row);
        }
        setColor();
    }
    document.body.appendChild(table);
    table.setAttribute("border", "1");
    document.getElementById('addrecord').removeAttribute('disabled');
    document.getElementById('generatetable').setAttribute('disabled',"true");
}

/**
* Function to generate inputFields
* 
* @return {void}
*/

function insertFiled()
{
    var input = '';
    for(j in key)
    {
        input = document.createElement("input");
        cell = document.createElement('td'); 
        inputType = fieldType(key[j]);
        input.setAttribute("type", inputType);
        input.setAttribute("id",key[j]);
        input.setAttribute("placeholder",key[j]);
        cell.appendChild(input);
        row.appendChild(cell);
    }

}

/**
* Function to set fieldType
* 
* @return {string}
*/

function fieldType(type) 
{   
    var inputType = '';
    inputType = type == "Name" | type == "Degree" ? "text" : "number";
    return inputType;
}

/**
* Function to Add Extra fileds
* 
* @return {void}
*/

function addRecord() 
{
    row = document.createElement('tr');
    insertFiled();
    table.appendChild(row);
    document.body.appendChild(table);
    document.getElementById('saverecord').removeAttribute('disabled');
}

/**
* Function to Save Record
* 
* @return {void}
*/

function save()
{   
    lastNode = document.getElementById("tableBuilder");
    row = document.createElement('tr');
    if(insertRecord()){
        lastNode.insertBefore(row, lastNode.lastChild);
        document.body.appendChild(table);
        document.getElementById("dispaly").innerHTML = null;
    } else {
        message.innerHTML = '*please fill the fields';
    }
    document.body.append(message);
}

/**
* Function to validate input field
* 
* @return {bool}
*/

function validate() 
{
    var count = 0;
    for(j in key)
    {
        value = document.getElementById(key[j]).value;
        if (value) {
            count++;
        }
    }
    return count;
}

/**
* Function to Insert Record
* 
* @return {void}
*/

function insertRecord()
{
    var length = '';
    if ((length = validate()) == 3) {
        for(j in key)
        {
            value = document.getElementById(key[j]).value;
            generateColumn();
            setColor();
            document.getElementById(key[j]).value = '';
        }
        return true;
    } 
}

/**
* Function to setColor
* 
* @return {void}
*/
function setColor() {
    for(i = 0; i<table.rows.length; i++) {
        if (i%2 == 0) {
            row.style.backgroundColor = 'cadetblue';
        } else {
             row.style.backgroundColor = 'ghostwhite';
        }
    }
}
document.getElementById("generatetable").addEventListener("focus",fetchJsonData);
document.getElementById("generatetable").addEventListener("click",generateTable);
document.getElementById("addrecord").addEventListener("click",addRecord);
document.getElementById("saverecord").addEventListener("click",save);
