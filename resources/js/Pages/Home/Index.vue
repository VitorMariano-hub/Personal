<template>
  <div>
    <Header />
    <div class="container">
      <project-list :projects="projects" />
    </div>
  </div>
</template>

<script>
import ProjectList from '@/Components/ProjectList'
import Header from '@/components/Header.vue'


export default {
  components: {
    Header,
    ProjectList,
  },
  props: {
    projects: Array,
    
  },
}
</script>
