window.addEventListener("scroll", () => {
    const navbar = document.getElementById("navbar");
    if (window.scrollY > 50) {
        navbar.classList.add("bg-white", "text-black", "shadow-md");
        navbar.classList.remove("text-white");
    } else {
        navbar.classList.add("text-white");
        navbar.classList.remove("bg-white", "shadow-md");
    }
});

document.addEventListener("DOMContentLoaded", () => {
    const hamburger = document.getElementById("hamburger");
    const mobileMenu = document.getElementById("mobileMenu");

    hamburger.addEventListener("click", () => {
        mobileMenu.classList.toggle("hidden");
    });

    const links = mobileMenu.querySelectorAll("a");
    links.forEach((link) => {
        link.addEventListener("click", () => {
            mobileMenu.classList.add("hidden");
        });
    });
});
