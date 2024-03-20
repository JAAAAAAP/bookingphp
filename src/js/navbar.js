const show = document.getElementById('button');
const popup = document.querySelector('.popup');
const close = document.querySelector('.close');

const usershow = document.getElementById('userbutton');
const box = document.querySelector('.box');
const boxclose = document.querySelector('.boxclose')

usershow?.addEventListener('click', ()=>{
    box.style.display = "flex"
    
})

boxclose?.addEventListener('click',()=>{
    box.style.display = "none";
})

show?.addEventListener('click',()=>{
    popup.style.display = "flex";
});

close?.addEventListener('click',()=>{
    popup.style.display = "none"
})