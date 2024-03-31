<script setup>
import { computed, ref, onMounted } from "vue";
import Notification from "./Notification.vue";

const events = [
    { name: "Spider Swarm", isSpecial: false },
    { name: "Unnatural Outcrop", isSpecial: false },
    { name: "Stryke the Wyrm", isSpecial: true },
    { name: "Demon Stragglers", isSpecial: false },
    { name: "Butterfly Swarm", isSpecial: false },
    { name: "King Black Dragon Rampage", isSpecial: true },
    { name: "Forgotten Soldiers", isSpecial: false },
    { name: "Surprising Seedlings", isSpecial: false },
    { name: "Hellhound Pack", isSpecial: false },
    { name: "Infernal Star", isSpecial: true },
    { name: "Lost Souls", isSpecial: false },
    { name: "Ramokee Incursion", isSpecial: false },
    { name: "Displaced Energy", isSpecial: false },
    { name: "Evil Bloodwood Tree", isSpecial: true },
];
const flashEventStart = new Date("2022-10-17T11:00:00Z");
const notificationTimeThreshold = 5 * 60 * 1000;
const now = ref(new Date(Date.now() + new Date().getTimezoneOffset() * 60000));
const timeLeft = computed(() => 3600000 - (now.value.getTime() % 3600000));
const displayTime = computed(() => {
    if (timeLeft.value >= 59 * 60 * 1000) {
        return "Happening Now";
    }
    const minutes = "" + Math.floor((timeLeft.value / (1000 * 60)) % 60);
    let seconds = "" + Math.floor((timeLeft.value / 1000) % 60);

    if (seconds < 10) {
        seconds = "0" + seconds;
    }
    return `${minutes}:${seconds}`;
});

const currentFlashEvent = computed(() => {
    console.log("computing...");
    const hoursSinceStart = Math.floor(
        (now.value.getTime() - flashEventStart.getTime()) / (1000 * 60 * 60)
    );

    return events[hoursSinceStart % events.length];
});

const lastNotifiedEvent = ref("");
const shouldNotify = computed(() => {
    return (
        timeLeft.value <= notificationTimeThreshold &&
        lastNotifiedEvent.value !== currentFlashEvent.value.name
    );
});

const backgroundClass = computed(() => {
    if (timeLeft.value >= 59 * 60 * 1000) {
        return "bg-green-100";
    }

    if (timeLeft.value <= notificationTimeThreshold) {
        return "bg-yellow-100";
    }

    return "bg-white";
});

const tick = () => {
    now.value = new Date(Date.now() + new Date().getTimezoneOffset() * 60000);
};

onMounted(() => {
    if (timeLeft.value < notificationTimeThreshold) {
        lastNotifiedEvent.value = currentFlashEvent.value.name;
    }
    setInterval(tick, 1000);
});
</script>
<template>
    <div
        :class="backgroundClass"
        class="max-w-lg mx-auto my-4 p-6 rounded-xl shadow shadow-slate-300 text-center"
    >
        <h1 class="text-3xl font-medium">
            {{ currentFlashEvent.name }}
        </h1>
        <p>{{ displayTime }}</p>
        <Notification
            v-if="shouldNotify"
            :message="currentFlashEvent.name + ' is starting soon!'"
            :isSpecial="currentFlashEvent.isSpecial"
        ></Notification>
    </div>
</template>
