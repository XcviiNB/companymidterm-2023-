<template layout>
    <ConfirmDialog v-if="showConfirm"
        title="Delete Company?"
        message="Are you sure about deleting this company file?"
        @cancel="cancelDelete()"
        @confirm="deleteCompany()"></ConfirmDialog>

    <!-- <ErrorDialog v-if="showError" title="Error" :message="errorMessage" @close="closeErrorDialog()"></ErrorDialog> -->

    <div class="p-8">
        <h1 class="text-4xl flex justify-center mb-3 text-[#F9F5EB]">Companies</h1>

        <table class="mx-auto mt-4 border border-[#E4DCCF] rounded-lg">
            <tr class="bg-[#E4DCCF] text-black">
                <th class="font-bold p-2 border-b text-center">Company ID</th>
                <th class="font-bold p-2 border-b">Name</th>
                <th class="font-bold p-2 border-b text-center">Type</th>
                <th class="font-bold p-2 border-b text-center">Address</th>
                <th class="font-bold p-2 border-b text-center">Net Worth</th>
                <th class="font-bold p-2 border-b text-center">Options</th>
            </tr>
            <tr v-for="company of companies" class="bg-[#F9F5EB] hover:bg-[#E4DCCF]">
                <td class="p-3 border-b border-l">{{ ('0000' + company.id).slice(-4) }}</td>
                <td class="p-3 border-b border-l">{{ company.name }}</td>
                <td class="p-3 border-b border-l">{{ company.type }}</td>
                <td class="p-3 border-b border-l">{{ company.address }}</td>
                <td class="p-3 border-b border-l">{{ "$" + company.net_worth }}</td>
                <td class="p-3 border-b border-l text-center">
                    <Link :href=" '/companies/edit/' + company.id"><i class="fa-regular fa-pen-to-square"></i></Link>
                    <button class="text-red-700 px-5 rounded hover:text-indigo-900" @click="remove(company)"><i class="fa-solid fa-trash-can"></i></button>
                </td>
            </tr>
        </table>

        <div class="flex mt-3">
            <Link href="/companies/create" class="bg-[#F9F5EB] hover:bg-[#E4DCCF] text-black font-bold py-2 px-4 rounded mx-auto">Add Company</Link>
        </div>

    </div>
</template>

<script setup>
    import { Link } from '@inertiajs/inertia-vue3'
    import { ref } from 'vue'
    import ConfirmDialog from '@/views/components/confirm-dialog.vue'
    import { useForm } from '@inertiajs/inertia-vue3'
    // import ErrorDialog from '@/views/components/error-dialog.vue'

    let showConfirm = ref(false)

    let form = useForm({
        id: '',
        name: '',
        type: '',
        address: '',
        net_worth: '',
    })

    let deleteForm = useForm()

    let selectedCompany = null
    let selectedCompanyForDelete = null

    let props = defineProps({
        companies: Array,
        users: Array,
        errors: null
    })

    function remove(company) {
        selectedCompanyForDelete = company
        showConfirm.value = true
    }

    function cancelDelete() {
        showConfirm.value = false
    }

    function deleteCompany() {
        if (selectedCompanyForDelete !== null && selectedCompanyForDelete.id !== undefined) {
            deleteForm.delete('/companies/' + selectedCompanyForDelete.id)
            showConfirm.value = false;
        }
    }
</script>

