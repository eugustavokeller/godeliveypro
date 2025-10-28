<template>
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <div class="flex items-center space-x-2">
                        <div
                            class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center"
                        >
                            <span class="text-white font-bold text-lg">G</span>
                        </div>
                        <span class="text-xl font-bold text-gray-900"
                            >GoDeliveryPro</span
                        >
                    </div>
                </div>

                <!-- Menu Desktop -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-8">
                        <a
                            href="#features"
                            class="text-gray-600 hover:text-blue-600 px-3 py-2 text-sm font-medium transition-colors duration-200"
                        >
                            Funcionalidades
                        </a>
                        <a
                            href="#pricing"
                            class="text-gray-600 hover:text-blue-600 px-3 py-2 text-sm font-medium transition-colors duration-200"
                        >
                            Planos
                        </a>
                        <a
                            href="#contact"
                            class="text-gray-600 hover:text-blue-600 px-3 py-2 text-sm font-medium transition-colors duration-200"
                        >
                            Contato
                        </a>
                        <a
                            href="#login"
                            class="text-gray-600 hover:text-blue-600 px-3 py-2 text-sm font-medium transition-colors duration-200"
                        >
                            Login
                        </a>
                    </div>
                </div>

                <!-- Botão CTA Desktop -->
                <div class="hidden md:block">
                    <Button variant="primary" size="sm"> Comece Agora </Button>
                </div>

                <!-- Menu Mobile -->
                <div class="md:hidden">
                    <button
                        @click="toggleMobileMenu"
                        class="text-gray-600 hover:text-gray-900 focus:outline-none focus:text-gray-900"
                    >
                        <svg
                            class="h-6 w-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                v-if="!isMobileMenuOpen"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"
                            />
                            <path
                                v-else
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"
                            />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Menu Mobile Expandido -->
            <div v-if="isMobileMenuOpen" class="md:hidden">
                <div
                    class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-gray-50 rounded-lg mt-2"
                >
                    <a
                        href="#features"
                        class="text-gray-600 hover:text-blue-600 block px-3 py-2 text-base font-medium"
                        @click="closeMobileMenu"
                    >
                        Funcionalidades
                    </a>
                    <a
                        href="#pricing"
                        class="text-gray-600 hover:text-blue-600 block px-3 py-2 text-base font-medium"
                        @click="closeMobileMenu"
                    >
                        Planos
                    </a>
                    <a
                        href="#contact"
                        class="text-gray-600 hover:text-blue-600 block px-3 py-2 text-base font-medium"
                        @click="closeMobileMenu"
                    >
                        Contato
                    </a>
                    <a
                        href="#login"
                        class="text-gray-600 hover:text-blue-600 block px-3 py-2 text-base font-medium"
                        @click="closeMobileMenu"
                    >
                        Login
                    </a>
                    <div class="px-3 py-2">
                        <Button
                            variant="primary"
                            size="sm"
                            class="w-full"
                            @click="emit('onAcceptAll')"
                        >
                            Comece Agora
                        </Button>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</template>

<script setup>
import { ref, defineEmits } from "vue";
import Button from "./Button.vue";

const isMobileMenuOpen = ref(false);

const emit = defineEmits(["onAcceptAll"]);

const toggleMobileMenu = () => {
    isMobileMenuOpen.value = !isMobileMenuOpen.value;
};

const closeMobileMenu = () => {
    isMobileMenuOpen.value = false;
};
</script>
