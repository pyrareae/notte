import {defineStore} from 'pinia'
import ax from 'axios'

export const useSessionStore = defineStore('session', {
  state: ()=>({
    token: null,
  }),
  getters: {
    isLoggedIn() {
      return !!this.token
    }
  },
  actions: {
    applyHeader() {
      ax.defaults.headers.common["authorization"] = `${this.token}`
    },
    logIn(username, password) {
      return new Promise((resolve, reject) => {
        if (this.isLoggedIn) return resolve(false)

        ax.post(`${API_BASE}/log_in`, {user_session: {username, password}})
          .then((resp) => {
            this.token = resp.data.token;
            this.applyHeader();
            resolve(true);
          })
          .catch(reject);
      })

    },
    logOut() {
      this.token = null
      this.applyHeader();
    } 
  }
})