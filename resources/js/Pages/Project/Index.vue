<template>
  <div>
    <Head title="Projetos" />
    <h1 class="mb-8 text-3xl font-bold">Projetos</h1>
    <div class="flex items-right justify-between mb-6">
      <Link class="btn-indigo" href="/projects/create">
        <span>Adicionar</span>
        <span class="hidden md:inline">&nbsp;Projeto</span>
      </Link>
    </div>
    <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full whitespace-nowrap">
        <tr class="text-left font-bold">
          <th class="pb-4 pt-6 px-6">Nome</th>
          <th class="pb-4 pt-6 px-6">Linguagem</th>
          <th class="pb-4 pt-6 px-6">Data criação</th>
        </tr>
        <tr v-for="project in projects.data" :key="project.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
          <td class="border-t">
            <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/projects/${project.id}/edit`">
              {{ project.name }}
            </Link>
          </td>
          <td class="border-t">
            <Link class="flex items-center px-6 py-4" :href="`/projects/${project.id}/edit`" tabindex="-1">
              <div >
              {{ project.languages_used }}
              </div>
            </Link>
          </td>
          <td class="w-px border-t">
            <Link class="flex items-center px-6 py-4" :href="`/projects/${project.id}/edit`" tabindex="-1">
              {{ project.created_at }}
            <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
            </Link>
          </td>
        </tr>
        <tr >
          <td class="px-6 py-4 border-t" colspan="4">No contacts found.</td>
        </tr>
      </table>
    </div>
    <pagination class="mt-6" :links="projects.links" />
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import Icon from '@/Shared/Icon'
import pickBy from 'lodash/pickBy'
import Layout from '@/Shared/Layout'
import throttle from 'lodash/throttle'
import mapValues from 'lodash/mapValues'
import Pagination from '@/Shared/Pagination'
import SearchFilter from '@/Shared/SearchFilter'

export default {
  components: {
    Head,
    Icon,
    Link,
    Pagination,
    SearchFilter,
  },
  layout: Layout,
  props: {
    projects: {},
  },
  watch: {
    form: {
      deep: true,
      handler: throttle(function () {
        this.$inertia.get('/contacts', pickBy(this.form), { preserveState: true })
      }, 150),
    },
  },
  methods: {
    reset() {
      this.form = mapValues(this.form, () => null)
    },
  },
}
</script>
