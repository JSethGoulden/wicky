<script setup>
import { ref, onMounted } from "vue";

const thumbnail = ref("");
const img = ref("");

onMounted(async () => {
    const response = await axios.get("api/nemi-forest");
    thumbnail.value = response.data.thumbnail;
    img.value = response.data.img;
});
</script>
<template>
    <a :href="img" v-if="img" target="_blank">
        <img :src="thumbnail" alt="Nemi Forest" class="ml-2" />
    </a>
</template>
