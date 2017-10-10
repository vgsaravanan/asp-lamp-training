var $newLi, $input, $newWidget,$fieldName,$fieldId, $fieldList, $fieldCount ;

/**
* Function to Create new <li> Element
* 
* return string newLi
*/
function createField()
{
  newLi = $("<li>", {
    class: "list_type"
  });
  return newLi;
}

/**
* Function to Create new <input> Element
* 
* return string input
*/
function inputField()
{ 
  input = $("<input>",{
    type:'button', 
    name: "remove", 
    value: 'Remove', 
    class: "removefield", 
    onclick:"removeField(this)",
    style: "display: inline" 
    });
  return input;
}

/**
* Function to remove input field
* 
* @param string fieldName
*
* return {null}
*/

function removeField(fieldName)
{
  fieldCount--;
  fieldName.parentElement.remove();
}
  
/**
* Function to add input field
* 
* @param string fieldName
*
* return {null}
*/
function addField(fieldName)
{
  newLi = input = newWidget = '';
  fieldList = $(fieldName);
  fieldCount = $(fieldList).children().length;
  newWidget = fieldList.attr('data-prototype');
  console.log(newWidget);
  newWidget = newWidget.replace(/__name__/g, fieldCount);
  if(fieldCount) {
    input = inputField().html(input);
    newLi = createField().html(newWidget);
    newLi.appendTo(newWidget);
    input.appendTo(newLi);
  }
  newLi.appendTo(fieldList);
  fieldCount++;
}
