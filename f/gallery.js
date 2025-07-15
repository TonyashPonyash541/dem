let currentIndex = 0; 

function changeSlide(direction) { 
    const items = document.querySelectorAll('.gallery-item'); 
    currentIndex += direction; 

    if (currentIndex >= items.length) { 
        currentIndex = 0; // Возвращаемся к первому элементу 
    } else if (currentIndex < 0) { 
        currentIndex = items.length - 1; // Переход к последнему элементу 
    } 

    items.forEach((item, index) => { 
        item.style.transform = `translateX(${-currentIndex * 100}%)`; // Используем обратные кавычки 
    }); 
}

// Пример добавления обработчиков событий для кнопок
document.querySelector('.carousel-prev').addEventListener('click', () => changeSlide(-1));
document.querySelector('.carousel-next').addEventListener('click', () => changeSlide(1));