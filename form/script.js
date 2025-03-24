let testimonials = [];
let currentIndex = 0;

async function fetchTestimonials() {
    const response = await fetch("get_testimonials.php");
    testimonials = await response.json();
    updateSlide();
}

function getStarRating(rating) {
    let stars = "";
    for (let i = 1; i <= 5; i++) {
        stars += i <= rating ? "★" : "☆";
    }
    return `<span class="stars">${stars}</span>`;
}

function updateSlide() {
    const slider = document.getElementById("testimonial-slider");
    slider.innerHTML = "";

    testimonials.forEach((testimonial, index) => {
        const slide = document.createElement("div");
        slide.classList.add("testimonial-item");
        slide.innerHTML = `
            <p class="feedback">"${testimonial.feedback}"</p>
            <p class="stars">${getStarRating(testimonial.rating)}</p>
            <p class="name">- ${testimonial.name}</p>
        `;
        slide.style.display = index === currentIndex ? "block" : "none";
        slider.appendChild(slide);
    });
}

function changeSlide(direction) {
    currentIndex += direction;
    if (currentIndex >= testimonials.length) currentIndex = 0;
    if (currentIndex < 0) currentIndex = testimonials.length - 1;
    updateSlide();
}

// Auto-slide every 5 seconds
setInterval(() => changeSlide(1), 5000);

document.addEventListener("DOMContentLoaded", fetchTestimonials);
