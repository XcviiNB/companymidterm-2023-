<template layout="default">

    <div class="py-4 text-center">
        <h1 class="text-4xl text-[#F9F5EB]">User Login</h1>
        <div class="max-w-sm border bg-[#E4DCCF] border-gray-400 shadow mt-4 p-4 rounded mx-auto">
            <form @submit.prevent="submit">

                <div class="mb-4 flex flex-col">
                    <label for="username">User Name:</label>
                    <input v-model="form.username" type="text" class="rounded p-1 border border-gray-300 w-full">
                    <div class="text-sm text-red-500 italic" v-if="form.errors.username">{{ form.errors.username }}</div>
                </div>
                <div class="mb-4 flex flex-col">
                    <label for="password">Password:</label>
                    <input v-model="form.password" type="password" class="rounded p-1 border border-gray-300 w-full">
                    <div class="text-sm text-red-500 italic" v-if="form.errors.password">{{ form.errors.password }}</div>
                </div>
                <div class="flex justify-between mb-4">
                    <Link href="/user/register" class="mr-4 text-blue-600 underline">Don't have an account?</Link>
                    <button type="submit" class="py-2 rounded bg-blue-500 px-4 hover:bg-blue-700 text-white disabled:bg-gray-300 ml-auto">
                        Log In
                    </button>
                </div>
                <div class="text-sm text-red-500 italic" v-if="form.errors.authentication">{{ form.errors.authentication }}</div>

            </form>
            <login-dialog
                :title="title"
                :message="message"
                :show-dialog="showDialog"
            />
        </div>
    </div>

</template>

<script setup>
import {useForm} from '@inertiajs/inertia-vue3'
import {Link} from '@inertiajs/inertia-vue3'

let form = useForm({
    'username': '',
    'password': ''
})

let submit = () => {
    form.post('/login')
}

</script>
