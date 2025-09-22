window.addEventListener("scroll", () => {
  const header = document.querySelector("header");
  if (window.scrollY > 50) {
    header.style.background = "#111827";
    header.style.transition = "0.3s";
  }else {
    header.style.background = "#1e3a8a";
  }
});