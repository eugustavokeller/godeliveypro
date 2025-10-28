<template>
    <div class="min-h-screen bg-white">
        <!-- Cookie Modal -->
        <CookieModal
            ref="cookieModalRef"
            @cookie-preferences="handleCookiePreferences"
        />

        <!-- Header -->
        <Header @onAcceptAll="acceptAll" />

        <!-- Hero Section -->
        <section
            class="relative bg-gradient-to-br from-blue-50 to-indigo-100 py-20 lg:py-32"
        >
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div
                    class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center"
                >
                    <!-- Conteúdo Textual -->
                    <div class="text-center lg:text-left">
                        <h1
                            class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 leading-tight mb-6"
                        >
                            Otimize suas
                            <span class="text-blue-600">entregas</span>
                            em tempo real
                        </h1>
                        <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                            Calcule rotas, tempo médio, kilometragem e muito
                            mais para entregar mais rápido e eficiente. Nossa
                            tecnologia avançada de roteamento transforma sua
                            operação de entregas.
                        </p>
                        <div
                            class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start"
                        >
                            <Button
                                @click="acceptAll"
                                variant="primary"
                                size="lg"
                                class="text-lg px-8 py-4"
                            >
                                Comece Agora
                            </Button>
                            <Button
                                @click="acceptAll"
                                variant="outline"
                                size="lg"
                                class="text-lg px-8 py-4"
                            >
                                Saiba Mais
                            </Button>
                        </div>
                    </div>

                    <!-- Ilustração -->
                    <div class="relative">
                        <div
                            class="bg-white rounded-2xl shadow-2xl p-8 transform rotate-3 hover:rotate-0 transition-transform duration-500"
                        >
                            <div
                                class="bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl p-6 text-white"
                            >
                                <div
                                    class="flex items-center justify-between mb-4"
                                >
                                    <h3 class="text-lg font-semibold">
                                        Rota Otimizada
                                    </h3>
                                    <div
                                        class="w-3 h-3 bg-green-400 rounded-full animate-pulse"
                                    ></div>
                                </div>
                                <div class="space-y-3">
                                    <div class="flex items-center space-x-3">
                                        <div
                                            class="w-2 h-2 bg-blue-300 rounded-full"
                                        ></div>
                                        <span class="text-sm"
                                            >Ponto de Coleta</span
                                        >
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <div
                                            class="w-2 h-2 bg-yellow-300 rounded-full"
                                        ></div>
                                        <span class="text-sm"
                                            >Entrega 1 - 15min</span
                                        >
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <div
                                            class="w-2 h-2 bg-yellow-300 rounded-full"
                                        ></div>
                                        <span class="text-sm"
                                            >Entrega 2 - 8min</span
                                        >
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <div
                                            class="w-2 h-2 bg-yellow-300 rounded-full"
                                        ></div>
                                        <span class="text-sm"
                                            >Entrega 3 - 12min</span
                                        >
                                    </div>
                                </div>
                                <div class="mt-4 pt-4 border-t border-blue-400">
                                    <div class="flex justify-between text-sm">
                                        <span>Tempo Total:</span>
                                        <span class="font-semibold"
                                            >35 minutos</span
                                        >
                                    </div>
                                    <div class="flex justify-between text-sm">
                                        <span>Distância:</span>
                                        <span class="font-semibold"
                                            >12.5 km</span
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Como Funciona - Mapa de Rotas -->
        <section class="py-20 bg-gradient-to-br from-gray-50 to-blue-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2
                        class="text-3xl md:text-4xl font-bold text-gray-900 mb-4"
                    >
                        Veja como funciona em tempo real
                    </h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Visualize nossas rotas otimizadas com mapas interativos
                        e precisão
                    </p>
                </div>

                <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                    <div class="grid grid-cols-1 lg:grid-cols-2">
                        <!-- Mapa Visual -->
                        <div
                            class="relative bg-gray-900 p-8 min-h-[500px] flex items-center justify-center"
                        >
                            <!-- Simulação de Mapa -->
                            <div class="relative w-full h-full max-w-xl">
                                <!-- Grid do Mapa -->
                                <div
                                    class="absolute inset-0 bg-gray-800 rounded-lg overflow-hidden"
                                >
                                    <div
                                        class="absolute inset-0 bg-gradient-to-br from-green-900/20 to-blue-900/20"
                                    ></div>

                                    <!-- Ruas/Grid -->
                                    <svg
                                        class="absolute inset-0 w-full h-full"
                                        viewBox="0 0 400 400"
                                    >
                                        <defs>
                                            <pattern
                                                id="streetGrid"
                                                x="0"
                                                y="0"
                                                width="40"
                                                height="40"
                                                patternUnits="userSpaceOnUse"
                                            >
                                                <rect
                                                    width="40"
                                                    height="40"
                                                    fill="#1f2937"
                                                />
                                                <rect
                                                    x="15"
                                                    y="15"
                                                    width="10"
                                                    height="10"
                                                    fill="#374151"
                                                />
                                            </pattern>
                                        </defs>
                                        <rect
                                            width="100%"
                                            height="100%"
                                            fill="url(#streetGrid)"
                                        />
                                    </svg>

                                    <!-- Rota Animada -->
                                    <svg
                                        class="absolute inset-0 w-full h-full"
                                        viewBox="0 0 400 400"
                                    >
                                        <defs>
                                            <marker
                                                id="arrowhead"
                                                markerWidth="10"
                                                markerHeight="10"
                                                refX="5"
                                                refY="3"
                                                orient="auto"
                                            >
                                                <polygon
                                                    points="0 0, 10 0, 5 3"
                                                    fill="#3b82f6"
                                                />
                                            </marker>
                                            <linearGradient
                                                id="routeGradient"
                                                x1="0%"
                                                y1="0%"
                                                x2="100%"
                                                y2="0%"
                                            >
                                                <stop
                                                    offset="0%"
                                                    stop-color="#3b82f6"
                                                    stop-opacity="1"
                                                />
                                                <stop
                                                    offset="50%"
                                                    stop-color="#8b5cf6"
                                                    stop-opacity="0.8"
                                                />
                                                <stop
                                                    offset="100%"
                                                    stop-color="#3b82f6"
                                                    stop-opacity="0.6"
                                                />
                                            </linearGradient>
                                        </defs>
                                        <!-- Linha de rota animada -->
                                        <path
                                            d="M 60 250 Q 150 100, 200 150 T 340 200"
                                            stroke="url(#routeGradient)"
                                            stroke-width="4"
                                            fill="none"
                                            marker-end="url(#arrowhead)"
                                            class="animate-pulse"
                                        />
                                        <!-- Animação de progresso -->
                                        <circle
                                            cx="60"
                                            cy="250"
                                            r="8"
                                            fill="#10b981"
                                            class="animate-ping"
                                        />
                                        <circle
                                            cx="340"
                                            cy="200"
                                            r="8"
                                            fill="#ef4444"
                                            class="animate-pulse"
                                        />
                                    </svg>

                                    <!-- Pontos de Entrega -->
                                    <div
                                        class="absolute top-[60%] left-[15%] transform -translate-x-1/2 -translate-y-1/2"
                                    >
                                        <div class="relative">
                                            <div
                                                class="w-4 h-4 bg-green-500 rounded-full animate-pulse"
                                            ></div>
                                            <div
                                                class="absolute -top-12 left-1/2 transform -translate-x-1/2 bg-white px-3 py-1 rounded-lg shadow-lg text-xs font-semibold whitespace-nowrap"
                                            >
                                                <div
                                                    class="absolute -bottom-1 left-1/2 transform -translate-x-1/2 w-2 h-2 bg-white rotate-45"
                                                ></div>
                                                Ponto de Coleta
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="absolute top-[40%] left-[40%] transform -translate-x-1/2 -translate-y-1/2"
                                    >
                                        <div class="relative">
                                            <div
                                                class="w-4 h-4 bg-blue-500 rounded-full animate-pulse"
                                            ></div>
                                            <div
                                                class="absolute -top-12 left-1/2 transform -translate-x-1/2 bg-white px-3 py-1 rounded-lg shadow-lg text-xs font-semibold whitespace-nowrap"
                                            >
                                                <div
                                                    class="absolute -bottom-1 left-1/2 transform -translate-x-1/2 w-2 h-2 bg-white rotate-45"
                                                ></div>
                                                Entrega 1
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="absolute top-[30%] left-[60%] transform -translate-x-1/2 -translate-y-1/2"
                                    >
                                        <div class="relative">
                                            <div
                                                class="w-4 h-4 bg-purple-500 rounded-full animate-pulse"
                                            ></div>
                                            <div
                                                class="absolute -top-12 left-1/2 transform -translate-x-1/2 bg-white px-3 py-1 rounded-lg shadow-lg text-xs font-semibold whitespace-nowrap"
                                            >
                                                <div
                                                    class="absolute -bottom-1 left-1/2 transform -translate-x-1/2 w-2 h-2 bg-white rotate-45"
                                                ></div>
                                                Entrega 2
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="absolute top-[50%] left-[85%] transform -translate-x-1/2 -translate-y-1/2"
                                    >
                                        <div class="relative">
                                            <div
                                                class="w-4 h-4 bg-orange-500 rounded-full animate-pulse"
                                            ></div>
                                            <div
                                                class="absolute -top-12 left-1/2 transform -translate-x-1/2 bg-white px-3 py-1 rounded-lg shadow-lg text-xs font-semibold whitespace-nowrap"
                                            >
                                                <div
                                                    class="absolute -bottom-1 left-1/2 transform -translate-x-1/2 w-2 h-2 bg-white rotate-45"
                                                ></div>
                                                Entrega 3
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Legenda do Mapa -->
                                <div
                                    class="absolute bottom-4 left-4 bg-white/90 backdrop-blur-sm rounded-lg p-4 shadow-lg"
                                >
                                    <div class="flex flex-col gap-2 text-xs">
                                        <div class="flex items-center gap-2">
                                            <div
                                                class="w-3 h-3 bg-green-500 rounded-full"
                                            ></div>
                                            <span class="text-gray-700"
                                                >Ponto de Coleta</span
                                            >
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <div
                                                class="w-3 h-3 bg-blue-500 rounded-full"
                                            ></div>
                                            <span class="text-gray-700"
                                                >Pontos de Entrega</span
                                            >
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <div
                                                class="w-8 h-1 bg-gradient-to-r from-blue-500 to-purple-500 rounded"
                                            ></div>
                                            <span class="text-gray-700"
                                                >Rota Otimizada</span
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Informações da Rota -->
                        <div class="p-12 flex flex-col justify-center">
                            <div class="space-y-8">
                                <div>
                                    <h3
                                        class="text-2xl font-bold text-gray-900 mb-2"
                                    >
                                        Rota Otimizada em Ação
                                    </h3>
                                    <p class="text-gray-600">
                                        Veja como nosso algoritmo reorganiza
                                        automaticamente os pontos de entrega
                                        para economizar tempo e combustível.
                                    </p>
                                </div>

                                <!-- Métricas -->
                                <div class="grid grid-cols-2 gap-6">
                                    <div class="bg-blue-50 rounded-xl p-4">
                                        <div
                                            class="flex items-center gap-2 mb-2"
                                        >
                                            <svg
                                                class="w-6 h-6 text-blue-600"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                                ></path>
                                            </svg>
                                            <span
                                                class="text-sm font-semibold text-gray-700"
                                                >Tempo Economizado</span
                                            >
                                        </div>
                                        <p
                                            class="text-3xl font-bold text-blue-600"
                                        >
                                            -35%
                                        </p>
                                    </div>

                                    <div class="bg-green-50 rounded-xl p-4">
                                        <div
                                            class="flex items-center gap-2 mb-2"
                                        >
                                            <svg
                                                class="w-6 h-6 text-green-600"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                                ></path>
                                            </svg>
                                            <span
                                                class="text-sm font-semibold text-gray-700"
                                                >Combustível</span
                                            >
                                        </div>
                                        <p
                                            class="text-3xl font-bold text-green-600"
                                        >
                                            -28%
                                        </p>
                                    </div>

                                    <div class="bg-purple-50 rounded-xl p-4">
                                        <div
                                            class="flex items-center gap-2 mb-2"
                                        >
                                            <svg
                                                class="w-6 h-6 text-purple-600"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M13 10V3L4 14h7v7l9-11h-7z"
                                                ></path>
                                            </svg>
                                            <span
                                                class="text-sm font-semibold text-gray-700"
                                                >Eficiência</span
                                            >
                                        </div>
                                        <p
                                            class="text-3xl font-bold text-purple-600"
                                        >
                                            +42%
                                        </p>
                                    </div>

                                    <div class="bg-orange-50 rounded-xl p-4">
                                        <div
                                            class="flex items-center gap-2 mb-2"
                                        >
                                            <svg
                                                class="w-6 h-6 text-orange-600"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                                ></path>
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                                ></path>
                                            </svg>
                                            <span
                                                class="text-sm font-semibold text-gray-700"
                                                >Entregas</span
                                            >
                                        </div>
                                        <p
                                            class="text-3xl font-bold text-orange-600"
                                        >
                                            4
                                        </p>
                                    </div>
                                </div>

                                <!-- Estatísticas Detalhadas -->
                                <div class="bg-gray-50 rounded-xl p-6">
                                    <h4
                                        class="font-semibold text-gray-900 mb-4"
                                    >
                                        Detalhes da Rota
                                    </h4>
                                    <div class="space-y-3">
                                        <div
                                            class="flex justify-between items-center"
                                        >
                                            <span class="text-sm text-gray-600"
                                                >Distância Total:</span
                                            >
                                            <span
                                                class="font-semibold text-gray-900"
                                                >12.5 km</span
                                            >
                                        </div>
                                        <div
                                            class="flex justify-between items-center"
                                        >
                                            <span class="text-sm text-gray-600"
                                                >Tempo Estimado:</span
                                            >
                                            <span
                                                class="font-semibold text-gray-900"
                                                >35 minutos</span
                                            >
                                        </div>
                                        <div
                                            class="flex justify-between items-center"
                                        >
                                            <span class="text-sm text-gray-600"
                                                >Economia:</span
                                            >
                                            <span
                                                class="font-semibold text-green-600"
                                                >R$ 15,50</span
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Estatísticas e Resultados -->
        <section class="py-20 bg-white border-t border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2
                        class="text-3xl md:text-4xl font-bold text-gray-900 mb-4"
                    >
                        Resultados que Falam por Si
                    </h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Veja o impacto real que o GoDeliveryPro gera nas
                        operações de entrega
                    </p>
                </div>

                <!-- Cards de Estatísticas -->
                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8"
                >
                    <div
                        class="text-center p-8 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl transform hover:scale-105 transition-transform duration-300"
                    >
                        <div class="mb-4">
                            <div
                                class="inline-flex items-center justify-center w-16 h-16 bg-blue-600 rounded-full"
                            >
                                <svg
                                    class="w-8 h-8 text-white"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z"
                                    />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-5xl font-bold text-blue-600 mb-2">
                            +500
                        </h3>
                        <p class="text-gray-700 font-semibold">
                            Empresas Conectadas
                        </p>
                    </div>

                    <div
                        class="text-center p-8 bg-gradient-to-br from-green-50 to-green-100 rounded-2xl transform hover:scale-105 transition-transform duration-300"
                    >
                        <div class="mb-4">
                            <div
                                class="inline-flex items-center justify-center w-16 h-16 bg-green-600 rounded-full"
                            >
                                <svg
                                    class="w-8 h-8 text-white"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                    />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-5xl font-bold text-green-600 mb-2">
                            2.5M+
                        </h3>
                        <p class="text-gray-700 font-semibold">
                            Entregas Otimizadas
                        </p>
                    </div>

                    <div
                        class="text-center p-8 bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl transform hover:scale-105 transition-transform duration-300"
                    >
                        <div class="mb-4">
                            <div
                                class="inline-flex items-center justify-center w-16 h-16 bg-purple-600 rounded-full"
                            >
                                <svg
                                    class="w-8 h-8 text-white"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                    />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-5xl font-bold text-purple-600 mb-2">
                            R$ 45M
                        </h3>
                        <p class="text-gray-700 font-semibold">
                            Economizados pelos Clientes
                        </p>
                    </div>

                    <div
                        class="text-center p-8 bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl transform hover:scale-105 transition-transform duration-300"
                    >
                        <div class="mb-4">
                            <div
                                class="inline-flex items-center justify-center w-16 h-16 bg-orange-600 rounded-full"
                            >
                                <svg
                                    class="w-8 h-8 text-white"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                    />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-5xl font-bold text-orange-600 mb-2">
                            35%
                        </h3>
                        <p class="text-gray-700 font-semibold">
                            Redução de Tempo
                        </p>
                    </div>
                </div>

                <!-- Benefícios Quantificados -->
                <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div
                        class="bg-white border-2 border-blue-100 rounded-xl p-6"
                    >
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0">
                                <div
                                    class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center"
                                >
                                    <svg
                                        class="w-6 h-6 text-blue-600"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"
                                        />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-2">
                                    Algoritmos de IA
                                </h4>
                                <p class="text-sm text-gray-600">
                                    Machine Learning avançado para calcular as
                                    melhores rotas em tempo real
                                </p>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-white border-2 border-green-100 rounded-xl p-6"
                    >
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0">
                                <div
                                    class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center"
                                >
                                    <svg
                                        class="w-6 h-6 text-green-600"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"
                                        />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-2">
                                    Dados em Nuvem
                                </h4>
                                <p class="text-sm text-gray-600">
                                    Armazenamento seguro e backup automático de
                                    todas as informações
                                </p>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-white border-2 border-purple-100 rounded-xl p-6"
                    >
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0">
                                <div
                                    class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center"
                                >
                                    <svg
                                        class="w-6 h-6 text-purple-600"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                                        />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-2">
                                    100% Seguro
                                </h4>
                                <p class="text-sm text-gray-600">
                                    Criptografia de ponta a ponta e compliance
                                    total com LGPD
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Empresas Clientes -->
        <section class="py-16 bg-gray-50 border-y border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <p
                        class="text-sm uppercase tracking-wide text-gray-500 font-semibold mb-4"
                    >
                        Confiança das Principais Empresas
                    </p>
                    <p class="text-gray-600 max-w-2xl mx-auto">
                        Empresas líderes em logística confiam no GoDeliveryPro
                        para otimizar suas operações
                    </p>
                </div>

                <div
                    class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8 items-center"
                >
                    <!-- Logos de Empresas -->
                    <div
                        class="flex items-center justify-center h-20 bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow"
                    >
                        <div class="text-center">
                            <div class="text-2xl font-bold text-blue-600">
                                Fast
                            </div>
                            <div class="text-xs text-gray-500">Delivery</div>
                        </div>
                    </div>

                    <div
                        class="flex items-center justify-center h-20 bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow"
                    >
                        <div class="text-center">
                            <div class="text-2xl font-bold text-green-600">
                                Quick
                            </div>
                            <div class="text-xs text-gray-500">Logistics</div>
                        </div>
                    </div>

                    <div
                        class="flex items-center justify-center h-20 bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow"
                    >
                        <div class="text-center">
                            <div class="text-2xl font-bold text-purple-600">
                                Express
                            </div>
                            <div class="text-xs text-gray-500">Corp</div>
                        </div>
                    </div>

                    <div
                        class="flex items-center justify-center h-20 bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow"
                    >
                        <div class="text-center">
                            <div class="text-2xl font-bold text-orange-600">
                                Swift
                            </div>
                            <div class="text-xs text-gray-500">Hub</div>
                        </div>
                    </div>

                    <div
                        class="flex items-center justify-center h-20 bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow"
                    >
                        <div class="text-center">
                            <div class="text-2xl font-bold text-indigo-600">
                                Prime
                            </div>
                            <div class="text-xs text-gray-500">Logistics</div>
                        </div>
                    </div>

                    <div
                        class="flex items-center justify-center h-20 bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow"
                    >
                        <div class="text-center">
                            <div class="text-2xl font-bold text-red-600">
                                Speed
                            </div>
                            <div class="text-xs text-gray-500">Services</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2
                        class="text-3xl md:text-4xl font-bold text-gray-900 mb-4"
                    >
                        Funcionalidades que fazem a diferença
                    </h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Tecnologia avançada para otimizar cada aspecto da sua
                        operação de entregas
                    </p>
                </div>

                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"
                >
                    <Card
                        title="Cálculo de Rotas"
                        description="Algoritmos inteligentes que calculam as melhores rotas considerando trânsito, distância e tempo de entrega."
                        :icon="RouteIcon"
                    />
                    <Card
                        title="Estimativa de Tempo"
                        description="Previsão precisa do tempo médio de entrega baseada em dados históricos e condições atuais do trânsito."
                        :icon="TimeIcon"
                    />
                    <Card
                        title="Kilometragem Total"
                        description="Controle completo da distância percorrida com relatórios detalhados para otimização de custos."
                        :icon="AnalyticsIcon"
                    />
                    <Card
                        title="Otimização de Trajetos"
                        description="Reorganização automática de entregas para minimizar tempo e combustível gasto."
                        :icon="SpeedIcon"
                    />
                    <Card
                        title="Monitoramento em Tempo Real"
                        description="Acompanhe o progresso das entregas com atualizações em tempo real e notificações automáticas."
                        :icon="MonitorIcon"
                    />
                    <Card
                        title="Relatórios Avançados"
                        description="Análises detalhadas de performance com gráficos e métricas para tomada de decisões estratégicas."
                        :icon="AnalyticsIcon"
                    />
                </div>
            </div>
        </section>

        <!-- Pricing Section -->
        <section id="pricing" class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2
                        class="text-3xl md:text-4xl font-bold text-gray-900 mb-4"
                    >
                        Escolha o plano ideal para você
                    </h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Comece gratuitamente e evolua conforme sua necessidade
                        cresce
                    </p>
                </div>

                <div
                    class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto"
                >
                    <!-- Plano Básico -->
                    <div
                        class="bg-white rounded-2xl shadow-lg p-8 border border-gray-200"
                    >
                        <div class="text-center">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">
                                Básico
                            </h3>
                            <div class="mb-6">
                                <span class="text-4xl font-bold text-gray-900"
                                    >R$ 29</span
                                >
                                <span class="text-gray-600">/mês</span>
                            </div>
                            <p class="text-gray-600 mb-8">
                                Perfeito para pequenas operações
                            </p>
                        </div>
                        <ul class="space-y-4 mb-8">
                            <li class="flex items-center">
                                <svg
                                    class="w-5 h-5 text-green-500 mr-3"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"
                                    ></path>
                                </svg>
                                <span class="text-gray-700"
                                    >Até 100 entregas/mês</span
                                >
                            </li>
                            <li class="flex items-center">
                                <svg
                                    class="w-5 h-5 text-green-500 mr-3"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"
                                    ></path>
                                </svg>
                                <span class="text-gray-700"
                                    >Cálculo de rotas básico</span
                                >
                            </li>
                            <li class="flex items-center">
                                <svg
                                    class="w-5 h-5 text-green-500 mr-3"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"
                                    ></path>
                                </svg>
                                <span class="text-gray-700"
                                    >Suporte por email</span
                                >
                            </li>
                        </ul>
                        <Button variant="outline" size="lg" class="w-full">
                            Começar Teste Grátis
                        </Button>
                    </div>

                    <!-- Plano Profissional -->
                    <div
                        class="bg-white rounded-2xl shadow-xl p-8 border-2 border-blue-500 relative"
                    >
                        <div
                            class="absolute -top-4 left-1/2 transform -translate-x-1/2"
                        >
                            <span
                                class="bg-blue-500 text-white px-4 py-2 rounded-full text-sm font-semibold"
                            >
                                Mais Popular
                            </span>
                        </div>
                        <div class="text-center">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">
                                Profissional
                            </h3>
                            <div class="mb-6">
                                <span class="text-4xl font-bold text-gray-900"
                                    >R$ 79</span
                                >
                                <span class="text-gray-600">/mês</span>
                            </div>
                            <p class="text-gray-600 mb-8">
                                Ideal para empresas em crescimento
                            </p>
                        </div>
                        <ul class="space-y-4 mb-8">
                            <li class="flex items-center">
                                <svg
                                    class="w-5 h-5 text-green-500 mr-3"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"
                                    ></path>
                                </svg>
                                <span class="text-gray-700"
                                    >Até 500 entregas/mês</span
                                >
                            </li>
                            <li class="flex items-center">
                                <svg
                                    class="w-5 h-5 text-green-500 mr-3"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"
                                    ></path>
                                </svg>
                                <span class="text-gray-700"
                                    >Otimização avançada</span
                                >
                            </li>
                            <li class="flex items-center">
                                <svg
                                    class="w-5 h-5 text-green-500 mr-3"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"
                                    ></path>
                                </svg>
                                <span class="text-gray-700"
                                    >Monitoramento em tempo real</span
                                >
                            </li>
                            <li class="flex items-center">
                                <svg
                                    class="w-5 h-5 text-green-500 mr-3"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"
                                    ></path>
                                </svg>
                                <span class="text-gray-700"
                                    >Suporte prioritário</span
                                >
                            </li>
                        </ul>
                        <Button variant="primary" size="lg" class="w-full">
                            Começar Teste Grátis
                        </Button>
                    </div>

                    <!-- Plano Enterprise -->
                    <div
                        class="bg-white rounded-2xl shadow-lg p-8 border border-gray-200"
                    >
                        <div class="text-center">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">
                                Enterprise
                            </h3>
                            <div class="mb-6">
                                <span class="text-4xl font-bold text-gray-900"
                                    >R$ 199</span
                                >
                                <span class="text-gray-600">/mês</span>
                            </div>
                            <p class="text-gray-600 mb-8">
                                Para grandes operações
                            </p>
                        </div>
                        <ul class="space-y-4 mb-8">
                            <li class="flex items-center">
                                <svg
                                    class="w-5 h-5 text-green-500 mr-3"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"
                                    ></path>
                                </svg>
                                <span class="text-gray-700"
                                    >Entregas ilimitadas</span
                                >
                            </li>
                            <li class="flex items-center">
                                <svg
                                    class="w-5 h-5 text-green-500 mr-3"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"
                                    ></path>
                                </svg>
                                <span class="text-gray-700"
                                    >API personalizada</span
                                >
                            </li>
                            <li class="flex items-center">
                                <svg
                                    class="w-5 h-5 text-green-500 mr-3"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"
                                    ></path>
                                </svg>
                                <span class="text-gray-700"
                                    >Relatórios customizados</span
                                >
                            </li>
                            <li class="flex items-center">
                                <svg
                                    class="w-5 h-5 text-green-500 mr-3"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"
                                    ></path>
                                </svg>
                                <span class="text-gray-700"
                                    >Suporte dedicado</span
                                >
                            </li>
                        </ul>
                        <Button variant="outline" size="lg" class="w-full">
                            Falar com Vendas
                        </Button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section id="testimonials" class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2
                        class="text-3xl md:text-4xl font-bold text-gray-900 mb-4"
                    >
                        O que nossos clientes dizem
                    </h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Empresas que confiam na nossa solução para otimizar suas
                        entregas
                    </p>
                </div>

                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"
                >
                    <div class="bg-gray-50 rounded-2xl p-8">
                        <div class="flex items-center mb-4">
                            <div class="flex text-yellow-400">
                                <svg
                                    class="w-5 h-5"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    ></path>
                                </svg>
                                <svg
                                    class="w-5 h-5"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    ></path>
                                </svg>
                                <svg
                                    class="w-5 h-5"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    ></path>
                                </svg>
                                <svg
                                    class="w-5 h-5"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    ></path>
                                </svg>
                                <svg
                                    class="w-5 h-5"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    ></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-700 mb-6 italic">
                            "O GoDeliveryPro revolucionou nossa operação de
                            entregas. Reduzimos 30% do tempo de entrega e
                            economizamos significativamente em combustível."
                        </p>
                        <div class="flex items-center">
                            <div
                                class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4"
                            >
                                <span class="text-blue-600 font-semibold"
                                    >MR</span
                                >
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">
                                    Maria Rodrigues
                                </p>
                                <p class="text-gray-600 text-sm">
                                    CEO, DeliveryExpress
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl p-8">
                        <div class="flex items-center mb-4">
                            <div class="flex text-yellow-400">
                                <svg
                                    class="w-5 h-5"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    ></path>
                                </svg>
                                <svg
                                    class="w-5 h-5"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    ></path>
                                </svg>
                                <svg
                                    class="w-5 h-5"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    ></path>
                                </svg>
                                <svg
                                    class="w-5 h-5"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    ></path>
                                </svg>
                                <svg
                                    class="w-5 h-5"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    ></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-700 mb-6 italic">
                            "Interface intuitiva e resultados impressionantes.
                            Nossos clientes ficaram muito satisfeitos com a
                            pontualidade das entregas."
                        </p>
                        <div class="flex items-center">
                            <div
                                class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4"
                            >
                                <span class="text-green-600 font-semibold"
                                    >CS</span
                                >
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">
                                    Carlos Silva
                                </p>
                                <p class="text-gray-600 text-sm">
                                    Diretor, LogísticaPro
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl p-8">
                        <div class="flex items-center mb-4">
                            <div class="flex text-yellow-400">
                                <svg
                                    class="w-5 h-5"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    ></path>
                                </svg>
                                <svg
                                    class="w-5 h-5"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    ></path>
                                </svg>
                                <svg
                                    class="w-5 h-5"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    ></path>
                                </svg>
                                <svg
                                    class="w-5 h-5"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    ></path>
                                </svg>
                                <svg
                                    class="w-5 h-5"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    ></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-700 mb-6 italic">
                            "O ROI foi imediato. Em 3 meses já recuperamos o
                            investimento e aumentamos nossa eficiência
                            operacional em 40%."
                        </p>
                        <div class="flex items-center">
                            <div
                                class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-4"
                            >
                                <span class="text-purple-600 font-semibold"
                                    >AS</span
                                >
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">
                                    Ana Santos
                                </p>
                                <p class="text-gray-600 text-sm">
                                    Gerente, FastDelivery
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Garantias e Certificações -->
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2
                        class="text-3xl md:text-4xl font-bold text-gray-900 mb-4"
                    >
                        Garantimos a Melhor Experiência
                    </h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Sua confiança é nossa prioridade. Veja nossas garantias
                        e certificações
                    </p>
                </div>

                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8"
                >
                    <!-- Garantia 1 -->
                    <div
                        class="text-center p-8 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl hover:shadow-lg transition-shadow"
                    >
                        <div class="mb-4">
                            <div
                                class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full"
                            >
                                <svg
                                    class="w-10 h-10 text-white"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"
                                    />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">
                            LGPD Compliance
                        </h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Totalmente conforme a Lei Geral de Proteção de Dados
                        </p>
                    </div>

                    <!-- Garantia 2 -->
                    <div
                        class="text-center p-8 bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl hover:shadow-lg transition-shadow"
                    >
                        <div class="mb-4">
                            <div
                                class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full"
                            >
                                <svg
                                    class="w-10 h-10 text-white"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"
                                    />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">
                            99.9% Uptime
                        </h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Sistema sempre disponível com redundância em nuvem
                        </p>
                    </div>

                    <!-- Garantia 3 -->
                    <div
                        class="text-center p-8 bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl hover:shadow-lg transition-shadow"
                    >
                        <div class="mb-4">
                            <div
                                class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-purple-500 to-pink-600 rounded-full"
                            >
                                <svg
                                    class="w-10 h-10 text-white"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                    />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">
                            Suporte 24/7
                        </h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Equipe técnica disponível a qualquer momento do dia
                        </p>
                    </div>

                    <!-- Garantia 4 -->
                    <div
                        class="text-center p-8 bg-gradient-to-br from-orange-50 to-amber-50 rounded-2xl hover:shadow-lg transition-shadow"
                    >
                        <div class="mb-4">
                            <div
                                class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-orange-500 to-amber-600 rounded-full"
                            >
                                <svg
                                    class="w-10 h-10 text-white"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                    />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">
                            Sem Taxas Ocultas
                        </h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Transparência total nos preços e contratos
                        </p>
                    </div>
                </div>

                <!-- Certificações -->
                <div class="mt-16 bg-gray-50 rounded-3xl p-12">
                    <div
                        class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-center"
                    >
                        <div class="text-center lg:text-left">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4">
                                Certificações e Reconhecimentos
                            </h3>
                            <p class="text-gray-600">
                                Validado pelas principais entidades de
                                tecnologia e logística do mercado
                            </p>
                        </div>

                        <div class="lg:col-span-2 grid grid-cols-3 gap-8">
                            <div class="text-center">
                                <div
                                    class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow"
                                >
                                    <div
                                        class="text-3xl font-bold text-blue-600 mb-2"
                                    >
                                        ISO
                                    </div>
                                    <div class="text-xs text-gray-500">
                                        27001
                                    </div>
                                    <p class="text-xs text-gray-600 mt-2">
                                        Segurança
                                    </p>
                                </div>
                            </div>

                            <div class="text-center">
                                <div
                                    class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow"
                                >
                                    <div
                                        class="text-3xl font-bold text-green-600 mb-2"
                                    >
                                        SLA
                                    </div>
                                    <div class="text-xs text-gray-500">
                                        99.9%
                                    </div>
                                    <p class="text-xs text-gray-600 mt-2">
                                        Disponibilidade
                                    </p>
                                </div>
                            </div>

                            <div class="text-center">
                                <div
                                    class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow"
                                >
                                    <div
                                        class="text-3xl font-bold text-purple-600 mb-2"
                                    >
                                        NPS
                                    </div>
                                    <div class="text-xs text-gray-500">+80</div>
                                    <p class="text-xs text-gray-600 mt-2">
                                        Satisfação
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Final -->
        <section class="py-20 bg-blue-600">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                    Pronto para otimizar suas entregas?
                </h2>
                <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                    Comece hoje mesmo e veja a diferença na eficiência da sua
                    operação de entregas.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <Button
                        @click="acceptAll"
                        variant="secondary"
                        size="lg"
                        class="text-lg px-8 py-4"
                    >
                        Teste Gratuitamente
                    </Button>
                    <Button
                        @click="acceptAll"
                        variant="outline"
                        size="lg"
                        class="text-lg px-8 py-4 border-white text-white hover:bg-white hover:text-blue-600"
                    >
                        Falar com Especialista
                    </Button>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <Footer @open-cookie-modal="openCookieModal" @onAcceptAll="acceptAll" />
    </div>
