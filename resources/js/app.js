import './bootstrap';
import 'flowbite';
import collapse from "@alpinejs/collapse";
import anchor from "@alpinejs/anchor";
import Alpine from 'alpinejs';

// Menginisialisasi Alpine dan plugin hanya sekali
window.Alpine = Alpine;

// Menambahkan plugin collapse dan anchor
Alpine.plugin(collapse);
Alpine.plugin(anchor);

// Jika ada plugin lain yang perlu di-load secara dinamis
const modules = import.meta.glob("./plugins/**/*.js", { eager: true });
for (const path in modules) {
    Alpine.plugin(modules[path].default);
}

// Memulai Alpine
Alpine.start();
