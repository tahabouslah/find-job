// //hide 
//     //block 1
   
//         const toggleButton = document.querySelector('.flech');
//         const hiddenElement = document.querySelector('.hidden-box-1');

//         toggleButton.addEventListener('click', () => {
//         hiddenElement.classList.toggle('hidden-box-1');
// });
    
    
const btn = document.querySelector('.downloadPDF');
btn.addEventListener('click', downloadPDF);


function downloadPDF() {
    // Get the div element to be downloaded
    const div = document.querySelector('.result-frame');
    
    // Create a new jsPDF instance
    const doc = new jsPDF();
    
    // Add the div content to the PDF document
    doc.fromHTML(div, 15, 15);
    
    // Download the PDF document
    doc.save('document.pdf');
  }
  

function downloadPDF() {
    const element = document.querySelector(".result-frame");
    const filename = "custom_name.pdf"; // set your custom filename here
    html2pdf().from(element).save(filename);
}
// add hidden block
function addExperience() {
    experience=document.querySelector(".single-experience");
    // Check if the element exists
    if (experience) {
        // If the element exists, toggle its display style property
            experience.style.display = (experience.style.display === 'none') ? '' : 'none';
    } else {
    // If the element doesn't exist, create it and add it to the container
     // create the new element
        const experience = document.createElement("div");
        experience.classList.add("single-experience");
    // add the HTML content to the new element
    experience.innerHTML = `
        <div class="poste flex-box"><label for="">Poste</label><input type="text" name="inpt-post" class="inpt-post-experience"></div>
        <div class="employeur flex-box"><label for="">Employeur</label><input type="text" name="inpt-employeur" class="inpt-employeur-experience input-2"></div>
        <div class="ville flex-box"><label for="">Ville</label><input type="text" name="inpt-ville" class="inpt-ville input-3"></div>
        <div class="start-date flex-box"><label for="">Date de début</label><input type="month" class="inpt-start-date" name=""min="1950-01" value=""></div>
        <div class="end-date flex-box"><label for="">Date de fin</label><input type="month" class="inpt-end-date" name=""min="1950-01" value=""></div>
        <div class="description flex-box"><label for="">Description</label><textarea name="" id="" cols="30" rows="10" class="inpt-description-experience"></textarea></div>
        <div name="btn-save"><button class="btn-save"  >Save</button></div>
    `;

    // add event listener to the "Save" button
    const saveButton = experience.querySelector(".btn-save");
    saveButton.addEventListener("click", saveExperience);

    // append the new element to the container element
    const container = document.querySelector("#experiences-container");
    container.appendChild(experience);
}
    }
    function saveExperience(event) {
    // get the input values from the parent element
    const parent = event.target.closest(".single-experience");
    const poste = parent.querySelector(".inpt-post-experience").value;
    const employeur = parent.querySelector(".inpt-employeur-experience").value;
    const ville = parent.querySelector(".inpt-ville").value;
    const start_date=parent.querySelector(".inpt-start-date").value;
    const end_date=parent.querySelector(".inpt-end-date").value;
    const description=parent.querySelector(".inpt-description-experience").value;

    // add the input values to a table 
    
    const table = {
        poste_t: poste,
        employeur_t: employeur,
        ville_t: ville,
        start_date_t:start_date,
        end_date_t:end_date,
        description_t:description
    };

    //print table in console
    console.table(table);

    // create the new "saved" element
    const saved = document.createElement("div");
    saved.classList.add("saved-box-experience");
    saved.innerHTML = `
    <span class="saved-exp-label-2">${poste}</span>
    <p class="saved-exp-emp-ville-2">${employeur}, ${ville}</p>
    <button>Modify</button>
    `;

    // append the new "saved" element to the container element
    const container = document.querySelector("#saved-experiences-container");
    container.insertBefore(saved, container.firstChild);
    ////////////////////////////////////////////////////////////////////////////////////////////////////

    // from experience editor to cv view
    const title=document.querySelector('.experience-title');
    title.classList.add('active');

    const expG = document.createElement("div");
    expG.classList.add("experience-cv-view");

    //the title already exist
    // const expG_t = document.createElement("p");
    // expG_t.classList.add("experience-title");
    // expG_t.textContent="Experience";

    const expG_s_e = document.createElement("div");
    expG_s_e.classList.add("single-experience-cv-view");

    const expG_b_f_l = document.createElement("div");
    expG_b_f_l.classList.add("first-line-experience-cv-view");

    const expG_n = document.createElement("div");
    expG_n.classList.add("experience-name");
    expG_n.textContent=document.querySelector(".inpt-post-experience").value;

    const expG_d = document.createElement("div");
    expG_d.classList.add("experience-date");
    expG_d.textContent="de "+document.querySelector(".inpt-start-date").value+" à "+document.querySelector(".inpt-end-date").value;

    expG_b_f_l.appendChild(expG_n);
    expG_b_f_l.appendChild(expG_d);
    
    const expG_info = document.createElement("div");
    expG_info.classList.add("experience-infos");
    

    const expG_adr = document.createElement("p");
    expG_adr.classList.add("experience-eta-addr");
    expG_adr.textContent=document.querySelector('.inpt-employeur-experience').value+","+document.querySelector(".inpt-ville").value;

    const expG_desc = document.createElement("p");
    expG_desc.classList.add("experience-description");
    expG_desc.textContent=document.querySelector(".inpt-description-experience").value;

    expG_info.appendChild(expG_adr);
    expG_info.appendChild(expG_desc);

    expG_s_e.appendChild(expG_b_f_l);
    expG_s_e.appendChild(expG_info);

    //up good 

    expG.appendChild(expG_s_e);

    document.querySelector(".experience-box").appendChild(expG);

}

