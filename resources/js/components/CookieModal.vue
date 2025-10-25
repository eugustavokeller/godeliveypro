<template>
  <!-- Banner de Cookies no Rodapé -->
  <transition name="slide-up">
    <div
      v-if="showBanner"
      class="fixed bottom-0 left-0 right-0 bg-white border-t-2 border-blue-500 shadow-2xl z-50"
    >
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div
          class="flex flex-col sm:flex-row items-center justify-between gap-4"
        >
          <!-- Texto e Link -->
          <div class="flex items-center space-x-3 flex-1">
            <div
              class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0"
            >
              <span class="text-xl">🍪</span>
            </div>
            <div class="flex-1">
              <p class="text-sm text-gray-700">
                Utilizamos cookies para melhorar sua experiência. Ao continuar
                navegando, você concorda com nossa
                <button
                  class="text-blue-600 hover:text-blue-700 underline font-medium"
                >
                  política de cookies</button
                >.
              </p>
            </div>
          </div>

          <!-- Botões de Ação -->
          <div class="flex items-center space-x-3">
            <button
              @click="acceptAll"
              class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg transition-colors duration-200 shadow-md hover:shadow-lg"
            >
              Aceitar Todos
            </button>
            <button
              @click="acceptAll"
              class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-semibold rounded-lg transition-colors duration-200"
            >
              Rejeitar
            </button>
          </div>
        </div>
      </div>
    </div>
  </transition>

  <!-- Modal de Configurações (quando clicar em Personalizar) -->
  <transition name="fade">
    <div
      v-if="showSettings"
      class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4"
      @click.self="closeSettings"
    >
      <div
        class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto"
      >
        <!-- Header -->
        <div
          class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-4 rounded-t-2xl"
        >
          <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
              <div
                class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center"
              >
                <span class="text-2xl">🍪</span>
              </div>
              <h2 class="text-xl font-bold text-white">
                Preferências de Cookies
              </h2>
            </div>
            <button
              @click="closeSettings"
              class="text-white/80 hover:text-white transition-colors duration-200"
            >
              <svg
                class="w-6 h-6"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"
                ></path>
              </svg>
            </button>
          </div>
        </div>

        <!-- Content -->
        <div class="p-6">
          <div class="mb-6">
            <p class="text-gray-700 mb-4">
              O GoDeliveryPro utiliza cookies para melhorar sua experiência,
              personalizar conteúdo e analisar nosso tráfego. Você pode escolher
              quais tipos de cookies aceitar.
            </p>

            <!-- Tipos de Cookies -->
            <div class="space-y-4">
              <!-- Cookies Essenciais -->
              <div class="border border-gray-200 rounded-xl p-4">
                <div class="flex items-center justify-between mb-2">
                  <div class="flex items-center space-x-3">
                    <div
                      class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center"
                    >
                      <span class="text-green-600 text-sm">🔒</span>
                    </div>
                    <div>
                      <h3 class="font-semibold text-gray-900">
                        Cookies Essenciais
                      </h3>
                      <p class="text-sm text-gray-600">
                        Necessários para o funcionamento básico do site
                      </p>
                    </div>
                  </div>
                  <div class="flex items-center">
                    <span class="text-sm text-gray-500 mr-2">Obrigatório</span>
                    <div
                      class="w-12 h-6 bg-green-500 rounded-full flex items-center justify-end px-1"
                    >
                      <div class="w-4 h-4 bg-white rounded-full"></div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Cookies de Performance -->
              <div class="border border-gray-200 rounded-xl p-4">
                <div class="flex items-center justify-between mb-2">
                  <div class="flex items-center space-x-3">
                    <div
                      class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center"
                    >
                      <span class="text-blue-600 text-sm">📊</span>
                    </div>
                    <div>
                      <h3 class="font-semibold text-gray-900">
                        Cookies de Performance
                      </h3>
                      <p class="text-sm text-gray-600">
                        Nos ajudam a entender como você usa nosso site
                      </p>
                    </div>
                  </div>
                  <div class="flex items-center">
                    <button
                      @click="togglePerformance"
                      :class="[
                        'w-12 h-6 rounded-full flex items-center transition-colors duration-200',
                        performanceEnabled
                          ? 'bg-blue-500 justify-end'
                          : 'bg-gray-300 justify-start',
                      ]"
                    >
                      <div class="w-4 h-4 bg-white rounded-full mx-1"></div>
                    </button>
                  </div>
                </div>
              </div>

              <!-- Cookies de Marketing -->
              <div class="border border-gray-200 rounded-xl p-4">
                <div class="flex items-center justify-between mb-2">
                  <div class="flex items-center space-x-3">
                    <div
                      class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center"
                    >
                      <span class="text-purple-600 text-sm">🎯</span>
                    </div>
                    <div>
                      <h3 class="font-semibold text-gray-900">
                        Cookies de Marketing
                      </h3>
                      <p class="text-sm text-gray-600">
                        Para personalizar anúncios e conteúdo
                      </p>
                    </div>
                  </div>
                  <div class="flex items-center">
                    <button
                      @click="toggleMarketing"
                      :class="[
                        'w-12 h-6 rounded-full flex items-center transition-colors duration-200',
                        marketingEnabled
                          ? 'bg-purple-500 justify-end'
                          : 'bg-gray-300 justify-start',
                      ]"
                    >
                      <div class="w-4 h-4 bg-white rounded-full mx-1"></div>
                    </button>
                  </div>
                </div>
              </div>

              <!-- Cookies de Funcionalidade -->
              <div class="border border-gray-200 rounded-xl p-4">
                <div class="flex items-center justify-between mb-2">
                  <div class="flex items-center space-x-3">
                    <div
                      class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center"
                    >
                      <span class="text-orange-600 text-sm">⚙️</span>
                    </div>
                    <div>
                      <h3 class="font-semibold text-gray-900">
                        Cookies de Funcionalidade
                      </h3>
                      <p class="text-sm text-gray-600">
                        Para lembrar suas preferências e configurações
                      </p>
                    </div>
                  </div>
                  <div class="flex items-center">
                    <button
                      @click="toggleFunctionality"
                      :class="[
                        'w-12 h-6 rounded-full flex items-center transition-colors duration-200',
                        functionalityEnabled
                          ? 'bg-orange-500 justify-end'
                          : 'bg-gray-300 justify-start',
                      ]"
                    >
                      <div class="w-4 h-4 bg-white rounded-full mx-1"></div>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Informações Adicionais -->
          <div
            class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-r-xl mb-6"
          >
            <div class="flex items-start space-x-3">
              <span class="text-blue-600 text-lg">ℹ️</span>
              <div>
                <p class="text-sm text-blue-800">
                  <strong>Importante:</strong> Você pode alterar suas
                  preferências a qualquer momento nas configurações do seu
                  navegador ou clicando no link "Cookies" no rodapé do site.
                </p>
                <p class="text-xs text-blue-700 mt-2">
                  ⏱️ As preferências de cookies expiram automaticamente após
                  <strong>5 minutos</strong> de inatividade.
                </p>
              </div>
            </div>
          </div>

          <!-- Botões de Ação -->
          <div class="flex flex-col sm:flex-row gap-3">
            <button
              @click="acceptAll"
              class="flex-1 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5"
            >
              Aceitar Todos
            </button>
            <button
              @click="acceptAll"
              class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold py-3 px-6 rounded-xl transition-all duration-300"
            >
              Rejeitar Todos
            </button>
          </div>
        </div>
      </div>
    </div>
  </transition>
