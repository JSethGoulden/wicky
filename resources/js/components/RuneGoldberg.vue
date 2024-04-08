<script setup>
import { ref, onMounted } from "vue";

const runes = ref([]);
const isLoading = ref(true);
const hasErrors = ref(false);

onMounted(async () => {
    const response = await axios.get("api/rune-goldberg");

    if (response.status !== 200 || response.data.length !== 4) {
        return (hasErrors.value = true);
    }

    runes.value = response.data;
    isLoading.value = false;
});
</script>
<template>
    <div>
        <table class="text-center" v-if="!isLoading && !hasErrors">
            <tbody>
                <tr>
                    <th>Slot 1</th>
                    <th>Slot 2</th>
                </tr>
                <tr>
                    <td rowspan="3"><img :src="runes[0]" alt="Rune" /></td>
                    <td><img :src="runes[1]" alt="Rune" /></td>
                </tr>
                <tr>
                    <td><img :src="runes[2]" alt="Rune" /></td>
                </tr>
                <tr>
                    <td><img :src="runes[3]" alt="Rune" /></td>
                </tr>
            </tbody>
        </table>
        <div v-if="isLoading">Loading...</div>
        <div v-if="hasErrors">Failed to load daily runes</div>
    </div>
</template>
