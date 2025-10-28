import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import tailwindcss from "@tailwindcss/vite";
import path from "path";

export default defineConfig({
  base: "/",
  plugins: [
    laravel({
      input: ["resources/js/app.js", "resources/css/app.css"],
      refresh: true,
    }),
    vue(),
    tailwindcss(),
  ],
  build: {
    manifest: "manifest.json", // gera manifest.json na raiz do outDir
    outDir: "public/assets", // onde os arquivos são gerados fisicamente
    emptyOutDir: true,
    copyPublicDir: false,
    assetsDir: "", // <<< impede a duplicação /assets/assets
  },
  resolve: {
    alias: {
      "@": path.resolve(__dirname, "./resources/js"),
    },
  },
});
