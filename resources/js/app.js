// resources/js/app.js
import './bootstrap';
import { initChatListener } from './chat';

window.loadChatBox = function () {
    console.log('window.loadChatBox dipanggil');
    initChatListener();
};