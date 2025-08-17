<script setup></script>

<template>
  <div class="corFundo">
    <!-- <h1>Sistema de Chamados</h1> -->
    <router-view></router-view>
  </div>
</template>

<style>
header {
  line-height: 1.5;
}
html,
body,
#app {
  margin: 0;
  padding: 0;
  height: 100%;
  width: 100%;
  background-color: #e1e3e6;
}
.logo {
  display: block;
  margin: 0 auto 2rem;
}
.corFundo {
  min-height: 100vh;
  width: 100%;
  background-color: #e1e3e6;
}
@media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }

  .logo {
    margin: 0 2rem 0 0;
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }
}
</style>
