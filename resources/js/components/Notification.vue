<script setup>
import { defineProps, onMounted } from "vue";

const props = defineProps({
    message: String,
    isSpecial: Boolean,
});

onMounted(async () => {
    if (!Notification.permission === "granted") return;

    if (props.isSpecial) {
        speechSynthesis.speak(new SpeechSynthesisUtterance(props.message));
    }

    new Notification(props.message);
});
</script>
<template></template>
