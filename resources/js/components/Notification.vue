<template>

 <p>
                            <a  v-for="(notification,index) in notifications" :key="index">
                                some one commented on
                               <span style="width:100%"  v-on:click="markAsRead(notification)">
                                   {{ JSON.parse(notification.data).blog.title }}
                                </span>

                                Blog
                            </a>

                             <a v-if="notifications.length==0">
                                No New Notifications
                            </a>
 </p>
</template>

<script>
export default {

props:['notifications'],
methods:{
    markAsRead:function(notification){

        var data = {
            id:notification.id
        }

        axios.post('/notification/read',data).then(response=>{

            window.location.href='/en/blogs/'+JSON.parse(notification.data).blog.id
        })
    }
}
};
</script>

<style scoped>

</style>
