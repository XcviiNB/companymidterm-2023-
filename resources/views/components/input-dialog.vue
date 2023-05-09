<template>

    <div class="overlay">


    </div>

    <div class="dialog-wrapper">

        <div class="dialog">
            <h3 class="text-3xl text-center text-white mb-3">{{ title }}</h3>
            <hr class="border-white-700">
            <div class="mt-4 text-center text-white">
                {{ message }}
            </div>
            <div class="flex justify-center space-x-2 mt-4">
                <button class="bg-blue-600 rounded p-2 text-white hover:bg-blue-700" @click="$emit('confirm')">
                    Okay
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
