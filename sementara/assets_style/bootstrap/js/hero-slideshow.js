// hero-slideshow.js

// Pastikan DOM sudah siap
document.addEventListener('DOMContentLoaded', function () {
    const heroBg = document.querySelector('.hero-bg');

    if (!heroBg) return; // jika tidak ada hero-bg, hentikan

    // Daftar gambar background (path relatif)
    const images = [
        'assets/img/hero1.jpg',
        'assets/img/hero2.JPG',
        'assets/img/hero3.JPG',
        'assets/img/hero4.JPG',
        'assets/img/hero5.JPG'
    ];

    let current = 0;

    function changeBackground() {
        // Fade out
        heroBg.style.opacity = 0;

        setTimeout(() => {
            // Ganti background
            heroBg.style.backgroundImage = `url('${images[current]}')`;
            // Fade in
            heroBg.style.opacity = 1;

            // Update index
            current = (current + 1) % images.length;
        }, 1000); // durasi fade out
    }

    // Inisialisasi background pertama
    heroBg.style.backgroundImage = `url('${images[0]}')`;
    heroBg.style.opacity = 1;

    // Ganti setiap 5 detik
    setInterval(changeBackground, 5000);
});
