import { createRouter, createWebHistory } from "vue-router";
import Login from "../views/Login.vue";
import ChamadosList from "../components/ChamadosList.vue";
import ChamadoForm from "../components/ChamadoForm.vue";
import VisualizarChamado from "@/components/VisualizarChamado.vue";

const routes = [
  { path: "/", name: "Login", component: Login },
  {
    path: "/chamados",
    name: "ChamadosList",
    component: ChamadosList,
    props: true,
    meta: { requiresAuth: true },
  },
  {
    path: "/chamados/novo",
    name: "ChamadoNovo",
    component: ChamadoForm,
    props: true,
    meta: { requiresAuth: true },
  },
  {
    path: "/chamados/:id",
    name: "ChamadoEditar",
    component: ChamadoForm,
    props: true,
    meta: { requiresAuth: true },
  },
  {
    path: "/chamados/:id/visualizar",
    name: "visualizar-chamado",
    component: VisualizarChamado,
    props: true,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach((to, from, next) => {
  const loggedIn = localStorage.getItem("loggedIn");
  if (to.meta.requiresAuth && !loggedIn) {
    next("/");
  } else {
    next();
  }
});

export default router;
