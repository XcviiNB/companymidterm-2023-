<template layout>
    <div class="p-8">
        <h1 class="text-4xl flex justify-center mb-3 text-[#F9F5EB]">Members</h1>

        <table class="mx-auto table-auto mt-4">
            <tr class="bg-[#E4DCCF] text-black">
                <th class="font-bold p-2 border-b text-center">Member ID</th>
                <th class="font-bold p-2 border-b">Last Name</th>
                <th class="font-bold p-2 border-b">First Name</th>
                <th class="font-bold p-2 border-b text-center">Designation</th>
                <th class="font-bold p-2 border-b text-center">Company</th>
                <th class="font-bold p-2 border-b text-center">Options</th>
            </tr>
            <tr v-for="member of members" class="bg-[#F9F5EB] hover:bg-[#E4DCCF]">
                <td class="p-3 border-b border-l">{{ ('0000' + member.id).slice(-4) }}</td>
                <td class="p-3 border-b border-l">{{ member.last_name }}</td>
                <td class="p-3 border-b border-l">{{ member.first_name }}</td>
                <td class="p-3 border-b border-l">{{ member.designation }}</td>
                <td class="p-3 border-b border-l">{{ member.company.name }}</td>
                <td class="p-3 border-b border-l text-center">
                    <Link :href=" '/members/edit/' + member.id"><i class="fa-solid fa-user-pen"></i></Link>
                </td>
            </tr>
        </table>

        <div class="flex mt-3">
            <Link href="/members/create" class="bg-[#F9F5EB] hover:bg-[#E4DCCF] text-black font-bold py-2 px-4 rounded mx-auto">Add New Member</Link>
        </div>

    </div>
</template>

<script setup>
    import {Link} from '@inertiajs/inertia-vue3'

    defineProps({
        'members': Array
    })
</script>
