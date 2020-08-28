<template>
    <div class="pannel-block field d-flex">
        <input
            class="message-input"
            type="text"
            v-on:keyup.enter="sendChat"
            v-on:click="sendChat"
            v-model="chat"
        />

        <input class="message-sbt" type="button" value="send" />
    </div>
</template>

<script>
export default {
    props: ["chats", "userid", "friendid"],
    data() {
        return {
            chat: ""
        };
    },
    methods: {
        sendChat: function(e) {
            if (this.chat != "") {
                var data = {
                    chat: this.chat,
                    friend_id: this.friendid,
                    user_id: this.userid
                };
                this.chat = "";

                axios.post("/chat/sendChat", data).then(response => {
                    this.chats.push(data);
                });
            }
        }
    }
};
</script>

<style>

.pannel-block{
    margin-top: 20px;
}
 .message-sbt {
    width: 15%;
    padding: 2rem 4rem;
    margin-left: auto;
    margin-right: 2rem;
    border-radius: 5rem;
    border: none;
    font-size: 2rem;
    font-weight: 500;
    text-transform: uppercase;
    color: #FFFFFF;
    font-family: inherit;
    background-color: #00A8CC;
    box-shadow: 0 0 3rem rgba(0, 168, 204, 0.3);
    cursor: pointer;
}
 .message-input {
    width: 80%;
    padding: 2rem 4rem;
    margin-left: 2rem;
    font-size: 1.5rem;
    font-weight: 400;
    font-family: inherit;
    color: black;
    border-radius: 5rem;
    border: 0.2rem solid #e2e2e2;
    outline: 0;
}
</style>