function addFormation() {
    const title=document.querySelector('.formation-title');
    title.classList.add('active');

    const titled=document.querySelector('.diplome-line');
    titled.classList.add('active');

   const selectedDip=document.querySelector(".list-diplome");
   const diplome_cv_view=document.querySelector(".put-diplome");

if(selectedDip.value=="BIS"){
    diplome_cv_view.innerHTML="Business information system .";
}else if(selectedDip.value=="BI"){
    diplome_cv_view.innerHTML="Business Inteligence .";
}else if(selectedDip.value=="accounting"){
    diplome_cv_view.innerHTML="Accounting.";
}else if(selectedDip.value=="digital marketing"){
    diplome_cv_view.innerHTML="Digital Marketing.";
}else if(selectedDip.value=="security information system"){
    diplome_cv_view.innerHTML="Security Information System .";
}
}
function addCompetence(){
    const title=document.querySelector('.competence-box');
    title.classList.add('active');

    const selectList = document.querySelector('.list-skills');
    const skillsList = document.querySelector('.list-skills-show');
    
    // clear the skills list
    skillsList.innerHTML = ''; 
    
    const selectedOptions = Array.from(selectList.selectedOptions); 
    selectedOptions.forEach(option => {
        const skillItem = document.createElement('li'); 
        skillItem.textContent = option.textContent; 
        skillsList.appendChild(skillItem); 
    });    
}
function addLangue(){
    const title=document.querySelector('.langue-box');
    title.classList.add('active');

    const selectList = document.querySelector('.list-langue');
    const skillsList = document.querySelector('.list-langue-show');
    
    // clear the skills list
    skillsList.innerHTML = ''; 
    
    const selectedOptions = Array.from(selectList.selectedOptions); 
    selectedOptions.forEach(option => {
        const skillItem = document.createElement('li'); 
        skillItem.textContent = option.textContent; 
        skillsList.appendChild(skillItem); 
    });      
}

    

