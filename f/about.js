let currentIndex = 0;
const members = document.querySelector('.members');
        const totalMembers = document.querySelectorAll('.member').length;

        function moveSlide(direction) {
            currentIndex += direction;

            if (currentIndex < 0) {
                currentIndex = totalMembers - 1;
            } else if (currentIndex >= totalMembers) {
                currentIndex = 0;
            }

            const offset = -currentIndex * 320; // 320 - ширина .member + отступ
            members.style.transform = `translateX(${offset}px)`; // Исправлено
        }
   