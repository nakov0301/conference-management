import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


// Echo.channel('talk-processed')
//     .listen('TalkProcessed', (e) => {
//         console.log(e.talk);
//     });
// Echo.private('talk-processed.1')
//     .listen('TalkProcessed', (e) => {
//    console.log(e.talk);
// });
