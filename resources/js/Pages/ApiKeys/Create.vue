<template>
  <MusicLayout>
    <template #title>
      Create API Key
    </template>
    <template #content>
      <form @submit.prevent="createApiKey">
        <div class="form-group">
          <label for="name">Name</label>
          <input v-model="name" type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Create</button>
      </form>
    </template>
  </MusicLayout>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';
import MusicLayout from '@/Layouts/MusicLayout.vue';

export default {
  data() {
    return {
      name: '',
    };
  },
  components: {
    MusicLayout,
  },
  methods: {
    createApiKey() {
      Inertia.post(route('api-keys.store'), { name: this.name });
    },
  },
};
</script>
