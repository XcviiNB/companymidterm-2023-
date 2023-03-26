<template layout="default">

    <h1 class="text-2xl font-bold mb-4 text-center text-[#F9F5EB]">User Form</h1>

    <div class="max-w-md mx-auto shadow p-4 mt-4 bg-[#E4DCCF] rounded-md">
        <form @submit.prevent="submit">
            <div class="mb-4">
                <label for="username" class="block font-medium text-black mb-2">Username</label>
                <input v-model="form.username" type="text" id="username" name="username" class="w-full border border-gray-400 rounded-sm shadow-sm" />
                <div class="text-sm text-red-500 italic mt-1" v-if="form.errors.username">{{ form.errors.username }}</div>
            </div>
            <div class="mb-4">
                <label for="fullname" class="block font-medium text-black mb-2">Fullname</label>
                <input v-model="form.fullname" fullname="text" id="fullname" name="fullname" class="w-full border border-gray-400 rounded-md shadow-sm" />
                <div class="text-sm text-red-500 italic mt-1" v-if="form.errors.fullname">{{ form.errors.fullname }}</div>
            </div>
            <div class="mb-4">
                <label for="designation" class="block font-medium text-black mb-2">Designation</label>
                <input v-model="form.designation" type="text" id="designation" name="designation" class="w-full border border-gray-400 rounded-md shadow-sm" />
                <div class="text-sm text-red-500 italic mt-1" v-if="form.errors.designation">{{ form.errors.designation }}</div>
            </div>
            <div class="mb-4">
                <label for="password" class="block font-medium text-black mb-2">Password</label>
                <input v-model="form.password" type="password" id="password" name="password" class="w-full border border-gray-400 rounded-md shadow-sm" />
                <div class="text-sm text-red-500 italic mt-1" v-if="form.errors.password">{{ form.errors.password }}</div>
            </div>
            <div class="flex justify-between mb-4">
                <Link href="/login" class="mr-4 text-blue-600 underline">Already have an account</Link>
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-black bg-blue-500 hover:bg-blue-700">
                    Register
                </button>
            </div>
        </form>
    </div>

</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3'
import {Link} from '@inertiajs/inertia-vue3'

let form = useForm({
    username:'',
    fullname:'',
    designation:'',
    password:''
})


const submit = () => {
    form.post('/')
}

</script>
