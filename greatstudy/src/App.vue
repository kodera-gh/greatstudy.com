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
  --gray: #f0f0f0;
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

a,
button {
  &:hover {
    cursor: pointer;
  }
}

p {
  margin: 0;
}

button {
  min-width: 150px;
  min-height: 40px;
  border: 2px var(--main) solid;
  border-radius: 10px;
  font-size: 16px;
  font-weight: bold;
  color: white;
  background-color: var(--main);
  &:hover {
    color: var(--main);
    background-color: white;
  }
}

input {
  display: block;
  min-width: 400px;
  min-height: 40px;
  padding: 0 15px;
  border: 2px var(--main) solid;
  border-radius: 10px;
  font-size: 16px;
}
</style>
