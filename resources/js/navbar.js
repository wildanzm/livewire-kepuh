window.addEventListener("scroll", () => {
    const navbar = document.getElementById("navbar");
    const loginButton = document.getElementById("loginButton");
    const registerButton = document.getElementById("registerButton");
    navbar.classList.add("bg-white", "text-black", "shadow-md");
    navbar.classList.remove("text-white");
    loginButton.classList.add(
        "bg-sky-600",
        "text-white",
        "hover:border-sky-600"
    );
    registerButton.classList.add("border-sky-600", "border-2");
    // if (window.scrollY > 0) {
    // navbar.classList.add("bg-white", "text-black", "shadow-md");
    // navbar.classList.remove("text-white");
    // loginButton.classList.add(
    //     "bg-sky-600",
    //     "text-white",
    //     "hover:border-sky-600"
    // );
    // registerButton.classList.add("border-sky-600", "border-2");
    // }
    // else {
    //     navbar.classList.add("text-white");
    //     navbar.classList.remove("bg-white", "shadow-md");
    //     loginButton.classList.remove("bg-sky-600", "text-white");
    //     registerButton.classList.remove("border-sky-600");
    // }
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
