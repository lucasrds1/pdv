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
