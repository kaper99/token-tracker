import './bootstrap';
import '../../vendor/masmerise/livewire-toaster/resources/js';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();