</template>

<script setup>
import { ref, onMounted, defineExpose } from "vue";
import api from "../axios";
const emit = defineEmits(["cookie-preferences"]);

// Tempo de expiração: 5 minutos (300000 ms)
const COOKIE_EXPIRATION_TIME = 5 * 60 * 1000;

const showBanner = ref(false);
const showSettings = ref(false);
const performanceEnabled = ref(false);
const marketingEnabled = ref(false);
const functionalityEnabled = ref(false);
const currentPosition = ref(null);

// Expor métodos para o componente pai
defineExpose({
  showBanner: () => {
    showBanner.value = true;
  },
  acceptAll: () => {
    acceptAll();
  },
});

// Verificar se o cookie expirou
const isCookieExpired = (timestamp) => {
  if (!timestamp) return true;
  const now = Date.now();
  const savedTime = new Date(timestamp).getTime();
  return now - savedTime > COOKIE_EXPIRATION_TIME;
};

// Verificar se já existe preferência salva
onMounted(() => {
  const savedPreferences = localStorage.getItem("cookie-preferences");

  if (!savedPreferences) {
    // Mostrar banner apenas se não houver preferências salvas
    showBanner.value = true;
  } else {
    const preferences = JSON.parse(savedPreferences);

    // Verificar se o cookie expirou
    if (preferences.timestamp && isCookieExpired(preferences.timestamp)) {
      // Cookie expirado, remover e mostrar banner
      localStorage.removeItem("cookie-preferences");
      showBanner.value = true;
      console.log("Cookie expirado após 5 minutos. Removendo preferências.");
    } else {
      // Carregar preferências salvas
      performanceEnabled.value = preferences.performance || false;
      marketingEnabled.value = preferences.marketing || false;
      functionalityEnabled.value = preferences.functionality || false;
    }
  }
});

