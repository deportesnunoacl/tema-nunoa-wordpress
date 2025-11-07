document.addEventListener("DOMContentLoaded", () => {
  const items = document.querySelectorAll(".faq-item");

  items.forEach((item) => {
    item.addEventListener("click", () => {
      const content = item.nextElementSibling;
      const icon = item.querySelector("svg");

      // Cierra los demás
      document.querySelectorAll(".faq-content").forEach((c) => {
        if (c !== content) c.classList.add("hidden");
      });
      document.querySelectorAll(".faq-item svg").forEach((i) => {
        if (i !== icon) i.classList.remove("rotate-180");
      });

      // Alternar el actual
      content.classList.toggle("hidden");
      icon.classList.toggle("rotate-180");
    });
  });
});
