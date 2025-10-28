<template>
    <div
        :class="[
            'bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 border border-gray-100',
            hoverEffect ? 'hover:-translate-y-1' : '',
        ]"
    >
        <div
            v-if="icon"
            class="flex items-center justify-center w-12 h-12 bg-blue-100 rounded-lg mb-4"
        >
            <component :is="icon" class="w-6 h-6 text-blue-600" />
        </div>

        <h3 class="text-xl font-semibold text-gray-900 mb-2">
            {{ title }}
        </h3>

        <p class="text-gray-600 leading-relaxed">
            {{ description }}
        </p>

        <slot />
    </div>
</template>

<script setup>
defineProps({
    title: {
        type: String,
        required: true,
    },
    description: {
        type: String,
        required: true,
    },
    icon: {
        type: [String, Object],
        default: null,
    },
    hoverEffect: {
        type: Boolean,
        default: true,
    },
});
</script>
