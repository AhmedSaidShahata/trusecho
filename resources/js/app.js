require('./bootstrap');


window.Vue = require("vue");

Vue.component("chat", () => import("./components/Chat.vue"));
Vue.component("chat-composer", () => import("./components/ChatComposer.vue"));
Vue.component("online-users", () => import("./components/OnlineUsers.vue"));
Vue.component("notification", () => import("./components/Notification.vue"));

const app = new Vue({
    el: "#app",
    data: {
        chats: "",
        onlineUsers:'',
        notifications:''
    },
    created() {

axios.post('/notification/get').then(response=>{
    this.notifications=response.data
})







        const userId = $('meta[name="userId"]').attr("content");
        const friendId = $('meta[name="friendId"]').attr("content");


        if (friendId != undefined) {
            axios.post("/chat/getChat/" + friendId).then(response => {
                this.chats = response.data;
            });



            Echo.private('Chat.'+friendId+'.'+userId).listen('BroadcastChat',(e)=>{

            document.getElementById("chat-sound").play()
                this.chats.push(e.chat)
            });
        }

        if (userId !='null'){
            Echo.join('Online')
            .here((users)=>{
                this.onlineUsers = users
                console.log( this.onlineUsers)
            })
            .joining((user)=>{

                this.onlineUsers.push(user);
                console.log(this.onlineUsers)
            })
            .leaving((user)=>{
                this.onlineUsers = this.onlineUsers.filter((u)=>{
                    u!=user
                })
            })

        }
    }
});
