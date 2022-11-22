const body = document.querySelector("body"),
    modeToggle = body.querySelector(".mode-toggle");
sidebar = body.querySelector("nav");
sidebarToggle = body.querySelector(".sidebar-toggle");

const form = document.querySelector("form"),
    fileInput = form.querySelector(".file-input"),
    progressArea = document.querySelector(".progress-area"),
    uploadedArea = document.querySelector(".uploaded-area");

form.addEventListener("click", () => {
    fileInput.click();
});

fileInput.onchange = ({target})=>{
    let file = target.files[0];
    if(file){
      let fileName = file.name;
      uploadFile(fileName);
    }
  }

  function uploadFile(name) {
    
  }

modeToggle.addEventListener("click", () => {
    body.classList.toggle("dark");
});

sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
});

// document.querySelector(".btntambah").addEventListener("click", function () {
//     document.querySelector(".popup").classList.add("active");
// });

// document.querySelector(".kembali-btn").addEventListener("click", function () {
//     document.querySelector(".popup").classList.remove("active");
// });

// $(window).load(function () {
//     $('#exampleModal').modal('show');
// });