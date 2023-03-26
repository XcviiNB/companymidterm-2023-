<template layout="default">

    <h1 class="text-2xl font-bold mb-4 text-center text-[#F9F5EB]">Edit Member</h1>

    <div class="max-w-md mx-auto shadow p-4 mt-4 bg-[#E4DCCF] rounded-md">
        <form @submit.prevent="submit">
            <div class="mb-4">
                <label for="last_name" class="block font-medium text-black mb-2">Last Name</label>
                <input v-model="form.last_name" type="text" id="last_name" last_name="last_name" class="w-full border border-gray-400 rounded-sm shadow-sm" />
                <div class="text-sm text-red-500 italic mt-1" v-if="form.errors.last_name">{{ form.errors.last_name }}</div>
            </div>
            <div class="mb-4">
                <label for="first_name" class="block font-medium text-black mb-2">First Name</label>
                <input v-model="form.first_name" first_name="text" id="first_name" name="first_name" class="w-full border border-gray-400 rounded-md shadow-sm" />
                <div class="text-sm text-red-500 italic mt-1" v-if="form.errors.first_name">{{ form.errors.first_name }}</div>
            </div>
            <div class="mb-4">
                <label for="designation" class="block font-medium text-black mb-2">Designation</label>
                <input v-model="form.designation" type="text" id="designation" name="designation" class="w-full border border-gray-400 rounded-md shadow-sm" />
                <div class="text-sm text-red-500 italic mt-1" v-if="form.errors.designation">{{ form.errors.designation }}</div>
            </div>
            <div class="mb-4">
                <label for="company_id" class="block font-medium text-black mb-2">Company</label>
                <select v-model="form.company_id" name="company_id" id="company_id" class="w-full border border-gray-400 rounded-md shadow-sm">
                    <option v-for="company in companies" :value="company.id" :key="company.id">
                        {{ company.name }}
                    </option>
                </select>
            </div>
            <div class="flex justify-evenly">
                <Link href="/members" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-black bg-slate-400 hover:bg-slate-500">Cancel</Link>
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-black bg-[#4594ee] hover:bg-[#1d76db]">
                    Save Changes
                </button>
            </div>
        </form>
    </div>

</template>

<script setup>
import { useForm, usePage, Link } from '@inertiajs/inertia-vue3'
import { setTransitionHooks } from 'vue';

const props = defineProps({
    members: Object,
    companies: Array
})

let form = useForm({
    last_name: props.members.last_name,
    first_name: props.members.first_name,
    designation: props.members.designation,
    company_id: props.members.company_id
})

const submit = () => {
    form.put('/members' + props.members.id)
}

</script>
