<template>
    <button
        @click="emitToggle"
        class="fixed z-50 flex items-center justify-center text-center bottom-10 right-10 bg-yellow-500 w-24 h-16 rounded-md font-bold"
        style="text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.6);"
    >
        Hire me
    </button>
</template>

<script setup>
import {defineEmits} from 'vue'
let emits = defineEmits(['toggle'])
let emitToggle = () =>{
    emits('toggle')
}
</script>

