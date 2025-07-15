
document.addEventListener('DOMContentLoaded', function() {
    const description = document.getElementById('desc');

    description.addEventListener('mouseenter', function() {
        const tooltip = description.querySelector('.tooltip');
        tooltip.style.display = 'block';
    });

    description.addEventListener('mouseleave', function() {
        const tooltip = description.querySelector('.tooltip');
        tooltip.style.display = 'none';
    });
});
document.querySelector('.search-button').addEventListener('click', function() {
    const searchInput = document.getElementById('search-input');
    searchInput.style.display = searchInput.style.display === 'none' ? 'block' : 'none';
    searchInput.focus(); 
});
document.getElementById('search-input').addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        const query = this.value.toLowerCase();
        const results = [];


        const newsItems = document.querySelectorAll('.news-item');
        newsItems.forEach(item => {
            const title = item.querySelector('h3').textContent.toLowerCase();
            const description = item.querySelector('p').textContent.toLowerCase();
            if (title.includes(query) || description.includes(query)) {
                results.push(`Найдена новость: ${title}`);
            }
        });

      
        if (results.length > 0) {
            alert(results.join('\n'));
        } else {
            alert('Новостей не найдено.');
        }

        this.value = ''; 
        this.style.display = 'none'; 
    }
});
 function toggleAccessibilityPanel() {
            const panel = document.getElementById('accessibilityPanel');
            panel.style.display = panel.style.display === 'block' ? 'none' : 'block';
        }
        
        function toggleHighContrast() {
            document.body.classList.toggle('high-contrast');
        }
        
        function toggleBigText() {
            document.body.classList.toggle('big-text');
        }
        
        function resetAccessibility() {
            document.body.classList.remove('high-contrast', 'big-text');
        }
        
        // Оригинальные функции из вашего кода
        function toggleContent(newsId) {
            const fullContent = document.querySelector(`#${newsId} .full-content`);
            const preview = document.querySelector(`#${newsId} .preview`);
            if (fullContent.style.display === "none") {
                fullContent.style.display = "block";
                preview.style.display = "none";
            } else {
                fullContent.style.display = "none";
                preview.style.display = "block";
            }
        }
