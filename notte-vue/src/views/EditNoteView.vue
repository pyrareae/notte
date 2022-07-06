<template>
  <section class="page" id="note--edit">
    <note-form v-model="note" label="Update Note" @submit="save" />
  </section>
</template>

<script setup>
  import { onMounted, reactive, ref } from 'vue'
  import ax from 'axios'
  import NoteForm from '@/components/NoteForm.vue'
  import { useNoteStore } from '@/stores/note'
  import { useRoute, useRouter } from 'vue-router'

  const note = ref({})

  const noteStore = useNoteStore()
  const route = useRoute()
  const router = useRouter()

  const save = () => {
    ax.patch(`${API_BASE}/notes/${note.value.id}`, {note: note.value})
      .then((resp)=>{
        router.go(-1)
      })
  }

  onMounted(() => {
    noteStore.getNote(route.params.id)
      .then(remoteNote => {
        note.value = remoteNote
      })
      .catch(()=>{router.push('/')})
  })
</script>