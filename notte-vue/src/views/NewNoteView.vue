<template>
  <section class="page" id="note--new">
    <note-form v-model="note" label="Create Note" @submit="save" />
  </section>
</template>

<script setup>
  import { onMounted, reactive, ref } from 'vue'
  import ax from 'axios'
  import NoteForm from '@/components/NoteForm.vue'
  import { useNoteStore } from '@/stores/note'
  import { useRoute, useRouter } from 'vue-router'

  const note = ref({
    note: ''
  })
  const route = useRoute()
  const router = useRouter()
  const noteStore = useNoteStore()

  const save = () => {
    ax.post(`${API_BASE}/notes/`, {note: note.value})
      .then((resp)=>{
        noteStore.notes.push(resp.data)
        router.push(`/notes/${resp.data.id}`)
      })
  }
</script>