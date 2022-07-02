<template>
  <div id="sessions--new">
    <h1>Log In</h1>
    <div class="errors" v-if="errors">{{errors}}</div>
    <form @submit.prevent id="sessions--form">
      <div>
        <label for="username">Username</label>
        <input v-model="login.username" id="username"/>
      </div>
      <div>
        <label for="password">Password</label>
        <input v-model="login.password" id="password"/>
      </div>

      <div class="controls">
        <input type="submit" value="Log In"/>
        <em>or</em>
        <router-link to="sign_up">Create Account</router-link>
      </div>
    </form>
  </div>
</template>

<script>
import { useRouter } from 'vue-router'
import { useSessionStore } from '../stores/session'
import ax from 'axios'
import { reactive, ref } from 'vue'

export default {
  setup() {
    const sessionStore = useSessionStore()
    const router = useRouter()
    const login = reactive({
      password: '',
      username: '',
    })
    const errors = ref(null)
    
    const onSignIn = () => {
      sessionStore.logIn(login.username, login.password)
        .then(() => router.push('/notes'))
        .catch(() => {errors = "Invalid username or password!"})
    }

    return {onSignIn, login, errors}
  },
}
</script>