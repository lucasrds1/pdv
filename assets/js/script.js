var controleCampo = 1;
function adicionarProduto(){
    controleCampo++;
    console.log(controleCampo);

    document.querySelector("#itens").insertAdjacentHTML('beforeend', '<div class="produto_adicionado'+controleCampo+'"><fieldset id="campo: "'+controleCampo+' style="border-color: white;"><legend>Produtos '+controleCampo+'</legend><input type="hidden" name="item" value="'+controleCampo+'"><li>QUANTIDADE: <input type="text"  name="quantidade_nota" style="margin-left: 95px" ></li><li>DESCRIÇÃO: <input type="text"  name="descricao_nota" style="margin-left: 105px" ></li><li>VALOR UNITÁRIO: <input type="text"  name="vr_unit_nota" style="margin-left: 65px" placeholder="R$" value=""></li> <div class="adicionar_produto red"><button type="button" id="'+controleCampo+'" class="removerItem" onclick="removerProduto( '+controleCampo+' )"> REMOVER PRODUTO </button></div></fieldset></div>')

}
function removerProduto(idCampo){
    controleCampo = 1;
    console.log('Remover produto '+idCampo);
    document.querySelector('.produto_adicionado'+idCampo).remove();
}
function mostrarBotao(){
    document.querySelector('#botao').style.display = "block";
}
