// Inicializar AOS
AOS.init();

// Cambiar estilo del header al hacer scroll
window.addEventListener("scroll", function () {
  const header = document.getElementById("mainHeader");
  if (window.scrollY > 100) {
    header.classList.add("scrolled");
  } else {
    header.classList.remove("scrolled");
  }
});


// Cambia el fondo del navbar al hacer scroll
window.addEventListener('scroll', function () {
  const navbar = document.getElementById('navbar');
  navbar.classList.toggle('scrolled', window.scrollY > 100);
});

// AOS Init
AOS.init();

// Swiper para Cultura
const swiper = new Swiper(".mySwiper", {
  loop: true,
  spaceBetween: 30,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  slidesPerView: 1,
  breakpoints: {
    768: { slidesPerView: 2 },
    992: { slidesPerView: 3 }
  }
});

// Swiper para sección Turismo
const turismoSwiper = new Swiper(".turismoSwiper", {
  loop: true,
  autoplay: {
    delay: 2800,
    disableOnInteraction: false,
  },
  spaceBetween: 20,
  slidesPerView: 1,
  breakpoints: {
    768: { slidesPerView: 2 },
    992: { slidesPerView: 3 }
  }
});

// Swiper para sección Hoteles
const hotelesSwiper = new Swiper(".hotelesSwiper", {
  loop: true,
  spaceBetween: 30,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  slidesPerView: 1,
  breakpoints: {
    768: { slidesPerView: 2 },
    992: { slidesPerView: 3 }
  }
});

