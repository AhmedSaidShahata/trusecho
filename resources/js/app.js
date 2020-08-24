require('./bootstrap');

Echo.private('chat-private.'+localStorage.getItem('uID'))
    .listen('.chatting', (e) => {
        console.log(e);
    });
