<script setup>
import { computed, ref, onMounted } from "vue";
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

const hoursSinceEventStart = ref(0);
const minutesInHour = ref(0);
const secondsSinceHourStart = ref(0);
const startTime = new Date("2022-10-17T11:00:00Z");
const shouldShowNotificationButton = Notification.permission !== "granted";
let lastNotification = ref("");

const currentFlashEvent = computed(() => {
    let eventIndex = hoursSinceEventStart.value;
    if (minutesInHour.value < 6) {
        eventIndex = Math.max(0, eventIndex - 1);
    }
    return events[eventIndex % events.length];
});

const displayTime = computed(() => {
    if (minutesInHour.value < 5) {
        return "Happening now";
    }

    const remainingTime = 60 - minutesInHour.value;
    const minutes = Math.floor(remainingTime);

    return `in ${minutes} minutes, ${60 - secondsSinceHourStart.value} seconds`;
});

const shouldNotify = computed(() => {
    return (
        minutesInHour.value === 55 &&
        lastNotification.value != currentFlashEvent.value.name
    );
});

const backgroundClass = computed(() => {
    if (minutesInHour.value <= 5) {
        return "bg-green-100";
    }

    if (minutesInHour.value >= 55) {
        return "bg-yellow-100";
    }

    return "bg-white";
});

const updateTime = () => {
    const utcTime = new Date(
        new Date().getTime() + new Date().getTimezoneOffset() * 60000
    );
    const timeDifference = utcTime.getTime() - startTime.getTime();

    hoursSinceEventStart.value = Math.floor(timeDifference / (1000 * 60 * 60));
    minutesInHour.value = utcTime.getMinutes();
    secondsSinceHourStart.value = utcTime.getSeconds();

    if (shouldNotify.value) {
        console.log(shouldNotify.value);
        sendFlashEventNotification();
    }
};

const sendFlashEventNotification = () => {
    if (!Notification.permission === "granted") return;

    if (currentFlashEvent.value.isSpecial) {
        speechSynthesis.speak(
            new SpeechSynthesisUtterance(
                `${currentFlashEvent.value.name} is starting soon!`
            )
        );
    }

    lastNotification.value = currentFlashEvent.value.name;
    new Notification(`${currentFlashEvent.value.name} is starting soon!`);
};

const requestNotificationPermission = () => {
    Notification.requestPermission();
};

onMounted(updateTime);
setInterval(updateTime, 1000);
</script>
<template>
    <div
        :class="backgroundClass"
        class="max-w-lg mx-auto my-4 p-6 rounded-xl shadow shadow-slate-300 text-center"
    >
        <h1 class="text-3xl font-medium">{{ currentFlashEvent.name }}</h1>
        <p class="text-slate-500">{{ displayTime }}</p>
        <button
            v-show="shouldShowNotificationButton"
            @click="requestNotificationPermission"
        >
            Allow Notifications
        </button>
    </div>
</template>
