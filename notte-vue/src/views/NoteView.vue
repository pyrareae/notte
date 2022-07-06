<template>
  <div id="note--show">
    <div id="note">
      <section class="body">
        <p>
          {{note.note}}
        </p>
      </section>
      <section class="controls">
        <router-link :to="editUrl">Edit</router-link>
        <router-link to="/notes">Back</router-link>
        <div class="right">
          <button class="danger">Delete</button>
        </div>
      </section>
    </div>
  </div>
</template>

<script setup>
  import { useRouter, useRoute } from "vue-router";
  import { useNoteStore } from "@/stores/note";
  import { computed, onMounted, ref } from 'vue'

  const router = useRouter()
  const route = useRoute()
  const noteStore = useNoteStore()
  const editUrl = ref('/')
  const note = ref({})

  onMounted(() => {
    noteStore.getNote(route.params.id)
      .then(n => {
        note.value = n
        editUrl.value = `/notes/${note.value.id}/edit`
      })
      .catch(()=>{router.push('/')})
  })

</script>