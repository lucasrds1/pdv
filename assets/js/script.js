var controleCampo = 1;
function adicionarProduto(){
    controleCampo++;
    console.log(controleCampo);

    //document.querySelector("#itens").insertAdjacentHTML('beforeend', '<div class="produto_adicionado'+controleCampo+'"><fieldset id="campo: "'+controleCampo+' style="border-color: white;"><legend>Produtos '+controleCampo+'</legend><input type="hidden" name="item" value="'+controleCampo+'"><li>QUANTIDADE: <input type="text"  name="quantidade_nota" style="margin-left: 95px" ></li><li>DESCRIÇÃO: <input type="text"  name="descricao_nota" style="margin-left: 105px" ></li><li>VALOR UNITÁRIO: <input type="text"  name="vr_unit_nota" style="margin-left: 65px" placeholder="R$" value=""></li> <div class="adicionar_produto red"><button type="button" id="'+controleCampo+'" class="removerItem" onclick="removerProduto( '+controleCampo+' )"> REMOVER PRODUTO </button></div></fieldset></div>')
    document.querySelector("#campo").insertAdjacentHTML('beforeend', '<div style="background-color: green" id="campo'+controleCampo+'"><input type="hidden" name="item" value="'+controleCampo+'">produto '+controleCampo+'<br>quantidade<input type="number"  name="quantidade_nota[]" style="margin-left: 95px" required>descricao<input type="text"  name="descricao_nota[]" style="margin-left: 105px" required>valor<input type="number"  name="vr_unit_nota[]" placeholder="R$" style="margin-left: 65px" required><button type="button" id="'+controleCampo+'" onclick="removerProduto('+controleCampo+')">remover</button></div>')

}
function removerProduto(idCampo){
    controleCampo = 1;
    console.log('Remover produto '+idCampo);
    console.log(document.querySelector('#campo'+idCampo))
    document.querySelector('#campo'+idCampo).remove();
}
function gerarNota(){
    let nota = 0
    nota = Math.floor(Math.random() * (999999 - 100000) + 100000)
    document.querySelector('#eNota').value = nota
}
function dropdown(n){
    console.log(n)
    var menu = document.querySelector("#dropdown"+n);
    var img = document.querySelector("#img_dropdown"+n);
    if(menu.style.display == 'block'){
        menu.style.display = 'none';
        img.src = '../../assets/imagens/submenu2.png'
        img.style.width = '15px'

    }else{
        menu.style.display = 'block';
        img.src = '../../assets/imagens/submenu3.png';
        img.style.width = '18px'

    }
}
function dropdown1(n){
    var menu = document.querySelector("#dropdown"+n);
    var img = document.querySelector("#img_dropdown"+n);
    if(menu.style.display == 'block'){
        menu.style.display = 'none';
        img.src = '../../assets/imagens/submenu2.png'
        img.style.width = '25px'

    }else{
        menu.style.display = 'block';
        img.src = '../../assets/imagens/submenu3.png';
        img.style.width = '28px'

    }
}
function checkinput(){
    if(document.querySelector("#check").checked){
        document.querySelector("#cpfCli").style.display = 'block';
    }else{
        document.querySelector("#cpfCli").style.display = 'none';
    }
}
function tipoCad(valor){
    if(valor == 0){
        document.querySelector("#cpfEmpresa").style.display = 'none'
        document.querySelector("#cnpjEmpresa").style.display = 'none';
        document.querySelector("#cnpjEmpresa").value = '';
        document.querySelector("#cpfEmpresa").value = '';
    }
    if(valor == 1){
        document.querySelector("#cpfEmpresa").style.display = 'block'
        document.querySelector("#cnpjEmpresa").style.display = 'none';
        document.querySelector("#cnpjEmpresa").value = '';
    }
    if(valor == 2){
        document.querySelector("#cpfEmpresa").style.display = 'none'
        document.querySelector("#cnpjEmpresa").style.display = 'block'
        document.querySelector("#cpfEmpresa").value = '';
    }
}
function aviso(desc){
    Swal.fire({
        icon: 'warning',
        title: 'AVISO:',
        text: desc,
        showConfirmButton: true
    })
}
function confirma(desc, link){
    var con = confirm(desc);
    if(con == true){
        location.href = link;
    }
}
function avisoCadEdit(acao, link, tela){
    let text = 'Redirecionando para a tela de '+tela+'...';
    if(acao == 'excluído'){
        text = '';
    }
    Swal.fire({
        icon: 'success',
        title: 'Registro '+acao+' com sucesso!',
        text: text,
        showConfirmButton: true,
    })
    .then(e=>{
        if(acao == 'excluído'){

        }else{
        location.href=link;
        }
    })
    .catch(e=>{
        
    })
}
function erroCadEdit(acao){
    Swal.fire({
        icon: 'error',
        title: 'Não foi possível '+acao+' este registro!'
      })
}
function avisoPermissao(){
    Swal.fire({
        icon: 'error',
        title: 'Você não tem permissão para acessar essa página',
        footer: 'Fale com seu administrador'
      })
}

function excluir(link){
    Swal.fire({
        title: 'Deseja excluir esse registro?',
        text: "Você não será capaz de reverter isso!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
        location.href=link
        }
      })
}
function getIp(callback)
{
    function response(s)
    {
        callback(window.userip);

        s.onload = s.onerror = null;
        document.body.removeChild(s);
    }

    function trigger()
    {
        window.userip = false;

        var s = document.createElement("script");
        s.async = true;
        s.onload = function() {
            response(s);
        };
        s.onerror = function() {
            response(s);
        };

        s.src = "https://l2.io/ip.js?var=userip";
        document.body.appendChild(s);
    }

    if (/^(interactive|complete)$/i.test(document.readyState)) {
        trigger();
    } else {
        document.addEventListener('DOMContentLoaded', trigger);
    }
}
//header
var menu = document.querySelector(".container_menu");
var iconeMenu = document.querySelector("#icone");
function menuOpen(){
    if(menu.offsetWidth == '250'){
        menuClose();

        // if(window.innerWidth < 768){
        //     $('#icone').animate({'margin-left': '0'}, 'fast');
        // }
       // document.querySelector("#container_all").style.width = "100%";
    }else{
        menu.style.width = '250px';
        document.querySelector(".container-opaco").style.opacity = '0.2'
        // if(window.innerWidth < 768){
        //     $('#icone').animate({'margin-left': '155'}, 'fast');
        // }
        //   document.querySelector("#container_all").style.width = "82%";
    }
}
function menuClose(){
    if(menu.offsetWidth == '250'){
        menu.style.width = '0px';
        if(window.innerWidth < 768){
            $('#icone').animate({'margin-left': '0'}, 'fast');
        }
        document.querySelector("#container_all").style.width = "100%";
        document.querySelector(".container-opaco").style.opacity = '1'
    }
}
function verificaTela(){
    if(window.innerWidth < 768){
        document.querySelector("#container_all").style.width = "100%";
    }
}
verificaTela();
// getIp(function (ip) {
//     console.log(ip);
// });