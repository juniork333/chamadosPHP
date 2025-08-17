<template>
  <div class="container mt-4">
    <div class="d-flex justify-content-center mb-4">
      <h2 class="mb-0 text-center">Detalhes do Chamado</h2>
    </div>
    <div
      class="d-flex flex-column justify-content-center align-items-center"
      style="min-height: 60vh"
    >
      <div class="mb-3 w-50">
        <label class="form-label">Título</label>
        <input type="text" class="form-control" :value="titulo" disabled />
      </div>

      <div class="mb-3 w-50">
        <label class="form-label">Status</label>
        <input type="text" class="form-control" :value="status" disabled />
      </div>

      <div class="mb-3 w-50">
        <label class="form-label">Descrição</label>
        <textarea
          class="form-control"
          :value="descricao"
          disabled
          rows="5"
          style="white-space: pre-wrap"
        ></textarea>
      </div>
      <div class="d-flex justify-content-start">
        <router-link to="/chamados" class="btn btn-secondary">
          <i class="fa-solid fa-xmark"></i> Voltar
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
import api from "../services/api";

export default {
  props: ["id"],
  data() {
    return { titulo: "", descricao: "", status: "aberto" };
  },
  async created() {
    if (this.id) {
      try {
        const { data } = await api.get(`/chamados/${this.id}`);
        this.titulo = data.titulo;
        this.descricao = data.descricao;
        this.status = data.status;
      } catch (error) {
        if (error.response?.status === 401) {
          alert("Faça login novamente!");
          this.$router.push("/login");
        }
      }
    }
  },
};
</script>
