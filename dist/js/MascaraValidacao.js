// JavaScript Document

function ValidaForm(frm){
    //if(!ValidaTel2(frm.tel.value))
       // return false;

    //else 
    if (!ValidarCPF(frm.cpf_ie.value))
        return false;

    else if (!ValidaEmail(frm.email.value))
        return false;
        
}

function setFocus() {
    document.getElementById("foco").focus();
}
//adiciona mascara de cnpj
function MascaraCNPJ(cnpj){
    if(mascaraInteiro(cnpj)==false){
            event.returnValue = false;
    }       
    return formataCampo(cnpj, '00.000.000/0000-00', event);
}

//adiciona mascara de cep
function MascaraCep(cep){
            if(mascaraInteiro(cep)==false){
            event.returnValue = false;
    }       
    return formataCampo(cep, '00.000-000', event);
}

//adiciona mascara de data
function MascaraData(data){
    if(mascaraInteiro(data)==false){
            event.returnValue = false;
    }       
    return formataCampo(data, '00/00/0000', event);
}

//adiciona mascara ao telefone
function MascaraTelefone(tel){  
    if(mascaraInteiro(tel)==false){
            event.returnValue = false;
    }       
    return formataCampo(tel, '(00) 00000-0000', event);
}

//adiciona mascara ao CPF
function MascaraCPF(cpf){
    if(mascaraInteiro(cpf)==false){
            event.returnValue = false;
    }       
    return formataCampo(cpf, '000.000.000-00', event);
}

//adiciona mascara ao RG
function MascaraRG(rg){
    if((rg)==false){
            event.returnValue = false;
    }       
    return formataCampo(rg, '00.000.000-0', event);
}

//valida telefone
function ValidaTelefone(tel){
    exp = /\(\d{2}\)\ \d{5}\-\d{4}/
    if(!exp.test(tel.value))
    {
        alert('Numero de Telefone Invalido!');
        return false;
    }
    else
        return true;
            
}

function ValidaTel2(tel){
    var txt= tel;
    
    var re1='.*?';	// Non-greedy match on filler
    var re2='.';	// Uninteresting: c
    var re3='(.)';	// Any Single Character 1
    var re4='(.)';	// Any Single Character 2
    var re5='.*?';	// Non-greedy match on filler
    var re6='(\\s+)';	// White Space 1
    var re7='(.)';	// Any Single Character 3
    var re8='(.)';	// Any Single Character 4
    var re9='(.)';	// Any Single Character 5
    var re10='(.)';	// Any Single Character 6
    var re11='(.)';	// Any Single Character 7
    var re12='.*?';	// Non-greedy match on filler
    var re13='.';	// Uninteresting: c
    var re14='.*?';	// Non-greedy match on filler
    var re15='(.)';	// Any Single Character 8
    var re16='(.)';	// Any Single Character 9
    var re17='(.)';	// Any Single Character 10
    var re18='(.)';	// Any Single Character 11

    var p = new RegExp(re1+re2+re3+re4+re5+re6+re7+re8+re9+re10+re11+re12+re13+re14+re15+re16+re17+re18,["i"]);
    var m = p.exec(txt);
    if (m != null)
    {
        var c1=m[1];
        var c2=m[2];
        var ws1=m[3];
        var c3=m[4];
        var c4=m[5];
        var c5=m[6];
        var c6=m[7];
        var c7=m[8];
        var c8=m[9];
        var c9=m[10];
        var c10=m[11];
        var c11=m[12];
        document.write("("+c1.replace(/</,"&lt;")+")"+"("+c2.replace(/</,"&lt;")+")"+"("+ws1.replace(/</,"&lt;")+")"+"("+c3.replace(/</,"&lt;")+")"+"("+c4.replace(/</,"&lt;")+")"+"("+c5.replace(/</,"&lt;")+")"+"("+c6.replace(/</,"&lt;")+")"+"("+c7.replace(/</,"&lt;")+")"+"("+c8.replace(/</,"&lt;")+")"+"("+c9.replace(/</,"&lt;")+")"+"("+c10.replace(/</,"&lt;")+")"+"("+c11.replace(/</,"&lt;")+")"+"\n");
    }
    return true;
}

