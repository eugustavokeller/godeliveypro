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
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
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
              Calcule rotas, tempo médio, kilometragem e muito mais para
              entregar mais rápido e eficiente. Nossa tecnologia avançada de
              roteamento transforma sua operação de entregas.
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
                <div class="flex items-center justify-between mb-4">
                  <h3 class="text-lg font-semibold">Rota Otimizada</h3>
                  <div
                    class="w-3 h-3 bg-green-400 rounded-full animate-pulse"
                  ></div>
                </div>
                <div class="space-y-3">
                  <div class="flex items-center space-x-3">
                    <div class="w-2 h-2 bg-blue-300 rounded-full"></div>
                    <span class="text-sm">Ponto de Coleta</span>
                  </div>
                  <div class="flex items-center space-x-3">
                    <div class="w-2 h-2 bg-yellow-300 rounded-full"></div>
                    <span class="text-sm">Entrega 1 - 15min</span>
                  </div>
                  <div class="flex items-center space-x-3">
                    <div class="w-2 h-2 bg-yellow-300 rounded-full"></div>
                    <span class="text-sm">Entrega 2 - 8min</span>
                  </div>
                  <div class="flex items-center space-x-3">
                    <div class="w-2 h-2 bg-yellow-300 rounded-full"></div>
                    <span class="text-sm">Entrega 3 - 12min</span>
                  </div>
                </div>
                <div class="mt-4 pt-4 border-t border-blue-400">
                  <div class="flex justify-between text-sm">
                    <span>Tempo Total:</span>
                    <span class="font-semibold">35 minutos</span>
                  </div>
                  <div class="flex justify-between text-sm">
                    <span>Distância:</span>
                    <span class="font-semibold">12.5 km</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
            Funcionalidades que fazem a diferença
          </h2>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Tecnologia avançada para otimizar cada aspecto da sua operação de
            entregas
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
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
          <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
            Escolha o plano ideal para você
          </h2>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Comece gratuitamente e evolua conforme sua necessidade cresce
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
          <!-- Plano Básico -->
          <div
            class="bg-white rounded-2xl shadow-lg p-8 border border-gray-200"
          >
            <div class="text-center">
              <h3 class="text-2xl font-bold text-gray-900 mb-2">Básico</h3>
              <div class="mb-6">
                <span class="text-4xl font-bold text-gray-900">R$ 29</span>
                <span class="text-gray-600">/mês</span>
              </div>
              <p class="text-gray-600 mb-8">Perfeito para pequenas operações</p>
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
                <span class="text-gray-700">Até 100 entregas/mês</span>
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
                <span class="text-gray-700">Cálculo de rotas básico</span>
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
                <span class="text-gray-700">Suporte por email</span>
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
            <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
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
                <span class="text-4xl font-bold text-gray-900">R$ 79</span>
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
                <span class="text-gray-700">Até 500 entregas/mês</span>
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
                <span class="text-gray-700">Otimização avançada</span>
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
                <span class="text-gray-700">Monitoramento em tempo real</span>
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
                <span class="text-gray-700">Suporte prioritário</span>
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
              <h3 class="text-2xl font-bold text-gray-900 mb-2">Enterprise</h3>
              <div class="mb-6">
                <span class="text-4xl font-bold text-gray-900">R$ 199</span>
                <span class="text-gray-600">/mês</span>
              </div>
              <p class="text-gray-600 mb-8">Para grandes operações</p>
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
                <span class="text-gray-700">Entregas ilimitadas</span>
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
                <span class="text-gray-700">API personalizada</span>
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
                <span class="text-gray-700">Relatórios customizados</span>
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
                <span class="text-gray-700">Suporte dedicado</span>
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
          <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
            O que nossos clientes dizem
          </h2>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Empresas que confiam na nossa solução para otimizar suas entregas
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div class="bg-gray-50 rounded-2xl p-8">
            <div class="flex items-center mb-4">
              <div class="flex text-yellow-400">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                  ></path>
                </svg>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                  ></path>
                </svg>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                  ></path>
                </svg>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                  ></path>
                </svg>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                  ></path>
                </svg>
              </div>
            </div>
            <p class="text-gray-700 mb-6 italic">
              "O GoDeliveryPro revolucionou nossa operação de entregas.
              Reduzimos 30% do tempo de entrega e economizamos
              significativamente em combustível."
            </p>
            <div class="flex items-center">
              <div
                class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4"
              >
                <span class="text-blue-600 font-semibold">MR</span>
              </div>
              <div>
                <p class="font-semibold text-gray-900">Maria Rodrigues</p>
                <p class="text-gray-600 text-sm">CEO, DeliveryExpress</p>
              </div>
            </div>
          </div>

          <div class="bg-gray-50 rounded-2xl p-8">
            <div class="flex items-center mb-4">
              <div class="flex text-yellow-400">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                  ></path>
                </svg>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                  ></path>
                </svg>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                  ></path>
                </svg>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                  ></path>
                </svg>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                  ></path>
                </svg>
              </div>
            </div>
            <p class="text-gray-700 mb-6 italic">
              "Interface intuitiva e resultados impressionantes. Nossos clientes
              ficaram muito satisfeitos com a pontualidade das entregas."
            </p>
            <div class="flex items-center">
              <div
                class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4"
              >
                <span class="text-green-600 font-semibold">CS</span>
              </div>
              <div>
                <p class="font-semibold text-gray-900">Carlos Silva</p>
                <p class="text-gray-600 text-sm">Diretor, LogísticaPro</p>
              </div>
            </div>
          </div>

          <div class="bg-gray-50 rounded-2xl p-8">
            <div class="flex items-center mb-4">
              <div class="flex text-yellow-400">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                  ></path>
                </svg>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                  ></path>
                </svg>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                  ></path>
                </svg>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                  ></path>
                </svg>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                  ></path>
                </svg>
              </div>
            </div>
            <p class="text-gray-700 mb-6 italic">
              "O ROI foi imediato. Em 3 meses já recuperamos o investimento e
              aumentamos nossa eficiência operacional em 40%."
            </p>
            <div class="flex items-center">
              <div
                class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-4"
              >
                <span class="text-purple-600 font-semibold">AS</span>
              </div>
              <div>
                <p class="font-semibold text-gray-900">Ana Santos</p>
                <p class="text-gray-600 text-sm">Gerente, FastDelivery</p>
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
          Comece hoje mesmo e veja a diferença na eficiência da sua operação de
          entregas.
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
