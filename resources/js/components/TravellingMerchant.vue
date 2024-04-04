<script setup>
import { ref, onMounted } from "vue";

const slotA = ref("");
const slotB = ref("");
const slotC = ref("");

const getShopContents = async () => {
    const response = await axios.get("api/todays-travelling-merchant-shop");

    slotA.value = response.data.slotA;
    slotB.value = response.data.slotB;
    slotC.value = response.data.slotC;
};

onMounted(() => {
    getShopContents();
});
</script>
<template>
    <ul>
        <li>{{ slotA }}</li>
        <li>{{ slotB }}</li>
        <li>{{ slotC }}</li>
    </ul>
</template>
