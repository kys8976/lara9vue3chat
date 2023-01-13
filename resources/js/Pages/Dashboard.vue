<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex ">
                <div class="basis-1/6 h-screen border-r-2 border-solid py-5">

                    User List<br>
                    User List<br>
                    User List<br>
                    User List<br>


                </div>
                <div class="basis-5/6 h-screen py-5 px-5">
                    <div class="flex-1">Chat Area
                    </div>
                    <div class="absolute  bottom-8 w-4/6">
                        <input class="border-2 border-solid rounded border-gray-600 w-full" type="text">
                    </div>
                </div>
            </div>
        </template>
    </AuthenticatedLayout>
</template>
