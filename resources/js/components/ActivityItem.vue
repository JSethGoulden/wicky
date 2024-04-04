<script>
import { defineComponent } from "vue";
import TravellingMerchant from "./TravellingMerchant.vue";
import NemiForest from "./NemiForest.vue";

export default defineComponent({
    components: {
        TravellingMerchant,
        NemiForest,
    },
});
</script>

<script setup>
import { ref, computed } from "vue";

const props = defineProps({
    id: Number,
    name: String,
    initialCompleted: Boolean,
    additionalComponent: {
        type: String,
        default: "",
    },
});

const completed = ref(props.initialCompleted);

const computedClass = computed(() => {
    return {
        "hover:from-slate-100 transition ease-linear duration-150":
            !props.completed,
    };
});

const toggleActivity = async () => {
    completed.value = !completed.value;

    const response = await axios.patch(`/dailyscape/${props.id}`, {
        id: props.id,
        completed: completed.value,
    });

    if (response.status !== 200) {
        completed.value = !completed.value;
        //tood - error handling
        alert("Something went wrong - try refreshing");
    }
};
</script>

<template>
    <div
        :class="computedClass"
        class="border-b border-slate-200 py-3 px-2 border-l-4 border-l-transparent bg-gradient-to-r from-transparent to-transparent"
    >
        <div class="inline-flex items-center space-x-2">
            <div @click="toggleActivity" class="select-none">
                <!-- todo conditional icons-->
                <template v-if="completed">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-6 h-6 text-slate-500 hover:cursor-pointer"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M4.5 12.75l6 6 9-13.5"
                        />
                    </svg>
                </template>
                <template v-else>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-6 h-6 text-slate-500 hover:text-indigo-600 hover:cursor-pointer"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                    </svg>
                </template>
            </div>
            <div :class="{ 'line-through': completed }" class="text-slate-500">
                {{ name }}
            </div>
        </div>
        <div>
            <template v-if="additionalComponent">
                <component :is="additionalComponent"> </component>
            </template>
        </div>
    </div>
</template>
