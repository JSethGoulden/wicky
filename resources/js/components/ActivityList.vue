<script setup>
import ActivityItem from "./ActivityItem.vue";

const props = defineProps({
    title: String,
    activities: Array,
});
</script>

<template>
    <div
        class="max-w-lg mx-auto my-4 bg-white p-6 rounded-xl shadow shadow-slate-300"
    >
        <div class="flex flex-row justify-between items-center">
            <div>
                <h1 class="text-3xl font-medium">
                    {{ title }}
                </h1>
            </div>
            <div class="inline-flex space-x-2 items-center">
                <!-- buttons  -->
            </div>
        </div>
        <p class="text-slate-500">blah</p>

        <div class="my-5">
            <ActivityItem
                v-for="activity in activities"
                :id="activity.id"
                :name="activity.name"
                :additionalComponent="activity.additional_component"
                :initialCompleted="!!activity.completed"
            />
        </div>
        <p class="text-xs text-slate-500 text-center">blah</p>
    </div>
</template>
