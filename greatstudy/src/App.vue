<template>
  <nav>
    <router-link to="/">Home</router-link> |
    <router-link to="/about">About</router-link> |
    <router-link to="/api">API</router-link>
  </nav>
  <router-view/>
</template>

<style lang="scss">
:root {
  --main: #42b983;
}

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

nav {
  padding: 30px;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
}

nav a.router-link-exact-active {
  color: #42b983;
}

button {
  min-width: 150px;
  min-height: 40px;
  border: none;
  border-radius: 10px;
  font-size: 16px;
  font-weight: bold;
  color: white;
  background-color: var(--main);
}
input {
  display: block;
  min-width: 400px;
  min-height: 40px;
  padding: 0 10px;
  border: 2px var(--main) solid;
  border-radius: 10px;
  font-size: 16px;
}
</style>
