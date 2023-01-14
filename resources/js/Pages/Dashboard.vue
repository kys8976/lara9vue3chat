<script setup>
import ChatUserList from '@/Components/ChatUserList.vue';
import ChatArea from '@/Components/ChatArea.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
const props = defineProps(['auth_id']);
</script>
<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>login code : {{ auth_id }}
            <div class="flex ">
                <div class="basis-1/6 h-screen border-r-2 border-l-2 border-solid my-2 ">
                    <ChatUserList/>
                </div>
                <div class="basis-5/6 h-screen py-5 px-5 ">
                    <div class="flex-1">
                        <ChatArea/>
                    </div>
                    <div class="absolute  bottom-8 w-4/6">
                        <input class="border-2 border-solid rounded border-gray-600 w-full" type="text">
                    </div>
                </div>
            </div>
        </template>
    </AuthenticatedLayout>
</template>
