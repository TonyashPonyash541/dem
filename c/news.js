function showContent(contentId) {
    const containers = document.querySelectorAll('.news-container');  
    containers.forEach(container => {
        container.style.display = 'none';  
    });       
    document.getElementById(contentId).style.display = 'block';  

    const buttons = document.querySelectorAll('.content-tabs button');     
    buttons.forEach(button => {
        button.classList.remove('active');     
    });  

    const activeButton = document.querySelector(`.content-tabs button[data-content="${contentId}"]`);  
    activeButton.classList.add('active'); 
}  
function toggleContent(id) {
    var content = document.querySelector(`#${id} .full-content`);
    if (content.style.display === "none") {
        content.style.display = "block";
    } else {
        content.style.display = "none";
    }
}
let currentDate = new Date();

function renderCalendar() {
    const monthYearElement = document.getElementById('month-year');
    monthYearElement.innerText = currentDate.toLocaleString('default', { month: 'long', year: 'numeric' });

    const calendarElement = document.getElementById('calendar');
    calendarElement.innerHTML = ''; // Очищаем предыдущий календарь

    const firstDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
    const lastDay = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);
    
    for (let i = 1; i <= lastDay.getDate(); i++) {
        const dayElement = document.createElement('div');
        dayElement.innerText = i;
        dayElement.classList.add('calendar-day'); // Добавляем класс для стилей
        calendarElement.appendChild(dayElement);
    }
}

function prevMonth() {
    currentDate.setMonth(currentDate.getMonth() - 1);
    renderCalendar();
}

function nextMonth() {
    currentDate.setMonth(currentDate.getMonth() + 1);
    renderCalendar();
}

// Инициализация календаря при загрузке страницы
document.addEventListener('DOMContentLoaded', renderCalendar);