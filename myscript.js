var inputFields = document.theform.getElementsByTagName("input");

for(key in inputFields){
  var myField = inputFields[key];
  var myError = document.getElementById('formerror');

myField.onchange = function(){
	var myPattern = this.pattern; //in forma.html pattern="\d{3}[\-]\d{3}[\-]\d{4}
	var myPlaceholder = this.placeholder;
	var isValid = this.value.search(myPattern) >= 0;

	if(!(isValid)){
   myError.innerHTML = "Input does not match expected pattern. " + myPlaceholder;
	}else{
	   myError.innerHTML = "";
	}
}

}



