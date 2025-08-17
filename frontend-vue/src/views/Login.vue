<template>
  <div class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow p-4" style="width: 350px">
      <h3 class="text-center mb-4">Login</h3>

      <form @submit.prevent="login">
        <div class="mb-3">
          <label class="form-label">Usuário</label>
          <input
            v-model="username"
            type="text"
            class="form-control"
            placeholder="Digite seu usuário"
          />
        </div>

        <div class="mb-3">
          <label class="form-label">Senha</label>
          <input
            v-model="password"
            type="password"
            class="form-control"
            placeholder="Digite sua senha"
          />
        </div>
        <p v-if="error" class="text-danger text-center mt-3">{{ error }}</p>
        <button type="submit" class="btn btn-primary w-100">Entrar</button>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";

const router = useRouter();
const username = ref("");
const password = ref("");
const error = ref("");

//usuario fixo para a validação de login
const USER = { name: "admin", pass: "1234" };

//apaga o localstorage quando o usuario volta para a tela de login
onMounted(() => {
  localStorage.removeItem("loggedIn");
});

function login() {
  if (username.value === USER.name && password.value === USER.pass) {
    localStorage.setItem("loggedIn", "true");
    router.push("/chamados");
  } else {
    error.value = "Usuário ou senha inválidos!";
  }
}
</script>
