<template>
  <div>
    <Head title="Create Contact" />
    <h1 class="mb-8 text-3xl font-bold">
      <Link class="text-indigo-400 hover:text-indigo-600" href="/projects">Projetos</Link>
      <span class="text-indigo-400 font-medium">/</span> Adicionar
    </h1>
    <div class="max-w-3xl  rounded-md shadow overflow-hidden">
      <form @submit.prevent="store">
        <div class="flex flex-wrap -mb-8 -mr-6 p-8">
          <text-input v-model="form.name" :error="form.errors.name" class="pb-8 pr-6 w-full lg:w-1/2" label="Nome" />
          <textarea-input v-model="form.description" :error="form.errors.description" class="pb-8 pr-6 w-full lg:w-1/2" label="Descrição"></textarea-input>
          <text-input v-model="form.languages_used" :error="form.errors.languages_used" class="pb-8 pr-6 w-full lg:w-1/2" label="Linguagem" />
          <label for="image_path">Imagem: </label>
          <input type="file" name="image_path" id="image_path" @change="setImage">
        </div>
        <div class="flex items-center justify-end px-8 py-4 bg-gray-50 border-t border-gray-100">
          <loading-button :loading="form.processing" class="btn-indigo" type="submit">Adicionar Projeto</loading-button>
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
import TextareaInput from '@/Shared/TextareaInput'
import LoadingButton from '@/Shared/LoadingButton'

export default {
  components: {
    Head,
    Link,
    LoadingButton,
    SelectInput,
    TextInput,
    TextInput,
    TextareaInput,
  },
  layout: Layout,
  props: {
    organizations: Array,
  },
  remember: 'form',
  data() {
    return {
      form: this.$inertia.form({
        name: '',
        description: '',
        languages_used: '',
        image_path: '',
      }),
    }
  },
  methods: {
     store() {
    // Criar um objeto FormData
    let formData = new FormData();
    // Adicionar os dados do formulário ao objeto FormData
    formData.append('name', this.form.name);
    formData.append('description', this.form.description);
    formData.append('languages_used', this.form.languages_used);
    formData.append('image_path', this.form.image_path); // Adicionar a imagem ao FormData

    // Enviar a requisição POST com o objeto FormData
    this.form.post('/projects', formData, {
      headers: {
        'Content-Type': 'multipart/form-data' // Definir o cabeçalho correto para upload de arquivos
      },
      onSuccess: () => {
        // Lógica de sucesso
        // Salvar a referência da imagem no Local Storage
        window.localStorage.setItem('imageRef', this.form.image_path)
      },
      onError: (errors) => {
        // Lógica de erro
        console.error(errors)
      }
    })
  },
  setImage(event) {
    this.form.image_path = event.target.files[0]; // Definir o arquivo selecionado no campo de imagem do formulário

  }
  }
}
</script>
