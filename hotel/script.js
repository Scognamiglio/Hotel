function email(a){
	if(a != document.getElementsByName("Email")[0].value){
		alert("adresse pas pareil, pffff");
	}
}


function date(a){
	a=(new Date(a)).getTime();
	b=(new Date(document.getElementsByName("Da")[0].value)).getTime();
	if(a<b){
		alert("vous partez avant même d'arriver, notre établisement est si mauvais que ça ?");
		return
	}
	document.getElementsByName("Nbrn")[0].value=(a-b)/86400000
}

function test(b){
if (b=="exemple"){
	for(i=0;i<4;i++){
		document.getElementsByName("radio")[i].checked=false;
		document.getElementsByName("radio")[i].disabled=true;	
		
	}
}else if(b=="simple"){
	document.getElementsByName("radio")[0].disabled=false;	
		for(i=1;i<4;i++){
		document.getElementsByName("radio")[i].checked=false;
		document.getElementsByName("radio")[i].disabled=true;	
		
	}
}else if(b=="double"){
	document.getElementsByName("radio")[0].disabled=false;	
	document.getElementsByName("radio")[1].disabled=false;	
		for(i=2;i<4;i++){
		document.getElementsByName("radio")[i].checked=false;
		document.getElementsByName("radio")[i].disabled=true;	
		
	}
}else{
		for(i=0;i<4;i++){
		document.getElementsByName("radio")[i].disabled=false;;	
}
	}
	
}