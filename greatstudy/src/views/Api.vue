<template>
  <div>
    <h1>APIテストセンター</h1>
    <div class="row">
      <button id="send" @click="send">API通信テスト</button>
      <input type="text" name="sessage" id="message" v-model="message" readonly>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "ApiVue",
  data() {
    return {
      message: "ボタンを押してください"
    }
  },
  methods: {
    async send() {
      let params = new URLSearchParams();
      axios
        .post("http://localhost:8000/send.php", params)
        .then((response) => {
          console.log(response);
          if (response.status === 200) {
            this.message = "通信に成功"
          } else {
            this.message = "通信に失敗"
          }
        })
        .catch((error) => {
          console.log(error);
        })
    }
  },
}
</script>

<style lang="scss" scoped>
  .row {
    width: 800px;
    margin: auto;
    display: flex;
    justify-content: space-around;
    padding: 10px 0;
    margin-bottom: 20px;
    background-color: var(--gray);
  }
</style>