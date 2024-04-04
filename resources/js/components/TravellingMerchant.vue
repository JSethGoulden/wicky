<script setup>
import { ref, onMounted } from "vue";

const slotA = ref("");
const slotB = ref("");
const slotC = ref("");
const slotAImg = ref("");
const slotBImg = ref("");
const slotCImg = ref("");

const getShopContents = async () => {
    const response = await axios.get("api/todays-travelling-merchant-shop");

    slotA.value = response.data.slotA;
    slotB.value = response.data.slotB;
    slotC.value = response.data.slotC;
    slotAImg.value = response.data.slotAImg;
    slotBImg.value = response.data.slotBImg;
    slotCImg.value = response.data.slotCImg;
};

onMounted(() => {
    getShopContents();
});
</script>
<template>
    <ul class="ml-2">
        <li class="flex items-center">
            <a
                :href="'https://runescape.wiki/?search=' + slotA"
                class="flex items-center"
            >
                <img
                    :src="slotAImg"
                    alt="slotA"
                    class="mr-2 w-6 h-6 object-contain"
                />
                {{ slotA }}
            </a>
        </li>
        <li class="flex items-center">
            <a
                :href="'https://runescape.wiki/?search=' + slotB"
                class="flex items-center"
            >
                <img
                    :src="slotBImg"
                    alt="slotB"
                    class="mr-2 w-6 h-6 object-contain"
                />
                {{ slotB }}
            </a>
        </li>
        <li class="flex items-center">
            <a
                :href="'https://runescape.wiki/?search=' + slotC"
                class="flex items-center"
            >
                <img
                    :src="slotCImg"
                    alt="slotC"
                    class="mr-2 w-6 h-6 object-contain"
                />
                {{ slotC }}
            </a>
        </li>
    </ul>
</template>
