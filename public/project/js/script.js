// window.addEventListener('DOMContentLoaded', () => {
//   const navBtn = document.querySelector(".nav-btn"),
//     navAside = document.querySelector('.nav__menu')

//   navBtn.addEventListener('click', () => {
//     navAside.classList.toggle('nav_acitve')
//     navAside.classList.toggle('hidden')
//   })
// });

// Navbar

const openNavMenu = document.querySelector(".open-nav-menu");
const closeNavMenu = document.querySelector(".close-nav-menu");
const navMenu = document.querySelector(".nav-menu");
const menuOverlay = document.querySelector(".menu-overlay");
const mediaSize = 1023;

openNavMenu.addEventListener("click", toggleNav);
closeNavMenu.addEventListener("click", toggleNav);
// close the navMenu by clicking outside
menuOverlay.addEventListener("click", toggleNav);

function toggleNav() {
  navMenu.classList.toggle("open");
  menuOverlay.classList.toggle("active");
  document.body.classList.toggle("hidden-scrolling");
}

navMenu.addEventListener("click", (event) => {
  if (
    event.target.hasAttribute("data-toggle") &&
    window.innerWidth <= mediaSize
  ) {
    // prevent default anchor click behavior
    event.preventDefault();
    const menuItemHasChildren = event.target.parentElement;
    // if menuItemHasChildren is already expanded, collapse it
    if (menuItemHasChildren.classList.contains("active")) {
      collapseSubMenu();
    } else {
      // collapse existing expanded menuItemHasChildren
      if (navMenu.querySelector(".menu-item-has-children.active")) {
        collapseSubMenu();
      }
      // expand new menuItemHasChildren
      menuItemHasChildren.classList.add("active");
      const subMenu = menuItemHasChildren.querySelector(".sub-menu");
      subMenu.style.maxHeight = subMenu.scrollHeight + "px";
    }
  }
});
function collapseSubMenu() {
  navMenu
    .querySelector(".menu-item-has-children.active .sub-menu")
    .removeAttribute("style");
  navMenu
    .querySelector(".menu-item-has-children.active")
    .classList.remove("active");
}
function resizeFix() {
  // if navMenu is open ,close it
  if (navMenu.classList.contains("open")) {
    toggleNav();
  }
  // if menuItemHasChildren is expanded , collapse it
  if (navMenu.querySelector(".menu-item-has-children.active")) {
    collapseSubMenu();
  }
}

window.addEventListener("resize", function () {
  if (this.innerWidth > mediaSize) {
    resizeFix();
  }
});

let searchBtn = document.querySelector("#search-btn"),
  searchInp = document.querySelector("#search-input");

searchBtn.addEventListener("click", () => {
  searchInp.classList.toggle("right-0");
});

// paralax
document.addEventListener("mousemove", parallax);
function parallax(e) {
  this.querySelectorAll(".paralax-image").forEach((layer) => {
    const speed = layer.getAttribute("data-speed");

    const x = (window.innerWidth - e.pageX * speed) / 100;

    layer.style.transform = `translateX(${x}px) `;
  });
}
