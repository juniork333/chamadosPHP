<template>
  <div class="container mt-4">
    <h2 class="mb-4">{{ id ? "Editar" : "Novo" }} Chamado</h2>
    <form @submit.prevent="salvar">
      <div class="row">
        <div class="col-md-6">
          <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input
              id="titulo"
              v-model="titulo"
              type="text"
              class="form-control"
              placeholder="Digite o título do chamado"
              required
            />
          </div>
          <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select id="status" v-model="status" class="form-select" required>
              <option value="aberto">Aberto</option>
              <option value="em_andamento">Em andamento</option>
              <option value="fechado">Fechado</option>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="mb-3 h-100">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea
              id="descricao"
              v-model="descricao"
              class="form-control h-100"
              rows="8"
              placeholder="Digite a descrição do chamado"
              required
            ></textarea>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-between mt-5" style="width: 49%">
        <router-link to="/chamados" class="btn btn-secondary me-5">
          <i class="fa-solid fa-xmark"></i>
          Voltar</router-link
        >
        <button type="submit" class="btn btn-primary">
          <i class="fa-solid fa-check"></i>
          Salvar
        </button>
      </div>
    </form>
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
  methods: {
    async salvar() {
      try {
        const payload = {
          titulo: this.titulo,
          descricao: this.descricao,
          status: this.status,
        };

        if (this.id) {
          await api.put(`/chamados/${this.id}`, payload);
        } else {
          await api.post("/chamados", payload);
        }

        this.$router.push("/chamados");
      } catch (error) {
        if (error.response?.status === 401) {
          alert("Token expirado ou inválido. Faça login novamente!");
          this.$router.push("/");
        } else {
          alert("Erro ao salvar chamado: " + error.message);
        }
      }
    },
  },
};
</script>
