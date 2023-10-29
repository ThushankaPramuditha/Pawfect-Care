const body = document.querySelector("body"),
      sidebar = body.querySelector("nav"),
      sidebarToggle = body.querySelector(".sidebar-toggle"),
      logoutMode = body.querySelector(".logout-mode"),
      logoImage = body.querySelector(".logo-image img");

let getStatus = localStorage.getItem("status");
if (getStatus && getStatus === "close") {
    sidebar.classList.toggle("close");
    logoutMode.style.display = "none"; // Hide the logout element
    logoImage.style.display = "none"; // Hide the logo image
}

sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    logoutMode.style.display = sidebar.classList.contains("close") ? "none" : "block";
    logoImage.style.display = sidebar.classList.contains("close") ? "none" : "block";
    
    if (sidebar.classList.contains("close")) {
        localStorage.setItem("status", "close");
    } else {
        localStorage.setItem("status", "open");
    }
});
