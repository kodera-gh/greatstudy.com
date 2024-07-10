<template>
  <div>
    <h1>APIテストセンター</h1>
    <div class="row">
      <button id="send" class="form-content" @click="send">API通信テスト</button>
      <input id="message" class="form-content" type="text" name="sessage" v-model="message" readonly>
      <div class="response" v-show="response" v-for="data in response" :key="data.id">
        <p class="dataId">id: {{ data.id }}</p>
        <p class="dataName">name: {{ data.name }}</p>
      </div>
      <div class="close" v-show="response">
        <button @click="textClear">閉じる</button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "ApiVue",
  data() {
    return {
      message: "ボタンを押してください",
      response: null,
    }
  },
  methods: {
    async send() {
      let params = new URLSearchParams();
      axios
        .post("http://localhost:8000/test.php", params)
        .then((response) => {
          if (response.status === 200) {
            this.message = "通信に成功😀"
            this.response = response.data;
          } else {
            this.message = "通信に失敗"
          }
        })
        .catch((error) => {
          console.log(error);
        })
    },
    textClear() {
      this.message = "ボタンを押してください";
      this.response = null;
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
    flex-wrap: wrap;
    padding: 30px 0 10px 0;
    margin-bottom: 20px;
    background-color: var(--gray);
    .form-content {
      margin-bottom: 20px;
    }
    .response {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 90%;
      height: 40px;
      border-bottom: 2px solid var(--main);
      margin: 5px auto;
      background-color: #fff;
      .dataId {
        width: 15%;
      }
      .dataName {
        width: 50%;
        text-align: center;
      }
    }
    .close {
      margin-top: 10px;
      margin-bottom: 20px;
    }
  }
</style>