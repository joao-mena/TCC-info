function reproduzirVoz(texto) {
	responsiveVoice.speak(texto, "Portuguese Female");
	text = encodeURIComponent(texto);
	var url = "http://translate.google.com/translate_tts?tl=pt-br&q="+texto;
	if($('audio').attr('src', url).get(0)) {
		$('audio').attr('src', url).get(0).play();
		$('audio').attr('src', url).get(0).pause();
	}
}

$(document.body).on("keyup click", function() {
	audio = true;
	console.log($('a.audio').attr("href"));
	if($('a.audio').attr("href") == "?audio=ativar"){ audio = false; }
	if(audio){
		var texto = "";
		var tipo;

		propriedadesObjeto = $(':focus');
		if($('select:focus option:selected').text()){
			tipo = "option do select";
			texto = $('select:focus option:selected').text();
		} 
		else if($(propriedadesObjeto).text()) { tipo = "elemento"; texto = $(propriedadesObjeto).text(); } 
		else if($(propriedadesObjeto).val()) { tipo = "input com valor"; texto = $(propriedadesObjeto).val(); } 
		else if($(propriedadesObjeto).attr('placeholder')) { tipo = "input sem valor, com texto do placeholder"; texto = "Preencha o campo "+$(propriedadesObjeto).attr('placeholder'); } 
		else if($(propriedadesObjeto).val() && ($(propriedadesObjeto).attr('type') == "submit" || $(propriedadesObjeto).attr('type') == "button")) { tipo = "Botão"; texto = "Pressione enter para "+$(propriedadesObjeto).val(); }
		else { console.log("Elemento não identificado!"); }
		
		if(tipo){
			reproduzirVoz(texto);
			console.log("Tipo:"+tipo+"\ntexto:"+texto);
		}
	}
});