function addStages() {
    const title=document.querySelector('.stage-title');
    title.classList.add('active');

    experience=document.querySelector(".single-stage");

    // Check if the element exists
    if (experience) {
        // If the element exists, toggle its display style property
            experience.style.display = (experience.style.display === 'none') ? '' : 'none';
    } else {
    // If the element doesn't exist, create it and add it to the container
     // create the new element
        const experience = document.createElement("div");
        experience.classList.add("single-stage");

    // add the HTML content to the new element
    experience.innerHTML = `
        <div class="poste flex-box"><label for="">Poste</label><input type="text" name="inpt-post-stage" class="inpt-post-stage"></div>
        <div class="employeur flex-box"><label for="">Employeur</label><input type="text" name="inpt-employeur" class="inpt-employeur-stage input-2"></div>
        <div class="ville flex-box"><label for="">Ville</label><input type="text" name="inpt-ville" class="inpt-ville-stage input-3"></div>
        <div class="start-date flex-box"><label for="">Date de début</label><input type="month" class="inpt-start-date-stage" name=""min="1950-01" value=""></div>
        <div class="end-date flex-box"><label for="">Date de fin</label><input type="month" class="inpt-end-date-stage" name=""min="1950-01" value=""></div>
        <div class="description flex-box"><label for="">Description</label><textarea name="" id="" cols="30" rows="10" class="inpt-description-stage"></textarea></div>
        <div class="btn-save"><button class="btn-save-stage">Save</button></div>
    `;

    // add event listener to the "Save" button
    const saveButton = experience.querySelector(".btn-save-stage");
    saveButton.addEventListener("click", saveStage);

    // append the new element to the container element
    const container = document.querySelector("#stage-container");
    container.appendChild(experience);
}
    }
    function saveStage(event) {
    // get the input values from the parent element
    const parent = event.target.closest(".single-stage");
    const poste = parent.querySelector(".inpt-post-stage").value;
    const employeur = parent.querySelector(".inpt-employeur-stage").value;
    const ville = parent.querySelector(".inpt-ville-stage").value;
    const start_date=parent.querySelector(".inpt-start-date-stage").value;
    const end_date=parent.querySelector(".inpt-end-date-stage").value;
    const description=parent.querySelector(".inpt-description-stage").value;

    // add the input values to a table 
    
    const table = {
        poste_t: poste,
        employeur_t: employeur,
        ville_t: ville,
        start_date_t:start_date,
        end_date_t:end_date,
        description_t:description
    };

    //print table in console
    console.table(table);

    // create the new "saved" element
    const saved = document.createElement("div");
    saved.classList.add("saved-box-stage");
    saved.innerHTML = `
    <span class="saved-exp-label-2">${poste}</span>
    <p class="saved-exp-emp-ville-2">${employeur}, ${ville}</p>
    <button>Modify</button>
    `;

    // append the new "saved" element to the container element
    const container = document.querySelector("#saved-stage-container");
    container.insertBefore(saved, container.firstChild);

    ////////////////////////////////////////////////////////////////////////////////////////////////////

    // from experience editor to cv view
    const expG = document.createElement("div");
    expG.classList.add("stage-cv-view");

    const expG_s_e = document.createElement("div");
    expG_s_e.classList.add("single-stage-cv-view");

    const expG_b_f_l = document.createElement("div");
    expG_b_f_l.classList.add("first-line-stage-cv-view");

    const expG_n = document.createElement("div");
    expG_n.classList.add("stage-name");
    expG_n.textContent=document.querySelector(".inpt-post-stage").value;

    const expG_d = document.createElement("div");
    expG_d.classList.add("stage-date");
    expG_d.textContent="de "+document.querySelector(".inpt-start-date-stage").value+" à "+document.querySelector(".inpt-end-date-stage").value;

    expG_b_f_l.appendChild(expG_n);
    expG_b_f_l.appendChild(expG_d);

    const expG_info = document.createElement("div");
    expG_info.classList.add("stage-infos");

    const expG_adr = document.createElement("p");
    expG_adr.classList.add("stage-eta-addr");
    expG_adr.textContent=document.querySelector('.inpt-employeur-stage').value+","+document.querySelector(".inpt-ville-stage").value;

    const expG_desc = document.createElement("p");
    expG_desc.classList.add("stage-description");
    expG_desc.textContent=document.querySelector(".inpt-description-stage").value;

    expG_info.appendChild(expG_adr);
    expG_info.appendChild(expG_desc);

    expG_s_e.appendChild(expG_b_f_l);
    expG_s_e.appendChild(expG_info);

    expG.appendChild(expG_s_e);

    document.querySelector(".stage-box").appendChild(expG);
}

//change img of cv
function previewImage(event, previewClass) {
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.onload = function() {
    const preview = document.querySelector('.' + previewClass);
    preview2=document.querySelector(".preview2");
    preview.src = reader.result;
    preview2.src=reader.result;
    }
    reader.readAsDataURL(file);
}

