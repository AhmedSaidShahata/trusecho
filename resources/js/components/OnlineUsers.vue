<template>
    <div class="pull-right">
        <div class="green" v-if="checkUser()"></div>
        <div class="red" v-else></div>
    </div>
</template>

<script>
export default {
    props: ["friend", "onlineusers"],
    methods: {
        checkUser: function() {



            return _.find(this.onlineusers, { id: this.friend.id });
        }
    }
};
</script>

<style scoped>
.green {
    border-radius: 50%;
    background: chartreuse;
    width: 10px;
    height: 10px;
}

.red {
    border-radius: 50%;
    background: red;
    width: 10px;
    height: 10px;
}
</style>
