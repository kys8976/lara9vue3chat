<script>
import ChatUserList from '@/Components/ChatUserList.vue';
import ChatArea from '@/Components/ChatArea.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
//const props = defineProps(['auth_id']);
export default {
    props:{
        auth_id : {
            type:Number,
            required: true
        }
    },
    components:{
        Head,
        AuthenticatedLayout,
        ChatArea,
        ChatUserList
    },
    created(){
            window.Echo.private('chats').listen('MessageSent', e=>{
                if(e.message.to===this.auth_id && e.message.from===this.chatWith){
                    console.log(e);
                    this.messages.push(e.message);
                }
            });

    },
    data(){
        return{
            chatWith:null,
            text:'',
            messages:[]
        }

    },
    methods:{
        updateChatWith(user_id){
            console.log(user_id);
            this.chatWith=user_id;
            this.getMessages();
            //대상으로 채팅 내역 읽어오고   chatWith 상태 변경
        },
        getMessages(){
            axios.get('/api/messages',{
                params:{
                    to: this.chatWith,
                    from:this.auth_id
                }
            }).then(res => {
                console.log(res)
                this.messages=res.data.messages;
            }).catch(error => {
                console.log(error)
            });
        },
        submit() {
            axios.post('/api/messagesData',{
                text:this.text,
                to:this.chatWith,
                from:this.auth_id
            }).then(res=>{
                this.messages.push(res.data.message)
            });
            this.text='';
        }

    }
}
</script>
<template>
    <Head title="Chat vue3 " />
    <AuthenticatedLayout>
        <template #header>login code :{{ auth_id }}
            <div class="flex ">
                <div class="basis-1/6 h-screen border-r-2 border-l-2 border-solid my-2 ">
                    <ChatUserList :auth_id="auth_id"
                    :chat-with="chatWith"
                    @updatedChatWith="updateChatWith"
                    />
                </div>
                <div class="basis-5/6 h-screen py-5 px-5 ">
                    <div class="flex-1" v-if="chatWith">
                        <ChatArea
                        :chat-id="chatWith"
                        :messages="messages"
                        />
                    </div>
                    <div class="" v-else>
                        채팅상대를 선택해 주세요
                    </div>
                    <div class="absolute  bottom-8 w-4/6">
                        <input class="border-2 border-solid rounded border-gray-600 w-full" type="text"
                        v-model="text"
                        @keyup.enter="submit"
                        >
                    </div>
                </div>
            </div>
        </template>
    </AuthenticatedLayout>
</template>
