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
/* ----------------------  ADD BLOCK PROFILE ------------------------------- */

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


// NAVIGATION INTO EXP EDU CERTIF
const btnss = document.querySelectorAll('.btn-career');
const careers = document.querySelectorAll('.career');

btnss.forEach((btn, index) => {
btn.addEventListener('click', () => {
careers.forEach((career, careerIndex) => {
      if (careerIndex === index) {
        career.classList.add('active');
      } else {
        career.classList.remove('active');
      }
    });
  });
});

// NAVIGATION INTO EXP EDU CERTIF
const btnn = document.querySelectorAll('.btn-career-display');
const careerr = document.querySelectorAll('.career-display');

btnn.forEach((btn, index) => {
btn.addEventListener('click', () => {
careerr.forEach((career, careerIndex) => {
      if (careerIndex === index) {
        career.classList.add('display');
      } else {
        career.classList.remove('display');
      }
    });
  });
});


//  EVENT ADD PROFILE PICTURE 

function setImgSrcFromInputFile(inputSelector, imgSelector) {
  const fileInput = document.querySelector(inputSelector);
  const image = document.querySelector(imgSelector);

  fileInput.addEventListener('change', function() {
    const file = fileInput.files[0];
    const reader = new FileReader();

    reader.addEventListener('load', function() {
      image.src = reader.result;
    });

    reader.readAsDataURL(file);
  });
}

function setImgSrcFromInputFileMP4(inputSelector, imgSelector) {
  const fileInput = document.querySelector(inputSelector);
  const image = document.querySelector(imgSelector);

  fileInput.addEventListener('change', function() {
    const file = fileInput.files[0];
    const reader = new FileReader();

    // Check if the selected file is an MP4 video
    if (!file.type.includes('mp4')) {
      alert('Please select an MP4 video file.');
      return;
    }

    reader.addEventListener('load', function() {
      image.src = reader.result;
    });

    reader.readAsDataURL(file);
  });
}


// ADD NEW CAREER
const careerBtn=document.querySelector('.addCareer');
const container=document.querySelector('.box-singels-careers-exp-edit');

careerBtn.addEventListener('click',()=>{
  let newItem=document.createElement('p');
  newItem.classList.add('career-exp');

  // GET VALUES OF INPUTS
  let imgSrc=document.querySelector('.left-col-exp>#imgOne-exp').getAttribute('src');
  let compName=document.querySelector('.single-career-editor-exp>.inputCompany').value;
  let post=document.querySelector('.single-career-editor-exp>.inputPost').value;
  let desc=document.querySelector('.single-career-editor-exp>.inputDesc').value;

  let array={ companyName:compName,
              postName:post,
              src:imgSrc,
              description:desc
            };

  // ADD INTO P 
  newItem.innerHTML=`
  <div class="single-career-display  onclick="selectItem(this)">
  <img src="${array.src}" width="34" height="34" />
  <p class="name-company">${array.companyName}</p>
  <p class="adr">${array.description}</p>
  <p class="name-post">${array.postName}</p>
  </div>
  `
  document.getElementById("imgOne-exp").setAttribute('src','assets/img/unknown.png');
  document.querySelector('.inputCompany').value=" ";
  document.querySelector('.single-career-editor-exp>.inputPost').value=" ";
  document.querySelector('.single-career-editor-exp>.inputDesc').value=" ";

  container.appendChild(newItem);
});

// ADD NEW EDU
const eduBtn=document.querySelector('.addEdu');
const containerEDU=document.querySelector('.box-singels-careers-edu-edit');

eduBtn.addEventListener('click',()=>{
let newItem=document.createElement('p');
newItem.classList.add('career-edu');

// GET VALUES OF INPUTS
let imgSrc=document.querySelector('.left-col-edu>#imgOne-edu').getAttribute('src');
let compName=document.querySelector('.frm-select-3').value;
let post=document.querySelector('.single-career-editor-edu>.inputSpec').value;
let desc=document.querySelector('.single-career-editor-edu>.inputDesc').value;

let array={ companyName:compName,
            postName:post,
            src:imgSrc,
            description:desc
          };

// ADD INTO P 
newItem.innerHTML=`
<div class="single-career-display"">
<img src="${array.src}" width="34" height="34" />
<p class="name-company">${array.companyName}</p>
<p class="adr">${array.description}</p>
<p class="name-post">${array.postName}</p>
</div>
`
document.getElementById("imgOne-edu").setAttribute('src','assets/img/unknown.png');
document.querySelector('.frm-select-3').value="choose option";
document.querySelector('.single-career-editor-edu>.inputSpec').value=" ";
document.querySelector('.single-career-editor-edu>.inputDesc').value=" ";

containerEDU.appendChild(newItem);
});

// ADD NEW CERTIF
const certifBtn=document.querySelector('.addCertif');
const containerCER=document.querySelector('.box-singels-careers-certif-edit');

certifBtn.addEventListener('click',()=>{
let newItem=document.createElement('p');
newItem.classList.add('career-certif');

// GET VALUES OF INPUTS
let imgSrc=document.querySelector('.left-col-certif>#imgOne-certif').getAttribute('src');
let compName=document.querySelector('.frm-select-4').value;
let post=document.querySelector('.single-career-editor-certif>.inputSpec').value;
let desc=document.querySelector('.single-career-editor-certif>.inputDesc').value;

let array={ companyName:compName,
            postName:post,
            src:imgSrc,
            description:desc
          };

// ADD INTO P 
newItem.innerHTML=`
<div class="single-career-display">
<img src="${array.src}" width="34" height="34" />
<p class="name-company">${array.companyName}</p>
<p class="adr">${array.description}</p>
<p class="name-post">${array.postName}</p>
</div>
`
document.getElementById("imgOne-certif").setAttribute('src','assets/img/unknown.png');
document.querySelector('.frm-select-4').value="choose option";
document.querySelector('.single-career-editor-certif>.inputSpec').value=" ";
document.querySelector('.single-career-editor-certif>.inputDesc').value=" ";

containerCER.appendChild(newItem);
});

// ADD NEW INTEREST
const interestBtn=document.querySelector('.btn-add-int');
const containerInt=document.querySelector('.box-single-interests-edit');

interestBtn.addEventListener('click',()=>{
let newItemINT=document.createElement('p');
newItemINT.classList.add('new-interest');

let myInterest=document.querySelector('.interest>input').value;

newItemINT.innerHTML=`
<div class="single-interest-display">
<div class="single-interest d-flex">
    <img src="assets/img/like%20(1).png" width="25" height="24" />
    <p class="interest-name">${myInterest}</p>
</div>
</div>
`
document.querySelector('.interest>input').setAttribute('placeholder','My ..........');
containerInt.appendChild(newItemINT);
});

// /----------------------

function toggleImage(btn, oldSrc, newSrc) {
  var div = btn.parentNode;
  var img = div.querySelector(".icon-save");

  if (img.src.includes(newSrc)) {
    img.src = oldSrc;
  } else {
    img.src = newSrc;
  }
}
// ----------------------
function uploadVideo() {
  const videoUploadInput = document.getElementById('video-upload');
  const videoPlayer = document.getElementById('video-player');

  videoUploadInput.addEventListener('change', function() {
    const file = this.files[0];
    const fileURL = URL.createObjectURL(file);
    videoPlayer.src = fileURL;
  });

  videoUploadInput.click();
}