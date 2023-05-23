<template>
    <div class="overlay fixed inset-0 flex items-center justify-center bg-black opacity-50">
      <div class="dialog-wrapper">
        <div class="dialog bg-white rounded-lg p-8 animate__animated animate__fadeInDown">
          <h3 class="text-3xl text-center mb-3">Info</h3>
          <hr class="border-gray-400">
          <div class="mt-4 text-2xl text-center">
            {{ message }}
          </div>
          <div class="flex justify-center mt-4">
            <button class="bg-blue-500 hover:bg-blue-600 text-white rounded px-4 py-2 transition-colors duration-300" @click="$emit('close')">
              OK!
            </button>
          </div>
        </div>
      </div>
    </div>
  </template>

  <script setup>
  defineProps({
    message: ""
  });
  </script>

  <style scoped>
  .overlay {
    animation-duration: 0.5s;
  }

  .dialog {
    animation-duration: 0.5s;
  }

  @keyframes fadeInDown {
    0% {
      opacity: 0;
      transform: translateY(-20px);
    }
    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .animate__fadeInDown {
    animation-name: fadeInDown;
  }
  </style>
