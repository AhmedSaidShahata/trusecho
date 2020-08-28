<template>
    <div class="panel-block">
        <div class="chat" v-if="chats.length != 0">

             <p class="message-rect-sender"></p>

            <div v-for="chat in chats" style="overflow:auto">
                <p class="message-rect-sender" v-if="chat.user_id == userid">
                    {{chat.chat}}
                </p>
                <p class="message-rect-reciever" v-else>
                    {{chat.chat}}
                </p>
            </div>
        </div>

        <div v-else class="no-message">
            there are no message
        </div>
        <chat-composer
        :userid="userid"
        :friendid="friendid"
        :chats="chats"

        ></chat-composer>
    </div>
</template>

<script>
export default {
    props: ["chats",'userid','friendid'],
    mounted() {

    }
};
</script>

<style scoped>



.no-message{
    height: 200px;
    display: flex;
    align-items: center;
}

</style>
