import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

Echo.private('talk-processed.1')
    .listen('TalkProcessed', (e) => {
   console.log(e.talk);
});
