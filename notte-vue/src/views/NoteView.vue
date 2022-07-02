<template>
  <div id="note--show">
    <div id="note">
      <section class="body">
        {{note.note}}
      </section>
      <section class="controls">
        <router-link :to="editUrl">Edit</router-link>
        <router-link to="/notes">Back</router-link>
        <button>Delete</button>
      </section>
    </div>
  </div>
</template>

<script setup>
  import { useRouter, useRoute } from "vue-router";
  import { useNoteStore } from "@/stores/note";
  import { computed, ref } from 'vue'

  const router = useRouter()
  const route = useRoute()
  const noteStore = useNoteStore()
  const editUrl = ref('/')

  const note = ref({})
  noteStore.getNote(route.params.id)
           .then(n => note.value = n)
           .catch(()=>{router.push('/')})

</script>