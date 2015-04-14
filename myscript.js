var inputFields = document.theform.getElementsByTagName("input");
var myError = document.getElementById('formerror');

var validationInfo = {
	"myname" : {
		"pattern" : "[A-Za-z]+, [A-Za-Z ]+",
		"placeholder" : "Last Name, First",
		"required" : true },

        "myemail" : { "required" : true },

		"mytelephone" : {
		"pattern" : "\\d{3}[\\-]\\d{3}[\\-]\\d{4}",
		"placeholder" : "xxx-xxx-xxxx" }
};

document.theform.onsubmit = function(){
	if(!(Modernizr.input.required)){
		for(key in validationInfo){
		var myField = document.getElementById(key);
		if((validationInfo[key].required) && (myField.value == '')){
			myError.innerHTML = "Required field " + key + " not filled";
			myField.select();
			return false;
		}
	}
	return true;
	}
	
}
for(key in inputFields){

  var myField = inputFields[key];
  

    myField.onchange = function(){

    if(Modernizr.input.pattern){
    	var myPattern = this.pattern; //in forma.html pattern="\d{3}[\-]\d{3}[\-]\d{4}
	    var myPlaceholder = this.placeholder;
    }else{
    	var myPattern = validationInfo[this.name].pattern;
	    var myPlaceholder = validationInfo[this.name].placeholder;
    }
	
	var isValid = this.value.search(myPattern) >= 0;

	if(!(isValid)){
   myError.innerHTML = "Input does not match expected pattern. " + myPlaceholder;
	}else{
	   myError.innerHTML = "";
	}
}

}