//get info per and display in cv view
function addInfoPer() {
    const title=document.querySelector('.info-perso-cv-view');
    title.classList.add('active');

    
    
    const linkedin_info = document.querySelector(".linkedin-account-name");
    const src_info_linkedin = document.querySelector(".linkedin");
    linkedin_info.textContent = src_info_linkedin.value;
  }
  

//add informations in cv view
function addInfoPer_up_cv_view() {
    const full_name = document.querySelector('.inpt-prenom').value + " " + document.querySelector('.inpt-nom').value;
    const title_profile_value = document.querySelector('.title-profile').value;
    const email = document.querySelector('.addr').value;
    const tel = document.querySelector('.num-tel').value;
    const ville = document.querySelector('.ville').value;

    document.querySelector('.full-name').textContent = full_name;
    document.querySelector('.title-profile-value').textContent = title_profile_value;
    document.querySelector('.addr-view').textContent = email;
    document.querySelector('.num-tel-show').textContent = tel;
    document.querySelector('.ville-view').textContent = ville;


    
     //appel function of info per down right block
    addInfoPer()
}


//add event send to cv view
const btnSendInfos = document.querySelector('.btn-send-infos');
btnSendInfos.addEventListener('click', addInfoPer_up_cv_view);



function addProfile(){
    const title=document.querySelector('.profile-title');
    title.classList.add('active');
    

const profile_desc=document.querySelector(".profile-description");
const desc_editor=document.querySelector(".description-profile");
    
profile_desc.textContent=desc_editor.value;
}




// add hidden block
function addCertificat() {
    const title=document.querySelector('.certificat-title');
    title.classList.add('active');

    const titled=document.querySelector('.universite-line');
    titled.classList.add('active');

    const selectedDip=document.querySelector(".list-universite");
    const diplome_cv_view=document.querySelector(".put-universite");
 
 if(selectedDip.value=="isg tunis"){
     diplome_cv_view.innerHTML="ISG Tunis.";
 }else if(selectedDip.value=="iset nabeul"){
     diplome_cv_view.innerHTML="ISET NABEUL .";
 }else if(selectedDip.value=="esen"){
     diplome_cv_view.innerHTML="ESEN MANOUBA";
 }else if(selectedDip.value=="iscae"){
     diplome_cv_view.innerHTML="ISCAE.";
 }else if(selectedDip.value=="insat"){
     diplome_cv_view.innerHTML="INSAT .";
 }else if(selectedDip.value=="FST"){
    diplome_cv_view.innerHTML="FST.";
}else if(selectedDip.value=="ENSI"){
    diplome_cv_view.innerHTML="ENSI .";
}
 }


function addInteret(){
    const title=document.querySelector('.interet-box');
    title.classList.add('active');
    
    var container = document.querySelector(".interet-cv-view");
    const container_G = document.querySelector('.interet-box');


    if (container === null || container === undefined) {
       // Create the new div element with class "profile"
        const interetDiv = document.createElement('div');
        interetDiv.classList.add('interet-cv-view');

        // Create the new p element with class "profile-title" and text content "Profile"
        const titleI = document.createElement('p');
        titleI.classList.add('langue-title');

        titleI.textContent = 'interet';

        // Create the new p element with class "profile-title" and text content "Profile"
        const list = document.createElement('ul');
        list.classList.add('interet-list');
        
        var newItem = document.createElement("li");
        newItem.textContent =  document.querySelector('.inpt-interet').value;
        list.appendChild(newItem);

        newItem.style.color="white";

        interetDiv.appendChild(titleI);
        interetDiv.appendChild(list);
    
        container_G.appendChild(interetDiv);
        document.querySelector('.inpt-interet').value="";

    } else {

            var list = document.querySelector(".interet-list");
            var newItem = document.createElement("li");
            newItem.textContent = document.querySelector('.inpt-interet').value;
            list.appendChild(newItem);;
            newItem.style.color="white";
            document.querySelector('.inpt-interet').value="";
    }
}

// this code for button view of all boxes
// Get all the open-key buttons
const openKeyButtons = document.querySelectorAll(".open-key");

// Add a click event listener to each button
openKeyButtons.forEach((button) => {
button.addEventListener("click", () => {
    // Find the corresponding hidden-box element
    const hiddenBox = button.parentNode.nextElementSibling;

    // Toggle the visibility of the hidden-box element
    hiddenBox.classList.toggle("hidden-box");
});
});

