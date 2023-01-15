<template>
    <div v-for="user in userWithoutSignedInUser" :key="user.id"
    @click="updateChatWith(user.id)"
    :class="{'bg-violet-700':chatWith===user.id}"
    class="pl-10 border-b-2 p-1  border-solid bg-violet-500 hover:bg-violet-600 active:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-300">
      {{ user.name }}
    </div>
</template>

<script >

export default{

    props:{
        auth_id : {
            type:Number,
            required: true
        },
        chatWith:{
            type:Number,
            required: false
        }
    },
    computed: {
            userWithoutSignedInUser(){
                return this.users.filter(user=>user.id!==this.auth_id)
            }
    },
    data(){
        return{
            users: [],
        }
    },
    created(){

        axios.get('/api/users')
        .then(res => {
            // console.log(res)
            this.users=res.data.users;
        }).catch(error => {
            console.log(error)
        });

    },
    methods:{
        updateChatWith(user_id){
            this.$emit('updatedChatWith',user_id);

        }
    }
}
</script>
