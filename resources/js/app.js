import 'preline';
import './bootstrap';

document.addEventListener('livewire:load', () => {
    window.HSStaticMethods.autoInit();
});

document.addEventListener('livewire:navigated', () => {
    window.HSStaticMethods.autoInit();
});

