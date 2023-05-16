<template>
    <div class="overlay"></div>
    <div class="dialog-wrapper">
        <div class="dialog">
            <h3 class="text-3xl text-center mb-3">{{ title }}</h3>
            <hr class="border-black">
            <div class="mt-4 text-2xl text-center">
                {{ message }}
            </div>
            <div class="flex justify-center space-x-2 mt-4">
                <button class="bg-[#FAF0D8] rounded p-2 hover:bg-[#E4DCCF]" @click="$emit('close')">
                    OK!
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
let props = defineProps({
    title: "",
    message: ""
})
</script>
