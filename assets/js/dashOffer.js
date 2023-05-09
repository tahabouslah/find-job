const body = document.querySelector('body'),
    sidebar = body.querySelector('nav'),
    toggle = body.querySelector(".toggle"),
    searchBtn = body.querySelector(".search-box"),
    modeSwitch = body.querySelector(".toggle-switch"),
    modeText = body.querySelector(".mode-text");
    toggleHome=body.querySelector('.bx-bar-chart-alt-2');
    home=body.querySelector('.home');
    
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


 // Get references to the buttons and sections
    const btn1 = document.querySelector("#btn-side-1");
    const btn2 = document.querySelector("#btn-side-2");
    const section1 = document.querySelector("#home1");
    const section2 = document.querySelector("#home2");
    const section3 = document.querySelector("#home3");
    const siblingBtns = document.querySelectorAll(".btn-details");

    // Add onclick events to the buttons
    btn1.onclick = () => {
      section1.classList.add("active");
      section2.classList.remove("active");
      section3.classList.remove("active");
    };

    btn2.onclick = () => {
      section1.classList.remove("active");
      section2.classList.add("active");
      section3.classList.remove("active");
    };

    // Add onclick events to the sibling buttons
    siblingBtns.forEach((siblingBtn) => {
      siblingBtn.onclick = () => {
        section1.classList.remove("active");
        section2.classList.remove("active");
        section3.classList.add("active");
      };
    });
