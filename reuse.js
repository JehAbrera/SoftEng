const navbar = document.querySelector('.nav-wrapper');
window.onscroll = () => {
    if (window.scrollY > 50) {
        navbar.classList.add('nav-scrolled');
    } else {
        navbar.classList.remove('nav-scrolled');
    }
};

function triggerSideNav() {
    const side = document.querySelector('.nav-content');
    if (side.className === "nav-content") {
        side.className += " responsive";
      } else {  
        side.className = "nav-content";
      }
}

const login = document.getElementById('login');
const openLogin = () => {
    if (login.style.display == "none" || login.style.display == "") {
        login.style.display = "block"
        document.body.style.height = "100%";
        document.body.style.overflow = "hidden";
    } else {
        login.style.display = "none"
        document.body.style.height = "auto";
        document.body.style.overflow = "unset";
    }
}