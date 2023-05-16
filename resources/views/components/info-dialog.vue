<template>
    <div>
      <dialog-box
        :title="title"
        :message="message"
        @confirm="closeDialog"
        v-if="showDialog"
      />
    </div>
  </template>

  <script setup>
  import DialogBox from '@/views/components/input-dialog.vue'

  let showDialog = false
  let title = ''
  let message = ''

  let submit = async () => {
    try {
      await form.post('/login')
      title = 'Login Successful'
      message = 'You have successfully logged in.'
      showDialog = true
    } catch (error) {
      // Handle error case
    }
  }

  let closeDialog = () => {
    showDialog = false
  }

  </script>
