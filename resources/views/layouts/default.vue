<script setup lang="ts">
    import Navbar from '../components/navbar.vue'
    import { defineProps } from 'vue'

    defineProps({
        'auth': Object
    })
</script>

<template>
    <Navbar :user="auth.user"></Navbar>
    <div class="wrapper py-8">
        <slot />
    </div>
</template>
