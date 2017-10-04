    var newLi, input, newWidget,fieldName,fieldId, fieldList, fieldCount ;
    function createField()
    {
      newLi = document.createElement('li');
      newLi.setAttribute('style','list-style-type:none');
    }

    function inputField()
    {	
    	input = document.createElement("input");
    	input.setAttribute("type", "button");
    	input.setAttribute("value", "-");
    	input.setAttribute("style", "display:inline");
    }
 	
 	function addField(fieldName)
 	{
    newLi = input = newWidget = '';
    fieldList = document.getElementById(fieldName);
    fieldCount = fieldList.children.length;
    newWidget = fieldList.getAttribute('data-prototype');
    newWidget = newWidget.replace(/__name__/g, fieldCount);
    createField();
    newLi.innerHTML = newWidget;
    if(fieldCount) {
      inputField();
      input.setAttribute("id", fieldId);
      input.setAttribute("onclick", "removeField(this)");
      newLi.appendChild(input);
    }
    fieldCount++;
    fieldList.appendChild(newLi);

 	}
 	function removeField(fieldName)
 	{
    fieldCount--;
    fieldName.parentElement.remove();
 	}
   	