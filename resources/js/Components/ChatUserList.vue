<template>
    <div v-for="user in users" :key="user.id" class="pl-10 border-b-2 p-1  border-solid bg-violet-500 hover:bg-violet-600 active:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-300">
      {{ user.name }}
    </div>
</template>

<script >

export default{
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

    }
}
</script>
