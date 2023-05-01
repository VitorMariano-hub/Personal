<template>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h2 class="text-3xl font-bold mb-4">Projetos</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
      <template v-for="project in projects.data" :key="project.id">
        <div class="bg-white rounded-lg shadow-md p-4">
          <div class="mb-4">
          <img :src="'/storage/' + project.image_path" alt="" class="w-full rounded-lg shadow-lg">
          </div>
          <div class="mb-2">
            <h3 class="text-lg font-bold">{{ project.name }}</h3>
            <p class="text-gray-600">{{ project.description }}</p>
          </div>
          <div class="flex justify-between">
            <div>
              <p class="text-gray-500 text-sm">Linguagens utilizadas:</p>
              <p>{{ project.languages }}</p>
            </div>
            <div>
              <p class="text-gray-500 text-sm">Status:</p>
              <p>{{ project.status }}</p>
            </div>
          </div>
        </div>
      </template>
    </div>
      <pagination class="mt-6" :links="projects.links" />
  </div>
</template>

<script>
import Pagination from '@/Components/Pagination'

export default {
  components: {
    Pagination,
  },

  props: {
    projects: {

    }
  }
};
</script>