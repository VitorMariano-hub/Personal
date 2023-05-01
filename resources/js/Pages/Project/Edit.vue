<template>
  <div>
    <Head :title="`${form.name}`" />
    <h1 class="mb-8 text-3xl font-bold">
      <Link class="text-indigo-400 hover:text-indigo-600" href="/projects">Projetos</Link>
      <span class="text-indigo-400 font-medium">/</span>
      Editar
    </h1>
    <trashed-message v-if="project.deleted_at" class="mb-6" @restore="restore"> This project has been deleted. </trashed-message>
    <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
      <form enctype="multipart/form-data" @submit.prevent="update">
        <div class="flex flex-wrap -mb-8 -mr-6 p-8">
          <text-input v-model="form.name" :error="form.errors.name" class="pb-8 pr-6 w-full lg:w-1/2" label=" Nome do Projeto" />
          <text-input v-model="form.description" :error="form.errors.description" class="pb-8 pr-6 w-full lg:w-1/2" label=" Descrição" />
          <text-input v-model="form.languages_used" :error="form.errors.languages_used" class="pb-8 pr-6 w-full lg:w-1/2" label=" Tecnologias utilizadas" />
          <input type="file" name="image_path" id="image_path" @change="setImage">
        </div>
        <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
          <button v-if="!project.deleted_at" class="text-red-600 hover:underline" tabindex="-1" type="button" @click="destroy">Deletar Projeto</button>
          <loading-button :loading="form.processing" class="btn-indigo ml-auto" type="submit">Atualizar Projeto</loading-button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import Layout from '@/Shared/Layout'
import TextInput from '@/Shared/TextInput'
import SelectInput from '@/Shared/SelectInput'
import LoadingButton from '@/Shared/LoadingButton'
import TrashedMessage from '@/Shared/TrashedMessage'
import axios from 'axios';

export default {
  components: {
    Head,
    Link,
    LoadingButton,
    SelectInput,
    TextInput,
    TrashedMessage,
  },
  layout: Layout,
  props: {
    project: Object,

  },
  remember: 'form',
  data() {
    return {
      form: this.$inertia.form({
        name: this.project.name,
        description: this.project.description,
        languages_used: this.project.languages_used,
        image_path: this.project.image_path,
      })
    }
  },
  methods: {

   update() {
    // Criar um objeto FormData
    let formData = new FormData();
    // Adicionar os dados do formulário ao objeto FormData
    formData.append('name', this.form.name);
    formData.append('description', this.form.description);
    formData.append('languages_used', this.form.languages_used);
    formData.append('image_path', this.form.image_path); // Adicionar a imagem ao FormData

    // Faz a requisição PUT para atualizar o projeto no servidor
    this.form.put(`/projects/${this.project.id}`, formData);
  },

    destroy() {
      if (confirm('Are you sure you want to delete this project?')) {
        this.$inertia.delete(`/projects/${this.project.id}`)
      }
    },

    restore() {
      if (confirm('Are you sure you want to restore this project?')) {
        this.$inertia.put(`/projects/${this.project.id}/restore`)
      }
    },

    setImage(event) {
    this.form.image_path = event.target.files[0]; // Definir o arquivo selecionado no campo de imagem do formulário

    }
  },
}
</script>
