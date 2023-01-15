<template>
    <p>chatting with user {{ chatId }}</p>
    <ChatMessage
        v-for="message in messages"
        :key="message.id"
        :message="message"
    />
</template>

<script>
    import ChatMessage from "./ChatMessage.vue"

    export default{
        props:{
            chatId:{
                type:Number,
                required:true

            },
            messages:{
                type: Array,
                required:true
            }
        },
        components:{
            ChatMessage
        }

    }

</script>
