# 🚗 OSKameleon - Driving School Website

Kompleksowy projekt strony internetowej dla szkoły jazdy OSKameleon. Projekt łączy estetyczny frontend z praktycznymi rozwiązaniami backendowymi, stawiając na wysoką konwersję i wygodę użytkownika.

## 🚀 Live Demo
[https://sosinskiweb.pl/osk/](https://sosinskiweb.pl/osk/)

## 🛠️ Stack Techniczny
* **Frontend:** HTML5, Tailwind CSS (CDN), JavaScript (Vanilla JS)
* **Backend:** PHP (Automatyzacja galerii zdjęć)
* **Biblioteki:** FontAwesome (ikony), Google Fonts (Inter)
* **Narzędzia:** LocalStorage API, Intersection Observer API (animacje wejścia)

## 🌟 Kluczowe Funkcjonalności

* **Smart Prefill System (Cross-page State Management):** Autorski mechanizm wykorzystujący `localStorage`, który łączy cennik z formularzem zapisu. Gdy użytkownik wybierze konkretną kategorię kursu, system zapamiętuje ten wybór i automatycznie zaznacza odpowiednią opcję w formularzu po przejściu na stronę kontaktu.
    * **Korzyść:** Skrócenie ścieżki zakupowej klienta i realny wpływ na UX.
* **Dynamiczna Galeria (PHP):** Skrypt automatycznie skanujący zasoby serwera i generujący grid zdjęć. Pozwala to na błyskawiczną aktualizację treści bez ingerencji w kod HTML.
* **Scroll Reveal Animations:** Płynne animacje sekcji oparte o `Intersection Observer API`, nadające stronie nowoczesny, dynamiczny charakter.
* **Slider Opinii z obsługą Touch:** Customowe rozwiązanie w czystym JavaScript z pełną obsługą gestów (swipe), zoptymalizowane pod urządzenia mobilne.
* **Responsive Design:** Pełna zgodność z zasadą Mobile First.

## 📁 Struktura Projektu
* `index.html` - Strona główna z kluczowymi sekcjami.
* `galeria.php` - Moduł automatycznego generowania galerii.
* `script.js` - Logika UI/UX (menu, slider, prefill system, animacje).
* `style.css` - Customowe animacje CSS (blobs, pulses) i personalizacja Tailwinda.

---
*Developed by Paweł Sosiński - SosinskiWeb*
