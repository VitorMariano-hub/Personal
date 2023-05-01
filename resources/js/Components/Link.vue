<template>
  <a :href="url" :class="{ 'bg-blue-700 text-white': active }" class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500">
    <slot></slot>
  </a>
</template>

<script>
export default {
  props: {
    url: String,
    active: Boolean,
  },
}
</script>
