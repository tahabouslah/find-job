const body = document.querySelector('body'),
    sidebar = body.querySelector('nav'),
    toggle = body.querySelector(".toggle"),
    searchBtn = body.querySelector(".search-box"),
    modeSwitch = body.querySelector(".toggle-switch"),
    modeText = body.querySelector(".mode-text");
    toggleHome=body.querySelector('.bx-bar-chart-alt-2');
    home=body.querySelector('home');
    
toggleHome.addEventListener('click',()=>{
    home.classList.toggle("hide-home");
});

toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("close");
})

modeSwitch.addEventListener("click" , () =>{
    body.classList.toggle("dark");
    
    if(body.classList.contains("dark")){
        modeText.innerText = "Light mode";
    }else{
        modeText.innerText = "Dark mode";
        
    }
});

// CHANGE CONTAINE OF HOME
const btns = document.querySelectorAll('.btn-side');
const blocks = document.querySelectorAll('.home');

btns.forEach((btnn, index) => {
btnn.addEventListener('click', () => {
blocks.forEach((block, blockIndex) => {
      if (blockIndex === index) {
        block.classList.add('active');
      } else {
        block.classList.remove('active');
      }
    });
  });
});
