let areaAddPlano = document.querySelector('.areaAddPlano')
let AddPlanoButton = document.querySelector('.addPlano')
let delPlanoButton = document.querySelector('.delPlano')
let updatePlanoButton = document.querySelector('.atualizarPlano')
let areaUpdatePlano = document.querySelector('.areaUpdatePlano')
let areaDeletePlano = document.querySelector('.areaDeletePlano')

AddPlanoButton.addEventListener('click', ()=>{
    areaAddPlano.style.display = "flex"
    areaDeletePlano.style.display = "none"
    areaUpdatePlano.style.display = "none"
})

delPlanoButton.addEventListener('click', ()=>{
    areaDeletePlano.style.display = "flex"
    areaAddPlano.style.display = "none"
    areaUpdatePlano.style.display = "none"
})

updatePlanoButton.addEventListener("click",()=>{
    areaUpdatePlano.style.display = "flex"
    areaAddPlano.style.display = "none"
    areaDeletePlano.style.display = "none"

})



