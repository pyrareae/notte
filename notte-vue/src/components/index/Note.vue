<template>
  <router-link class="note-outer" :to="path">
    <div class="note">
      <section class="body">
        {{truncated}}
      </section>
    </div>
  </router-link>
</template>

<script>
import _ from 'lodash'
import { computed } from 'vue'
export default {
  props: ['value'],
  computed: {
    truncated() {return _.truncate(this.value.note, {length: 200})},
    path() {return `/notes/${this.value.id}`}
  }
}
</script>