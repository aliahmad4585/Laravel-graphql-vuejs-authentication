<template>
  <div id="app">
    <form @submit.prevent="login">
     <label for="email">Email</label>
      <input type="text" id="email"v-model="email"  name="email" placeholder="Your email..">
      <label for="password">Password</label>
      <input type="text" id="password"v-model="password"  name="password" placeholder="Your password..">
      <input type="submit" value="Submit">
    </form>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "App",
  data() {
    return {
      password: "",
      email:""
    };
  },
  methods: {
    async login() {
     try {
            var result = await axios({
                    method: "POST",
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    url: "http://localhost:8000/graphql",
                    data: {
                        query: `
                            {
                                User(email: email, password: password){
                                    name,
                                    email,
                                    id
                                }
                            }
                        `
                    }
                });
                this.Users = result.data.data.Users;
                if(this.Users.length > 0){
                  this.$router.push('/Dashboard');
                }
            } catch (error) {
                console.error(error);
            }
    }
  }
};
</script>

<style>
input[type=text], select {
  width: 23%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 13%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}
lable{
  float:left;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

</style>