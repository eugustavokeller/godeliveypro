import axios from "axios";
import { ref } from "vue";
// import { useLoadingStore } from "@/stores/loading";
// Temporariamente usando localStorage até resolver o problema com js-cookie
// import Cookies from 'js-cookie'

const token = ref(localStorage.getItem("token") || null);

const api = axios.create({
    baseURL: import.meta.env.VITE_API_URL || "http://localhost:8000/api",
    headers: {
        "Content-Type": "application/json",
        Accept: "application/json",
    },
    timeout: 60000,
});

// Função para gerenciar o loading global
// const manageGlobalLoading = (increment = true) => {
//   try {
//     const loadingStore = useLoadingStore();
//     if (increment) {
//       loadingStore.startRequest();
//     } else {
//       loadingStore.endRequest();
//     }
//   } catch (error) {
//     // Fallback para localStorage se o store não estiver disponível
//     console.warn("Loading store não disponível, usando fallback:", error);
//     const currentLoading = localStorage.getItem("globalLoading") === "true";
//     if (increment && !currentLoading) {
//       localStorage.setItem("globalLoading", "true");
//       window.dispatchEvent(
//         new CustomEvent("globalLoadingChanged", { detail: { loading: true } })
//       );
//     } else if (!increment && currentLoading) {
//       localStorage.setItem("globalLoading", "false");
//       window.dispatchEvent(
//         new CustomEvent("globalLoadingChanged", { detail: { loading: false } })
//       );
//     }
//   }
// };

// Request Interceptor
api.interceptors.request.use(
    (config) => {
        // Incrementar contador de requisições ativas
        // manageGlobalLoading(true);

        if (token.value) {
            config.headers.Authorization = `Bearer ${token.value}`;
            config.headers["X-Requested-With"] = "XMLHttpRequest";
        }
        return config;
    },
    (error) => {
        // Decrementar contador em caso de erro na requisição
        // manageGlobalLoading(false);
        return Promise.reject(error);
    }
);

// Response Interceptor
api.interceptors.response.use(
    (response) => {
        // Decrementar contador de requisições ativas
        // manageGlobalLoading(false);
        return response;
    },
    (error) => {
        // Decrementar contador de requisições ativas
        // manageGlobalLoading(false);

        if (error.response?.status === 401) {
            // Clear token and redirect to login
            localStorage.removeItem("token");
            token.value = null;
            // Redirect will be handled by the component that catches the error
            // router.push('/login')
            console.error("Unauthorized error:", error.response.data);
        }
        // Handle validation errors
        if (error.response?.status === 422) {
            console.error("Validation error:", error.response.data);
        } else if (error.response?.status === 429) {
            console.error("Too many requests");
        } else if (error.response?.status >= 500) {
            console.error("Server error:", error.response.data);
        } else {
            console.error("Unexpected error:", error.response?.data);
        }
        return Promise.reject(error);
    }
);

export default api;
