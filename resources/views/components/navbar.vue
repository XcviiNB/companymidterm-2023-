<template>
    <section class="bg-primary">
        <nav class="bg-[#E4DCCF] p-5">
            <div class="container mx-auto flex items-center justify-between">
                <Link href="/" class="text-black font-bold text-xl">NTerprises</Link>

                <div class="flex items-center">
                    <Link v-if="user" href="/companies" class="py-4 text-black font-semibold hover:bg-[#ddc8a5] rounded-lg duration-300 px-2">Companies</Link>
                    <Link v-if="user" href="/members" class="py-4 text-black font-semibold hover:bg-[#ddc8a5] rounded-lg duration-300 px-2">Members</Link>

                    <div>
                        <Link v-if="!user" class="py-4 text-black font-semibold hover:bg-[#ddc8a5] rounded-lg duration-300 px-2" href="/login">Log In</Link>
                        <Link v-if="user" class="py-4 text-black font-semibold hover:bg-[#ddc8a5] rounded-lg duration-300 px-2" href="/logout" method="post" as="button">Log Out {{"|" + " " + user.fullname}} </Link>
                    </div>
                </div>
            </div>
        </nav>
    </section>
</template>

<script setup>
    import { Link } from '@inertiajs/inertia-vue3'
    import { defineProps } from 'vue'

    defineProps({
        user: ''
    })

</script>
