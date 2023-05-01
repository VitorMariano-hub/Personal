<template>
  <form class="w-full max-w-lg mx-auto mt-8">
    <div class="flex flex-wrap mb-6">
      <div class="w-full">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="project-name">
          Nome do Projeto
        </label>
        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="project-name" type="text" placeholder="Digite o nome do projeto">
      </div>
    </div>
    <div class="flex flex-wrap mb-6">
      <div class="w-full">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="project-description">
          Descrição do Projeto
        </label>
        <textarea class="no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="project-description" placeholder="Digite a descrição do projeto"></textarea>
      </div>
    </div>
    <div class="flex flex-wrap mb-6">
      <div class="w-full">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="project-image">
          Imagem do Projeto
        </label>
        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="project-image" type="file">
      </div>
    </div>
    <div class="flex justify-center">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
        Salvar Projeto
      </button>
    </div>
  </form>
</template>


<script>

import { Head } from '@inertiajs/inertia-vue3'
import Layout from '@/Shared/Layout'

export default {
  components: {
    Head
  },
  layout: Layout,

}


</script>
