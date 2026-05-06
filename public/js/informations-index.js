const slider = document.querySelector(".scroll-container");

let isDown = false;
let startX = 0;
let scrollLeft = 0;

slider.addEventListener("mousedown", (e) => {
  isDown = true;
  slider.classList.add("active");

  startX = e.pageX;
  scrollLeft = slider.scrollLeft;
});

document.addEventListener("mouseup", () => {
  isDown = false;
  slider.classList.remove("active");
});

slider.addEventListener("mousemove", (e) => {
  if (!isDown) return;

  e.preventDefault();

  const walk = e.pageX - startX;
  slider.scrollLeft = scrollLeft - walk;
});
