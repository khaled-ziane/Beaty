

const showModel = document.querySelector('.show-model')
const navMenu = document.querySelector('.user-nav_menu')


x=false
showModel.addEventListener('click',()=>{
 x=!x
 if(x) {
 navMenu.style.display='block'
 }else {
    navMenu.style.display='none' 
 }
})