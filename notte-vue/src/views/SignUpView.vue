<template>
  <div id="sessions--new">
    <h1>Sign Up</h1>
    <div class="errors" v-if="errors">
      <ul>
        <li v-for="(message, error) in errors">{{error}}: {{message.join(', ')}}</li>
      </ul>
    </div>
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
        <input @click="onSignUp" type="submit" value="Sign Up"/>
        <em>or</em>
        <router-link to="log_in">Log In</router-link>
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
    
    const onSignUp = () => {
      ax.post(`${API_BASE}/users.json`, {user: login})
        .then(resp => {
          router.push('/log_in')
        })
        .catch((error) => {
          console.log(error)
          errors.value = error.response.data
        })
    }

    return {onSignUp, login, errors}
  },
}
</script>