import './bootstrap';
import * as bootstrap from 'bootstrap';
import '@fortawesome/fontawesome-free';
import 'toastr/build/toastr.min.js';

// AUTH
import './auth/login';
import './auth/register.js';

import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    encrypted: true,
});

// Ön uçta bildirimleri dinlemek için kodunuzu buraya ekleyin
// Örneğin:
window.Echo.channel('notifications.' + userId)
    .listen('.notification-sent', (notification) => {
        // Bildirimi kullanıcı arayüzünde gösterin
        console.log(notification);
    });
