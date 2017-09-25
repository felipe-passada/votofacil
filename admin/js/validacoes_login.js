function valida_dados (nomeform){

	if(nomeform.login.value.length < 5 || nomeform.login.value.length > 15){
		alert ("O login deve conter entre 5 e 15 caracteres.");
		return false;
	}

	if(nomeform.login.value.indexOf(' ', 0) != -1){
		alert ("O login não pode conter espaços em branco.");
		return false;
	}

	if(nomeform.senha.value.length < 5 || nomeform.senha.value.length > 15){
		alert ("A senha deve conter entre 5 e 15 caracteres.");
		return false;
	}

	if(nameform.senha.value.indexOf(' ', 0) != -1){
		alert("A senha não pode conter espaços em branco.");
		return false;
	}

	if(nomeform.senha.value != nomeform.confirmacao.value){
		alert ("Senhas não conferem.");
		return false;
	}
return true;
}