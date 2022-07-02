<template>
  <div id="note--index">
    <nav id="bar">
      <router-link to="/notes/new">NEW NOTE</router-link>
      <input v-model="query" name="query" @keyup.enter="search" placeholder="search" />
      <button @click="search" >SEARCH</button>
      <button @click="clear">CLEAR</button>
    </nav>
    <div id="notes">
      <note v-for="note in noteStore.notes" :key='note.id' :value='note'/>
    </div>
  </div>
</template>

<script>
import { onMounted, ref } from 'vue'
import { useNoteStore } from '../stores/note'
import Note from '@/components/index/Note.vue'

export default {
  components: {Note},
  setup() {
    const noteStore = useNoteStore()
    const query = ref('')

    const search = () => {
      noteStore.fetch(query.value)
    }
    const clear = () => {
      query.value=''
      noteStore.fetch()
    }

    onMounted(() => {
      noteStore.fetch()
    })

    return {
      noteStore,
      search,
      clear,
      query,
    }
  },
}
</script>