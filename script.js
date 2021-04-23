$(document).ready(function(){
    validar_nome();
    validar_email();
    validar_tel();
});
function validar_nome(){
    $("#btn_add").click(function(){
        if(document.cadastro.nome.value == ""){
            alert("Voce deve preencher o campo nome!");
            document.cadastro.nome.focus();
            return false;
        }
    });
}
function validar_email(){
    $("#btn_add").click(function(){
        if(document.cadastro.email.value == ""){
            alert("Voce deve preencher o campo email!");
            document.cadastro.nome.focus();
            return false;
        }
    });
}
function validar_tel(){
    $("#btn_add").click(function(){
        if(document.cadastro.telefone.value == ""){
            alert("Voce deve preencher o campo telefone!");
            document.cadastro.nome.focus();
            return false;
        }
    });
}