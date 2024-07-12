<template>
  <div>
    <h1>APIテストセンター</h1>
    <div class="row">
      <button id="send" class="form-content" @click="test">API通信テスト</button>
      <input id="message" class="form-content" type="text" name="sessage" v-model="message" readonly>
      <h2 class="sub-title" v-show="textResponse">取得データ</h2>
      <div class="response" v-show="textResponse" v-for="data in textResponse" :key="data.id">
        <p class="dataId">id: {{ data.id }}</p>
        <p class="dataName">name: {{ data.name }}</p>
      </div>
      <div class="close" v-show="textResponse">
        <button @click="textClear">閉じる</button>
      </div>
    </div>

    <div class="row">
      <button id="send" class="form-content" @click="send">メール送信テスト</button>
      <input id="message" class="form-content" type="text" name="sessage" v-model="mailMessage" readonly>
      <div class="response" v-show="mailResponse">
        <p>{{ mailResponse }}</p>
      </div>
      <div class="close" v-show="mailResponse">
        <button @click="mailClear">閉じる</button>
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
      textResponse: null,
      mailMessage: "ボタンを押してください",
      mailResponse: null,
    }
  },
  methods: {
    async test() {
      let params = new URLSearchParams();
      axios
        .post("http://localhost:8000/test.php", params)
        .then((response) => {
          if (response.status === 200) {
            this.message = "通信に成功😀"
            this.textResponse = response.data;
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
      this.textResponse = null;
    },
    async send() {
      this.mailMessage = "送信しました";

      axios
        .get("http://localhost:8000/api/send.php")
        .then((response) => {
          if (response.status === 200) {
            this.mailResponse = "成功しました。"
          } else {
            this.mailResponse = "成功しました。"
            console.log(response);
          }
        })
        .catch((error) => {
          this.mailResponse = "失敗しました😭"
          console.log(error);
        });
    },
    mailClear() {
      this.mailMessage = "ボタンを押してください";
      this.mailResponse = null;
    },
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
    .sub-title {
      width: 100%;
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