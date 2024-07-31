import './bootstrap';

import Echo from 'laravel-echo';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    encrypted: true
});

window.Echo.channel('comments')
    .listen('CommentPosted', (e) => {
        $('#comments').append('<p>' + e.comment + ' - bởi ' + e.user.name_user  + '</p>');
});

Alpine.start();