// or cv view formation 
/////////////////////////////////////////////////////////////////////////////
    // from experience editor to cv view
    // const expG = document.createElement("div");
    // expG.classList.add("formation-cv-view");

    // const expG_t = document.createElement("p");
    // expG_t.classList.add("formation-title");
    // expG_t.textContent="formation";

    // const expG_s_e = document.createElement("div");
    // expG_s_e.classList.add("single-formation-cv-view");

    // const expG_b_f_l = document.createElement("div");
    // expG_b_f_l.classList.add("first-line-formation-cv-view");

    // const expG_n = document.createElement("div");
    // expG_n.classList.add("formation-name");
    // expG_n.textContent=document.querySelector(".inpt-formation").value;

    // const expG_d = document.createElement("div");
    // expG_d.classList.add("formation-date");
    // expG_d.textContent="de "+document.querySelector(".inpt-start-date").value+" à "+document.querySelector(".inpt-end-date").value;

    // expG_b_f_l.appendChild(expG_d);
    // expG_b_f_l.appendChild(expG_n);

    // const expG_info = document.createElement("div");
    // expG_info.classList.add("formation-infos");
    

    // const expG_adr = document.createElement("p");
    // expG_adr.classList.add("formation-eta-addr");
    // expG_adr.textContent=document.querySelector('.inpt-etablissement').value+","+document.querySelector(".inpt-ville").value;

    // const expG_desc = document.createElement("p");
    // expG_desc.classList.add("formation-description");
    // expG_desc.textContent=document.querySelector(".inpt-description-formation").value;

    // expG_info.appendChild(expG_adr);
    // expG_info.appendChild(expG_desc);

    // expG_s_e.appendChild(expG_b_f_l);
    // expG_s_e.appendChild(expG_info);

    // expG.appendChild(expG_t);
    // expG.appendChild(expG_s_e);

    // document.querySelector(".formation-box").appendChild(expG);
// function addInfoPer(){
//     // Select the container element
//     const container = document.querySelector('.info-perso');

//     // Create the new div element with class "profile"
//     const infoDiv = document.createElement('div');
//     infoDiv.classList.add('info-perso-cv-view');

//     // Create the new p element with class "profile-title" and text content "Profile"
//     const titleInfo = document.createElement('p');
//     titleInfo.classList.add('infos-perso-title');
//     titleInfo.textContent = 'informations personnelles';

//     // Create the new p element with class "profile-title" and text content "Profile"
//     const titleI = document.createElement('p');
//     titleI.classList.add('infos-perso-name');
//     titleI.textContent = 'Linkedin';

//     // Create the new p element with class "profile-title" and text content "Profile"
//     const titleIAddr = document.createElement('p');
//     titleIAddr.classList.add('infos-perso-adr');
//     titleIAddr.textContent = 'hdhirinassim';

    
//     infoDiv.appendChild(titleInfo);
//     infoDiv.appendChild(titleI);
//     infoDiv.appendChild(titleIAddr);

//     container.appendChild(infoDiv);
// }

// function addInfoPer(){
//     // Select the container element
//     const container = document.querySelector('.info-perso');

//     // Create the new div element with class "profile"
//     const infoDiv = document.createElement('div');
//     infoDiv.classList.add('info-perso-cv-view');

//     // Create the new p element with class "profile-title" and text content "Profile"
//     const titleInfo = document.createElement('p');
//     titleInfo.classList.add('infos-perso-title');
//     titleInfo.textContent = 'informations personnelles';

//     // Create the new p element with class "profile-title" and text content "Profile"
//     const titleI = document.createElement('p');
//     titleI.classList.add('infos-perso-name');
//     titleI.textContent = 'Linkedin';

//     // Create the new p element with class "profile-title" and text content "Profile"
//     const titleIAddr = document.createElement('p');
//     titleIAddr.classList.add('infos-perso-adr');
//     titleIAddr.textContent = 'hdhirinassim';

    
//     infoDiv.appendChild(titleInfo);
//     infoDiv.appendChild(titleI);
//     infoDiv.appendChild(titleIAddr);

//     container.appendChild(infoDiv);
// }