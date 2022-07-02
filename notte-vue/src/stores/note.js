import {defineStore} from 'pinia'
import ax from 'axios'

export const useNoteStore = defineStore('note', {
  state: ()=>({
    notes: [],
  }),
  actions: {
    fetch(query) {
      if (query === '') query = null

      return new Promise((resolve, reject) => {
        ax.get(`${API_BASE}/notes.json`, {params: { query: query}})
          .then(resp => {
            this.notes = resp.notes
            resolve()
          }).catch(reject)
      })
    }
  }
})