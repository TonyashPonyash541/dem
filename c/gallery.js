document.addEventListener('DOMContentLoaded', function() {
    const slider = document.querySelector('.gallery-slider');
    if (!slider) return;
    
    const container = slider.querySelector('.slider-container');
    const slides = slider.querySelectorAll('.slide');
    const prevBtn = slider.querySelector('.slider-prev');
    const nextBtn = slider.querySelector('.slider-next');
    
    let currentIndex = 0;
    const slideCount = slides.length;
    
    function updateSlider() {
        container.style.transform = `translateX(-${currentIndex * 100}%)`;
    }
    
    function goToPrevSlide() {
        currentIndex = (currentIndex > 0) ? currentIndex - 1 : slideCount - 1;
        updateSlider();
    }
    
    function goToNextSlide() {
        currentIndex = (currentIndex < slideCount - 1) ? currentIndex + 1 : 0;
        updateSlider();
    }
    
    if (prevBtn && nextBtn) {
        prevBtn.addEventListener('click', goToPrevSlide);
        nextBtn.addEventListener('click', goToNextSlide);
    }
    
    // Добавляем обработчики для клавиатуры
    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowLeft') {
            goToPrevSlide();
        } else if (e.key === 'ArrowRight') {
            goToNextSlide();
        }
    });
    
    // Инициализация
    if (slideCount > 0) {
        updateSlider();
    }
});