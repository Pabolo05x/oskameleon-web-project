// 1. Mobile Menu
const btn = document.getElementById('mobile-menu-btn');
const menu = document.getElementById('mobile-menu');

if (btn && menu) {
    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
    menu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            menu.classList.add('hidden');
        });
    });
}

// 2. Navbar Scroll Effect
window.addEventListener('scroll', () => {
    const navbar = document.getElementById('navbar');
    if (navbar) {
        if (window.scrollY > 20) {
            navbar.classList.add('shadow-lg');
        } else {
            navbar.classList.remove('shadow-lg');
        }
    }
});

// 3. Reviews Slider
document.addEventListener('DOMContentLoaded', () => {
    const track = document.getElementById('reviewsTrack');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    
    if (track && prevBtn && nextBtn) {
        const cards = track.children;
        let currentIndex = 0;
        
        function getVisibleCards() {
            if (window.innerWidth >= 1024) return 3;
            if (window.innerWidth >= 768) return 2;
            return 1;
        }

        function updateSlider() {
            const visibleCards = getVisibleCards();
            const gap = 24; 
            const maxIndex = cards.length - visibleCards;
            
            if (currentIndex > maxIndex) currentIndex = maxIndex;
            if (currentIndex < 0) currentIndex = 0;

            const cardElementWidth = cards[0].offsetWidth;
            const totalMove = (cardElementWidth + gap) * currentIndex;
            
            track.style.transform = `translateX(-${totalMove}px)`;
            
            prevBtn.style.opacity = currentIndex === 0 ? '0.5' : '1';
            nextBtn.style.opacity = currentIndex === maxIndex ? '0.5' : '1';
        }

        nextBtn.addEventListener('click', () => {
            const visibleCards = getVisibleCards();
            if (currentIndex < cards.length - visibleCards) {
                currentIndex++;
                updateSlider();
            }
        });

        prevBtn.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                updateSlider();
            }
        });

        // Swipe (Dotyk)
        let touchStartX = 0;
        let touchEndX = 0;

        track.addEventListener('touchstart', e => {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });

        track.addEventListener('touchend', e => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        }, { passive: true });

        function handleSwipe() {
            const threshold = 50;
            const visibleCards = getVisibleCards();
            const maxIndex = cards.length - visibleCards;

            if (touchEndX < touchStartX - threshold && currentIndex < maxIndex) {
                currentIndex++;
                updateSlider();
            }
            if (touchEndX > touchStartX + threshold && currentIndex > 0) {
                currentIndex--;
                updateSlider();
            }
        }

        window.addEventListener('resize', () => {
            currentIndex = 0;
            updateSlider();
        });
        
        updateSlider();
    }
    
    // Read More Logic
    document.querySelectorAll('.review-text').forEach(textDiv => {
        const fullText = textDiv.getAttribute('data-full-text');
        if (fullText) {
            textDiv.innerHTML = '';
            const shortText = fullText.substring(0, 100) + '... ';
            const textSpan = document.createElement('span');
            textSpan.textContent = shortText;
            const toggleBtn = document.createElement('button');
            toggleBtn.textContent = 'Czytaj więcej';
            toggleBtn.className = 'text-blue-400 font-bold hover:text-blue-300 text-xs ml-1';
            
            let isExpanded = false;
            toggleBtn.addEventListener('click', () => {
                isExpanded = !isExpanded;
                textSpan.textContent = isExpanded ? fullText + ' ' : shortText;
                toggleBtn.textContent = isExpanded ? 'Zwiń' : 'Czytaj więcej';
            });
            textDiv.appendChild(textSpan);
            textDiv.appendChild(toggleBtn);
        }
    });
});

// 4. SCROLL REVEAL ANIMATION
const observerOptions = {
    root: null,
    threshold: 0.15,
    rootMargin: "0px"
};

const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('active');
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

document.addEventListener('DOMContentLoaded', () => {
    const revealElements = document.querySelectorAll('.reveal');
    revealElements.forEach(el => observer.observe(el));
});

// 5. LOGIKA WYBORU KURSU (LocalStorage)
function prefillMessage(courseValue) {
    // Zapisujemy wybrany kurs w pamięci
    localStorage.setItem('selectedCourse', courseValue);
    // Przekierowanie
    window.location.href = 'index.html#kontakt';
}

document.addEventListener('DOMContentLoaded', () => {
    const savedCourse = localStorage.getItem('selectedCourse');
    const courseSelect = document.getElementById('course');
    
    if (savedCourse && courseSelect) {
        // Ustawiamy wartość selecta
        courseSelect.value = savedCourse;
        
        // Czyścimy pamięć
        localStorage.removeItem('selectedCourse');
        
        // Przewijamy do formularza
        setTimeout(() => {
            const kontaktSection = document.getElementById('kontakt');
            if (kontaktSection) {
                kontaktSection.scrollIntoView({ behavior: 'smooth' });
            }
        }, 300); // Dałem lekkie opóźnienie, żeby strona zdążyła się załadować
    }
});

// 6. OBSŁUGA FORMULARZA (NAPRAWIONA DLA MOBILE)
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contactForm');
    const successMessage = document.getElementById('successMessage');
    const submitBtn = document.getElementById('submitBtn');

    if (form && successMessage && submitBtn) {
        submitBtn.addEventListener('click', function(e) {
            
            // Walidacja pól
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            // Start wysyłania - wizualny feedback
            const originalBtnText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<span>Wysyłanie...</span> <i class="fas fa-spinner fa-spin"></i>';
            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-75', 'cursor-not-allowed');

            fetch(form.action, {
                method: 'POST',
                body: new FormData(form),
                headers: {
                    'Accept': 'application/json'
                }
            })
            .then(response => {
                if (response.ok) {
                    // SUKCES: Ukrywamy formularz i pokazujemy komunikat
                    // Używamy klasy hidden zamiast styli inline dla pewności
                    form.classList.add('hidden');
                    successMessage.classList.remove('hidden');
                    
                    form.reset(); 
                } else {
                    // BŁĄD
                    return response.json().then(data => {
                        throw new Error(data.message || 'Błąd serwera');
                    });
                }
            })
            .catch(error => {
                console.error("Błąd:", error);
                alert("Wystąpił problem z wysłaniem. Sprawdź internet i spróbuj ponownie.");
                
                // Reset przycisku w razie błędu
                submitBtn.innerHTML = originalBtnText;
                submitBtn.disabled = false;
                submitBtn.classList.remove('opacity-75', 'cursor-not-allowed');
            });
        });
    }
});