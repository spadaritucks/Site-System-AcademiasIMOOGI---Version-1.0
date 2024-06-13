let areaAddModalidade = document.querySelector('.areaAddModalidade');
let areaUpdateModalidade = document.querySelector('.areaUpdateModalidade');
let areaDeletarModalidade = document.querySelector('.areaDeletarModalidade');
let addModalidadeButton = document.querySelector('.addModalidade');
let atualizarModalidadeButton = document.querySelector('.atualizarModalidade');
let delModalidadeButton = document.querySelector('.delModalidade');

addModalidadeButton.addEventListener("click", ()=>{
    areaAddModalidade.style.display = "flex"
    areaDeletarModalidade.style.display = "none"
    areaUpdateModalidade.style.display = "none"
})

delModalidadeButton.addEventListener("click", ()=>{
    areaDeletarModalidade.style.display = "flex"
    areaAddModalidade.style.display = "none"
    areaUpdateModalidade.style.display = "none"
})

atualizarModalidadeButton.addEventListener("click",()=>{
    areaUpdateModalidade.style.display = "flex"
    areaAddModalidade.style.display = "none"
    areaDeletarModalidade.style.display = "none"

})