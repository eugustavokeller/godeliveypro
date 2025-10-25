import { createRouter, createWebHistory } from "vue-router";

const ConsentCapture = () => import("@/components/ConsentCapture.vue");
const LandingPage = () => import("@/components/LandingPage.vue");

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "LandingPage",
      component: LandingPage,
    },
    {
      path: "/consent",
      name: "ConsentCapture",
      component: ConsentCapture,
    },
  ],
});

export default router;
