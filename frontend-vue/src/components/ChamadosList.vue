<template>
  <div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-2">
      <h1 class="m-1">Sistema de Cadastro</h1>
      <div class="flex-grow-1 mx-4">
        <input
          type="text"
          class="form-control"
          placeholder="Pesquisar chamado..."
          v-model="pesquisa"
        />
      </div>
      <button class="btn btn-danger" @click="logout">
        <i class="fa-solid fa-arrow-right-from-bracket"></i> Sair
      </button>
    </div>
    <hr />
    <div class="d-flex justify-content-between align-items-center p-2">
      <h2>Lista de Chamados</h2>
      <router-link class="btn btn-success me-2" to="/chamados/novo">
        <i class="fa-solid fa-plus"></i> Criar Chamado
      </router-link>
    </div>

    <div class="row mt-4">
      <div class="col-md-4 mb-3" v-for="ch in chamadosFiltrados" :key="ch.id">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h5 class="card-title">{{ ch.titulo }}</h5>
            <p class="card-text">
              <strong class="me-1">Status:</strong>
              <span
                class="badge"
                :class="{
                  'bg-success': ch.status === 'fechado',
                  'bg-warning text-dark': ch.status === 'em_andamento',
                  'bg-primary': ch.status === 'aberto',
                }"
              >
                {{ ch.status }}
              </span>
            </p>
            <div class="d-flex justify-content-between">
              <router-link
                :to="`/chamados/${ch.id}`"
                class="btn btn-primary btn-sm me-2"
              >
                <i class="fa-solid fa-pencil"></i> Editar
              </router-link>
              <router-link
                :to="`/chamados/${ch.id}/visualizar`"
                class="btn btn-primary btn-sm"
              >
                <i class="fa-solid fa-eye"></i> Visualizar
              </router-link>
            </div>
          </div>
        </div>
      </div>
      <div v-if="chamadosFiltrados.length === 0" class="w-100 text-center mt-5">
        <h4>
          <i class="fa-solid fa-triangle-exclamation"></i>Nenhum chamado
          encontrado
        </h4>
      </div>
    </div>
  </div>
</template>

<script>
import api from "../services/api";

export default {
  data() {
    return { chamados: [], pesquisa: "" };
  },
  async created() {
    try {
      const { data } = await api.get("/chamados");
      this.chamados = data;
    } catch (error) {
      console.log(error);
    }
  },
  computed: {
    chamadosFiltrados() {
      if (!this.pesquisa) return this.chamados;
      return this.chamados.filter((ch) =>
        ch.titulo.toLowerCase().includes(this.pesquisa.toLowerCase())
      );
    },
  },
  methods: {
    logout() {
      localStorage.removeItem("loggedIn");
      this.$router.push("/");
    },
  },
};
</script>
