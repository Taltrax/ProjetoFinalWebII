/*
	Criado por João Pedro da Silva Fernandes em: 05/11/18
*/

window.onload = () => {

	abreModalAlteracao();	

}

function abreModalAlteracao(){

	const url = location.search;
	const regExp = /id=\d+/g;

	if(regExp.test(url)){
		$('#f_form_alterar').modal('show');
	}

}