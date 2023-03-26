<template layout="default">

    <h1 class="text-2xl font-bold mb-4 text-center text-[#F9F5EB]">Register Company</h1>

    <div class="max-w-md mx-auto shadow p-4 mt-4 bg-[#E4DCCF] rounded-md">
        <form @submit.prevent="submit">
            <div class="mb-4">
                <label for="name" class="block font-medium text-black mb-2">Name</label>
                <input v-model="form.name" type="text" id="name" name="name" class="w-full border border-gray-400 rounded-sm shadow-sm" />
                <div class="text-sm text-red-500 italic mt-1" v-if="form.errors.name">{{ form.errors.name }}</div>
            </div>
            <div class="mb-4">
                <label for="type" class="block font-medium text-black mb-2">Type</label>
                <input v-model="form.type" type="text" id="type" name="type" class="w-full border border-gray-400 rounded-md shadow-sm" />
                <div class="text-sm text-red-500 italic mt-1" v-if="form.errors.type">{{ form.errors.type }}</div>
            </div>
            <div class="mb-4">
                <label for="address" class="block font-medium text-black mb-2">Address</label>
                <input v-model="form.address" type="text" id="address" name="address" class="w-full border border-gray-400 rounded-md shadow-sm" />
                <div class="text-sm text-red-500 italic mt-1" v-if="form.errors.address">{{ form.errors.address }}</div>
            </div>
            <div class="mb-4">
                <label for="net_worth" class="block font-medium text-black mb-2">Net Worth</label>
                <input v-model="form.net_worth" type="number" id="net_worth" name="net_worth" class="w-full border border-gray-400 rounded-md shadow-sm" />
                <div class="text-sm text-red-500 italic mt-1" v-if="form.errors.net_worth">{{ form.errors.net_worth }}</div>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-black bg-blue-500 hover:bg-blue-700">
                    Add Company
                </button>
            </div>
        </form>
    </div>

</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3'

let form = useForm({
    name:'',
    type:'',
    address:'',
    net_worth:''
})

const submit = () => {
    form.post('/companies')
}

</script>