//valida CEP
function ValidaCep(cep){
    exp = /\d{2}\.\d{3}\-\d{3}/
    if(!exp.test(cep.value))
            alert('Numero de Cep Invalido!');               
}

//valida data
function ValidaData(data){
    exp = /\d{2}\/\d{2}\/\d{4}/
    if(!exp.test(data.value))
            alert('Data Invalida!');                        
}

//valida o CPF digitado
function ValidarCPF(Objcpf){
    var cpf = Objcpf.value;
    exp = /\.|\-/g
    cpf = cpf.toString().replace( exp, "" ); 
    var digitoDigitado = eval(cpf.charAt(9)+cpf.charAt(10));
    var soma1=0, soma2=0;
    var vlr =11;

    for(i=0;i<9;i++){
            soma1+=eval(cpf.charAt(i)*(vlr-1));
            soma2+=eval(cpf.charAt(i)*vlr);
            vlr--;
    }       
    soma1 = (((soma1*10)%11)==10 ? 0:((soma1*10)%11));
    soma2=(((soma2+(2*soma1))*10)%11);

    var digitoGerado=(soma1*10)+soma2;
    if(digitoGerado!=digitoDigitado) 
    {   
           
        alert('CPF Invalido!');   
        return false;
    }
    else
        return true;      
}

//valida numero inteiro com mascara
function mascaraInteiro(){
    if (event.keyCode < 48 || event.keyCode > 57){
            event.returnValue = false;
            return false;
    }
    return true;
}

//valida o CNPJ digitado
function ValidarCNPJ(ObjCnpj){
    var cnpj = ObjCnpj.value;
    var valida = new Array(6,5,4,3,2,9,8,7,6,5,4,3,2);
    var dig1= new Number;
    var dig2= new Number;

    exp = /\.|\-|\//g
    cnpj = cnpj.toString().replace( exp, "" ); 
    var digito = new Number(eval(cnpj.charAt(12)+cnpj.charAt(13)));

    for(i = 0; i<valida.length; i++){
            dig1 += (i>0? (cnpj.charAt(i-1)*valida[i]):0);  
            dig2 += cnpj.charAt(i)*valida[i];       
    }
    dig1 = (((dig1%11)<2)? 0:(11-(dig1%11)));
    dig2 = (((dig2%11)<2)? 0:(11-(dig2%11)));

    if(((dig1*10)+dig2) != digito) 
    {
        alert('CNPJ Invalido!');  
    } 
            

}

function ValidaEmail(email){
    var x=email;
    var atpos=x.indexOf("@");
    var dotpos=x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
    {
        alert("Por favor digite um endereço de e-mail válido");
        return false;
    }
    return true;
}
//formata de forma generica os campos
function formataCampo(campo, Mascara, evento) { 
    var boleanoMascara; 

    var Digitato = evento.keyCode;
    exp = /\-|\.|\/|\(|\)| /g
    campoSoNumeros = campo.value.toString().replace( exp, "" ); 

    var posicaoCampo = 0;    
    var NovoValorCampo="";
    var TamanhoMascara = campoSoNumeros.length;; 

    if (Digitato != 8) { // backspace 
            for(i=0; i<= TamanhoMascara; i++) { 
                    boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")
                                                            || (Mascara.charAt(i) == "/")) 
                    boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(") 
                                                            || (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " ")) 
                    if (boleanoMascara) { 
                            NovoValorCampo += Mascara.charAt(i); 
                              TamanhoMascara++;
                    }else { 
                            NovoValorCampo += campoSoNumeros.charAt(posicaoCampo); 
                            posicaoCampo++; 
                      }              
              }      
            campo.value = NovoValorCampo;
              return true; 
    }else { 
            return true; 
    }
}

