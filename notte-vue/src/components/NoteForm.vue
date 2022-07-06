<template>
  <form @submit.prevent>
    <div class="errors" v-if="errors">{{errors}}</div>

    <textarea name="note" id="note" v-model="note.note" @input="push"></textarea>
    <section class="controls">
      <input type="submit" :value='label' @click='emit("submit")'/>
      <button @click="router.go(-1)">Back</button>
    </section>
  </form>
</template>

<script setup>
  import {reactive} from 'vue'
  import { useRouter } from 'vue-router'
  import { useVModel } from '@vueuse/core'
  

  const props = defineProps(['modelValue', 'errors', 'label'])
  const emit = defineEmits(['update:modelValue', 'submit'])
  const router = useRouter()
  const note = useVModel(props, 'modelValue', emit)

  const push = () => {
    emit("update:modelValue", note)
  }

</script>