import {defineStore} from 'pinia'
import ax from 'axios'
import _ from 'lodash'

export const useNoteStore = defineStore('note', {
  state: ()=>({
    notes: [],
  }),
  actions: {
    fetch(query) {
      if (query === '') query = null

      return new Promise((resolve, reject) => {
        ax.get(`${API_BASE}/notes`, {params: { query: query}})
          .then(resp => {
            this.notes = resp.data
            resolve()
          }).catch(reject)
      })
    },
    // Get note if it is in the store, otherwise try to fetch it.
    getNote(id) {
      return new Promise((resolve, reject) => {
        const existingNote = _.find(this.notes, note => note.id == id)
  
        if (existingNote) return resolve(existingNote)

        ax.get(`${API_BASE}/notes/${id}`)
          .then((resp) => {
            resolve(resp.data);
          })
          .catch(reject);
      })

      
    }
  }
})