</template>

<script setup>
import { ref } from "vue";
import Header from "./Header.vue";
import Footer from "./Footer.vue";
import Button from "./Button.vue";
import Card from "./Card.vue";
import CookieModal from "./CookieModal.vue";
import RouteIcon from "./icons/RouteIcon.vue";
import TimeIcon from "./icons/TimeIcon.vue";
import SpeedIcon from "./icons/SpeedIcon.vue";
import AnalyticsIcon from "./icons/AnalyticsIcon.vue";
import MonitorIcon from "./icons/MonitorIcon.vue";

// Estado das preferências de cookies
const cookiePreferences = ref(null);
const cookieModalRef = ref(null);

// Função para abrir o modal de cookies
const openCookieModal = () => {
    if (cookieModalRef.value) {
        cookieModalRef.value.openSettings();
    }
};

// Função para lidar com as preferências de cookies
const handleCookiePreferences = (preferences) => {
    cookiePreferences.value = preferences;
    // Aqui você pode implementar a lógica baseada nas preferências
    console.log("Preferências de cookies:", preferences);
    // Exemplo de implementação baseada nas preferências:
    if (preferences.performance) {
        // Inicializar Google Analytics ou outras ferramentas de análise
        console.log("Analytics habilitado");
    }
    if (preferences.marketing) {
        // Inicializar pixels de marketing (Facebook, Google Ads, etc.)
        console.log("Marketing habilitado");
    }
    if (preferences.functionality) {
        // Salvar preferências do usuário, temas, idiomas, etc.
        console.log("Funcionalidades personalizadas habilitadas");
    }
    // Sempre habilitado (cookies essenciais)
    console.log("Cookies essenciais sempre habilitados");
};

const acceptAll = () => {
    if (cookieModalRef.value) {
        cookieModalRef.value.acceptAll();
    }
};
</script>

<style scoped>
/* Estilos personalizados se necessário */
</style>