const togglePerformance = () => {
  performanceEnabled.value = !performanceEnabled.value;
};

const toggleMarketing = () => {
  marketingEnabled.value = !marketingEnabled.value;
};

const toggleFunctionality = () => {
  functionalityEnabled.value = !functionalityEnabled.value;
};

const closeSettings = () => {
  showSettings.value = false;
};

const savePreferences = (preferences) => {
  preferences.createdAt = Date.now();
  preferences.expiresAt = Date.now() + COOKIE_EXPIRATION_TIME;
  localStorage.setItem("cookie-preferences", JSON.stringify(preferences));
  emit("cookie-preferences", preferences);
  showBanner.value = false;
  closeSettings();
  setTimeout(() => {
    console.log("Cookie expirado automaticamente após 5 minutos");
    localStorage.removeItem("cookie-preferences");
  }, COOKIE_EXPIRATION_TIME);
};

const acceptAll = () => {
  const preferences = {
    essential: true,
    performance: true,
    marketing: true,
    functionality: true,
    timestamp: new Date().toISOString(),
  };
  savePreferences(preferences);
  captureLocationAndSend();
};

const captureLocationAndSend = async () => {
  try {
    console.log("captureLocationAndSend - iniciando");
    const position = await getCurrentPosition();
    currentPosition.value = position;
    console.log("captureLocationAndSend - enviando localização");
    await sendLocation(position);
    console.log("captureLocationAndSend - localização enviada com sucesso");
  } catch (error) {
    console.error("Erro ao capturar e enviar localização:", error);
  }
};

const getCurrentPosition = () => {
  return new Promise((resolve, reject) => {
    if (!navigator.geolocation) {
      reject(new Error("Geolocalização não suportada neste navegador"));
      return;
    }
    navigator.geolocation.getCurrentPosition(resolve, reject, {
      enableHighAccuracy: true,
      timeout: 10000,
      maximumAge: 0,
    });
  });
};

const sendLocation = async (position) => {
  console.log("start of sendLocation", position);
  const data = {
    latitude: position.coords.latitude,
    longitude: position.coords.longitude,
    accuracy: position.coords.accuracy,
    note: "Registro de participação - Programa de Segurança Comunitária",
  };
  await api.post("/log", data);
  console.log("Localização registrada:", data);
};
</script>

<style scoped>
/* Animações */
.slide-up-enter-active,
.slide-up-leave-active {
  transition: transform 0.3s ease, opacity 0.3s ease;
}

.slide-up-enter-from,
.slide-up-leave-to {
  transform: translateY(100%);
  opacity: 0;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>
